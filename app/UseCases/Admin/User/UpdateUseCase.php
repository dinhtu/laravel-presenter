<?php

declare(strict_types=1);

namespace App\UseCases\Admin\User;

use App\Enums\OperationType;
use App\Presenters\Admin\User\Interfaces\EditPresenter as Presenter;
use App\Repositories\User\UserInterface;
use App\Utils\CommonUtils;

class UpdateUseCase
{
    private UserInterface $_user;

    public function __construct(UserInterface $user)
    {
        $this->_user = $user;
    }

    public function __invoke(Presenter $presenter): void
    {
        if ($this->_user->update($presenter->getRequest(), $presenter->getId())) {
            CommonUtils::saveOperationLog($presenter->getRequest(), OperationType::UPDATE);
            CommonUtils::setFlash(__('代理店の新規作成が完了しました。'));

            $presenter->redirect(route('admin.user.index'));

            return;
        }
        CommonUtils::setFlash(__('エラーが発生しました。'), 'error');
        $presenter->redirect(route('admin.user.edit', $presenter->getId()));
    }
}
