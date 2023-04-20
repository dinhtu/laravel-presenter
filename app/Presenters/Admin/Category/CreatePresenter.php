<?php

declare(strict_types=1);

namespace App\Presenters\Admin\Category;

use App\Http\Requests\Admin\Category\StoreRequest;
use App\Repositories\Category\CategoryInterface;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class CreatePresenter implements Interfaces\CreatePresenter
{
    private Response $_response;

    private RedirectResponse $_redirectResponse;

    private StoreRequest $_request;

    public function setRequest(StoreRequest $request): void
    {
        $this->_request = $request;
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
