<?php

declare(strict_types=1);

namespace App\UseCases\Admin\Category;

use App\Presenters\Admin\Category\Interfaces\CreatePresenter as Presenter;

class CreateUseCase
{
    public function __invoke(Presenter $presenter): void
    {
        $breadcrumbs = [
            ['name' => 'カテゴリ一一覧', 'url' => session()->get('admin.category.index')[0] ?? route('admin.category.index')],
            ['name' => 'カテゴリ一追加'],
        ];
        $presenter->setResponse([
            'breadcrumbs' => $breadcrumbs,
            'data' => [
                'title' => 'カテゴリ一追加',
                'listUrl' => session()->get('admin.category.index')[0] ?? route('admin.category.index'),
            ],
        ]);
    }
}
