@extends('layouts.patients')

@section('title', 'Pacientes')

@section('patients_content')
    <div class="p-6   ">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold">Crear Paciente</h1>
            <div class="flex justify-between items-center mb-6">
                <a href="{{ route('patients') }}" class="bg-red-400 hover:bg-red-600 text-white px-4 py-2 rounded-lg">
                    Cancelar
                </a>
                <a href="{{ route('patients.create') }}"
                    class="bg-purple-700 hover:bg-purple-500 text-white px-4 py-2 rounded-lg">
                    Crear
                </a>

            </div>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow  w-full ">

        </div>
    </div>
@endsection
@push('scripts')
    <script src="/js/patients/create.js"></script>
@endpush
