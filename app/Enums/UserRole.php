<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasIcon;

enum UserRole: string implements HasLabel, HasColor, HasIcon
{
    case WARGA = 'warga';
    case ADMIN = 'admin';

    public function getLabel(): string
    {
        return match ($this) {
            self::WARGA => __('Warga'),
            self::ADMIN => __('Admin'),
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::WARGA => 'info',
            self::ADMIN => 'warning',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::WARGA => 'heroicon-m-user',
            self::ADMIN => 'heroicon-m-shield-check',
        };
    }
}
