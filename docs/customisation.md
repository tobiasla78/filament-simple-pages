## Customisation

Optionally, you can publish the Filament resource:

```bash
php artisan vendor:publish --tag="filament-simple-pages-resources"
```

> [!NOTE]
> Files will be published to `App/Filament/Resources` you may need to move them and adjust Namespaces if you are using multiple panels.

Optionally, you can publish the views using:

```bash
php artisan vendor:publish --tag="filament-simple-pages-views"
```