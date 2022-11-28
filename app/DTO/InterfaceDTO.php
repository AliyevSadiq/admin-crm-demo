<?php

declare(strict_types=1);

namespace App\DTO;

use Illuminate\Http\Request;

interface InterfaceDTO
{
    public static function fromRequest(Request $request);

}
