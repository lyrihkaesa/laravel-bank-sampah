<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasIcon;

enum WasteType: string implements HasLabel, HasColor, HasIcon
{
    case ORGANIC = 'organic';
    case INORGANIC = 'inorganic';

    public function getLabel(): string
    {
        return match ($this) {
            self::ORGANIC => __('Organic'),
            self::INORGANIC => __('Inorganic'),
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::ORGANIC => 'success',
            self::INORGANIC => 'danger',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::ORGANIC => 'icon-organic',
            self::INORGANIC => 'icon-inorganic',
        };
    }
}
