@props(['value'])

<label {{ $attributes->merge(['class' => 'form-label text-dark']) }}>
    {{ $value ?? $slot }}
</label>
