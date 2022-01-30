<?php

namespace Esign\ReactComponents;

class ReactComponent
{
    public static function renderContainer(string $component, array $props = []): string
    {
        return sprintf(
            '<div data-react-component="%s" data-props=\'%s\'></div>',
            $component,
            json_encode($props, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT)
        );
    }
}
