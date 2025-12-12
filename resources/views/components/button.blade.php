@props([
    'type' => 'submit',
    'variant' => 'primary'
])

@php
    $classes = match($variant) {
        'primary' => 'bg-blue-600 hover:bg-blue-700 text-white',
        'secondary' => 'bg-gray-600 hover:bg-gray-700 text-white',
        'danger' => 'bg-red-600 hover:bg-red-700 text-white',
        default => 'bg-blue-600 hover:bg-blue-700 text-white'
    };
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge(['class' => "w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 {$classes}"]) }}
>
    {{ $slot }}
</button>
