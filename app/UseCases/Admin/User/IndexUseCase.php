<?php

declare(strict_types=1);

namespace App\UseCases\Admin\User;

use App\Components\SearchQueryComponent;
use App\Presenters\Admin\User\Interfaces\IndexPresenter as Presenter;
use App\Repositories\User\UserInterface;
use App\Utils\CommonUtils;

class IndexUseCase
{
    private UserInterface $_user;

    public function __construct(UserInterface $user)
    {
        $this->_user = $user;
    }

    public function __invoke(Presenter $presenter): void
    {
        $breadcrumbs = [
            ['name' => 'ユーザー一覧'],
        ];
        $request = $presenter->getRequest();
        $users = $this->_user->get($request);
        session()->forget('admin.user.index');
        session()->push('admin.user.index', url()->full());
        $presenter->setResponse([
            'breadcrumbs' => $breadcrumbs,
            'data' => [
                'title' => 'ユーザー一覧',
                'createUrl' => route('admin.user.create'),
                'users' => $users->items(),
                'sortLinks' => CommonUtils::sortLinks('admin.user.index', [
                    ['key' => 'id', 'name' => 'ID'],
                    ['key' => 'name', 'name' => 'ユーザー名'],
                    ['key' => 'email', 'name' => 'メール'],
                ], $request),
                'request' => $request->all(),
                'paginator' => CommonUtils::paginator($users->appends(SearchQueryComponent::alterQuery($request))),
            ],
        ]);
    }
}
