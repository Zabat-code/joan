<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr. Joan - Sistema Médico</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
                opacity: 0.06;
            }

            50% {
                transform: translateY(-30px) rotate(180deg);
                opacity: 0.1;
            }
        }

        @keyframes float-slow {

            0%,
            100% {
                transform: translateY(0) translateX(0) scale(1);
                opacity: 0.05;
            }

            50% {
                transform: translateY(-40px) translateX(30px) scale(1.1);
                opacity: 0.08;
            }
        }

        @keyframes pulse-slow {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.04;
            }

            50% {
                transform: scale(1.05);
                opacity: 0.08;
            }
        }

        .medical-icon {
            position: absolute;
            color: #10b981;
        }

        .icon-1 {
            top: 8%;
            left: 12%;
            animation: float 8s ease-in-out infinite;
        }

        .icon-2 {
            top: 15%;
            right: 10%;
            animation: float-slow 10s ease-in-out infinite;
        }

        .icon-3 {
            bottom: 20%;
            left: 8%;
            animation: pulse-slow 7s ease-in-out infinite;
        }

        .icon-4 {
            bottom: 25%;
            right: 15%;
            animation: float 9s ease-in-out infinite 1s;
        }

        .icon-5 {
            top: 45%;
            left: 5%;
            animation: float-slow 11s ease-in-out infinite 2s;
        }

        .icon-6 {
            top: 55%;
            right: 8%;
            animation: pulse-slow 8s ease-in-out infinite 1.5s;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-emerald-50 via-teal-50 to-cyan-50 min-h-screen relative overflow-hidden">

    <!-- Iconos médicos flotantes de fondo -->
    <div class="medical-icon icon-1">
        <svg width="80" height="80" viewBox="0 0 24 24" fill="currentColor">
            <path
                d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z" />
        </svg>
    </div>

    <div class="medical-icon icon-2">
        <svg width="100" height="100" viewBox="0 0 24 24" fill="currentColor">
            <path
                d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 3c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm7 13H5v-.23c0-.62.28-1.2.76-1.58C7.47 15.82 9.64 15 12 15s4.53.82 6.24 2.19c.48.38.76.97.76 1.58V19z" />
        </svg>
    </div>

    <div class="medical-icon icon-3">
        <svg width="90" height="90" viewBox="0 0 24 24" fill="currentColor">
            <path
                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
        </svg>
    </div>

    <div class="medical-icon icon-4">
        <svg width="70" height="70" viewBox="0 0 24 24" fill="currentColor">
            <path
                d="M21 5H3c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm-9 7H7V8h5v4zm2-6h4v2h-4V6zm0 4h4v2h-4v-2zm0 4h4v2h-4v-2z" />
        </svg>
    </div>

    <div class="medical-icon icon-5">
        <svg width="110" height="110" viewBox="0 0 24 24" fill="currentColor">
            <path
                d="M19.5 3.5L18 2l-1.5 1.5L15 2l-1.5 1.5L12 2l-1.5 1.5L9 2 7.5 3.5 6 2v14H3v3c0 1.66 1.34 3 3 3h12c1.66 0 3-1.34 3-3V2l-1.5 1.5zM19 19c0 .55-.45 1-1 1s-1-.45-1-1v-3H8V5h11v14z" />
        </svg>
    </div>

    <div class="medical-icon icon-6">
        <svg width="85" height="85" viewBox="0 0 24 24" fill="currentColor">
            <path
                d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
        </svg>
    </div>

    <!-- Contenido principal -->
    <div class="min-h-screen flex items-center justify-center px-4 py-12 relative z-10">
        <div class="max-w-md w-full">
            <!-- Logo médico -->
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-red-600 to-red-600 rounded-full shadow-2xl mb-4">
                    <svg class="w-10 h-10 text-white animate-pulse" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">
                    Dr. Joan
                </h2>
                <p class="text-gray-600">
                    Sistema de Gestión Médica
                </p>
            </div>

            <!-- Formulario -->
            <div x-data="{ loading: false }"  class="bg-white/95 backdrop-blur-sm p-8 rounded-2xl shadow-2xl border border-emerald-100">
                <form id="loginForm" @submit.prevent="submitLogin" method="POST" action="{{ route('login') }}"
                    class="space-y-6">

                    <x-loading :show="loading" message="Validando tus credenciales..." spinner="medical"
                        size="large" />

                    @csrf

                    <!-- Errores -->
                    @if ($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-lg">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-red-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-red-800 mb-1">Error de autenticación</p>
                                    <ul class="text-sm text-red-700 space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Usuario -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            Usuario / Correo Electrónico
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-emerald-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <input id="email" name="email" type="email" required value="{{ old('email') }}"
                                class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200 bg-gray-50 hover:bg-white"
                                placeholder="doctor@hospital.com">
                        </div>
                        @error('email')
                            <p class="mt-1.5 text-sm text-emerald-600 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Contraseña -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                            Contraseña
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-emerald-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input id="password" name="password" type="password" required
                                class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200 bg-gray-50 hover:bg-white"
                                placeholder="••••••••">
                        </div>
                        @error('password')
                            <p class="mt-1.5 text-sm text-emerald-600 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <button type="submit"
                        class="w-full bg-gradient-to-r from-emerald-600 to-teal-600 text-white py-3.5 px-4 rounded-xl font-semibold shadow-lg hover:shadow-xl hover:from-emerald-700 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transform hover:-translate-y-0.5 transition-all duration-200">
                        <span class="flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            Acceder al Sistema
                        </span>
                    </button>
                </form>


            </div>

            <!-- Footer -->
            <div class="mt-8 text-center">
                <p class="text-sm text-gray-600 mb-2">
                    <svg class="w-4 h-4 inline-block mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                            clip-rule="evenodd" />
                    </svg>
                    © {{ date('Y') }} Dr. Joan - Sistema de Gestión Médica. Todos los derechos reservados.

                </p>
            </div>
        </div>
    </div>
    <script>
        < script >
            function loginForm() {
                return {
                    loading: false,
                    submitLogin() {
                        this.loading = true;

                        // pequeña espera visual para mostrar el loader
                        setTimeout(() => {
                            document.getElementById('loginForm').submit();
                        }, 300);
                    }
                }
            }
    </script>
    </script>
</body>

</html>
