<?php

namespace App\Models;

use App\Enums\WasteType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
