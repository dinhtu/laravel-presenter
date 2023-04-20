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
    // public function index(Request $request)
    // {
    //     $users = $this->user->get($request);
    //     $breadcrumbs = [
    //         ['name' => 'ユーザー一覧'],
    //     ];

    //     return Inertia::render('Admin/User/Index', [
    //         'breadcrumbs' => $breadcrumbs,
    //         'data' => [
    //             'title' => 'ユーザー一覧',
    //             'createUrl' => route('admin.user.create'),
    //             'users' => $users->items(),
    //             'sortLinks' => $this->sortLinks('admin.user.index', [
    //                 ['key' => 'id', 'name' => 'ID'],
    //                 ['key' => 'name', 'name' => 'ユーザー名'],
    //                 ['key' => 'email', 'name' => 'メール'],
    //             ], $request),
    //             'request' => $request->all(),
    //             'paginator' => $this->paginator($users->appends(SearchQueryComponent::alterQuery($request))),
    //         ],
    //     ]);
    // }

    public function create(
        CreatePresenter $presenter,
        CreateUseCase $useCase,
    ): Response {
        $useCase($presenter);

        return $presenter->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $breadcrumbs = [
    //         ['name' => 'ユーザー一覧', 'url' => route('admin.user.index')],
    //         ['name' => 'ユーザー追加'],
    //     ];

    //     return Inertia::render('Admin/User/Form', [
    //         'breadcrumbs' => $breadcrumbs,
    //         'data' => [
    //             'title' => 'ユーザー追加',
    //             'listUrl' => route('admin.user.index'),
    //             'checkEmailUrl' => route('admin.user.checkEmail'),
    //         ],
    //     ]);
    // }

    public function store(
        UserRequest $request,
        CreatePresenter $presenter,
        StoreUseCase $useCase,
    ): RedirectResponse {
        $presenter->setRequest($request);
        $useCase($presenter);

        return $presenter->renderRedirect();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(UserRequest $request)
    // {
    //     if ($this->user->store($request)) {
    //         $this->saveOperationLog($request);
    //         $this->setFlash(__('代理店の新規作成が完了しました。'));

    //         return redirect()->route('admin.user.index');
    //     }
    //     $this->setFlash(__('エラーが発生しました。'), 'error');

    //     return redirect()->route('admin.user.create');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $user = $this->user->getById($id);
    //     if (! $user) {
    //         return redirect()->route('admin.user.index');
    //     }
    //     $breadcrumbs = [
    //         ['name' => 'ユーザー一覧', 'url' => route('admin.user.index')],
    //         ['name' => 'ユーザー編集'],
    //     ];

    //     return Inertia::render('Admin/User/Form', [
    //         'breadcrumbs' => $breadcrumbs,
    //         'data' => [
    //             'title' => 'ユーザー編集',
    //             'listUrl' => route('admin.user.index'),
    //             'isEdit' => true,
    //             'user' => $user,
    //             'checkEmailUrl' => route('admin.user.checkEmail'),
    //         ],
    //     ]);
    // }

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(UserRequest $request, $id)
    // {
    //     if ($this->user->update($request, $id)) {
    //         $this->saveOperationLog($request, OperationType::UPDATE);
    //         $this->setFlash(__('代理店の新規作成が完了しました。'));

    //         return redirect()->route('admin.user.index');
    //     }
    //     $this->setFlash(__('エラーが発生しました。'), 'error');

    //     return redirect()->route('admin.user.edit', $id);
    // }

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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Request $request, $id)
    // {
    //     if ($this->user->destroy($id)) {
    //         $this->saveOperationLog($request, OperationType::DELETE);

    //         return response()->json([
    //             'message' => '管理者アカウントの削除が完了しました。',
    //         ], StatusCode::OK);
    //     }

    //     return response()->json([
    //         'message' => 'エラーが発生しました。',
    //     ], StatusCode::INTERNAL_ERR);
    // }
    public function checkEmail(
        Request $request,
        CheckMailPresenter $presenter,
        CheckMailUseCase $useCase,
    ): JsonResponse {
        $presenter->setRequest($request);
        $useCase($presenter);

        return $presenter->render();
    }
    // public function checkEmail(Request $request)
    // {
    //     return response()->json([
    //         'valid' => $this->user->checkEmail($request),
    //     ], StatusCode::OK);
    // }
}
