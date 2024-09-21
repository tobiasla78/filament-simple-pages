## Customisation

### Customize the resource

You can customize the resource by creating a new resource and extending the base resource.

```php
namespace App\Filament\Resources;

use Tobiasla78\FilamentSimplePages\Resources\SimplePageResource as BaseSimplePageResource;

class SimplePageResource extends BaseSimplePageResource
{
    protected static ?string $navigationLabel = 'Custom Navigation Label';
}
```

Then specify which resource you are using in the AdminPanelProvider:

```php
use Tobiasla78\FilamentSimplePages\FilamentSimplePagesPlugin;

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->path('admin')
            ->plugins([
                FilamentSimplePagesPlugin::make()
                    ->resource('App\\Filament\\Resources\\SimplePageResource')
            ])
    }
```

### Publishing the views

Optionally, you can publish the views using:

```bash
php artisan vendor:publish --tag="filament-simple-pages-views"
```