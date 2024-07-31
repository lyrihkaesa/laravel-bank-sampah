<?php

namespace App\Filament\Resources\WasteTransactionResource\Pages;

use App\Filament\Resources\WasteTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewWasteTransaction extends ViewRecord
{
    protected static string $resource = WasteTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
