@extends('layouts.app')

@section('content')
    <div class=" container-settings bg-white p-4 rounded-lg shadow-md flex">
        <section class="main-content-forms w-full  ">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold">Listado de usuarios</h1>

                <a href="{{ route('users.create') }}"
                    class="bg-purple-700 hover:bg-purple-500 text-white px-4 py-2 rounded-lg">
                    + Crear Formulario
                </a>
            </div>
            @yield('form_content')
        </section>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="/css/tailwinddatatable.css">
@endpush
