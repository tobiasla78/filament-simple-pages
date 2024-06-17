![alt text](https://i.imgur.com/QYShzED.jpeg)

# filament-simple-pages

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tobiasla78/filament-simple-pages.svg?style=flat-square)](https://packagist.org/packages/tobiasla78/filament-simple-pages)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/tobiasla78/filament-simple-pages/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/tobiasla78/filament-simple-pages/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/tobiasla78/filament-simple-pages/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/tobiasla78/filament-simple-pages/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/tobiasla78/filament-simple-pages.svg?style=flat-square)](https://packagist.org/packages/tobiasla78/filament-simple-pages)

Create pages from within your Filament panel. Intended for privacy policy, imprint, etc.

## Installation

You can install the package via composer:

```bash
composer require tobiasla78/filament-simple-pages
```

You need to publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-simple-pages-migrations"
php artisan migrate
```

Optionally, you can publish the views using:

```bash
php artisan vendor:publish --tag="filament-simple-pages-views"
```

## Usage

Register the plugin in your AdminPanelProvider.

```php
use Tobiasla78\FilamentSimplePages\FilamentSimplePagesPlugin;

    public function panel(Panel $panel): Panel
    {
        return $panel
            //...
            ->plugin(
                FilamentSimplePagesPlugin::make()
                    ->prefixSlug('page') // (optional) sets the page url to yourPanelUrl/page/yourPageSlug
            )
            //...
    }
```

If you want to make the pages only viewable for example in UserPanelProvider:

```php
use Tobiasla78\FilamentSimplePages\Pages\SimplePage;

    public function panel(Panel $panel): Panel
    {
        return $panel
            //...
            ->pages([
                SimplePage::class,
            ])
            //...
    }
```

## Columns Explanation

![alt text](https://i.imgur.com/sJv5Fa8.png)

```
title       title and heading of the page
slug        url of the page
content     content of the page
is_public   if you set it to false all users will get 403 server error
indexable   removes <meta name="robots" content="noindex"> from the <head> of your page
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
