@props([
    'label' => null,
    'name' => null,
    'value' => '',
    'type' => 'text',
    'required' => false,
    'hint' => null,
    'placeholder' => null,
])

<x-forms.field :label="$label" :name="$name" :required="$required" :hint="$hint">
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        @required($required)
        {{ $attributes->merge(['class' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm' . ($errors->has($name) ? ' border-red-300' : '')]) }}
    />
</x-forms.field>
