<?php

declare(strict_types=1);

namespace App\UseCases\Admin\Category;

use App\Enums\OperationType;
use App\Presenters\Admin\Category\Interfaces\EditPresenter as Presenter;
use App\Repositories\Category\CategoryInterface;
use App\Utils\CommonUtils;

class UpdateUseCase
{
    private CategoryInterface $_category;

    public function __construct(CategoryInterface $category)
    {
        $this->_category = $category;
    }

    public function __invoke(Presenter $presenter): void
    {
        if ($this->_category->update($presenter->getRequest(), $presenter->getId())) {
            CommonUtils::saveOperationLog($presenter->getRequest(), OperationType::UPDATE);
            CommonUtils::setFlash(__('カテゴリが正常に作成されました。'));

            $presenter->redirect(route('admin.category.index'));

            return;
        }
        CommonUtils::setFlash(__('エラーが発生しました。'), 'error');
        $presenter->redirect(route('admin.category.edit', $presenter->getId()));
    }
}
