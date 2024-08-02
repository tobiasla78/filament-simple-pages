![alt text](https://i.imgur.com/gYZilCK.jpeg)

# filament-simple-pages

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tobiasla78/filament-simple-pages.svg?style=flat-square)](https://packagist.org/packages/tobiasla78/filament-simple-pages)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/tobiasla78/filament-simple-pages/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/tobiasla78/filament-simple-pages/actions?query=workflow%3Arun-tests+branch%3Amain)
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

Install the plugin and run the migrations:

```bash
php artisan filament-simple-pages:install
```

## Basic Usage

### Add the resource to create pages in your panel

Register the plugin in your AdminPanelProvider.

```php
use Tobiasla78\FilamentSimplePages\FilamentSimplePagesPlugin;

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->plugins([
                FilamentSimplePagesPlugin::make()
                    ->prefixSlug('page')
            ])
    }
```

For example: `->prefixSlug('page')` will set the page URL to `http://localhost/admin/page/privacy-policy`.

### View pages from another panel

You can make the pages viewable in another Filament panel:

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

## Advanced Usage
- [Customisation](docs/customisation.md) - publish resources or views from vendor
- [Register Pages Outside Filament](docs/pages-outside-filament.md) - make pages viewable outside of Filament
- [Upgrade Guide](docs/upgrading.md) - upgrade version from 0.x.x to 1.x.x

## Support

[discussion](https://github.com/tobiasla78/filament-simple-pages/discussions) or [Filament PHP Discord](https://discord.com/channels/883083792112300104/1252364577228853389)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
