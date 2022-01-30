<?php

namespace Esign\ReactComponents\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class InstallCommand extends Command
{
    protected $signature = 'react-components:install';

    public function handle()
    {
        $this->copyStubs();
        $this->updateNodePackages(function (array $packages) {
            return [
                'react' => '^17.0.0',
                'react-dom' => '^17.0.0',
            ] + $packages;
        });

        $this->comment('Please execute the "npm install && npm run watch" command to build your assets.');
    }

    protected function copyStubs(): void
    {
        (new FileSystem())->ensureDirectoryExists(resource_path('assets/js/utils'));
        (new Filesystem())->copy(
            __DIR__ . '/../../stubs/registerReactComponents.js',
            resource_path('assets/js/utils/registerReactComponents.js')
        );
    }

    protected function updateNodePackages(callable $callback): void
    {
        if (! file_exists(base_path('package.json'))) {
            return;
        }

        $configurationKey = 'dependencies';

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages[$configurationKey] = $callback(
            array_key_exists($configurationKey, $packages) ? $packages[$configurationKey] : [],
            $configurationKey
        );

        ksort($packages[$configurationKey]);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT).PHP_EOL
        );
    }
}
