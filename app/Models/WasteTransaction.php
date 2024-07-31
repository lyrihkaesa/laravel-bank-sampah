<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WasteTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'admin_id',
        'total_waste_price',
        'total_organic_price',
        'total_inorganic_price',
        'total_waste_weight',
        'total_organic_weight',
        'total_inorganic_weight',
        'verified_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function wastes(): BelongsToMany
    {
        return $this->belongsToMany(Waste::class, 'waste_transaction_item', 'waste_transaction_id', 'waste_id')
            ->withPivot('weight', 'price', 'total_price')
            ->withTimestamps();
    }

    public function wasteTransactionItems(): HasMany
    {
        return $this->hasMany(WasteTransactionItem::class);
    }

    public function updateTotals()
    {
        $totalWastePrice = 0;
        $totalOrganicPrice = 0;
        $totalInorganicPrice = 0;
        $totalWasteWeight = 0;
        $totalOrganicWeight = 0;
        $totalInorganicWeight = 0;

        foreach ($this->wasteTransactionItems as $item) {
            $totalWastePrice += $item->total_price;
            $totalWasteWeight += $item->weight;

            if ($item->waste->type === \App\Enums\WasteType::ORGANIC) {
                $totalOrganicPrice += $item->total_price;
                $totalOrganicWeight += $item->weight;
            } else if ($item->waste->type === \App\Enums\WasteType::INORGANIC) {
                $totalInorganicPrice += $item->total_price;
                $totalInorganicWeight += $item->weight;
            }
        }

        $this->update([
            'total_waste_price' => $totalWastePrice,
            'total_organic_price' => $totalOrganicPrice,
            'total_inorganic_price' => $totalInorganicPrice,
            'total_waste_weight' => $totalWasteWeight,
            'total_organic_weight' => $totalOrganicWeight,
            'total_inorganic_weight' => $totalInorganicWeight,
        ]);
    }
}
