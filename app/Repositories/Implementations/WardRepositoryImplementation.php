<?php
namespace App\Repositories\Implementations;

use App\Models\Ward;
use App\Repositories\Interfaces\WardRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class WardRepositoryImplementation extends BaseRepositoryImplementation implements WardRepository
{
    public function __construct(protected Ward $ward)
    {
        parent::__construct($ward);
    }

    public function findByDistrictCode(string $district_code): Collection
    {
        return $this->model->query()->where('district_code', $district_code)->get();
    }

    public function findByCode(string $code): Model
    {
        return $this->model->query()->where('code', $code)->first();
    }
}
