<?php

namespace App\Repositories\Category;

use App\Http\Requests\Admin\Category\IndexRequest;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

interface CategoryInterface
{
    public function get(IndexRequest $request):LengthAwarePaginator;

    public function getById(int $id): Category|null;

    public function store(StoreRequest $request): bool;

    public function update(StoreRequest $request, $id): bool;

    public function destroy(int $id): bool;
}
