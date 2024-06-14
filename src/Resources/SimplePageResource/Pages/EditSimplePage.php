<?php

namespace Tobiasla78\FilamentSimplePages\Resources\SimplePageResource\Pages;

use Tobiasla78\FilamentSimplePages\Resources\SimplePageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSimplePage extends EditRecord
{
    protected static string $resource = SimplePageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
