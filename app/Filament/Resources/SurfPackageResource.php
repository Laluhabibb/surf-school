<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SurfPackageResource\Pages;
use App\Models\SurfPackage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SurfPackageResource extends Resource
{
    protected static ?string $model = SurfPackage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // FORM
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('duration')
                    ->required(),

                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('surf-packages')
                    ->visibility('public')
                    ->imageEditor(),

                Forms\Components\Toggle::make('is_active')
                    ->default(true),
            ]);
    }

    // TABLE
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('price')
                    ->money('IDR')
                    ->sortable(),

                Tables\Columns\TextColumn::make('duration'),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),

                Tables\Columns\ImageColumn::make('image')
                    ->disk('public'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    // PAGE NAVIGATION (RETURN KE LIST SETELAH SAVE)
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSurfPackages::route('/'),
            'create' => Pages\CreateSurfPackage::route('/create'),
            'edit' => Pages\EditSurfPackage::route('/{record}/edit'),
        ];
    }
}