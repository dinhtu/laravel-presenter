<?php

declare(strict_types=1);

namespace App\Presenters\Admin\Dashboard;

use Inertia\Inertia;
use Inertia\Response;

class IndexPresenter implements Interfaces\IndexPresenter
{
    private Response $_response;

    public function setResponse(array $data): void
    {
        $this->_response = Inertia::render('Admin/Dashboard/Index', $data);
    }

    public function render(): Response
    {
        return $this->_response;
    }
}
