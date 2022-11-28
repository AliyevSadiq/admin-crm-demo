<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CompanyController extends Controller
{
    private CompanyRepository $repository;

    public function __construct(CompanyRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function index(): mixed
    {
        return $this->repository->list();
    }

    /**
     * @param Client $client
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function clientCompanies(Client $client): LengthAwarePaginator
    {
        return $this->repository->getCompaniesOfClients($client);
    }
}
