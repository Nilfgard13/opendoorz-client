@props(['href' => '#'])

@php
    $classes = request()->is(trim($href, '/')) ? 'active' : '';
@endphp

<li class="{{ $classes }}">
    <a href="{{ $href }}" {{ $attributes }}>{{ $slot }}</a>
</li>