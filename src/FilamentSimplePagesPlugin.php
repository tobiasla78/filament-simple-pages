<?php

namespace Tobiasla78\FilamentSimplePages;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;
use Tobiasla78\FilamentSimplePages\Pages\SimplePage;
use Tobiasla78\FilamentSimplePages\Resources\SimplePageResource;

class FilamentSimplePagesPlugin implements Plugin
{
    use EvaluatesClosures;

    protected string $prefixSlug;

    public Closure | bool $shouldRegisterNavigation = false;

    public Closure | int $sort = 50;

    public Closure | string $icon = '';

    public Closure | string $navigationGroup = '';

    public Closure | string $navigationLabel = '';

    public function getId(): string
    {
        return 'filament-simple-pages';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                SimplePageResource::class
            ])
            ->pages([
                SimplePage::class,
            ]);
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

    public function setNavigationLabel(Closure | string $value = ''): FilamentSimplePagesPlugin
    {
        $this->navigationLabel = $value;

        return $this;
    }

    public function getNavigationLabel(): ?string
    {
        return ! empty($this->navigationLabel) ? $this->evaluate($this->navigationLabel) : null;
    }

    public function setNavigationGroup(Closure | string $value = ''): static
    {
        $this->navigationGroup = $value;

        return $this;
    }

    public function getNavigationGroup(): ?string
    {
        return ! empty($this->navigationGroup) ? $this->evaluate($this->navigationGroup) : null;
    }

    public function setIcon(Closure | string $value = ''): static
    {
        $this->icon = $value;

        return $this;
    }

    public function getIcon(): ?string
    {
        return ! empty($this->icon) ? $this->evaluate($this->icon) : null;
    }

    public function setSort(Closure | int $value = 100): static
    {
        $this->sort = $value;

        return $this;
    }

    public function getSort(): int
    {
        return $this->evaluate($this->sort);
    }
}
