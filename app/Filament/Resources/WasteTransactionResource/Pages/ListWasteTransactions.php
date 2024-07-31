<?php

namespace App\Filament\Resources\WasteTransactionResource\Pages;

use App\Filament\Resources\WasteTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWasteTransactions extends ListRecords
{
    protected static string $resource = WasteTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
