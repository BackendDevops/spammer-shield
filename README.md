# Description of Kvc/Spammer-Shield

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kvnc/spammer-shield.svg?style=flat-square)](https://packagist.org/packages/kvnc/spammer-shield)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/kvnc/spammer-shield/run-tests?label=tests)](https://github.com/kvnc/spammer-shield/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/kvnc/spammer-shield/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/kvnc/spammer-shield/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
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
