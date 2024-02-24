<?php
namespace App\Services\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ProvinceService
{
    public function all(): Collection;
    public function findByCode(string $code): Model;
}
