<?php

namespace App\Filament\Resources\WasteResource\Pages;

use App\Filament\Resources\WasteResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageWastes extends ManageRecords
{
    protected static string $resource = WasteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
