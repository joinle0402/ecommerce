<?php
namespace App\Repositories\Implementations;

use App\Models\Province;
use App\Repositories\Interfaces\ProvinceRepository;

class ProvinceRepositoryImplementation extends BaseRepositoryImplementation implements ProvinceRepository
{
    public function __construct(protected Province $province)
    {
        $this->model = $province;
    }
}
