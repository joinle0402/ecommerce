<?php
namespace App\Repositories\Interfaces;

use App\Repositories\Interfaces\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface DistrictRepository extends BaseRepository
{
    public function findByProvinceCode(string $provinceCode): Collection;
    public function findByCode(string $code): Model;
}
