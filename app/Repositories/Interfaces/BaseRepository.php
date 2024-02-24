<?php
namespace App\Repositories\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepository
{
    public function paginate(int $perPage = 10): LengthAwarePaginator;
    public function all(): Collection;
    public function create(array $data): Model;
    public function deleteByIds(array $ids): mixed;
    public function deleteById(int $id): mixed;
}
