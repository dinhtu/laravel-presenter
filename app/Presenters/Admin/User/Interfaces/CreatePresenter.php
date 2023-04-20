<?php

declare(strict_types=1);

namespace App\Presenters\Admin\User\Interfaces;

use App\Http\Requests\Admin\User\UserRequest;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

interface CreatePresenter
{
    public function getRequest(): UserRequest;

    public function setResponse(array $data): void;

    public function redirect(string $str): void;

    public function render(): Response;

    public function renderRedirect(): RedirectResponse;
}
