@extends('layouts.patients')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('title', 'Pacientes')

@section('patients_content')
    <div class="  ">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold">Registro de Paciente</h1>

        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow  w-full ">
            <form class="max-w-6xl mx-auto bg-white p-2    " action="{{ route('patients.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-2 rounded mb-4">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <input type="file" name="photo" id="photo" accept="image/*" class="hidden">
                        <label for="photo"
                            class="cursor-pointer flex flex-col items-center justify-center w-full h-48 border-2 border-dashed  rounded-lg hover:border-blue-500">
                            <svg class="w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                            </svg>
                            <span class="text-gray-600">Haga clic para subir una foto del paciente</span>
                        </label>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Identificación</label>
                        <input type="text" name="identification" value="{{ old('identification') }}" class="input-base">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Nombres</label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}" class="input-base">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Fecha de Nacimiento</label>
                        <input type="date" name="birth_date" value="{{ old('birth_date') }}" class="input-base">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Apellidos</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}" class="input-base">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Sexo</label>
                        <select name="gender" class="input-base">
                            <option value="">Seleccione</option>
                            <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Masculino</option>
                            <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Femenino</option>
                            <option value="O" {{ old('gender') == 'O' ? 'selected' : '' }}>Otro</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Teléfono</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="input-base">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Celular</label>
                        <input type="text" name="cellphone" value="{{ old('cellphone') }}" class="input-base">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Correo Electrónico</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="input-base">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Seguro Médico</label>
                        <select name="insurance" id="insurances" class="input-base">
                            <option value="">--</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Número de Seguro</label>
                        <input type="text" name="insurance_number" value="{{ old('insurance_number') }}" class="input-base">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-1">Dirección</label>
                        <textarea rows="2" name="address" class="input-base">{{ old('address') }}</textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-1">Observaciones</label>
                        <textarea rows="3" name="observations" class="input-base">{{ old('observations') }}</textarea>
                    </div>

                </div>

                <div class="flex justify-end mt-6 gap-3">
                    <button type="reset" class="px-4 py-2 rounded-sm border ">
                        Cancelar
                    </button>
                    <button type="submit" class="px-4 py-2 rounded-sm bg-blue-600 text-white hover:bg-blue-700">
                        Guardar Paciente
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="/js/patients/create.js"></script>
@endpush
