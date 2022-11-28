<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Repositories\ClientRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private ClientRepository $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Company $company
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(Company $company): LengthAwarePaginator
    {
        return $this->repository->getClientsOfCompanies($company);
    }
}
