<?php

namespace VendorName\Skeleton\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use VendorName\Skeleton\SpammerShieldServiceProvider;

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
