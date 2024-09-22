@props(['name', 'label', 'type' => 'text', 'placeholder', 'value' => '', 'min' => 0])

<div class="mb-3">
    <label for="" class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" {{ $attributes->merge(['class' => 'form-control']) }} min={{ $min }} name="{{ $name }}"
    value="{{
    $value }}" placeholder="{{ $placeholder }}">
</div>