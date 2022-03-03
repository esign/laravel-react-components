<?php

namespace Esign\ReactComponents;

use Esign\ReactComponents\Console\InstallCommand;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ReactComponentsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'react-components');
        Blade::component('react-components::components.react-component', 'react-component');

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }

    public function register()
    {
        Blade::directive('reactComponent', function ($expression) {
            return "<?php echo \Esign\ReactComponents\ReactComponentDirective::render({$expression}) ?>";
        });
    }
}
