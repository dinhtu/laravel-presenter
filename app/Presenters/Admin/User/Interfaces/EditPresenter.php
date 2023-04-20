<?php

declare(strict_types=1);

namespace App\Presenters\Admin\User\Interfaces;

use App\Http\Requests\Admin\User\UserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

interface EditPresenter
{
    public function getRequest(): UserRequest;

    public function setResponse(array $data): void;

    public function setId(int $id): void;

    public function getId(): int;

    public function setModel(User|null $model): void;

    public function getModel(): User|null;

    public function redirect(string $str): void;

    public function render(): Response;

    public function renderRedirect(): RedirectResponse;
}
