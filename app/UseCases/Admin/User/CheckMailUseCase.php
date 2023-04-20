<?php

declare(strict_types=1);

namespace App\UseCases\Admin\User;

use App\Enums\OperationType;
use App\Enums\StatusCode;
use App\Presenters\Admin\User\Interfaces\CheckMailPresenter as Presenter;
use App\Repositories\User\UserInterface;
use App\Utils\CommonUtils;

class CheckMailUseCase
{
    private UserInterface $_user;

    public function __construct(UserInterface $user)
    {
        $this->_user = $user;
    }

    public function __invoke(Presenter $presenter): void
    {
        $presenter->setResponse(response()->json([
            'valid' => $this->_user->checkEmail($presenter->getRequest()),
        ], StatusCode::OK));
    }
}
