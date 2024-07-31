<?php

namespace App\Filament\Resources\WasteTransactionResource\Pages;

use Filament\Actions;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\WasteTransactionResource;

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

    protected function handleRecordUpdate(Model $record, $data): Model
    {

        $record->update($data);

        return $record;
    }
}
