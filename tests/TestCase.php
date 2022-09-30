<?php

namespace Kvnc\SpammerShield\Tests;

use Kvnc\SpammerShield\SpammerShieldServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            SpammerShieldServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
    }
}
