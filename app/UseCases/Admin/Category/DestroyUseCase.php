<?php

declare(strict_types=1);

namespace App\UseCases\Admin\Category;

use App\Enums\OperationType;
use App\Enums\StatusCode;
use App\Presenters\Admin\Category\Interfaces\DestroyPresenter as Presenter;
use App\Repositories\Category\CategoryInterface;
use App\Utils\CommonUtils;

class DestroyUseCase
{
    private CategoryInterface $_category;

    public function __construct(CategoryInterface $category)
    {
        $this->_category = $category;
    }

    public function __invoke(Presenter $presenter): void
    {
        if ($this->_category->destroy($presenter->getId())) {
            CommonUtils::saveOperationLog($presenter->getRequest(), OperationType::DELETE);
            $presenter->setResponse(response()->json([
                'message' => 'カテゴリを削除しました。',
            ], StatusCode::OK));

            return;
        }

        $presenter->setResponse(response()->json([
            'message' => 'エラーが発生しました。',
        ], StatusCode::INTERNAL_ERR));
    }
}
