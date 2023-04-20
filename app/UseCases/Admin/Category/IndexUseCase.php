<?php

declare(strict_types=1);

namespace App\UseCases\Admin\Category;

use App\Components\SearchQueryComponent;
use App\Presenters\Admin\Category\Interfaces\IndexPresenter as Presenter;
use App\Repositories\Category\CategoryInterface;
use App\Utils\CommonUtils;

class IndexUseCase
{
    private CategoryInterface $_category;

    public function __construct(CategoryInterface $category)
    {
        $this->_category = $category;
    }

    public function __invoke(Presenter $presenter): void
    {
        $breadcrumbs = [
            ['name' => 'カテゴリ一一覧'],
        ];
        $request = $presenter->getRequest();
        $categories = $this->_category->get($request);
        session()->forget('admin.category.index');
        session()->push('admin.category.index', url()->full());
        $presenter->setResponse([
            'breadcrumbs' => $breadcrumbs,
            'data' => [
                'title' => 'カテゴリ一一覧',
                'createUrl' => route('admin.category.create'),
                'categories' => $categories->items(),
                'sortLinks' => CommonUtils::sortLinks('admin.category.index', [
                    ['key' => 'id', 'name' => 'ID'],
                    ['key' => 'name', 'name' => 'ユーザー名'],
                ], $request),
                'request' => $request->all(),
                'paginator' => CommonUtils::paginator($categories->appends(SearchQueryComponent::alterQuery($request))),
            ],
        ]);
    }
}
