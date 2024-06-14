<?php

namespace Tobiasla78\FilamentSimplePages\Resources\SimplePageResource\Pages;

use Tobiasla78\FilamentSimplePages\Resources\SimplePageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSimplePages extends ListRecords
{
    protected static string $resource = SimplePageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
