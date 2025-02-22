<?php

namespace Esign\ReactComponents\Tests;

use PHPUnit\Framework\Attributes\Test;
use Illuminate\Support\Facades\Blade;

final class ReactComponentsTest extends TestCase
{
    #[Test]
    public function it_can_render_the_react_component_without_props(): void
    {
        $this->assertEquals(
            <<<HTML
            <div data-react-component="article-card" data-props='[]'></div>
            HTML,
            Blade::render(
                <<<BLADE
                <x-react-component component="article-card" />
                BLADE
            )
        );
    }

    #[Test]
    public function it_can_render_the_react_component_using_a_different_html_tag(): void
    {
        $this->assertEquals(
            <<<HTML
            <span data-react-component="article-card" data-props='[]'></span>
            HTML,
            Blade::render(
                <<<BLADE
                <x-react-component component="article-card" as="span" />
                BLADE
            )
        );
    }

    #[Test]
    public function it_can_pass_extra_attributes_to_the_react_component(): void
    {
        $this->assertEquals(
            <<<HTML
            <div data-react-component="article-card" class="my-react-component" id="my-react-component" data-props='[]'></div>
            HTML,
            Blade::render(
                <<<BLADE
                <x-react-component component="article-card" id="my-react-component" class="my-react-component" />
                BLADE
            )
        );
    }

    #[Test]
    public function it_can_render_the_react_component_with_props(): void
    {
        $this->assertEquals(
            <<<HTML
            <div data-react-component="article-card" data-props='{"key":"value"}'></div>
            HTML,
            Blade::render(
                <<<BLADE
                <x-react-component component="article-card" :props="['key' => 'value']" />
                BLADE
            )
        );
    }

    #[Test]
    public function it_can_convert_html_open_and_close_tags(): void
    {
        $this->assertEquals(
            <<<HTML
            <div data-react-component="article-card" data-props='{"key":"\u003Cspan\u003Evalue\u003C\/span\u003E"}'></div>
            HTML,
            Blade::render(
                <<<BLADE
                <x-react-component component="article-card" :props="['key' => '<span>value</span>']" />
                BLADE
            ),
        );
    }

    #[Test]
    public function it_can_convert_double_quotes(): void
    {
        $this->assertEquals(
            <<<HTML
            <div data-react-component="article-card" data-props='{"key":"\u0027"}'></div>
            HTML,
            Blade::render(
                <<<BLADE
                <x-react-component component="article-card" :props="['key' => '\'']" />
                BLADE
            )
        );
    }

    #[Test]
    public function it_can_convert_single_quotes(): void
    {
        $this->assertEquals(
            <<<HTML
            <div data-react-component="article-card" data-props='{"key":"\u0022"}'></div>
            HTML,
            Blade::render(
                <<<BLADE
                <x-react-component component="article-card" :props='["key" => "\""]' />
                BLADE
            )
        );
    }

    #[Test]
    public function it_can_convert_ampersands(): void
    {
        $this->assertEquals(
            <<<HTML
            <div data-react-component="article-card" data-props='{"key":"\u0026"}'></div>
            HTML,
            Blade::render(
                <<<BLADE
                <x-react-component component="article-card" :props="['key' => '&']" />
                BLADE
            )
        );
    }

    #[Test]
    public function it_can_render_as_a_directive(): void
    {
        $this->assertEquals(
            <<<HTML
            <div data-react-component="article-card" data-props='[]'></div>
            HTML,
            Blade::render(
                <<<BLADE
                @reactComponent('article-card')
                BLADE
            )
        );
    }

    #[Test]
    public function it_can_render_as_a_directive_with_props(): void
    {
        $this->assertEquals(
            <<<HTML
            <div data-react-component="article-card" data-props='{"key":"value"}'></div>
            HTML,
            Blade::render(
                <<<BLADE
                @reactComponent('article-card', ['key' => 'value'])
                BLADE
            )
        );
    }

    #[Test]
    public function it_can_render_as_the_non_aliased_blade_component(): void
    {
        $this->assertEquals(
            <<<HTML
            <div data-react-component="article-card" data-props='[]'></div>
            HTML,
            Blade::render(
                <<<BLADE
                <x-react-components::react-component component="article-card" />
                BLADE
            )
        );
    }
}
