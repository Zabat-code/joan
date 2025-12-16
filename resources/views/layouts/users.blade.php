@extends('layouts.app')

@section('content')
    <div class=" container-users bg-white p-4 rounded-lg shadow-md flex">


        <section class="main-content-users   w-full  ">
            @yield('users_content')
        </section>
    </div>
@endsection
@push('scripts')

@endpush
