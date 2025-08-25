<?php

namespace Tobiasla78\FilamentSimplePages\Resources;

use Tobiasla78\FilamentSimplePages\Resources\SimplePages\Pages\CreateSimplePage;
use Tobiasla78\FilamentSimplePages\Resources\SimplePages\Pages\EditSimplePage;
use Tobiasla78\FilamentSimplePages\Resources\SimplePages\Pages\ListSimplePages;
use Tobiasla78\FilamentSimplePages\Resources\SimplePages\Schemas\SimplePageForm;
use Tobiasla78\FilamentSimplePages\Resources\SimplePages\Tables\SimplePagesTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SimplePageResource extends Resource
{
    protected static ?string $model =  \Tobiasla78\FilamentSimplePages\Models\SimplePage::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SimplePage';

    public static function form(Schema $schema): Schema
    {
        return SimplePageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SimplePagesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSimplePages::route('/'),
            'create' => CreateSimplePage::route('/create'),
            'edit' => EditSimplePage::route('/{record}/edit'),
        ];
    }
}
