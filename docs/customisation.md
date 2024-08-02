## Customisation

Keep in mind that this will break future updates.

### Publishing the resource

Optionally, you can publish the Filament resource:

```bash
php artisan vendor:publish --tag="filament-simple-pages-resources"
```
Files will be published to `App/Filament/Resources` you may need to move them and adjust Namespaces if you are using multiple panels.

### Publishing the views

Optionally, you can publish the views using:

```bash
php artisan vendor:publish --tag="filament-simple-pages-views"
```