<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Client;
use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Yajra\DataTables\DataTables;

class CompanyRepository implements InterfaceRepository
{

    public function list()
    {
        return Company::with('clients:id,full_name')
            ->paginate(config('app.per_page'));
    }

    public function save(Model $model, $dto)
    {
        $model->setTitle($dto->getTitle())
            ->save();
    }

    public function delete(Model $model)
    {
        $model->delete();
    }

    /**
     * @param Client $client
     * @return LengthAwarePaginator
     */
    public function getCompaniesOfClients(Client $client): LengthAwarePaginator
    {
        return $client->companies()->paginate(config('app.per_page'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function generateTable(Request $request): JsonResponse
    {
        return DataTables::of(Company::query())->addIndexColumn()->addColumn('action', function ($row) {
            $actions = [
                view("crm.components.actions", [
                    'edit_url' => route('crm.companies.edit', $row->id),
                    'update_url' => route('crm.companies.update', $row->id),
                    'delete_url' => route('crm.companies.destroy', $row->id),
                ])
            ];
            return implode(' ', $actions);
        })->rawColumns(['action'])->make(true);

    }


    public function dropDownList()
    {
        return Company::pluck('title','id');
    }
}
