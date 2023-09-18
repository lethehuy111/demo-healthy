<?php

namespace App\Http\Controllers\HistoryHealth;

use App\Globals\Constants;
use App\Http\Controllers\Controller;
use App\Http\Resources\HistoryHealth\HistoryHealthHomeResource;
use App\Repositories\Interfaces\HistoryHealthRepositoryInterface;
use Illuminate\Http\JsonResponse;

/**
 *
 */
class HistoryHealthController extends Controller
{
    /**
     * @var HistoryHealthRepositoryInterface
     */
    private $repository;

    /**
     * @param HistoryHealthRepositoryInterface $repository
     */
    public function __construct(HistoryHealthRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $result = $this->repository->index();

        return response()->json([
            'return' => Constants::RESPONSE_SUCCESS,
            'result' => new HistoryHealthHomeResource($result)
                ]
        );
    }
}
