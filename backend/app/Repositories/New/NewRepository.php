<?php

namespace App\Repositories\New;

use App\Globals\Constants;
use App\Models\News;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\NewRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 *
 */
class NewRepository extends BaseRepository implements NewRepositoryInterface
{
    /**
     * @param News $model
     */
    public function __construct(News $model)
    {
        parent::__construct($model);
    }

    /**
     * @param int $page
     * @return LengthAwarePaginator
     */
    public function getList(int $page): LengthAwarePaginator
    {
        return $this->model->with('tags')
            ->paginate(Constants::PER_PAGE, $columns = ['*'], $pageName = 'news', $page);
    }
}
