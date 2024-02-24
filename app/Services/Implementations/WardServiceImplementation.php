<?php
namespace App\Services\Implementations;

use App\Services\Interfaces\WardService;
use App\Repositories\Interfaces\WardRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class WardServiceImplementation implements WardService
{
    public function __construct(protected WardRepository $wardRepository) {}

    public function findByDistrictCode(string $district_code): Collection
    {
        return $this->wardRepository->findByDistrictCode($district_code);
    }

    public function findByCode(string $code): Model
    {
        return $this->wardRepository->findByCode($code);
    }
}
