@extends('layouts.app')

@section('content')
    <div class=" container-settings bg-white p-4 rounded-lg shadow-md flex">
        <section class="main-content-forms w-full  ">

            @yield('form_content')
        </section>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="/css/tailwinddatatable.css">
@endpush
