<?php

namespace App\Http\Controllers\DietDay;

use App\Globals\Constants;
use App\Http\Controllers\Controller;
use App\Http\Resources\DietDishDay\DietDisDayResource;
use App\Http\Resources\Pagination\PaginationResource;
use App\Repositories\Interfaces\DietDishDayRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DietDishDayController extends Controller
{
    private $repository;
    public function __construct(DietDishDayRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request):JsonResponse
    {
        $page = $request->get('page' , 1);
        $records = $this->repository->getList((int) $page);
        return response()->json([
            'return' => Constants::RESPONSE_SUCCESS,
            'result' => DietDisDayResource::collection($records->items()),
            'pagination' => new PaginationResource($records)
        ]);
    }
}
