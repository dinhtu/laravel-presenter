<?php

declare(strict_types=1);

namespace App\Presenters\Admin\User;

use App\Http\Requests\Admin\User\UserRequest;
use App\Models\User;
use App\Repositories\User\UserInterface;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class EditPresenter implements Interfaces\EditPresenter
{
    private Response $_response;

    private int $_id;

    private User|null $_model;

    private RedirectResponse $_redirectResponse;

    private UserRequest $_request;

    public function setRequest(UserRequest $request): void
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

    public function setModel(User|null $model): void
    {
        $this->_model = $model;
    }

    public function getModel(): User|null
    {
        return $this->_model;
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
