<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WasteTransactionItem extends Pivot
{
    protected $table = 'waste_transaction_item';

    protected $fillable = [
        'waste_transaction_id',
        'waste_id',
        'weight',
        'price',
        'total_price'
    ];

    public function waste(): BelongsTo
    {
        return $this->belongsTo(Waste::class);
    }

    public function wasteTransaction(): BelongsTo
    {
        return $this->belongsTo(WasteTransaction::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($wasteTransactionItem) {
            $wasteTransactionItem->price = $wasteTransactionItem->waste->price;
            $wasteTransactionItem->total_price = $wasteTransactionItem->price * $wasteTransactionItem->weight;
        });

        static::updating(function ($wasteTransactionItem) {
            $wasteTransactionItem->price = $wasteTransactionItem->waste->price;
            $wasteTransactionItem->total_price = $wasteTransactionItem->price * $wasteTransactionItem->weight;
        });
    }
}
