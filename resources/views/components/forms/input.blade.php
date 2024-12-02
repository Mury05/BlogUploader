<div class="py-5 flex flex-col">
    <label for="{{ $id ?? $name }}" class="pb-2">{{ $label }}</label>

    @if ($type === 'textarea')
        <textarea name="{{ $name }}" id="{{ $id ?? $name }}" rows="4" class="{{ $class ?? '' }}">
            {{ old($name, $value ?? '') }}
        </textarea>
    @else
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $id ?? $name }}" class="{{ $class ?? '' }}"
            value="{{ old($name, $value ?? '') }}">
    @endif

    @error($name)
        <div class="text-red-500 text-xs">{{ $message }}</div>
    @enderror
</div>
