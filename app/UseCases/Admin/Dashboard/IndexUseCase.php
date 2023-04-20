<?php

declare(strict_types=1);

namespace App\UseCases\Admin\Dashboard;

use App\Components\SearchQueryComponent;
use App\Presenters\Admin\Dashboard\Interfaces\IndexPresenter as Presenter;
use App\Utils\CommonUtils;

class IndexUseCase
{
    public function __invoke(Presenter $presenter): void
    {
        $presenter->setResponse([
            'data' => [
                'title' => 'ホーム',
            ],
        ]);
    }
}
