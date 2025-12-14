@extends('layouts.app')

{{--
    Aquí puedes definir secciones específicas de este módulo,
    como una barra lateral de administración que solo aparece en 'Usuarios'.
--}}

@section('content')
    <div class="container-dashboard bg-white p-4 rounded-lg shadow-md flex">


        <section class="main-content-dashboard">
            @yield('dashboard_content') {{-- Yield principal para las vistas del módulo Usuarios --}}
        </section>
    </div>
@endsection

{{--
    Define scripts específicos para el Módulo de Usuarios que se inyectarán en @stack('scripts')
    del layout base.
--}}
@push('scripts')
    {{-- Si el módulo Usuarios tiene un estilo propio, lo añades aquí también: --}}
    @push('styles')
        <link rel="stylesheet" href="/css/dashboard.css">
    @endpush
@endpush
