<?php
namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface WardRepository extends BaseRepository
{
    public function findByDistrictCode(string $district_code): Collection;
    public function findByCode(string $code): Model;
}
