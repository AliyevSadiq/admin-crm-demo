<?php

declare(strict_types=1);

namespace App\DTO;

use Illuminate\Http\Request;

class AuthDTO implements InterfaceDTO
{
    private string $email;
    private string $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public static function fromRequest(Request $request)
    {
        return new static(
          email: $request->get('email'),
          password: $request->get('password'),
        );
    }

    public function getEmail(): string
    {
       return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
