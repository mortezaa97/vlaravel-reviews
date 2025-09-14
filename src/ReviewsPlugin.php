<?php

declare(strict_types=1);

namespace Mortezaa97\Reviews;

use Filament\Contracts\Plugin;
use Filament\Panel;

class ReviewsPlugin implements Plugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    public function getId(): string
    {
        return 'reviews';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                'ReviewResource' => Filament\Resources\Reviews\ReviewResource::class,
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
