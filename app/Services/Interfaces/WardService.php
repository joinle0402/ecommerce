<?php
namespace App\Services\Interfaces;
use Illuminate\Database\Eloquent\Collection;

interface WardService
{
    public function findByDistrictCode(string $district_code): Collection;
}
