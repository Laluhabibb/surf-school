<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroSettingResource\Pages;
use App\Models\HeroSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;

class HeroSettingResource extends Resource
{
    protected static ?string $model = HeroSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Hero Settings';

    protected static ?string $pluralModelLabel = 'Hero Settings';

    protected static ?string $modelLabel = 'Hero Setting';

    // =========================
    // FORM
    // =========================
    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')
                ->required()
                ->maxLength(255),

            TextInput::make('subtitle')
                ->maxLength(255),

            Textarea::make('description')
                ->columnSpanFull(),

            TextInput::make('button_text')
                ->maxLength(255),

            TextInput::make('button_link')
                ->url()
                ->maxLength(255),

            // IMAGE UPLOAD
            FileUpload::make('image')
                ->label('Hero Image')
                ->image()
                ->directory('hero')
                ->nullable(),

            // VIDEO UPLOAD (MP4)
            FileUpload::make('video')
                ->label('Hero Video')
                ->directory('hero-videos')
                ->acceptedFileTypes(['video/mp4', 'video/webm'])
                ->nullable(),

            // Toggle: pakai video atau image
            Toggle::make('use_video')
                ->label('Use Video instead of Image')
                ->default(false),

            // Active hero (ONLY ONE ACTIVE)
            Toggle::make('is_active')
                ->label('Set as Active Hero')
                ->helperText('Only ONE hero should be active')
                ->default(false),
        ]);
    }

    // =========================
    // TABLE
    // =========================
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->limit(30),

                TextColumn::make('subtitle')
                    ->limit(30),

                ImageColumn::make('image')
                    ->label('Image'),

                IconColumn::make('use_video')
                    ->boolean()
                    ->label('Video'),

                IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    // =========================
    // ONLY ONE ACTIVE HERO
    // =========================
    public static function mutateFormDataBeforeSave(array $data): array
    {
        if ($data['is_active'] ?? false) {
            HeroSetting::query()->update([
                'is_active' => false,
            ]);
        }

        return $data;
    }

    // =========================
    // PAGES
    // =========================
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHeroSettings::route('/'),
            'create' => Pages\CreateHeroSetting::route('/create'),
            'edit' => Pages\EditHeroSetting::route('/{record}/edit'),
        ];
    }
}