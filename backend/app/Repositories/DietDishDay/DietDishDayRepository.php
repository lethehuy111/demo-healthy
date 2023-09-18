<?php

namespace App\Repositories\DietDishDay;

use App\Globals\Constants;
use App\Models\DietDishDay;
use App\Models\Dish;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\DietDishDayRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class DietDishDayRepository extends BaseRepository implements DietDishDayRepositoryInterface
{
    /**
     * @param DietDishDay $model
     */
    public function __construct(DietDishDay $model)
    {
        parent::__construct($model);
    }

    /**
     * @return array
     */
    public function getRate(): array
    {
        $now = date('Y-m-d');
        $dateFormat = date('d/m');
        $query = $this->model->wherehas('userDiet', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->where('date', '>=', $now . Constants::HOUR_START_DAY)
            ->where('date', '<=', $now . Constants::HOUR_END_DAY);

        $dietDishDays = $query->count();
        if (!$dietDishDays) {
            return [
                'rate' => 0,
                'day' => $dateFormat
            ];
        }
        $dietDishDone = $query->where('status', DietDishDay::STATUS_DONE)->count();

        return [
            'rate' => round(($dietDishDone / $dietDishDays) * 100),
            'day' => $dateFormat
        ];
    }

    public function getList(int $page) :mixed
    {
        return $this->model->with(['userDiet' => function($query) {
            $query->with('diet');
        }, 'dish'])->wherehas('userDiet', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->whereHas('dish', function ($query) {
            $query->where('role', Dish::ROLE_PARENT);
        })->paginate(Constants::PER_PAGE, $columns = ['*'], $pageName = 'diet_dish_days', $page);
    }
}
