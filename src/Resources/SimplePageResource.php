<?php

namespace Tobiasla78\FilamentSimplePages\Resources;

use Filament\Forms\Components\FileUpload;
use \Tobiasla78\FilamentSimplePages\Resources\SimplePageResource\Pages;
use \Tobiasla78\FilamentSimplePages\Models\SimplePage;
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
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Get;

class SimplePageResource extends Resource
{
    protected static ?string $model = SimplePage::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->description('General Configuration')
                    ->schema([
                        TextInput::make('title')
                            ->helperText('Heading on the page and title in the Browser'),
                        TextInput::make('slug')
                            ->helperText('URL of the page')
                            ->required(),
                        FileUpload::make('image_url')
                            ->label('Image')
                            ->helperText('Add image for this page or leave it empty')
                            ->disk('public')
                            ->image()
                            ->imageEditor()
                            ->columnStart(1)
                            ->directory('static_pages')
                            ->visibility('public')
                            ->columnSpanFull(),
                        RichEditor::make('content')
                            ->helperText('Content to be displayed on the page')
                            ->columnSpanFull(),
                    ])
                    ->columnSpan(8)
                    ->columns(2),
                Grid::make(1)
                    ->schema([
                        Section::make()
                            ->description('Additional Configuration')
                            ->schema([
                                Toggle::make('is_public')
                                    ->helperText('Should the page be public?'),
                                Toggle::make('indexable')
                                    ->helperText('Search engine indexing'),
                            ])
                            ->columnSpan(4)
                            ->columns(2),
                        Section::make()
                            ->description('Registration Outside Panels')
                            ->schema([
                                Toggle::make('register_outside_filament')
                                    ->label('Page Registration Outside Filament')
                                    ->live()
                                    ->helperText('Registers the page outside Filament so it can be accessed from without panel'),
                                TextInput::make('layout')
                                ->hint('Leave it empty for no layout')
                                    ->placeholder('components.layouts.app')
                                    ->helperText('content will be rendered to {{ $slot }}')
                                    ->visible(fn (Get $get) => $get('register_outside_filament')),
                                TextInput::make('extends')
                                    ->hint('Leave it empty if you only use layout')
                                    ->placeholder('layouts.app')
                                    ->helperText('same as @extends(\'layouts.app\')')
                                    ->visible(fn (Get $get) => $get('register_outside_filament')),
                                TextInput::make('section')
                                    ->hint('Leave it empty if you only use layout')
                                    ->placeholder('content')
                                    ->helperText('renders the content to @section(\'content\')')
                                    ->visible(fn (Get $get) => $get('register_outside_filament')),
                            ])
                            ->columnSpan(4)
                    ])->columnSpan(4),
            ])
            ->columns(12);
    }

    public static function table(Table $table): Table
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
