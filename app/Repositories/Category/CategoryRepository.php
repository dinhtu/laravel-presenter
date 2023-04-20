<?php

namespace App\Repositories\Category;

use App\Components\CommonComponent;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\Category\IndexRequest;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;
use App\Repositories\Category\CategoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class CategoryRepository extends BaseController implements CategoryInterface
{
    private Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function get(IndexRequest $request): LengthAwarePaginator
    {
        $newSizeLimit = CommonComponent::newListLimit($request);
        $categoryBuilder = $this->category;
        if (isset($request['free_word']) && $request['free_word'] != '') {
            $categoryBuilder = $categoryBuilder->where(function ($q) use ($request) {
                $q->orWhere(CommonComponent::escapeLikeSentence('name', $request['free_word']));
            });
        }
        $categories = $categoryBuilder->sortable(['updated_at' => 'desc'])->paginate($newSizeLimit);
        if (CommonComponent::checkPaginatorList($categories)) {
            Paginator::currentPageResolver(function () {
                return 1;
            });
            $categories = $categoryBuilder->paginate($newSizeLimit);
        }

        return $categories;
    }

    public function getById(int $id): Category|null
    {
        return $this->category->where('id', $id)->first();
    }

    public function store(StoreRequest $request): bool
    {
        $category = new $this->category();
        $category->name = $request->name;

        return $category->save();
    }

    public function update(StoreRequest $request, $id): bool
    {
        $category = $this->getById($id);
        if (! $category) {
            return false;
        }
        $category->name = $request->name;

        return $category->save();
    }

    public function destroy(int $id): bool
    {
        $category = $this->getById($id);
        if (! $category) {
            return false;
        }

        return $category->delete();
    }
}
