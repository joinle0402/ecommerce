<?php
namespace App\Services\Implementations;

use App\Repositories\Interfaces\DistrictRepository;
use App\Services\Interfaces\DistrictService;
use Illuminate\Database\Eloquent\Collection;

class DistrictServiceImplementation implements DistrictService
{
    public function __construct(protected DistrictRepository $repository) {}

    public function findByProvinceCode(string $provinceCode): Collection
    {
        return $this->repository->findByProvinceCode($provinceCode);
    }
}
