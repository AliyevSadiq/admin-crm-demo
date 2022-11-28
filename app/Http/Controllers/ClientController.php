<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\DTO\ClientDTO;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Repositories\ClientRepository;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    private ClientRepository $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        return $request->ajax()
            ? $this->repository->generateTable($request)
            : view('crm.client.index');
    }

    public function store(ClientRequest $request)
    {
        $dto = ClientDTO::fromRequest($request);

        $this->repository->save(new Client(), $dto);

        return response()->json(['success' => 'Client saved successfully.']);
    }

    public function edit(Client $client)
    {
        return response()->json($client);
    }

    public function update(Client $client,ClientRequest $request)
    {
        $dto = ClientDTO::fromRequest($request);

        $this->repository->save($client, $dto);

        return response()->json(['success' => 'Client saved successfully.']);
    }


    public function destroy(Client $client)
    {
        $this->repository->delete($client);
        return response()->json(['success'=>'Client deleted successfully.']);
    }
}
