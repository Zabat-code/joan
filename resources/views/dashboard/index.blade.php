@extends('layouts.dashboard')

@section('title', 'Dashboard')

{{--
    Define el contenido para el yield 'usuarios_content' definido en el layout del módulo.
--}}
@section('dashboard_content')

@endsection

{{--
    Añade un script *específico* para esta vista (index.blade.php).
    Se inyectará al final, DENTRO de @stack('scripts').
--}}
@push('scripts')
    <script>

    </script>
    <script src="/js/dashboard/listado.js"></script> {{-- Otro archivo JS --}}
@endpush
