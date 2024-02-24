<?php
namespace App\Repositories\Implementations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Interfaces\BaseRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BaseRepositoryImplementation implements BaseRepository
{
    public function __construct(protected Model $model) {}

    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return $this->model->query()->paginate($perPage);
    }

    public function all(): Collection
    {
        return $this->model->query()->get();
    }

    public function create(array $data): Model
    {
        return $this->model->query()->create($data);
    }

    public function deleteByIds(array $ids): mixed
    {
        return $this->model->query()->whereIn('id', $ids)->delete();
    }

    public function deleteById(int $id): mixed
    {
        return $this->model->query()->where('id', $id)->delete();
    }
}
