<?php

declare(strict_types=1);

namespace App\Providers\Admin;

use App\Repositories\Category\CategoryInterface;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Support\ServiceProvider;

/**
 * リポジトリのサービスプロバイダーです。
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CategoryInterface::class, CategoryRepository::class);
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
