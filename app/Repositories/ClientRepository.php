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

class ClientRepository implements InterfaceRepository
{
    public function list()
    {
        return Client::paginate(config('app.per_page'));
    }

    public function save(Model $model,  $dto)
    {
        $model->setFullName($dto->getFullName())->save();

        $company=Company::find($dto->getCompanyId());

        $company->clients()->attach($model);
    }

    public function delete(Model $model)
    {
        $model->delete();
    }

    /**
     * @param Company $company
     * @return LengthAwarePaginator
     */
    public function getClientsOfCompanies(Company $company): LengthAwarePaginator
    {
        return $company->clients()->paginate(config('app.per_page'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function generateTable(Request $request): JsonResponse
    {
        return DataTables::of(Client::query())->addIndexColumn()->addColumn('action', function ($row) {
            $actions = [
                view("crm.components.actions", [
                    'edit_url' => route('crm.clients.edit', $row->id),
                    'update_url' => route('crm.clients.update', $row->id),
                    'delete_url' => route('crm.clients.destroy', $row->id),
                ])
            ];
            return implode(' ', $actions);
        })->rawColumns(['action'])->make(true);

    }
}
