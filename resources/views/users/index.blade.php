@extends('layouts.users')

@section('title', 'Usuarios')

{{--
    Define el contenido para el yield 'usuarios_content' definido en el layout del módulo.
--}}


@section('users_content')
<div class="p-6   ">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Listado de usuarios</h1>

        <a href="{{ route('users.create') }}"
           class="bg-purple-700 hover:bg-purple-500 text-white px-4 py-2 rounded-lg">
            + Crear Usuario
        </a>
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow  w-full ">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-medium">ID</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Nombre</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Email</th>
                    <th class="px-4 py-3 text-center text-sm font-medium">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @foreach($users as $user)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $user->id }}</td>
                    <td class="px-4 py-3">{{ $user->name }}</td>
                    <td class="px-4 py-3">{{ $user->email }}</td>
                    <td class="px-4 py-3 text-center space-x-2">
                        <a href="{{ route('users.edit', $user) }}"
                           class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded">
                            Editar
                        </a>

                        <form action="{{ route('users.destroy', $user) }}"
                              method="POST"
                              class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('¿Eliminar usuario?')"
                                    class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('scripts')
    <script src="/js/users/list.js"></script>
@endpush
