<?php

namespace Tobiasla78\FilamentSimplePages\Resources;

use Filament\Facades\Filament;
use Filament\Forms\Components\FileUpload;
use Tobiasla78\FilamentSimplePages\Resources\SimplePageResource\Pages;
use Tobiasla78\FilamentSimplePages\Models\SimplePage;
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

    public static function getIcon(): string
    {
        $plugin = Filament::getCurrentPanel()?->getPlugin('filament-simple-pages');

        return $plugin->getIcon() ?? 'heroicon-o-rectangle-stack';
    }

    public static function getNavigationLabel(): string
    {
        $plugin = Filament::getCurrentPanel()?->getPlugin('filament-simple-pages');

        return $plugin->getNavigationLabel() ?? __('Simple Pages');
    }

    public static function getNavigationSort(): ?int
    {
        $plugin = Filament::getCurrentPanel()?->getPlugin('filament-simple-pages');

        return $plugin->getSort();
    }

    public static function getNavigationIcon(): ?string
    {
        $plugin = Filament::getCurrentPanel()?->getPlugin('filament-simple-pages');

        return $plugin->getIcon();
    }

    public static function getNavigationGroup(): ?string
    {
        $plugin = Filament::getCurrentPanel()?->getPlugin('filament-simple-pages');

        return $plugin->getNavigationGroup();
    }

    public static function getLabel(): string
    {
        return __('filament-simple-pages::simple-pages.label');
    }

    public static function getPluralLabel(): ?string
    {
        return __('filament-simple-pages::simple-pages.pluralLabel');
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title'),
                TextInput::make('slug')
                    ->required(),
                RichEditor::make('content')
                    ->columnSpanFull(),
                FileUpload::make('image_url')
                    ->label('Add image for this page')
                    ->disk('public')
                    ->image()
                    ->imageEditor()
                    ->columnStart(1)
                    ->directory('static_pages')
                    ->visibility('public'),
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
