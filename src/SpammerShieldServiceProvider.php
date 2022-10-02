<?php

namespace Kvnc\SpammerShield;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Kvnc\SpammerShield\Views\SpammerShieldViewComponent;
use Kvnc\SpammerShield\Views\SpammerShieldViewComposer;
use Kvnc\SpammerShield\Http\Middleware\SpammerShieldMiddleware;
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

    /**
     * @throws BindingResolutionException
     */
    public function packageBooted()
    {
        $this
            ->registerBindings()
            ->registerBladeClasses();
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('spammer-shield', SpammerShieldMiddleware::class);
    }

    protected function registerBindings(): self
    {
        $this->app->bind(Shield::class);

        return $this;
    }

    protected function registerBladeClasses(): self
    {

        View::composer('spammer-shield::form_inputs', SpammerShieldViewComposer::class);
        Blade::component('spammer-shield', SpammerShieldViewComponent::class);
        Blade::directive('spammerShield', function () {
            return "<?php echo view('spammer-shield::form_inputs'); ?>";
        });
        Blade::directive('googleRecaptchaV3Js', function () {
            return '<script src="https://www.google.com/recaptcha/api.js" defer></script>';
        });
        Blade::directive('googleRecaptchaV3',function (){
            $config = (object) config('spammer-shield');
            return '<div class="g-recaptcha" data-sitekey="{{$config->google_recaptcha_site_key}}"></div>';
        });

        return $this;
    }
}
