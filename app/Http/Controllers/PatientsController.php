<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientsModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Exception;

class PatientsController extends Controller
{
    public function index()
    {
        return view('patients.index');
    }
    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'photo' => 'nullable|image|max:2048',
            'identification' => 'required|string|max:50|unique:patients,identification',
            'first_name' => 'required|string|max:150',
            'last_name' => 'required|string|max:150',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:M,F,O',
            'phone' => 'nullable|string|max:30',
            'cellphone' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:150',
            'insurance' => 'nullable|integer',
            'insurance_number' => 'nullable|string|max:100',
            'address' => 'nullable|string',
            'observations' => 'nullable|string',
        ];

        $messages = [
            'photo.image' => 'El archivo subido debe ser una imagen válida.',
            'photo.max' => 'La imagen no debe superar los 2 MB.',
            'identification.required' => 'La identificación es obligatoria.',
            'identification.unique' => 'La identificación ya está registrada.',
            'first_name.required' => 'El nombre es obligatorio.',
            'last_name.required' => 'El apellido es obligatorio.',
        ];

        $validated = $request->validate($rules, $messages);

        try {
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('patients', $filename, 'public');
                $validated['photo_path'] = $path;
            }

            // Create patient using PatientsModel
            $patient = PatientsModel::create([
                'photo_path' => $validated['photo_path'] ?? null,
                'identification' => $validated['identification'],
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'birth_date' => $validated['birth_date'] ?? null,
                'gender' => $validated['gender'] ?? 'O',
                'phone' => $validated['phone'] ?? null,
                'cellphone' => $validated['cellphone'] ?? null,
                'email' => $validated['email'] ?? null,
                'insurance' => $validated['insurance'] ?? 0,
                'insurance_number' => $validated['insurance_number'] ?? null,
                'address' => $validated['address'] ?? null,
                'observations' => $validated['observations'] ?? null,
            ]);

            return redirect()->route('patients.edit', $patient->id_patient)
                ->with('success', 'Paciente creado correctamente.');
        } catch (Exception $e) {
            // If file was stored but creation failed, consider deleting file
            if (!empty($path) && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }

            return back()->withInput()->with('error', 'Error al crear paciente: ' . $e->getMessage());
        }
    }

    public function edit(PatientsModel $patient)
    {
        return view('patients.edit', compact('patient'));
    }
}
