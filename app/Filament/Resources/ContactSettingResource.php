<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactSettingResource\Pages;
use App\Models\ContactSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactSettingResource extends Resource
{
    protected static ?string $model = ContactSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-phone';

    protected static ?string $navigationLabel = 'Contact Settings';

    protected static ?string $pluralLabel = 'Contact Settings';

    // ================= FORM =================
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('whatsapp')
                ->label('WhatsApp Number')
                ->required()
                ->placeholder('628xxxxxxxxxx'),

            Forms\Components\TextInput::make('email')
                ->email()
                ->nullable(),

            Forms\Components\Textarea::make('address')
                ->label('Address')
                ->columnSpanFull(),

            Forms\Components\Textarea::make('google_maps')
                ->label('Google Maps Embed URL')
                ->columnSpanFull(),

            Forms\Components\TextInput::make('instagram')
                ->prefix('@')
                ->nullable(),

            Forms\Components\TextInput::make('facebook')
                ->nullable(),

            Forms\Components\TextInput::make('tiktok')
                ->nullable(),
        ]);
    }

    // ================= TABLE =================
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('whatsapp')
                    ->label('WhatsApp'),

                Tables\Columns\TextColumn::make('email'),

                Tables\Columns\TextColumn::make('address')
                    ->limit(30),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListContactSettings::route('/'),
            'create' => Pages\CreateContactSetting::route('/create'),
            'edit' => Pages\EditContactSetting::route('/{record}/edit'),
        ];
    }
}