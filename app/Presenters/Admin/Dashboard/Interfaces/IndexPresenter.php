<?php

declare(strict_types=1);

namespace App\Presenters\Admin\Dashboard\Interfaces;

use Inertia\Response;

interface IndexPresenter
{
    public function setResponse(array $data): void;

    public function render(): Response;
}
