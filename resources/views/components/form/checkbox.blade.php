@props(['value' => '', 'justify' => 'form-check-inline', 'label', 'id' => 'id_' . rand(), 'checked' => false])



<div class=" mb-2 {{ $justify }}">
    <input {{ $attributes->merge(['class' => 'form-check-input']) }} {{ $checked }} type="checkbox"
        id="{{ $id }}" value="{{ $value }}"> &nbsp;

    @if ($label)
        <label class="form-check-label " for="{{ $id }}">
            {{ $label }}
        </label>
    @endif
</div>
