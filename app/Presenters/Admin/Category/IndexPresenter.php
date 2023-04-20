<?php

declare(strict_types=1);

namespace App\Presenters\Admin\Category;

use App\Http\Requests\Admin\Category\IndexRequest;
use App\Repositories\Category\CategoryInterface;
use Inertia\Inertia;
use Inertia\Response;

class IndexPresenter implements Interfaces\IndexPresenter
{
    private Response $_response;

    private IndexRequest $_request;

    public function setRequest(IndexRequest $request): void
    {
        $this->_request = $request;
    }

    public function getRequest(): IndexRequest
    {
        return $this->_request;
    }

    public function getRequestParams(): array
    {
        return [
        ];
    }

    public function setResponse(array $data): void
    {
        $this->_response = Inertia::render('Admin/Category/Index', $data);
    }

    public function render(): Response
    {
        return $this->_response;
    }
}
