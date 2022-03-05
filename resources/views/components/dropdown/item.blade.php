
@props([
    'item'=>false,
    ])
<option value="{{ $item }}" >
        {{ $slot }}
</option>
