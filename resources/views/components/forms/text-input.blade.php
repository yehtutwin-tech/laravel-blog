@props([
    'type' => 'text',
    'name',
    'value' => '',
    'placeholder' => '',
    'required' => '',
])

<input
    type="{{ $type }}"
    name="{{ $name }}"
    value="{{ $value }}"
    placeholder="{{ $placeholder }}"
    {{ $required }}
    {{ $attributes->merge(['class' => 'form-control']) }}
/>
