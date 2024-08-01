## Basic Usage

### Add the Resource to create pages to your panel

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