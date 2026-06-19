<?php

namespace App\Filament\Resources\AboutSettingResource\Pages;

use App\Filament\Resources\AboutSettingResource;
use Filament\Resources\Pages\ListRecords;

class ListAboutSettings extends ListRecords
{
    protected static string $resource = AboutSettingResource::class;

    public function mount(): void
    {
        $record = \App\Models\AboutSetting::first();

        if ($record) {
            $this->redirect(
                AboutSettingResource::getUrl('edit', ['record' => $record])
            );
        } else {
            $this->redirect(
                AboutSettingResource::getUrl('create')
            );
        }
    }
}