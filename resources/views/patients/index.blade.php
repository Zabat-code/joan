@extends('layouts.patients')

@section('title', 'Pacientes')

@section('patients_content')
<div class="p-6   ">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Listado de pacientes</h1>

        <a href="{{ route('patients.create') }}"
           class="bg-purple-700 hover:bg-purple-500 text-white px-4 py-2 rounded-lg">
            + Crear Paciente
        </a>
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow  w-full ">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-medium">Nombre</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Cedula</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Edad</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Genero</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Seguro</th>
                    <th class="px-4 py-3 text-center text-sm font-medium">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y">
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('scripts')
    <script src="/js/patients/list.js"></script>
@endpush
