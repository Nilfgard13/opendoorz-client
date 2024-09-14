@php
    $navItems = [
        ['url' => '/', 'label' => 'Home'],
        ['url' => '/about', 'label' => 'About'],
        ['url' => '/services', 'label' => 'Services'],
        ['url' => '/projects', 'label' => 'Projects'],
        ['url' => '/blog', 'label' => 'Blog'],
        [
            'url' => '#',
            'label' => 'Dropdown',
            'children' => [
                ['url' => '#', 'label' => 'Dropdown 1'],
                [
                    'url' => '#',
                    'label' => 'Deep Dropdown',
                    'children' => [
                        ['url' => '#', 'label' => 'Deep Dropdown 1'],
                        ['url' => '#', 'label' => 'Deep Dropdown 2'],
                        ['url' => '#', 'label' => 'Deep Dropdown 3'],
                        ['url' => '#', 'label' => 'Deep Dropdown 4'],
                        ['url' => '#', 'label' => 'Deep Dropdown 5'],
                    ],
                ],
                ['url' => '#', 'label' => 'Dropdown 2'],
                ['url' => '#', 'label' => 'Dropdown 3'],
                ['url' => '#', 'label' => 'Dropdown 4'],
            ],
        ],
        ['url' => '/contact', 'label' => 'Contact'],
    ];
@endphp

@foreach ($navItems as $item)
    @if (isset($item['children']))
        <li class="dropdown">
            <a href="{{ $item['url'] }}">
                <span>{{ $item['label'] }}</span>
                <i class="bi bi-chevron-down toggle-dropdown"></i>
            </a>
            <ul>
                @foreach ($item['children'] as $child)
                    @if (isset($child['children']))
                        <li class="dropdown">
                            <a href="{{ $child['url'] }}">
                                <span>{{ $child['label'] }}</span>
                                <i class="bi bi-chevron-down toggle-dropdown"></i>
                            </a>
                            <ul>
                                @foreach ($child['children'] as $grandchild)
                                    <li><a href="{{ $grandchild['url'] }}">{{ $grandchild['label'] }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ $child['url'] }}">{{ $child['label'] }}</a></li>
                    @endif
                @endforeach
            </ul>
        </li>
    @else
        <li><a href="{{ $item['url'] }}" class="{{ Request::is(ltrim($item['url'], '/')) ? 'active' : '' }}">
                {{ $item['label'] }}
            </a></li>
    @endif
@endforeach