<?php

namespace Tobiasla78\FilamentSimplePages;

use Filament\Contracts\Plugin;
use Filament\Panel;

class FilamentSimplePagesPlugin implements Plugin
{
    protected string $prefixSlug;

    public function getId(): string
    {
        return 'filament-simple-pages';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources(config('filamentpages.resources')
            ->pages(config('filamentpages.resources');
    }
    
    public function getPrefixSlug() : string
    {
        return $this->prefixSlug ?? 'page';
    }

    public function prefixSlug(string $prefixSlug) : FilamentSimplePagesPlugin
    {
        $this->prefixSlug = $prefixSlug;

        return $this;
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
