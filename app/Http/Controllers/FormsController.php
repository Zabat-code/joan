<?php

namespace App\Http\Controllers;

use App\Models\DocumentHeaderModel;
use App\Models\DocumentBodyModel;
use App\Models\DocumentValueModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FormsController extends Controller
{
    public function index()
    {
        return view('forms.index');
    }
    public function list()
    {
        $list = DocumentHeaderModel::all();
        return DataTables::of($list)
            ->addIndexColumn() // Opcional
            ->addColumn('action', function($row){
                // Usar clases de Tailwind para los botones
                $btn = '<a href="javascript:void(0)" class="text-white bg-blue-600 hover:bg-blue-700 font-bold py-1 px-2 rounded text-xs mr-2">Editar</a>';
                $btn .= ' <a href="javascript:void(0)" class="text-white bg-red-600 hover:bg-red-700 font-bold py-1 px-2 rounded text-xs">Eliminar</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    // Mostrar el builder de plantillas
    public function create()
    {
        return view('forms.builder');
    }

    // Guardar plantilla (DocumentHeader + DocumentBody records)
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

        usort($prepared, function($a, $b){
            return ($a['order'] ?? 0) <=> ($b['order'] ?? 0);
        });

        foreach ($prepared as $f) {
            $typeKey = strtolower($f['type'] ?? 'text');
            $typeCode = $typeMap[$typeKey] ?? 1;
            $formatType = isset($f['format_type']) ? (int)$f['format_type'] : (
                in_array($typeKey, ['select','checkbox']) ? 1 : 0
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

    // Mostrar formulario dinámico basado en header y sus bodys
    public function dynamic($id)
    {
        $header = DocumentHeaderModel::with(['bodys' => function($q){ $q->orderBy('order'); }])->findOrFail($id);
        return view('forms.dynamic', compact('header'));
    }

    // Guardar valores del formulario dinámico
    public function storeDynamic(Request $request, $id)
    {
        $header = DocumentHeaderModel::with('bodys')->findOrFail($id);

        $saved = [];
        $order = 1;
        foreach ($header->bodys as $body) {
            $fieldName = 'field_'.$body->id_document_body;
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
}
