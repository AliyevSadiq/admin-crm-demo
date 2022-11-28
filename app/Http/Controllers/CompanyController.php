<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\DTO\CompanyDTO;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Repositories\CompanyRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    private CompanyRepository $repository;

    public function __construct(CompanyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        return $request->ajax()
            ? $this->repository->generateTable($request)
            : view('crm.company.index');
    }

    public function store(CompanyRequest $request)
    {
        $dto = CompanyDTO::fromRequest($request);

        $this->repository->save(new Company(), $dto);

        return response()->json(['success' => 'Company saved successfully.']);
    }

    public function edit(Company $company)
    {
        return response()->json($company);
    }

    public function update(Company $company,CompanyRequest $request)
    {
        $dto = CompanyDTO::fromRequest($request);

        $this->repository->save($company, $dto);

        return response()->json(['success' => 'Company saved successfully.']);
    }


    public function destroy(Company $company)
    {
        $this->repository->delete($company);
        return response()->json(['success'=>'Company deleted successfully.']);
    }

    public function dropDownList()
    {
        return response()->json($this->repository->dropDownList());
    }
}
