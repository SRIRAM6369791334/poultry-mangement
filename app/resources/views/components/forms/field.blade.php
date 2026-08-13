@props(['label' => null, 'name' => null, 'required' => false, 'hint' => null])

<div {{ $attributes->only('class')->merge(['class' => 'space-y-1']) }}>
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
            @if ($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    {{ $slot }}

    @error($name)
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror

    @if ($hint)
        <p class="text-xs text-gray-500">{{ $hint }}</p>
    @endif
</div>
