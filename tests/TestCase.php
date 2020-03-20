<?php

namespace Victorino\Leadlovers\Tests;

use Orchestra\Testbench\TestCase as TestCaseOrchestra;
use Victorino\Leadlovers\LeadloversFacade;
use Victorino\Leadlovers\LeadloversServiceProvider;

class TestCase extends TestCaseOrchestra
{

    protected function getPackageProviders($app)
    {
        return [LeadloversServiceProvider::class];
    }

    protected function getApplicationAliases($app)
    {
        return ['Leadlovers' => LeadloversFacade::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set("leadlovers.token", '9FD52E6F16B84DEB987ADA877EE7F989');
    }
}
