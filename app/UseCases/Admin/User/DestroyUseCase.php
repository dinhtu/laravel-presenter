<?php

declare(strict_types=1);

namespace App\UseCases\Admin\User;

use App\Enums\OperationType;
use App\Enums\StatusCode;
use App\Presenters\Admin\User\Interfaces\DestroyPresenter as Presenter;
use App\Repositories\User\UserInterface;
use App\Utils\CommonUtils;

class DestroyUseCase
{
    private UserInterface $_user;

    public function __construct(UserInterface $user)
    {
        $this->_user = $user;
    }

    public function __invoke(Presenter $presenter): void
    {
        if ($this->_user->destroy($presenter->getId())) {
            CommonUtils::saveOperationLog($presenter->getRequest(), OperationType::DELETE);
            $presenter->setResponse(response()->json([
                'message' => '管理者アカウントの削除が完了しました。',
            ], StatusCode::OK));

            return;
        }

        $presenter->setResponse(response()->json([
            'message' => 'エラーが発生しました。',
        ], StatusCode::INTERNAL_ERR));
    }
}
