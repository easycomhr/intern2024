<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface RepositoryInterface
{
    public function all($columns = ['*']): Collection;

    public function find($id, $columns = ['*']): ?Model;

    public function create(array $data): Model;

    public function update($id, array $data): ?Model;

    public function delete($id): bool;

    public function where($column, $operator, $value): Collection;

    public function limit($limit);

    public function commit();

    public function rollback();

    public function startTransaction();
}
