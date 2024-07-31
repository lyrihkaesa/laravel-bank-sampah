<?php

namespace App\Filament\Resources\WasteTransactionResource\Pages;

use Filament\Actions;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\WasteTransactionResource;

class CreateWasteTransaction extends CreateRecord
{
    protected static string $resource = WasteTransactionResource::class;

    // protected function handleRecordCreation(array $data): Model
    // {
    //     dd($data);

    //     // Create Student
    //     $record = static::getModel()::create($data);

    //     return $record;
    // }
}
