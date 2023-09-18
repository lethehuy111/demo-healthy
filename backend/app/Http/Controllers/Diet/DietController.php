<?php

namespace App\Http\Controllers\Diet;

use App\Globals\Constants;
use App\Http\Controllers\Controller;
use App\Http\Resources\Diet\DietResource;
use App\Repositories\Interfaces\DietRepositoryInterface;
use Illuminate\Http\JsonResponse;

/**
 *
 */
class DietController extends Controller
{
    /**
     * @var DietRepositoryInterface
     */
    private DietRepositoryInterface $repository;

    /**
     * @param DietRepositoryInterface $repository
     */
    public function __construct(DietRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $result = $this->repository->getList();

        return response()->json([
            'return' => Constants::RESPONSE_SUCCESS,
            'result' => DietResource::collection($result)
        ]);
    }
}
