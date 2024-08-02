## Pages outside Filament

You can make the pages viewable outside of Filament panels by toggling "Register Outside Filament" in the Resource.

### Layout files

If left blank in the Resource the default layout file will be `components.layouts.app` and the content will be rendered to `{{ $slot }}`.
You can also use `extends` and `section` when creating/editing a page.

### Make CSS work

You need [Tailwind CSS](https://tailwindcss.com/) and it's [Typography plugin](https://github.com/tailwindlabs/tailwindcss-typography) installed (not just inside Filament) to make the styles work or you could publish the views and use your own styles.

Here is an example `tailwind.config.js`:

```javascript
/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./vendor/tobiasla78/filament-simple-pages/resources/views/livewire/simple-page.blade.php"
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}
```

### Make Search Engine Indexing work

To make search engine indexing work you need to implement logic to your layout file that you will use.

This is an example of `components.layouts.app` file and `$filamentSimplePages_indexable` will be automatically injected:

```html
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
