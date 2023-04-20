<?php

declare(strict_types=1);

namespace App\Presenters\Admin\User;

use App\Http\Requests\Admin\User\UserRequest;
use App\Repositories\User\UserInterface;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class CreatePresenter implements Interfaces\CreatePresenter
{
    private Response $_response;

    private RedirectResponse $_redirectResponse;

    private UserRequest $_request;

    public function setRequest(UserRequest $request): void
    {
        $this->_request = $request;
    }

    public function getRequest(): UserRequest
    {
        return $this->_request;
    }

    public function redirect(string $str): void
    {
        $this->_redirectResponse = redirect($str);
    }

    public function setResponse(array $data): void
    {
        $this->_response = Inertia::render('Admin/User/Form', $data);
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
