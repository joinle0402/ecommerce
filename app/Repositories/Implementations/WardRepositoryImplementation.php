<?php
namespace App\Repositories\Implementations;

use App\Models\Ward;
use App\Repositories\Interfaces\WardRepository;
use Illuminate\Database\Eloquent\Collection;

class WardRepositoryImplementation extends BaseRepositoryImplementation implements WardRepository
{
    public function __construct(protected Ward $ward)
    {
        $this->model = $ward;
    }

    function findByDistrictCode(string $district_code): Collection
    {
        return $this->model->query()->where('district_code', $district_code)->get();
    }
}
