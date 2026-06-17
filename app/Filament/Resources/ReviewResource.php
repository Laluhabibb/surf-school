<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Models\Review;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static ?string $navigationLabel = 'Reviews';

    protected static ?string $pluralLabel = 'Reviews';

    // ================= FORM =================
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(100),

            Forms\Components\Select::make('rating')
                ->label('Rating')
                ->options([
                    1 => '1 Star',
                    2 => '2 Star',
                    3 => '3 Star',
                    4 => '4 Star',
                    5 => '5 Star',
                ])
                ->required(),

            Forms\Components\Textarea::make('comment')
                ->required()
                ->columnSpanFull(),

            Forms\Components\FileUpload::make('image')
                ->image()
                ->directory('reviews')
                ->nullable(),

            Forms\Components\Toggle::make('is_active')
                ->default(true),
        ]);
    }

    // ================= TABLE =================
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('rating')
                    ->label('Stars')
                    ->sortable(),

                Tables\Columns\TextColumn::make('comment')
                    ->limit(50),

                Tables\Columns\ImageColumn::make('image'),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Created'),
            ])
            ->filters([
                //
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

    // ================= RELATIONS =================
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    // ================= PAGES =================
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}