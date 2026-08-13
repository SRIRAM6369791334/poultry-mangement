@props([
    'label' => null,
    'name' => null,
    'options' => [],
    'selected' => null,
    'required' => false,
    'hint' => null,
    'placeholder' => 'Select an option',
])

<x-forms.field :label="$label" :name="$name" :required="$required" :hint="$hint">
    <select
        name="{{ $name }}"
        id="{{ $name }}"
        @required($required)
        {{ $attributes->merge(['class' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm']) }}
    >
        <option value="" @disabled($required)>{{ $placeholder }}</option>
        @foreach ($options as $value => $optionLabel)
            <option value="{{ $value }}" @selected(old($name, $selected ?? '') == $value)>{{ $optionLabel }}</option>
        @endforeach
    </select>
</x-forms.field>
