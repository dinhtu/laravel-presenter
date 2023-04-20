<?php

declare(strict_types=1);

namespace App\Providers\Admin\Dashboard;

use App\Presenters\Admin\Dashboard;
use Illuminate\Support\ServiceProvider;

/**
 * プレゼンター登録用のプロバイダーです。
 */
class PresenterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->singleton(
            Dashboard\Interfaces\IndexPresenter::class,
            Dashboard\IndexPresenter::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
