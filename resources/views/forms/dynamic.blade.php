@extends('layouts.forms')

@section('title', $header->name)

@section('form_content')
<div class="bg-white p-6 rounded shadow">
    <h3 class="text-lg font-semibold mb-4">{{ $header->name }}</h3>
    <p class="text-sm text-gray-600 mb-6">{{ $header->description }}</p>

    <form method="POST" action="{{ route('forms.dynamic.store', $header->id_document_header) }}">
        @csrf
        <div class="grid grid-cols-1 gap-4">
            @foreach($header->bodys as $body)
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">{{ $body->label }} @if($body->required) <span class="text-red-500">*</span> @endif</label>

                    @php
                        $name = 'field_'.$body->id_document_body;
                        $format = $body->format ?? '';
                        $typeMap = [1=>'text',2=>'number',3=>'date',4=>'textarea',5=>'select',6=>'checkbox'];
                        $type = $typeMap[$body->type] ?? 'text';
                    @endphp

                    @if(in_array($type, ['text','number','date']))
                        <input name="{{ $name }}" type="{{ $type }}" class="w-full border border-gray-300 rounded px-3 py-2" @if($body->required) required @endif />
                    @elseif($type === 'textarea')
                        <textarea name="{{ $name }}" class="w-full border border-gray-300 rounded px-3 py-2" @if($body->required) required @endif></textarea>
                    @elseif($type === 'select')
                        <select name="{{ $name }}" class="w-full border border-gray-300 rounded px-3 py-2" @if($body->required) required @endif>
                            <option value="">-- Seleccione --</option>
                            @foreach(explode(',', $format) as $opt)
                                <option value="{{ trim($opt) }}">{{ trim($opt) }}</option>
                            @endforeach
                        </select>
                    @elseif($type === 'checkbox')
                        <div class="flex flex-wrap gap-2">
                            @foreach(explode(',', $format) as $opt)
                                <label class="inline-flex items-center space-x-2">
                                    <input type="checkbox" name="{{ $name }}[]" value="{{ trim($opt) }}" class="h-4 w-4 text-emerald-600" />
                                    <span class="text-sm">{{ trim($opt) }}</span>
                                </label>
                            @endforeach
                        </div>
                    @else
                        <input name="{{ $name }}" type="text" class="w-full border border-gray-300 rounded px-3 py-2" @if($body->required) required @endif />
                    @endif
                </div>
            @endforeach
        </div>

        <div class="mt-6 flex items-center space-x-2">
            <button type="submit" class="bg-emerald-600 text-white px-4 py-2 rounded">Guardar</button>
            <a href="{{ route('forms') }}" class="text-sm text-gray-600">Cancelar</a>
        </div>
    </form>
</div>
@endsection
