<?php

namespace Esign\ReactComponents;

use Esign\ReactComponents\Console\InstallCommand;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ReactComponentsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }

    public function register()
    {
        Blade::directive('reactComponent', function ($expression) {
            return "<?php echo \Esign\ReactComponents\ReactComponent::renderContainer({$expression}) ?>";
        });
    }
}
