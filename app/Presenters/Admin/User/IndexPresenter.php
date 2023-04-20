<?php

declare(strict_types=1);

namespace App\Presenters\Admin\User;

use App\Http\Requests\Admin\User\IndexRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class IndexPresenter implements Interfaces\IndexPresenter
{
    private Response $_response;

    private Request $_request;

    public function setRequest(Request $request): void
    {
        $this->_request = $request;
    }

    public function getRequest(): Request
    {
        return $this->_request;
    }

    public function setResponse(array $data): void
    {
        $this->_response = Inertia::render('Admin/User/Index', $data);
    }

    public function render(): Response
    {
        return $this->_response;
    }
}
