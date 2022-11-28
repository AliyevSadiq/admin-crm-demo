<?php

namespace App\Http\Controllers\Api;

use App\DTO\AuthDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Repositories\AuthRepository;


class AuthController extends Controller
{

    private AuthRepository $repository;

    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }

    public function login(LoginRequest $request)
    {
        $dto=AuthDTO::fromRequest($request);
        return $this->repository->getToken($dto);
    }
}
