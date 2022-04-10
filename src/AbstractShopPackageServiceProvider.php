<?php

namespace Lab3\AbstractShopPackage;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AbstractShopPackageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/abstract-shop-package.php', 'abstract-shop-package');
        $this->publishConfig();
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'abstract-shop-package');
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/lab3/abstract-shop-package'),
            __DIR__ . '/../database/factories' => database_path('factories/'),
            __DIR__ . '/../database/seeders' => database_path('seeders/'),
            __DIR__ . '/../tests/Unit' => base_path('tests/Unit/')
        ]);
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->registerRoutes();
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    /**
    * Get route group configuration array.
    *
    * @return array
    */
    private function routeConfiguration()
    {
        return [
            'namespace'  => "Lab3\AbstractShopPackage\Http\Controllers",
            'middleware' => 'api',
            'prefix'     => 'api'
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register facade
        $this->app->singleton('abstract-shop-package', function () {
            return new AbstractShopPackage;
        });
    }

    /**
     * Publish Config
     *
     * @return void
     */
    public function publishConfig()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/abstract-shop-package.php' => config_path('abstract-shop-package.php'),
            ], 'config');
        }
    }
}
