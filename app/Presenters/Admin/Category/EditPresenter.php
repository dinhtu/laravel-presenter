<?php

declare(strict_types=1);

namespace App\Presenters\Admin\Category;

use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;
use App\Repositories\Category\CategoryInterface;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class EditPresenter implements Interfaces\EditPresenter
{
    private Response $_response;

    private int $_id;

    private Category|null $_model;

    private RedirectResponse $_redirectResponse;

    private StoreRequest $_request;

    public function setRequest(StoreRequest $request): void
    {
        $this->_request = $request;
    }

    public function getId(): int
    {
        return $this->_id;
    }

    public function setId(int $id): void
    {
        $this->_id = $id;
    }

    public function setModel(Category|null $model): void
    {
        $this->_model = $model;
    }

    public function getModel(): Category|null
    {
        return $this->_model;
    }

    public function getRequest(): StoreRequest
    {
        return $this->_request;
    }

    public function redirect(string $str): void
    {
        $this->_redirectResponse = redirect($str);
    }

    public function setResponse(array $data): void
    {
        $this->_response = Inertia::render('Admin/Category/Form', $data);
    }

    public function render(): Response
    {
        return $this->_response;
    }

    public function renderRedirect(): RedirectResponse
    {
        return $this->_redirectResponse;
    }
}
