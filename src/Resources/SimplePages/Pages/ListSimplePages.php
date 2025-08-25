<?php

namespace Tobiasla78\FilamentSimplePages\Resources\SimplePages\Pages;

use Tobiasla78\FilamentSimplePages\Resources\SimplePageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSimplePages extends ListRecords
{
    protected static string $resource = SimplePageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
