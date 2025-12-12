<x-layouts.guest title="Login">
    <x-auth-card>
        <x-slot:title>
            Iniciar Sesión
        </x-slot:title>

        <x-slot:subtitle>
            Accede a tu cuenta
        </x-slot:subtitle>

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <x-input
                type="email"
                name="email"
                label="Correo electrónico"
                placeholder="tu@email.com"
                required
            />

            <x-input
                type="password"
                name="password"
                label="Contraseña"
                placeholder="••••••••"
                required
            />

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input
                        id="remember"
                        name="remember"
                        type="checkbox"
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                    >
                    <label for="remember" class="ml-2 block text-sm text-gray-700">
                        Recordarme
                    </label>
                </div>

                <div class="text-sm">
                    <a href="#" class="font-medium text-blue-600 hover:text-blue-500">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>
            </div>

            <x-button type="submit">
                Iniciar Sesión
            </x-button>

            <div class="text-center text-sm">
                <span class="text-gray-600">¿No tienes cuenta?</span>
                <a href="#" class="font-medium text-blue-600 hover:text-blue-500 ml-1">
                    Regístrate aquí
                </a>
            </div>
        </form>
    </x-auth-card>
</x-layouts.guest>
