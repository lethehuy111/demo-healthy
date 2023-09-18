<?php

namespace App\Repositories\Interfaces;

interface DietDishDayRepositoryInterface
{
    public function getRate();
    public function getList(int $page);
}
