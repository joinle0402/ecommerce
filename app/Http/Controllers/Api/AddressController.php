<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\DistrictService;
use App\Services\Interfaces\WardService;
use Illuminate\Database\Eloquent\Collection;

class AddressController extends Controller
{
    public function __construct(
        protected DistrictService $districtService,
        protected WardService $wardService,
    ) {}

    public function findDistrictsByProvinceCode(string $province_code): Collection
    {
        return $this->districtService->findByProvinceCode($province_code);
    }

    public function findWardsByDistrictCode(string $district_code): Collection
    {
        return $this->wardService->findByDistrictCode($district_code);
    }
}
