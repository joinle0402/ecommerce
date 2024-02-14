<?php
namespace App\Repositories\Implementations;

use App\Models\District;
use App\Repositories\Interfaces\DistrictRepository;
use Illuminate\Database\Eloquent\Collection;

class DistrictRepositoryImplementation extends BaseRepositoryImplementation implements DistrictRepository
{
    public function __construct(protected District $district)
    {
        $this->model = $district;
    }

    function findByProvinceCode(string $provinceCode): Collection
    {
        return $this->model->query()->where('province_code', $provinceCode)->get();
    }
}
