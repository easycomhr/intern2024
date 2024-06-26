<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->resolveModel();
    }

    abstract protected function model();

    protected function resolveModel()
    {
        return app($this->model());
    }

    public function all($columns = ['*']): \Illuminate\Database\Eloquent\Collection
    {
        return $this->model->all($columns);
    }

    public function find($id, $columns = ['*']): ?Model
    {
        return $this->model->find($id, $columns);
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update($id, array $data): ?Model
    {
        $record = $this->find($id);

        if ($record) {
            $record->update($data);
            return $record;
        }

        return false;
    }

    public function delete($id): bool
    {
        $record = $this->find($id);

        if ($record) {
            $record->delete();
            return true;
        }

        return false;
    }

    public function where($column, $operator, $value): \Illuminate\Database\Eloquent\Collection
    {
        return $this->model->where($column, $operator, $value)->get();
    }

    public function limit($limit): static
    {
        $this->model = $this->model->limit($limit);
        return $this;
    }

    public function commit(): void
    {
        DB::commit();
    }

    public function rollback(): void
    {
        DB::rollBack();
    }

    public function startTransaction(): void
    {
        DB::beginTransaction();
    }

}
