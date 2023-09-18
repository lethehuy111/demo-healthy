<?php

namespace App\Repositories\Diet;

use App\Models\Diet;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\DietRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class DietRepository extends BaseRepository implements DietRepositoryInterface
{
    public function __construct(Diet $model)
    {
        parent::__construct($model);
    }

    public function getList()
    {
       return $this->model->whereHas('userDiets', function ($query) {
           $query->where('user_id', auth()->user()->id);
       })->where('status', Diet::STATUS_ACTIVE)->get();
    }
}
