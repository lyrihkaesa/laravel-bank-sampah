<?php

namespace App\Models;

use App\Enums\WasteType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Waste extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        'price',
        'thumbnail',
    ];

    protected function casts(): array
    {
        return [
            'type' => WasteType::class,
        ];
    }

    public function histories(): HasMany
    {
        return $this->hasMany(HistoryWaste::class);
    }

    public function transactions(): BelongsToMany
    {
        return $this->belongsToMany(WasteTransaction::class, 'waste_transaction_item', 'waste_id', 'waste_transaction_id')
            ->withPivot('weight', 'price', 'total_price')
            ->withTimestamps();
    }
}
