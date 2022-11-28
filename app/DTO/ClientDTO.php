<?php

declare(strict_types=1);

namespace App\DTO;

use Illuminate\Http\Request;

class ClientDTO implements InterfaceDTO
{
    private string $full_name;
    private string $company_id;

    public function __construct(string $full_name, string $company_id)
    {
        $this->full_name = $full_name;
        $this->company_id = $company_id;
    }

    public static function fromRequest(Request $request)
    {
        return new static(
            full_name: $request->get('full_name'),
            company_id: $request->get('company_id'),
        );
    }

    public function getFullName(): string
    {
        return $this->full_name;
    }

    public function getCompanyId(): string
    {
        return $this->company_id;
    }


}
