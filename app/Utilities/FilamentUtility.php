<?php

namespace App\Utilities;

class FilamentUtility
{
    public function __construct()
    {
        //
    }

    public static function getNavigationSort(string $label): ?int
    {
        $navigationSort = [
            1 => __('Profile'),
            2 => __('Waste'),
            3 => __('User'),
            4 => __('History Waste'),
        ];

        $key = array_search($label, $navigationSort);

        return $key !== false ? $key : null;
    }
}
