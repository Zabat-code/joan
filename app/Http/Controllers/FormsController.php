<?php

namespace App\Http\Controllers;

use App\Models\DocumentHeaderModel;
use App\Models\DocumentBodyModel;
use App\Models\DocumentValueModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FormsController extends Controller
{
    private $MenuDynamic;

    public function __construct()
    {
        $this->MenuDynamic = DocumentHeaderModel::all();
    }
    public function index()
    {
        return view('forms.index', ['menuDynamic' => $this->MenuDynamic]);
    }

    public function create()
    {
        return view('forms.builder', ['menuDynamic' => $this->MenuDynamic]);
    }

    public function list()
    {
        $list = DocumentHeaderModel::all();
        return DataTables::of($list)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<a href="' . route('forms.dynamic', $row->id_document_header) . '" class="text-white bg-blue-600 hover:bg-blue-700 font-bold py-2 px-3 rounded text-xs mr-2">Editar</a>';

                $deleteAction = route('forms.dynamic.delete', $row->id_document_header);
                $csrf = csrf_token();
                $btn .= '<form method="POST" action="' . $deleteAction . '" style="display:inline-block;margin:0;" onsubmit="return confirm(\'¿Seguro que desea eliminar este formulario?\')">';
                $btn .= '<input type="hidden" name="_token" value="' . $csrf . '">';
                $btn .= '<input type="hidden" name="_method" value="DELETE">';
                $btn .= '<button type="submit" class="text-white bg-red-600 hover:bg-red-700 font-bold py-2 px-3 rounded text-xs">Eliminar</button>';
                $btn .= '</form>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function storeBuilder(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:200',
            'description' => 'nullable|string|max:200',
            'state' => 'required|in:0,1',
        ]);

        $header = DocumentHeaderModel::create($data);

        $fields = $request->input('fields', []);
        $order = 1;
        $typeMap = [
            'text' => 1,
            'number' => 2,
            'date' => 3,
            'textarea' => 4,
            'select' => 5,
            'checkbox' => 6,
        ];
        // Normalize fields: ensure numeric 'order', skip empty; then sort by 'order'
        $prepared = [];
        foreach ($fields as $f) {
            if (empty($f['label']) && empty($f['code'])) continue;
            $f['order'] = isset($f['order']) && is_numeric($f['order']) ? (int)$f['order'] : $order++;
            $prepared[] = $f;
        }

        usort($prepared, function ($a, $b) {
            return ($a['order'] ?? 0) <=> ($b['order'] ?? 0);
        });

        foreach ($prepared as $f) {
            $typeKey = strtolower($f['type'] ?? 'text');
            $typeCode = $typeMap[$typeKey] ?? 1;
            $formatType = isset($f['format_type']) ? (int)$f['format_type'] : (
                in_array($typeKey, ['select', 'checkbox']) ? 1 : 0
            );

            DocumentBodyModel::create([
                'label' => $f['label'] ?? '',
                'code' => $f['code'] ?? '',
                'format' => $f['format'] ?? '',
                'id_document_header' => $header->id_document_header,
                'order' => $f['order'] ?? $order,
                'format_type' => $formatType,
                'type' => $typeCode,
                'required' => isset($f['required']) ? (int)$f['required'] : 0,
            ]);
        }

        return redirect()->route('forms')->with('success', 'Plantilla creada correctamente');
    }

    public function dynamic($id)
    {
        $MenuDynamic = $this->MenuDynamic;
        $header = DocumentHeaderModel::with(['bodys' => function ($q) {
            $q->orderBy('order');
        }])->findOrFail($id);
        return view('forms.dynamic', compact('header'), ['menuDynamic' => $MenuDynamic]);
    }

    public function storeDynamic(Request $request, $id)
    {
        $header = DocumentHeaderModel::with('bodys')->findOrFail($id);

        $saved = [];
        $order = 1;
        foreach ($header->bodys as $body) {
            $fieldName = 'field_' . $body->id_document_body;
            $value = $request->input($fieldName);

            // Normalizar valor para inputs como checkbox (array) y others
            if (is_array($value)) {
                $payload = ['value' => $value];
            } else {
                $payload = ['value' => $value];
            }

            DocumentValueModel::create([
                'values' => json_encode($payload, JSON_UNESCAPED_UNICODE),
                'id_document_body' => $body->id_document_body,
                'order' => $order,
            ]);

            $saved[] = [$body->id_document_body => $payload];
            $order++;
        }

        return redirect()->route('forms')->with('success', 'Formulario guardado correctamente');
    }

    public function deleteDynamic($id)
    {
        $header = DocumentHeaderModel::findOrFail($id);
        foreach ($header->bodys as $body) {
            DocumentValueModel::where('id_document_body', $body->id_document_body)->delete();
            $body->delete();
        }
        $header->delete();
        return redirect()->route('forms')->with('success', 'Formulario eliminado correctamente');
    }
}
