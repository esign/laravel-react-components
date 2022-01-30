<?php

namespace Esign\ReactComponents\Tests;

use Illuminate\Support\Facades\Blade;

class ReactComponentsTest extends TestCase
{
    /** @test */
    public function it_can_render_the_react_directive_without_props()
    {
        $this->assertEquals(
            '<div data-react-component="article-card" data-props=\'[]\'></div>',
            Blade::render("@reactComponent('article-card')")
        );
    }

    /** @test */
    public function it_can_render_the_react_directive_with_props()
    {
        $this->assertEquals(
            '<div data-react-component="article-card" data-props=\'{"key":"value"}\'></div>',
            Blade::render("@reactComponent('article-card', ['key' => 'value'])")
        );
    }

    /** @test */
    public function it_can_convert_html_open_and_close_tags()
    {
        $this->assertEquals(
            '<div data-react-component="article-card" data-props=\'{"key":"\u003Cspan\u003Evalue\u003C\/span\u003E"}\'></div>',
            Blade::render("@reactComponent('article-card', ['key' => '<span>value</span>'])")
        );
    }

    /** @test */
    public function it_can_convert_double_quotes()
    {
        $this->assertEquals(
            '<div data-react-component="article-card" data-props=\'{"key":"\u0027"}\'></div>',
            Blade::render("@reactComponent('article-card', ['key' => '\''])")
        );
    }

    /** @test */
    public function it_can_convert_single_quotes()
    {
        $this->assertEquals(
            '<div data-react-component="article-card" data-props=\'{"key":"\u0022"}\'></div>',
            Blade::render("@reactComponent('article-card', ['key' => '\"'])")
        );
    }

    /** @test */
    public function it_can_convert_ampersands()
    {
        $this->assertEquals(
            '<div data-react-component="article-card" data-props=\'{"key":"\u0026"}\'></div>',
            Blade::render("@reactComponent('article-card', ['key' => '&'])")
        );
    }
}