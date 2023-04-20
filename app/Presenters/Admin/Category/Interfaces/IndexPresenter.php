<?php

declare(strict_types=1);

namespace App\Presenters\Admin\Category\Interfaces;

use App\Http\Requests\Admin\Category\IndexRequest;
use Inertia\Response;

interface IndexPresenter
{
    public function setResponse(array $data): void;

    public function getRequest(): IndexRequest;

    public function render(): Response;
}
