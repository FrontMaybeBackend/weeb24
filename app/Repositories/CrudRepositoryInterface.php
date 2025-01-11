<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface CrudRepositoryInterface
{
    public function all();

    public function find(int $id): ?Model;

    public function create(array $data): Model;

    public function update(int $id, array $data): Model|bool;

    public function delete(int $id);

}
