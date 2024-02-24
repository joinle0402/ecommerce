<?php
namespace App\Services\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface DistrictService
{
    public function findByProvinceCode(string $provinceCode): Collection;
    public function findByCode(string $code): Model;
}
