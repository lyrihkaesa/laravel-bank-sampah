<?php

namespace App\Filament\Resources\HistoryWasteResource\Pages;

use App\Filament\Resources\HistoryWasteResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageHistoryWastes extends ManageRecords
{
    protected static string $resource = HistoryWasteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
