<?php

namespace Esign\ReactComponents\Tests;

use Esign\ReactComponents\ReactComponentsServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [ReactComponentsServiceProvider::class];
    }
} 