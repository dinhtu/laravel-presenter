<?php

declare(strict_types=1);

namespace App\Presenters\Admin\User\Interfaces;

use Illuminate\Http\Request;
use Inertia\Response;

interface IndexPresenter
{
    public function setResponse(array $data): void;

    public function getRequest(): Request;

    public function setRequest(Request $request): void;

    public function render(): Response;
}
