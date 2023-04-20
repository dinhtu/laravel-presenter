<?php

declare(strict_types=1);

namespace App\Presenters\Admin\User;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DestroyPresenter implements Interfaces\DestroyPresenter
{
    private JsonResponse $_response;

    private Request $_request;

    private int $_id;

    public function setRequest(Request $request): void
    {
        $this->_request = $request;
    }

    public function getRequest(): Request
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
