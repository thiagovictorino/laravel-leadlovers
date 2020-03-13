<?php

namespace Victorino\LaravelLeadlovers\Tests;

use Orchestra\Testbench\TestCase as TestCaseOrchestra;
use Victorino\LaravelLeadlovers\LaravelLeadloversFacade;
use Victorino\LaravelLeadlovers\LaravelLeadloversServiceProvider;

class TestCase extends TestCaseOrchestra
{

    protected function getPackageProviders($app)
    {
        return [LaravelLeadloversServiceProvider::class];
    }

    protected function getApplicationAliases($app)
    {
        return ['LaravelLeadlovers' => LaravelLeadloversFacade::class];
    }
}
