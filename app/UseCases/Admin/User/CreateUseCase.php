<?php

declare(strict_types=1);

namespace App\UseCases\Admin\User;

use App\Presenters\Admin\User\Interfaces\CreatePresenter as Presenter;

class CreateUseCase
{
    public function __invoke(Presenter $presenter): void
    {
        $breadcrumbs = [
            ['name' => 'ユーザー一覧', 'url' => session()->get('admin.user.index')[0] ?? route('admin.user.index')],
            ['name' => 'ユーザー追加'],
        ];
        $presenter->setResponse([
            'breadcrumbs' => $breadcrumbs,
            'data' => [
                'title' => 'ユーザー追加',
                'listUrl' => session()->get('admin.user.index')[0] ?? route('admin.user.index'),
                'checkEmailUrl' => route('admin.user.checkEmail'),
            ],
        ]);
    }
}
