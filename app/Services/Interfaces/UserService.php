<?php
namespace App\Services\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

interface UserService
{
    public function paginate(int $perPage = 15, array $conditions = []): LengthAwarePaginator;
    public function create(array $data): Model;
    public function deleteById(int $id): mixed;
    public function deleteByIds(array $ids): mixed;
}
