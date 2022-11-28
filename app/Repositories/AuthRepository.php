<?php

declare(strict_types=1);

namespace App\Repositories;

use App\DTO\AuthDTO;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthRepository
{
    public function getToken(AuthDTO $dto)
    {
        if(!$this->checkAuth($dto)){
            return response()->json([
                'status' => false,
                'message' => 'Email & Password does not match with our record.',
            ], 401);
        }

        $user = User::where('email', $dto->getEmail())->first();

        return response()->json([
            'status' => true,
            'message' => 'User Logged In Successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);
    }


    public function auth(AuthDTO $dto)
    {
        return $this->checkAuth($dto)
            ? redirect()->route('crm.companies.index')
            : redirect()->route('crm.login')->withErrors([
                'invalid_auth'=>'Email or password is invalid'
            ]);

    }


    private function checkAuth(AuthDTO $dto): bool
    {
        return Auth::attempt(['email'=>$dto->getEmail(),'password'=>$dto->getPassword()]);
    }
}
