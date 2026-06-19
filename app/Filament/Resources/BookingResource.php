<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Models\Booking;
use App\Models\SurfPackage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BookingsExport;
use Filament\Tables\Actions\Action;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationLabel = 'Bookings';

    protected static ?string $pluralLabel = 'Bookings';

    // ================= FORM =================
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('surf_package_id')
                ->label('Surf Package')
                ->options(SurfPackage::all()->pluck('name', 'id'))
                ->searchable()
                ->required(),

            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(100),

            Forms\Components\TextInput::make('email')
                ->email()
                ->nullable(),

            Forms\Components\TextInput::make('phone')
                ->required(),

            Forms\Components\DatePicker::make('booking_date')
                ->nullable(),

            Forms\Components\TextInput::make('people')
                ->numeric()
                ->default(1),

            Forms\Components\Textarea::make('notes')
                ->columnSpanFull(),
        ]);
    }

    // ================= TABLE =================
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
               Tables\Columns\TextColumn::make('surf_package_id')
    ->label('Package')
    ->formatStateUsing(function ($state) {
        return \App\Models\SurfPackage::find($state)?->name;
    }),

                Tables\Columns\TextColumn::make('name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('phone'),

                Tables\Columns\TextColumn::make('booking_date')
                    ->date(),

                Tables\Columns\TextColumn::make('people'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Created'),
            ])
    ->headerActions([
    Action::make('export')
        ->label('Download Excel')
        ->icon('heroicon-o-arrow-down-tray')
        ->action(function () {
            return Excel::download(new BookingsExport, 'bookings.xlsx');
        }),
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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}