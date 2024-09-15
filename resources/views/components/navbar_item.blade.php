@props(['active' => false, 'href' => '#', 'hasDropdown' => false, 'dropdown' => ''])

@php
    // Determine if the current page is part of this dropdown by checking the active state of child routes
    $isDropdownActive =
        $hasDropdown &&
        collect(explode('|', $dropdown))->contains(fn($childHref) => request()->is(trim($childHref, '/') . '*'));

    // Set classes for the list item
    $classes = $hasDropdown ? ($isDropdownActive ? 'active' : '') : (request()->is(trim($href, '/')) ? 'active' : '');
@endphp

<li class="{{ $classes }}">
    <a href="{{ $href }}" {{ $attributes }}>
        {{ $slot }}
        @if ($hasDropdown)
            <span class="fa arrow"></span>
        @endif
    </a>
    @if ($hasDropdown)
        <ul class="nav nav-second-level">
            {{ $dropdown }}
        </ul>
    @endif
</li>
