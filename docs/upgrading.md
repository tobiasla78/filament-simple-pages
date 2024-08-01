## Upgrading from 0.x.x to 1.x.x
- backup your `filament_simple_pages` table in your database if you don't want to lose data
- delete the `filament_simple_pages` table in your database
- delete `create_filament-simple-pages_table.php` in `database/migrations`
- delete `add_image_to_filament-simple-pages_table.php` in `database/migrations`
- upgrade the package version in composer.json to `"tobiasla78/filament-simple-pages": "^1.0"`
- run `composer update tobiasla78/filament-simple-pages`
- delete published files from vendor if you had any
- follow the Installation & Usage intructions in this README