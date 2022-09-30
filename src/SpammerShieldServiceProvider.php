<?php

namespace Kvnc\SpammerShield;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Kvnc\SpammerShield\Views\SpammerShieldViewComponent;
use Kvnc\SpammerShield\Views\SpammerShieldViewComposer;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SpammerShieldServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('spammer-shield')
            ->hasConfigFile()
            ->hasAssets()
            ->hasViews();
    }

    public function packageBooted()
    {
        $this
            ->registerBindings()
            ->registerBladeClasses();
    }

    protected function registerBindings(): self
    {
        $this->app->bind(Shield::class);
        return $this;
    }

    protected function registerBladeClasses(): self
    {
        View::composer('spammer-shield::form-fields', SpammerShieldViewComposer::class);
        Blade::component('spammer-shield', SpammerShieldViewComponent::class);
        Blade::directive('spammerShield', function () {
            return "<?php echo view('spammer-shield::form-fields'); ?>";
        });

        return $this;
    }
}
