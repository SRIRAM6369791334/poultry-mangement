@props([
    'label' => null,
    'name' => null,
    'value' => '',
    'rows' => 3,
    'required' => false,
    'hint' => null,
    'placeholder' => null,
])

<x-forms.field :label="$label" :name="$name" :required="$required" :hint="$hint">
    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        @required($required)
        {{ $attributes->merge(['class' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm' . ($errors->has($name) ? ' border-red-300' : '')]) }}
    >{{ old($name, $value) }}</textarea>
</x-forms.field>
