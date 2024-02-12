<?php
namespace App\Repositories\Implementations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Interfaces\BaseRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BaseRepositoryImplementation implements BaseRepository
{
    public function __construct(protected Model $model) {}

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return $this->model->query()->paginate($perPage);
    }

    public function findAll(): Collection
    {
        return $this->model->query()->get();
    }
}
