<?php

declare(strict_types=1);

namespace App\Providers\Admin\Category;

use App\Presenters\Admin\Category;
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
            Category\Interfaces\IndexPresenter::class,
            Category\IndexPresenter::class
        );
        $this->app->singleton(
            Category\Interfaces\CreatePresenter::class,
            Category\CreatePresenter::class
        );
        $this->app->singleton(
            Category\Interfaces\EditPresenter::class,
            Category\EditPresenter::class
        );
        $this->app->singleton(
            Category\Interfaces\DestroyPresenter::class,
            Category\DestroyPresenter::class
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
