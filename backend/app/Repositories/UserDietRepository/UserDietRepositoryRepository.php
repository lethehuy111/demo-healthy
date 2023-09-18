<?php

namespace App\Repositories\UserDietRepository;

use App\Models\UserDiet;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\UserDietRepositoryRepositoryInterface;

class UserDietRepositoryRepository extends BaseRepository implements UserDietRepositoryRepositoryInterface
{
    public function __construct(UserDiet $model)
    {
        parent::__construct($model);
    }

    public function getList()
    {

    }
}
