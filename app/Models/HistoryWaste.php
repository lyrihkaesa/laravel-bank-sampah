<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistoryWaste extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function waste(): BelongsTo
    {
        return $this->belongsTo(Waste::class);
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
