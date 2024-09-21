<?php

namespace Tobiasla78\FilamentSimplePages;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Tobiasla78\FilamentSimplePages\Pages\SimplePage;
use Tobiasla78\FilamentSimplePages\Resources\SimplePageResource;
use Tobiasla78\FilamentSimplePages\Resources\SimplePageResource as DefaultSimplePageResource;

class FilamentSimplePagesPlugin implements Plugin
{
    protected string $defaultResource = DefaultSimplePageResource::class;
    protected string $prefixSlug;
    protected string $resource;

    public function getId(): string
    {
        return 'filament-simple-pages';
    }

    public function register(Panel $panel): void
    {
        $resourceClass = $this->getResource();

        if ($resourceClass === $this->defaultResource) {
            $panel->resources([$resourceClass]);
        }

        $panel->pages([SimplePage::class]);
    }
    
    public function getResource() : string
    {
        return $this->resource ?? $this->defaultResource;
    }

    public function resource(string $resource) : FilamentSimplePagesPlugin
    {
        $this->resource = $resource;

        return $this;
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
