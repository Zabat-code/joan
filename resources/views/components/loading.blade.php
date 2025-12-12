<!-- Loading Component - resources/views/components/loading.blade.php -->

@props([
    'show' => false,
    'message' => 'Cargando...',
    'size' => 'medium', // small, medium, large
    'overlay' => true,
    'spinner' => 'medical' // medical, dots, pulse, spinner
])

@php
    $sizes = [
        'small' => 'w-8 h-8',
        'medium' => 'w-12 h-12',
        'large' => 'w-16 h-16'
    ];
    $sizeClass = $sizes[$size] ?? $sizes['medium'];
@endphp

<div
    x-data="{ show: @js($show) }"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    @if($overlay)
    class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900/50 backdrop-blur-sm"
    @else
    class="flex items-center justify-center p-4"
    @endif
    style="display: none;"
>
    <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-sm w-full mx-4 transform">
        <div class="flex flex-col items-center space-y-4">
            <!-- Spinner Médico (Cruz médica rotando) -->
            @if($spinner === 'medical')
                <div class="relative {{ $sizeClass }}">
                    <svg class="animate-spin text-emerald-600" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M13 3h-2v8h8v-2h-6V3z"/>
                        <path d="M11 13H3v2h6v6h2v-8z"/>
                        <path d="M21 13h-6v8h2v-6h4v-2z"/>
                        <circle cx="12" cy="12" r="2" fill="currentColor"/>
                    </svg>
                    <svg class="absolute inset-0 animate-ping text-emerald-300 opacity-75" viewBox="0 0 24 24" fill="currentColor">
                        <circle cx="12" cy="12" r="10"/>
                    </svg>
                </div>

            <!-- Spinner de puntos -->
            @elseif($spinner === 'dots')
                <div class="flex space-x-2">
                    <div class="w-3 h-3 bg-emerald-600 rounded-full animate-bounce" style="animation-delay: 0ms"></div>
                    <div class="w-3 h-3 bg-emerald-600 rounded-full animate-bounce" style="animation-delay: 150ms"></div>
                    <div class="w-3 h-3 bg-emerald-600 rounded-full animate-bounce" style="animation-delay: 300ms"></div>
                </div>

            <!-- Pulse (Corazón latiendo) -->
            @elseif($spinner === 'pulse')
                <div class="relative {{ $sizeClass }}">
                    <svg class="text-emerald-600 animate-pulse" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>

            <!-- Spinner clásico -->
            @else
                <div class="{{ $sizeClass }}">
                    <svg class="animate-spin text-emerald-600" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            @endif

            <!-- Mensaje -->
            @if($message)
                <div class="text-center">
                    <p class="text-gray-800 font-semibold text-lg">{{ $message }}</p>
                    <p class="text-gray-500 text-sm mt-1">Por favor espera un momento...</p>
                </div>
            @endif

            <!-- Barra de progreso animada (opcional) -->
            <div class="w-full bg-gray-200 rounded-full h-1.5 overflow-hidden">
                <div class="bg-gradient-to-r from-emerald-500 to-teal-500 h-full rounded-full animate-loading-bar"></div>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes loading-bar {
        0% {
            width: 0%;
            margin-left: 0%;
        }
        50% {
            width: 70%;
            margin-left: 15%;
        }
        100% {
            width: 0%;
            margin-left: 100%;
        }
    }

    .animate-loading-bar {
        animation: loading-bar 2s ease-in-out infinite;
    }
</style>
