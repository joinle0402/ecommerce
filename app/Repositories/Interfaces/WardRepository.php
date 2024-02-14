<?php
namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Interfaces\BaseRepository;

interface WardRepository extends BaseRepository
{
    public function findByDistrictCode(string $district_code): Collection;
}
