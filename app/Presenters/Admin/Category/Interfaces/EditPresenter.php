<?php

declare(strict_types=1);

namespace App\Presenters\Admin\Category\Interfaces;

use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

interface EditPresenter
{
    public function getRequest(): StoreRequest;

    public function setResponse(array $data): void;

    public function setId(int $id): void;

    public function getId(): int;

    public function setModel(Category|null $model): void;

    public function getModel(): Category|null;

    public function redirect(string $str): void;

    public function render(): Response;

    public function renderRedirect(): RedirectResponse;
}
