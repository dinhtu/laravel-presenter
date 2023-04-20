<?php

declare(strict_types=1);

namespace App\Presenters\Admin\Category;

use App\Http\Requests\Admin\Category\IndexRequest;
use Illuminate\Http\JsonResponse;

class DestroyPresenter implements Interfaces\DestroyPresenter
{
    private JsonResponse $_response;

    private IndexRequest $_request;

    private int $_id;

    public function setRequest(IndexRequest $request): void
    {
        $this->_request = $request;
    }

    public function getRequest(): IndexRequest
    {
        return $this->_request;
    }

    public function setId(int $id): void
    {
        $this->_id = $id;
    }

    public function getId(): int
    {
        return $this->_id;
    }

    public function setResponse(JsonResponse $data): void
    {
        $this->_response = $data;
    }

    public function render(): JsonResponse
    {
        return $this->_response;
    }
}
