<?php

declare(strict_types=1);

namespace App\UseCases\Admin\User;

use App\Presenters\Admin\User\Interfaces\EditPresenter as Presenter;
use App\Repositories\User\UserInterface;
use App\Utils\CommonUtils;

class EditUseCase
{
    private UserInterface $_user;

    public function __construct(UserInterface $user)
    {
        $this->_user = $user;
    }

    public function __invoke(Presenter $presenter): void
    {
        $breadcrumbs = [
            ['name' => 'ユーザー一覧', 'url' => session()->get('admin.user.index')[0] ?? route('admin.user.index')],
            ['name' => 'ユーザー編集'],
        ];
        $user = $this->_user->getById($presenter->getId());
        $presenter->setModel($user);
        if (! $user) {
            CommonUtils::setFlash(__('エラーが発生しました。'), 'error');
            $presenter->redirect(route('admin.user.index'));

            return;
        }
        $presenter->setResponse([
            'breadcrumbs' => $breadcrumbs,
            'data' => [
                'title' => 'ユーザー編集',
                'listUrl' => session()->get('admin.user.index')[0] ?? route('admin.user.index'),
                'isEdit' => true,
                'user' => $user,
                'checkEmailUrl' => route('admin.user.checkEmail'),
            ],
        ]);
    }
}
