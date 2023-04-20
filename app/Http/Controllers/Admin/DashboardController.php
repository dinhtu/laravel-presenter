<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Presenters\Admin\Dashboard\Interfaces\IndexPresenter;
use App\UseCases\Admin\Dashboard\IndexUseCase;
use Inertia\Response;

class DashboardController extends BaseController
{
    public function index(
        IndexPresenter $presenter,
        IndexUseCase $useCase,
    ): Response {
        $useCase($presenter);

        return $presenter->render();
    }
}
