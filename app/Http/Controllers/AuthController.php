<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\DTO\AuthDTO;
use App\Http\Requests\LoginRequest;
use App\Repositories\AuthRepository;

class AuthController extends Controller
{
    private AuthRepository $repository;

    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }

    public function loginForm()
    {
        return view('crm.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $dto = AuthDTO::fromRequest($request);
        return $this->repository->auth($dto);
    }
}
