<?php

namespace Tobiasla78\FilamentSimplePages\Pages;

use Filament\Pages\Page;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;
use Illuminate\Contracts\Support\Htmlable;
use Tobiasla78\FilamentSimplePages\FilamentSimplePagesPlugin;

class SimplePage extends Page
{
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

    protected function abortIfNotPublic()
    {
        if (!$this->record->is_public) {
            abort(403);
        }
    }

    public static function shouldRegisterSpotlight(): bool
    {
        return false;
    }

    public function mount($slug)
    {
        $this->record = \Tobiasla78\FilamentSimplePages\Models\SimplePage::where('slug', $slug)->first();

        $this->abortIfNotPublic();

        if ($this->record->indexable === 0) {
            FilamentView::registerRenderHook(
                PanelsRenderHook::HEAD_START,
                fn (): string => Blade::render('<meta name="robots" content="noindex">'),
            );
        }
    }
}
