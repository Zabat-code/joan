@extends('layouts.forms')

@section('title', 'Constructor de Formularios')

@section('form_content')
<div class="bg-white p-6 rounded shadow">
    <h3 class="text-lg font-semibold mb-4">Constructor de Formularios</h3>

    <form id="builder-form" method="POST" action="{{ route('forms.builder.store') }}">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
            <!-- Columna izquierda: Header -->
            <div>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombre del Formulario</label>
                        <input name="name" type="text" class="w-full border border-gray-300 rounded px-3 py-2" required />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Descripción</label>
                        <input name="description" type="text" class="w-full border border-gray-300 rounded px-3 py-2" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Estado</label>
                        <select name="state" class="w-full border border-gray-300 rounded px-3 py-2">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Columna derecha: Campos dinámicos -->
            <div>
                <div class="flex items-center justify-between mb-3">
                    <h4 class="font-medium">Campos</h4>
                    <button type="button" id="add-field" class="bg-emerald-600 text-white px-3 py-1 rounded text-sm">Agregar campo</button>
                </div>

                <div id="fields-container" class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <!-- Campos añadidos dinámicamente (cada bloque ocupa una celda) -->
                </div>
            </div>

            <!-- Botones: ocupar ambas columnas -->
            <div class="md:col-span-2 mt-4 flex items-center space-x-2">
                <button type="submit" class="bg-emerald-600 text-white px-4 py-2 rounded">Guardar plantilla</button>
                <a href="{{ route('forms') }}" class="text-sm text-gray-600">Cancelar</a>
            </div>
        </div>
    </form>
</div>

@endsection

@push('scripts')
    <script src="/js/forms/builder.js"></script>
@endpush
