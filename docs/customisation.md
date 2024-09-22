## Customisation

### Customize the resource

You can customize the resource by creating a new resource and extending the base resource.

```php
namespace App\Filament\Resources;

use Tobiasla78\FilamentSimplePages\Resources\SimplePageResource as BaseSimplePageResource;

class SimplePageResource extends BaseSimplePageResource
{
    protected static ?string $navigationLabel = 'Pages';

    protected static ?string $navigationIcon = 'heroicon-m-folder-open';
}
```

Then prevent the original resource from being loaded in your AdminPanelProvider:

```php
->plugins([
    FilamentSimplePagesPlugin::make()
        ->shouldRegisterResource(false)
])
```

You may need to register your custom resource in your AdminPanelProvider if it's not automatically discovered.

### Publishing the views

Optionally, you can publish the views using:

```bash
php artisan vendor:publish --tag="filament-simple-pages-views"
```