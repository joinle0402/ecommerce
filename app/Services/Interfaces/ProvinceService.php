<?php
namespace App\Services\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ProvinceService
{
    public function all(): Collection;
}
