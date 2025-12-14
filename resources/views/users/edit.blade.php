@extends('layouts.users')

@section('title', 'Editar Usuario')

@section('users_content')
<div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow">
    <h1 class="text-xl font-semibold mb-6">Editar usuario</h1>

    <form action="{{ route('users.update', $user) }}"
          method="POST"
          class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium mb-1">Nombre</label>
            <input type="text" name="name"
                   value="{{ $user->name }}"
                   class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300"
                   required>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Email</label>
            <input type="email" name="email"
                   value="{{ $user->email }}"
                   class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300"
                   required>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">
                Nueva contraseña <span class="text-gray-500">(opcional)</span>
            </label>
            <input type="password" name="password"
                   class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300">
        </div>

        <div class="flex justify-end gap-2 pt-4">
            <a href="{{ route('users') }}"
               class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                Cancelar
            </a>

            <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Actualizar
            </button>
        </div>
    </form>
</div>
@endsection
