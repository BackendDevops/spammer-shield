<?php

namespace Kvnc\SpammerShield\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Kvnc\SpammerShield\SpammerShieldServiceProvider;

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
