<?php

declare(strict_types=1);

namespace App\Presenters\Admin\User\Interfaces;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface CheckMailPresenter
{
    public function setResponse(JsonResponse $data): void;

    public function getRequest(): Request;

    public function setRequest(Request $request): void;

    public function getId(): int;

    public function setId(int $id): void;

    public function render(): JsonResponse;
}
