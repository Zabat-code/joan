<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel')</title>

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .sidebar-transition {
            transition: all 0.3s ease;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar-transition bg-gray-900 text-white w-64 flex-shrink-0 overflow-y-auto">
            <div class="p-4">
                <h1 class="text-2xl font-bold text-center mb-8">
                    <i class="fas fa-shield-alt"></i> Admin Panel
                </h1>

                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800' : '' }}">
                        <i class="fas fa-home w-6"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>

                    <a href="{{ route('admin.users') }}"
                        class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 {{ request()->routeIs('admin.users*') ? 'bg-gray-800' : '' }}">
                        <i class="fas fa-users w-6"></i>
                        <span class="ml-3">Usuarios</span>
                    </a>

                    <a href="{{ route('admin.products') }}"
                        class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 {{ request()->routeIs('admin.products*') ? 'bg-gray-800' : '' }}">
                        <i class="fas fa-box w-6"></i>
                        <span class="ml-3">Productos</span>
                    </a>

                    <a href="{{ route('admin.orders') }}"
                        class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 {{ request()->routeIs('admin.orders*') ? 'bg-gray-800' : '' }}">
                        <i class="fas fa-shopping-cart w-6"></i>
                        <span class="ml-3">Pedidos</span>
                    </a>

                    <a href="{{ route('admin.reports') }}"
                        class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 {{ request()->routeIs('admin.reports*') ? 'bg-gray-800' : '' }}">
                        <i class="fas fa-chart-bar w-6"></i>
                        <span class="ml-3">Reportes</span>
                    </a>

                    <a href="{{ route('admin.settings') }}"
                        class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 {{ request()->routeIs('admin.settings*') ? 'bg-gray-800' : '' }}">
                        <i class="fas fa-cog w-6"></i>
                        <span class="ml-3">Configuración</span>
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

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Top Navigation -->
            <header class="bg-white shadow-sm z-10">
                <div class="flex items-center justify-between px-6 py-4">
                    <button id="sidebarToggle" class="text-gray-600 hover:text-gray-900 lg:hidden">
                        <i class="fas fa-bars text-xl"></i>
                    </button>

                    <h2 class="text-xl font-semibold text-gray-800 hidden sm:block">
                        @yield('header', 'Dashboard')
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

            <!-- Page Content -->
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

            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200 px-6 py-4">
                <div class="flex flex-col sm:flex-row justify-between items-center text-sm text-gray-600">
                    <p>&copy; {{ date('Y') }} Admin Panel. Todos los derechos reservados.</p>
                    <p class="mt-2 sm:mt-0">Versión 1.0.0</p>
                </div>
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

    @stack('scripts')
</body>

</html>
