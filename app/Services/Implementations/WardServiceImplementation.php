<?php
namespace App\Services\Implementations;

use App\Services\Interfaces\WardService;
use App\Repositories\Interfaces\WardRepository;
use Illuminate\Database\Eloquent\Collection;

class WardServiceImplementation implements WardService
{
    public function __construct(protected WardRepository $wardRepository) {}

    public function findByDistrictCode(string $district_code): Collection
    {
        return $this->wardRepository->findByDistrictCode($district_code);
    }
}
