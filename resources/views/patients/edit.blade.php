@extends('layouts.patients')

@section('title', 'Editar Paciente')

@section('patients_content')
    <div class="p-6">
        <h1 class="text-2xl font-semibold mb-4">Editar Paciente</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow p-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    @if($patient->photo_path)
                        <img src="{{ asset('storage/' . $patient->photo_path) }}" alt="Foto" class="w-full h-48 object-cover rounded">
                    @else
                        <div class="w-full h-48 bg-gray-100 flex items-center justify-center rounded">No hay foto</div>
                    @endif
                </div>
                <div>
                    <p><strong>Identificación:</strong> {{ $patient->identification }}</p>
                    <p><strong>Nombre:</strong> {{ $patient->first_name }} {{ $patient->last_name }}</p>
                    <p><strong>Correo:</strong> {{ $patient->email }}</p>
                </div>
            </div>

            <div class="mt-4 flex gap-2 justify-end">
                <a href="{{ route('patients') }}" class="px-4 py-2 border rounded">Volver</a>
            </div>
        </div>
    </div>
@endsection
