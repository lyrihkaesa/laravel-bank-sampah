<?php

namespace App\Filament\Resources\WasteTransactionResource\Pages;

use App\Filament\Resources\WasteTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWasteTransaction extends EditRecord
{
    protected static string $resource = WasteTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
