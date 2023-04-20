<?php

declare(strict_types=1);

namespace App\UseCases\Admin\User;

use App\Presenters\Admin\User\Interfaces\CreatePresenter as Presenter;
use App\Repositories\User\UserInterface;
use App\Utils\CommonUtils;

class StoreUseCase
{
    private UserInterface $_user;

    public function __construct(UserInterface $user)
    {
        $this->_user = $user;
    }

    public function __invoke(Presenter $presenter): void
    {
        if ($this->_user->store($presenter->getRequest())) {
            CommonUtils::saveOperationLog($presenter->getRequest());
            CommonUtils::setFlash(__('代理店の新規作成が完了しました。'));
            $presenter->redirect(route('admin.user.index'));

            return;
        }
        CommonUtils::setFlash(__('エラーが発生しました。'), 'error');
        $presenter->redirect(route('admin.user.create'));
    }
}
