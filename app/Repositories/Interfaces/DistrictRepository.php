<?php
namespace App\Repositories\Interfaces;

use App\Repositories\Interfaces\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

interface DistrictRepository extends BaseRepository
{
    public function findByProvinceCode(string $provinceCode): Collection;
}
