<?php

namespace Tobiasla78\FilamentSimplePages\Resources\SimplePages\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class SimplePagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('slug'),
                ToggleColumn::make('is_public')
                    ->label('Public'),
                ToggleColumn::make('indexable'),
                ToggleColumn::make('register_outside_filament')
                    ->label('Register Outside Filament'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                Action::make('view')
                    ->url(fn ($record) : string => \Tobiasla78\FilamentSimplePages\Pages\SimplePage::getUrl([$record->slug]))
                    ->icon('heroicon-o-eye'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
