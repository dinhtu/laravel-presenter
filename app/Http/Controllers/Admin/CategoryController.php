<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\Category\IndexRequest;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\ParamIntRequest;
use App\Presenters\Admin\Category\Interfaces\CreatePresenter;
use App\Presenters\Admin\Category\Interfaces\DestroyPresenter;
use App\Presenters\Admin\Category\Interfaces\EditPresenter;
use App\Presenters\Admin\Category\Interfaces\IndexPresenter;
use App\Presenters\Admin\Category\Interfaces\StorePresenter;
use App\UseCases\Admin\Category\CreateUseCase;
use App\UseCases\Admin\Category\DestroyUseCase;
use App\UseCases\Admin\Category\EditUseCase;
use App\UseCases\Admin\Category\IndexUseCase;
use App\UseCases\Admin\Category\StoreUseCase;
use App\UseCases\Admin\Category\UpdateUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

class CategoryController extends BaseController
{
    public function index(
        IndexRequest $request,
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
        StoreRequest $request,
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
        StoreRequest $request,
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
        IndexRequest $request,
        DestroyPresenter $presenter,
        DestroyUseCase $useCase,
    ): JsonResponse {
        $presenter->setRequest($request);
        $presenter->setId($id);
        $useCase($presenter);

        return $presenter->render();
    }
}
