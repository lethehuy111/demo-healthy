<?php

namespace App\Http\Controllers\New;

use App\Globals\Constants;
use App\Http\Controllers\Controller;
use App\Http\Resources\New\NewResource;
use App\Http\Resources\Pagination\PaginationResource;
use App\Repositories\Interfaces\NewRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NewController extends Controller
{
    private $repository;

    public function __construct(NewRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request): JsonResponse
    {
        $page = $request->get('page', 1);
        $result = $this->repository->getList((int)$page);

        return response()->json([
            'return' => Constants::RESPONSE_SUCCESS,
            'result' => NewResource::collection($result->items()),
            'pagination' => new PaginationResource($result)
        ]);
    }
}
