<?php
namespace App\Services\Implementations;

use App\Repositories\Interfaces\ProvinceRepository;
use App\Services\Interfaces\ProvinceService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProvinceServiceImplementation implements ProvinceService
{
    public function __construct(protected ProvinceRepository $provinceRepository) {}

    public function all(): Collection
    {
        return $this->provinceRepository->all();
    }

    public function findByCode(string $code): Model
    {
        return $this->provinceRepository->findByCode($code);
    }
}
