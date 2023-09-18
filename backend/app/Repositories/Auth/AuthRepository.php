<?php

namespace App\Repositories\Auth;

use App\Exceptions\BusinessException;
use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 */
class AuthRepository extends BaseRepository implements AuthRepositoryInterface
{
    /**
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * @param array $params
     * @return User
     * @throws BusinessException
     */
    public function login(array $params) : User
    {
        $token = auth()->attempt($params);
        if (!$token) {
            throw new BusinessException('Invalid info login', Response::HTTP_UNAUTHORIZED);
        }
        $user = auth()->user();
        $user->token = $token;

        return $user;
    }

    /**
     * @return void
     */
    public function logout(): void
    {
        auth()->logout();
    }
}
