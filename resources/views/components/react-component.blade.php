@props([
    'component',
    'props' => [],
    'as' => 'div',
])
<{{ $as }} {{ $attributes->merge(['data-react-component' => $component]) }} data-props='@json($props)'></{{ $as }}>