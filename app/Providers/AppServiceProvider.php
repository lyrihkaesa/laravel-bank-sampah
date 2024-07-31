<?php

namespace App\Providers;

use Illuminate\Support\Number;
use Illuminate\Support\ServiceProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        FilamentColor::register([
            'danger' => Color::Red,
            'gray' => Color::Zinc,
            // 'primary' => Color::Amber,
            'success' => Color::Green,
            'warning' => Color::Amber,
            'primary' => Color::Blue,
            'pink' => Color::Pink,
            'neutral' => Color::Neutral,
        ]);

        Number::useLocale(config('app.locale'));
    }
}
