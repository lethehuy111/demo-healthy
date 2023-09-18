<?php

namespace App\Http\Controllers\DateAchievement;

use App\Globals\Constants;
use App\Http\Controllers\Controller;
use App\Http\Resources\DateAchievement\DateAchievementResource;
use App\Repositories\Interfaces\DietDishDayRepositoryInterface;
use Illuminate\Http\JsonResponse;

class DateAchievementController extends Controller
{
    private $repository;
    public function __construct(DietDishDayRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        $result = $this->repository->getRate();

        return response()->json([
                'return' => Constants::RESPONSE_SUCCESS,
                'result' => new DateAchievementResource($result)
            ]
        );
    }
}
