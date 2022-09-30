<?php

namespace VendorName\Skeleton;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SpammerShieldServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('spammer-shield')
            ->hasConfigFile()
            ->hasAsset()
            ->hasViews();
    }

    public function register()
    {
    }
}
