<?php

namespace App\Http\Controllers\Admin;

use App\Components\SearchQueryComponent;
use App\Enums\OperationType;
use App\Enums\StatusCode;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\User\UserRequest;
use App\Presenters\Admin\User\Interfaces\CheckMailPresenter;
use App\Presenters\Admin\User\Interfaces\CreatePresenter;
use App\Presenters\Admin\User\Interfaces\DestroyPresenter;
use App\Presenters\Admin\User\Interfaces\EditPresenter;
use App\Presenters\Admin\User\Interfaces\IndexPresenter;
use App\Repositories\User\UserInterface;
use App\UseCases\Admin\User\CheckMailUseCase;
use App\UseCases\Admin\User\CreateUseCase;
use App\UseCases\Admin\User\DestroyUseCase;
use App\UseCases\Admin\User\EditUseCase;
use App\UseCases\Admin\User\IndexUseCase;
use App\UseCases\Admin\User\StoreUseCase;
use App\UseCases\Admin\User\UpdateUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends BaseController
{
    public function index(
        Request $request,
        IndexPresenter $presenter,
        IndexUseCase $useCase,
    ): Response {
        $presenter->setRequest($request);
        $useCase($presenter);

        return $presenter->render();
    }

    public function create(
        CreatePresenter $presenter,
        CreateUseCase $useCase,
    ): Response {
        $useCase($presenter);

        return $presenter->render();
    }

    public function store(
        UserRequest $request,
        CreatePresenter $presenter,
        StoreUseCase $useCase,
    ): RedirectResponse {
        $presenter->setRequest($request);
        $useCase($presenter);

        return $presenter->renderRedirect();
    }

    public function edit(
        int $id,
        EditPresenter $presenter,
        EditUseCase $useCase,
    ): Response|RedirectResponse {
        $presenter->setId($id);
        $useCase($presenter);
        if (! $presenter->getModel()) {
            return $presenter->renderRedirect();
        }

        return $presenter->render();
    }

    public function update(
        int $id,
        UserRequest $request,
        EditPresenter $presenter,
        UpdateUseCase $useCase,
    ): RedirectResponse {
        $presenter->setRequest($request);
        $presenter->setId($id);
        $useCase($presenter);

        return $presenter->renderRedirect();
    }

    public function destroy(
        int $id,
        Request $request,
        DestroyPresenter $presenter,
        DestroyUseCase $useCase,
    ): JsonResponse {
        $presenter->setRequest($request);
        $presenter->setId($id);
        $useCase($presenter);

        return $presenter->render();
    }
    public function checkEmail(
        Request $request,
        CheckMailPresenter $presenter,
        CheckMailUseCase $useCase,
    ): JsonResponse {
        $presenter->setRequest($request);
        $useCase($presenter);

        return $presenter->render();
    }
}
