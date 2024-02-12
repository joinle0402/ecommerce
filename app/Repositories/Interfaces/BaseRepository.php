<?php
namespace App\Repositories\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface BaseRepository
{
    public function paginate(int $perPage = 15): LengthAwarePaginator;
    public function findAll(): Collection;
}
