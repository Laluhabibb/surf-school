<?php

namespace App\Filament\Resources\SurfPackageResource\Pages;

use App\Filament\Resources\SurfPackageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSurfPackages extends ListRecords
{
    protected static string $resource = SurfPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
