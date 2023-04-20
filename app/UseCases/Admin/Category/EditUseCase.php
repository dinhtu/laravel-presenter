<?php

declare(strict_types=1);

namespace App\UseCases\Admin\Category;

use App\Presenters\Admin\Category\Interfaces\EditPresenter as Presenter;
use App\Repositories\Category\CategoryInterface;
use App\Utils\CommonUtils;

class EditUseCase
{
    private CategoryInterface $_category;

    public function __construct(CategoryInterface $category)
    {
        $this->_category = $category;
    }

    public function __invoke(Presenter $presenter): void
    {
        $breadcrumbs = [
            ['name' => 'カテゴリ一一覧', 'url' => session()->get('admin.category.index')[0] ?? route('admin.category.index')],
            ['name' => 'カテゴリ一編集'],
        ];
        $category = $this->_category->getById($presenter->getId());
        $presenter->setModel($category);
        if (! $category) {
            CommonUtils::setFlash(__('エラーが発生しました。'), 'error');
            $presenter->redirect(route('admin.category.index'));

            return;
        }
        $presenter->setResponse([
            'breadcrumbs' => $breadcrumbs,
            'data' => [
                'title' => 'カテゴリ一編集',
                'listUrl' => session()->get('admin.category.index')[0] ?? route('admin.category.index'),
                'isEdit' => true,
                'category' => $category,
            ],
        ]);
    }
}
