<?php

namespace App\Filament\Resources\HeroSettingResource\Pages;

use App\Filament\Resources\HeroSettingResource;
use Filament\Resources\Pages\ListRecords;

class ListHeroSettings extends ListRecords
{
    protected static string $resource = HeroSettingResource::class;

    public function mount(): void
    {
        $record = \App\Models\HeroSetting::first();

        if ($record) {
            $this->redirect(HeroSettingResource::getUrl('edit', ['record' => $record]));
        } else {
            $this->redirect(HeroSettingResource::getUrl('create'));
        }
    }
}