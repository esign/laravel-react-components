<?php

namespace Esign\ReactComponents;

use Illuminate\View\ComponentAttributeBag;

class ReactComponentDirective
{
    public static function render(string $component, array $props = []): string
    {
        return view('react-components::components.react-component', [
            'component' => $component,
            'props' => $props,
            'attributes' => new ComponentAttributeBag(),
        ])->render();
    }
}
