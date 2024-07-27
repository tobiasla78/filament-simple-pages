![alt text](https://i.imgur.com/gYZilCK.jpeg)

# filament-simple-pages

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tobiasla78/filament-simple-pages.svg?style=flat-square)](https://packagist.org/packages/tobiasla78/filament-simple-pages)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/tobiasla78/filament-simple-pages/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/tobiasla78/filament-simple-pages/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/tobiasla78/filament-simple-pages/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/tobiasla78/filament-simple-pages/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/tobiasla78/filament-simple-pages.svg?style=flat-square)](https://packagist.org/packages/tobiasla78/filament-simple-pages)

Create pages from within your Filament panel. Intended for privacy policy, imprint, etc.

## Features
- Resource in your AdminPanelProvider to create pages
- Customize the URL of your pages
- Optional image field
- View pages from another panel
- View pages from without panels
- Toggle search engine indexing for each page
- Toggle the visibility of the page
- Support for dark mode

## Installation

You can install the package via composer:

```bash
composer require tobiasla78/filament-simple-pages
```

Install the plugin with:

```bash
php artisan filament-simple-pages:install
```

## Usage

Register the plugin in your AdminPanelProvider.

```php
use Tobiasla78\FilamentSimplePages\FilamentSimplePagesPlugin;

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->plugin(
                FilamentSimplePagesPlugin::make()
                    ->prefixSlug('page') // (optional) sets the page url to yourPanelUrl/page/yourPageSlug
            )
    }
```

You can make the pages viewable in another panel:

```php
use Tobiasla78\FilamentSimplePages\Pages\SimplePage;

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->pages([
                SimplePage::class,
            ])
    }
```

You can make pages available outside Filament panels:

There is a ToggleColumn when creating/editing the page.

> [!CAUTION]
> Toggle indexing for search engine is not automatically available when registrate page outside Filament panels!

Here is an example on how to implement search engine indexing for pages outside Filament panels in your components.layouts.app file:

```php
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @if (isset($filamentSimplePages_indexable) && $filamentSimplePages_indexable)
            <meta name="robots" content="index, follow">
        @else
            <meta name="robots" content="noindex, nofollow">
        @endif

        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body>
        {{ $slot }}
    </body>
</html>
```

## Customisation

Optionally, you can publish the Filament resource:

```bash
php artisan vendor:publish --tag="filament-simple-pages-resources"
```

> [!NOTE]
> Files will be published to App/Filament/Resources you may need to move them and adjust Namespaces if you are using multiple panels.

Optionally, you can publish the views using:

```bash
php artisan vendor:publish --tag="filament-simple-pages-views"
```

## Support

Feel free to open a [discussion](https://github.com/tobiasla78/filament-simple-pages/discussions).
This plugin also has its own channel on the official Filament PHP Discord server.
Feedback is also welcome.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
