<?php

namespace Tobiasla78\FilamentSimplePages\Pages;

use Filament\Pages\Page;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;
use Illuminate\Contracts\Support\Htmlable;
use Tobiasla78\FilamentSimplePages\FilamentSimplePagesPlugin;
use Tobiasla78\FilamentSimplePages\Traits\SimplePageTrait;

class SimplePage extends Page
{
    use SimplePageTrait;

    protected static string $view = 'filament-simple-pages::filament.pages.simple-page';

    protected static bool $shouldRegisterNavigation = false;

    public $record;

    public function getHeading(): string
    {
        return $this->record->title ?? 'Simple Page';
    }

    public static function getSlug() : string
    {
        return FilamentSimplePagesPlugin::get()->getPrefixSlug() . '/{slug}';
    }

    public function getTitle(): string | Htmlable
    {
        return $this->record->title ?? 'Simple Page';
    }

    public static function shouldRegisterSpotlight(): bool
    {
        return false;
    }

    public function mount($slug)
    {
        $this->record = \Tobiasla78\FilamentSimplePages\Models\SimplePage::where('slug', $slug)->first();

        $this->abortIfNotPublic($this->record);

        $this->indexable($this->record);
    }
}
