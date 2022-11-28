<?php
declare(strict_types=1);

namespace App\Repositories;

use App\DTO\InterfaceDTO;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface InterfaceRepository
{
    public function list();
    public function save(Model $model,  $dto);
    public function delete(Model $model);

    public function generateTable(Request $request);
}
