<?php

namespace App\Filament\Resources\ContactSettingResource\Pages;

use App\Filament\Resources\ContactSettingResource;
use Filament\Resources\Pages\ListRecords;

class ListContactSettings extends ListRecords
{
    protected static string $resource = ContactSettingResource::class;

    public function mount(): void
    {
        $record = \App\Models\ContactSetting::first();

        if ($record) {
            $this->redirect(
                ContactSettingResource::getUrl('edit', ['record' => $record])
            );
        } else {
            $this->redirect(
                ContactSettingResource::getUrl('create')
            );
        }
    }
}