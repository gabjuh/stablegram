<img {{ $attributes->merge(['class' => 'd-inline']) }}
    src="{{ $image }}"
    height="{{ $size }}"
    width="{{ $size }}"
    style="object-fit:cover; border-radius:50%; min-width:{{ $size }}px;"
    alt="Profile Image"
/>
