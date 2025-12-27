<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', 'Dr. Joan')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.6/css/dataTables.tailwindcss.css">
    @stack('styles') {{-- Para estilos específicos de un módulo/vista --}}

    <style>
        .sidebar-transition {
            transition: all 0.3s ease;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(50px) rotate(0deg);
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
                transform: translateY(-30px) translateX(-30px) scale(1);
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
            z-index: -1;
            top: 8%;
            left: 12%;
            animation: float 8s ease-in-out infinite;
        }

        .icon-2 {
            z-index: -1;
            top: 15%;
            right: 10%;
            animation: float-slow 10s ease-in-out infinite;
        }

        .icon-3 {
            z-index: -1;
            bottom: 20%;
            left: 8%;
            animation: pulse-slow 7s ease-in-out infinite;
        }

        .icon-4 {
            z-index: -1;
            bottom: 25%;
            right: 15%;
            animation: float 9s ease-in-out infinite 1s;
        }

        .icon-5 {
            z-index: -1;
            top: 30%;
            left: 10%;
            animation: float-slow 11s ease-in-out infinite 2s;
        }

        .icon-6 {
            z-index: -1;
            top: 35%;
            right: 8%;
            animation: pulse-slow 8s ease-in-out infinite 1.5s;
        }

        .logo-container {
            width: 120px;
            height: 120px;
            background: white;
            border-radius: 50%;
            padding: 15px;
            box-shadow: 0 10px 40px rgba(220, 38, 38, 0.2);
        }

        .logo-container img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    </style>
</head>

<body style="z-index: -2" class="bg-gradient-to-br from-emerald-50 via-teal-50 to-cyan-50 min-h-screen relative overflow-hidden">
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
    <div class="flex h-screen overflow-hidden">

        <aside id="sidebar" class="sidebar-transition bg-gray-900 text-white w-64 flex-shrink-0 overflow-y-auto">
            <div class="p-4">
                <h1 class="text-2xl font-bold text-center mb-8">
                    {{ auth()->user()->name ?? 'Admin' }}
                </h1>

                <nav class="space-y-2">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 {{ request()->routeIs('dashboard') ? 'bg-gray-800' : '' }}">
                        <i class="fas fa-home w-6"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>

                    <a href="{{ route('users') }}"
                        class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 {{ request()->routeIs('users*') ? 'bg-gray-800' : '' }}">
                        <i class="fas fa-users w-6"></i>
                        <span class="ml-3">Usuarios</span>
                    </a>

                    <a href="{{ route('forms') }}"
                        class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 {{ request()->routeIs('forms*') ? 'bg-gray-800' : '' }}">
                        <i class="fa-solid fa-align-justify"></i>
                        <span class="ml-3">Formularios</span>
                    </a>
                    <a href="{{ route('patients') }}"
                        class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 {{ request()->routeIs('patients*') ? 'bg-gray-800' : '' }}">
                        <i class="fa-solid fa-user"></i>
                        <span class="ml-3">Pacientes</span>
                    </a>

                </nav>
            </div>

            <div class="p-4 mt-auto border-t border-gray-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 w-full text-left">
                        <i class="fas fa-sign-out-alt w-6"></i>
                        <span class="ml-3">Cerrar Sesión</span>
                    </button>
                </form>
            </div>
        </aside>
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Top Navigation -->
            <header class="bg-white shadow-sm z-10">
                <div class="flex items-center justify-between px-6 py-4">
                    <button id="sidebarToggle" class="text-gray-600 hover:text-gray-900 lg:hidden">
                        <i class="fas fa-bars text-xl"></i>
                    </button>

                    <h2 class="text-xl font-semibold text-gray-800 hidden sm:block">
                        @yield('title', 'Dashboard')
                    </h2>

                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <button class="relative text-gray-600 hover:text-gray-900">
                            <i class="fas fa-bell text-xl"></i>
                            <span
                                class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                        </button>

                        <!-- User Menu -->
                        <div class="relative">
                            <button id="userMenuButton"
                                class="flex items-center space-x-2 text-gray-600 hover:text-gray-900">
                                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name ?? 'Admin' }}&background=random"
                                    alt="Avatar" class="w-8 h-8 rounded-full">
                                <span class="hidden md:block">{{ auth()->user()->name ?? 'Admin' }}</span>
                                <i class="fas fa-chevron-down text-sm"></i>
                            </button>

                            <div id="userMenu"
                                class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-20">
                                <a href="{{ route('profile') }}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-user mr-2"></i> Mi Perfil
                                </a>
                                <a href="{{ route('settings') }}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-cog mr-2"></i> Configuración
                                </a>
                                <hr class="my-2">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>


            <main class="flex-1 overflow-y-auto p-6">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 relative"
                        role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                        <button onclick="this.parentElement.style.display='none'"
                            class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 relative"
                        role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                        <button onclick="this.parentElement.style.display='none'"
                            class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                @yield('content')
            </main>

            <footer>
            </footer>
        </div>
    </div>

    <script>
        // Sidebar Toggle
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');

        sidebarToggle?.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            sidebar.classList.toggle('fixed');
            sidebar.classList.toggle('z-20');
        });

        // User Menu Toggle
        const userMenuButton = document.getElementById('userMenuButton');
        const userMenu = document.getElementById('userMenu');

        userMenuButton?.addEventListener('click', (e) => {
            e.stopPropagation();
            userMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', () => {
            if (!userMenu?.classList.contains('hidden')) {
                userMenu.classList.add('hidden');
            }
        });

        // Responsive sidebar
        if (window.innerWidth < 1024) {
            sidebar.classList.add('-translate-x-full', 'fixed', 'z-20', 'h-full');
        }

        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('-translate-x-full', 'fixed', 'z-20');
            } else {
                sidebar.classList.add('-translate-x-full', 'fixed', 'z-20', 'h-full');
            }
        });
    </script>
    <script>
        var BASE_URL = "{{ url('/') }}";
    </script>
    @stack('scripts') {{-- Importante: Aquí se inyectarán tus scripts específicos por módulo --}}
</body>

</html>
