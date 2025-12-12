<div class="max-w-md w-full space-y-8">
    <!-- Logo o título -->
    <div class="text-center">
        <h2 class="text-3xl font-bold text-gray-900">
            {{ $title }}
        </h2>
        @if(isset($subtitle))
            <p class="mt-2 text-sm text-gray-600">
                {{ $subtitle }}
            </p>
        @endif
    </div>

    <!-- Contenido de la tarjeta -->
    <div class="bg-white p-8 rounded-lg shadow-md">
        {{ $slot }}
    </div>
</div>
