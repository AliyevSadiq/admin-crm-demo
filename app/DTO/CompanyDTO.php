<?php

declare(strict_types=1);

namespace App\DTO;

use Illuminate\Http\Request;

class CompanyDTO implements InterfaceDTO
{
    private string $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public static function fromRequest(Request $request)
    {
        return new static(
          title: $request->get('title'),
        );
    }

    public function getTitle(): string
    {
       return $this->title;
    }



}
