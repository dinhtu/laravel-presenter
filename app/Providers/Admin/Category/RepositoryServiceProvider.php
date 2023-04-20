<?php

declare(strict_types=1);

namespace App\Providers\Admin\Category;

use App\Repositories\Category\CategoryInterface;
use App\Repositories\Category\CategoryRepository;
// use App\Repositories\Admin\Category\Create as CategoryCreate;
// use App\Repositories\Admin\Category\Edit as CategoryUpdate;
// use App\Repositories\Admin\Category\History as CategoryHistory;
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
        // 一覧画面表示
        $this->app->singleton(CategoryInterface::class, CategoryRepository::class);

        // // 削除
        // $this->app->singleton(
        //     Category\Interfaces\DeleteRepository::class,
        //     Category\DeleteRepository::class
        // );

        // // 履歴一覧画面
        // $this->app->singleton(
        //     CategoryHistory\Interfaces\IndexRepository::class,
        //     CategoryHistory\IndexRepository::class
        // );

        // // 履歴詳細画面
        // $this->app->singleton(
        //     CategoryHistory\Interfaces\DetailRepository::class,
        //     CategoryHistory\DetailRepository::class
        // );

        // // 新規追加
        // $this->app->singleton(
        //     CategoryCreate\Interfaces\CreateRepository::class,
        //     CategoryCreate\CreateRepository::class
        // );

        // // 編集画面表示
        // $this->app->singleton(
        //     CategoryUpdate\Interfaces\IndexRepository::class,
        //     CategoryUpdate\IndexRepository::class
        // );

        // // 編集
        // $this->app->singleton(
        //     CategoryUpdate\Interfaces\EditRepository::class,
        //     CategoryUpdate\EditRepository::class
        // );
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
