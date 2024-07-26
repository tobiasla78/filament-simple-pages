<?php

use Illuminate\Support\Facades\Route;
use Tobiasla78\FilamentSimplePages\FilamentSimplePagesPlugin;
use Tobiasla78\FilamentSimplePages\Livewire\SimplePage as LivewireSimplePage;
use Tobiasla78\FilamentSimplePages\Models\SimplePage;

try {

    $prefixSlug = FilamentSimplePagesPlugin::get()->getPrefixSlug();

    Route::get('/'.$prefixSlug.'/{slug}', function ($slug) {
    
        $page = SimplePage::where('slug', $slug)->first();
    
        if ($page->register_outside_filament) {
    
            return app(LivewireSimplePage::class)->__invoke($page);
    
        }
    
        return abort(404);
    
    });

} catch(\Exception $e) {
    //
}