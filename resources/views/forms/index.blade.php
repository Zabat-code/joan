@extends('layouts.forms')

@section('title', 'Formularios')

@section('form_content')
<div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold">Listado de usuarios</h1>

                <a href="{{ route('forms.create') }}"
                    class="bg-purple-700 hover:bg-purple-500 text-white px-4 py-2 rounded-lg">
                    + Crear Formulario
                </a>
            </div>
  <table class="min-w-full" id="forms-table">
    <thead>
        <tr>
            <th class="px-4 py-3 text-left text-sm font-medium">ID</th>
            <th class="px-4 py-3 text-left text-sm font-medium">Nombre del Formulario</th>
            <th class="px-4 py-3 text-left text-sm font-medium">Descripción</th>
            <th class="px-4 py-3 text-left text-sm font-medium">Estado</th>
            <th class="px-4 py-3 text-center text-sm font-medium">Acciones</th>
        </tr>
    </thead>
    <tbody></tbody>
  </table>
@endsection

@push('scripts')
    <script src="/js/forms/list.js"></script> {{-- Otro archivo JS --}}
@endpush
