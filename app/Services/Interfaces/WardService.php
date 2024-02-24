<?php
namespace App\Services\Interfaces;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface WardService
{
    public function findByDistrictCode(string $district_code): Collection;
    public function findByCode(string $code): Model;
}
