<?php

declare(strict_types=1);

namespace Mortezaa97\Reviews;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Mortezaa97\Reviews\Models\Review;
use Mortezaa97\Reviews\Policies\ReviewPolicy;

class ReviewsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');

        // Register policies
        Gate::policy(Review::class, ReviewPolicy::class);
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('reviews.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../database/migrations' => database_path('migrations'),
            ], 'migrations');

            $this->publishes([
                __DIR__ . '/../database/seeders' => database_path('seeders'),
            ], 'seeders');
        }
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'reviews');
        $this->app->singleton('reviews', function () {
            return new Reviews;
        });
    }
}
