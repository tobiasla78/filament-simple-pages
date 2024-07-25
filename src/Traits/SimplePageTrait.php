<?php

namespace Tobiasla78\FilamentSimplePages\Traits;

use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;

trait SimplePageTrait {

    public function abortIfNotPublic($record)
    {
        if (!$record->is_public) {
            abort(403);
        }
    }

    public function indexable($record)
    {
        if ($record->indexable === 0) {
            FilamentView::registerRenderHook(
                PanelsRenderHook::HEAD_START,
                fn (): string => Blade::render('<meta name="robots" content="noindex">'),
            );
        }
    }

}