<?php
namespace App\Repositories\Implementations;

use App\Models\Province;
use App\Repositories\Interfaces\ProvinceRepository;
use Illuminate\Database\Eloquent\Model;

class ProvinceRepositoryImplementation extends BaseRepositoryImplementation implements ProvinceRepository
{
    public function __construct(protected Province $province)
    {
        parent::__construct($province);
    }

    public function findByCode(string $code): Model
    {
        return $this->model->query()->where('code', $code)->firstOrFail();
    }
}
