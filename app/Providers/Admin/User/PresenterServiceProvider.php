<?php

declare(strict_types=1);

namespace App\Providers\Admin\User;

use App\Presenters\Admin\User;
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
            User\Interfaces\IndexPresenter::class,
            User\IndexPresenter::class
        );
        $this->app->singleton(
            User\Interfaces\CreatePresenter::class,
            User\CreatePresenter::class
        );
        $this->app->singleton(
            User\Interfaces\EditPresenter::class,
            User\EditPresenter::class
        );
        $this->app->singleton(
            User\Interfaces\DestroyPresenter::class,
            User\DestroyPresenter::class
        );
        $this->app->singleton(
            User\Interfaces\CheckMailPresenter::class,
            User\CheckMailPresenter::class
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
