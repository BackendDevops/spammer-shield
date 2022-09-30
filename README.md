# Description of Kvc/Spammer-Shield

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kvnc/spammer-shield.svg?style=flat-square)](https://packagist.org/packages/kvnc/spammer-shield)
[![Build](https://github.com/BackendDevops/spammer-shield/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/BackendDevops/spammer-shield/actions/workflows/run-tests.yml)
[![PHPStan](https://github.com/BackendDevops/spammer-shield/actions/workflows/phpstan.yml/badge.svg?branch=main)](https://github.com/BackendDevops/spammer-shield/actions/workflows/phpstan.yml)
[![Fix PHP code style issues](https://github.com/BackendDevops/spammer-shield/actions/workflows/fix-php-code-style-issues.yml/badge.svg?branch=main&event=push)](https://github.com/BackendDevops/spammer-shield/actions/workflows/fix-php-code-style-issues.yml)
[![PHPMD](https://github.com/BackendDevops/spammer-shield/actions/workflows/phpmd.yml/badge.svg?branch=main&event=push)](https://github.com/BackendDevops/spammer-shield/actions/workflows/phpmd.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/kvnc/spammer-shield.svg?style=flat-square)](https://packagist.org/packages/kvnc/spammer-shield)

## What This Package Does
This package has multiple solutions to prevent spam entries on your forms.
  * Google Recaptcha integration (enabled by config file),
  * Form submission timeout filter , human submission/ bot submission check
  * Honeypot input that normal clients can not see on your forms only bots can fill
  * Random questions (Human answerable questions randomly changes based on a dictionary)
## Installation

You can install the package via composer:

```bash
composer require kvnc/spammer-shield
```


You can publish the config file with:

```bash
php artisan vendor:publish --tag="spammer-shield-config"
```
You can publish the public assets files with:

```bash
php artisan asset:publish --bench="spammer-shield"
```

This is the contents of the published config file:

```php
return [
    'input_name' => env('SPAMMER_SHIELD_INPUT_NAME', 'specific_values'),
    'input_class' => env('SPAMMER_SHIELD_INPUT_CLASS', 'shield-pot'), //Don't change the class unless you did not add the class in your css
    'form_submission_time' => env('SPAMMER_SHIELD_FORM_TIME', 4), // the time bots can fill up your form in seconds, don't extends this too much
    'is_enabled' => env('SPAMMER_SHIELD_IS_ENABLED', true),
    'is_google_enabled' => env('SPAMMER_SHIELD_IS_ENABLED_CAPTCHA', false),
    'is_random_question_enabled' => env('SPAMMER_SHIELD_IS_ENABLED_RANDOM_QUESTION', true),
    'is_timeout_filter_enabled' => env('SPAMMER_SHIELD_IS_TIMEOUT_FILTER_ENABLED', false),
    'google_recaptcha_site_key' => env('SPAMMER_SHIELD_GOOGLE_SITE_KEY', ''),
    'google_recaptcha_secret_key' => env('SPAMMER_SHIELD_GOOGLE_SECRET_KEY', ''),
    'is_action_taken' => false,

];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="spammer-shield-views"
```

## Usage

```php
$variable = new VendorName\Skeleton();
echo $variable->echoPhrase('Hello, VendorName!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [kvnc](https://github.com/BackendDevops)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
