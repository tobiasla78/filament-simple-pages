<?php

namespace Tobiasla78\FilamentSimplePages\Resources;

use Tobiasla78\FilamentSimplePages\Resources\SimplePageResource\Pages;
use Tobiasla78\FilamentSimplePages\Models\SimplePage;;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;

class SimplePageResource extends Resource
{
    protected static ?string $model = SimplePage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title'),
                TextInput::make('slug')
                    ->required(),
                RichEditor::make('content')
                    ->columnSpanFull(),
                Toggle::make('is_public'),
                Toggle::make('indexable'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('slug'),
                ToggleColumn::make('is_public'),
                ToggleColumn::make('indexable'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('view')
                    ->url(fn ($record) : string => \Tobiasla78\FilamentSimplePages\Pages\SimplePage::getUrl([$record->slug]))
                    ->icon('heroicon-o-eye'),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListSimplePages::route('/'),
            'create' => Pages\CreateSimplePage::route('/create'),
            'edit' => Pages\EditSimplePage::route('/{record}/edit'),
        ];
    }
}
