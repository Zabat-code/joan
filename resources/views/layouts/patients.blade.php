@extends('layouts.app')

@section('content')
    <div class=" container-patients bg-white p-4 rounded-lg shadow-md flex">
        <section class="main-content-patients   w-full  ">
            @yield('patients_content')
        </section>
    </div>
@endsection
@push('scripts')
@endpush
