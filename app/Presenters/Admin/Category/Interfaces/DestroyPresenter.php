<?php

declare(strict_types=1);

namespace App\Presenters\Admin\Category\Interfaces;

use App\Http\Requests\Admin\Category\IndexRequest;
use Illuminate\Http\JsonResponse;

interface DestroyPresenter
{
    public function setResponse(JsonResponse $data): void;

    public function getRequest(): IndexRequest;

    public function getId(): int;

    public function setId(int $id): void;

    public function render(): JsonResponse;
}
