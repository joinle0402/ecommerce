<?php
namespace App\Repositories\Interfaces;


use Illuminate\Database\Eloquent\Model;

interface ProvinceRepository extends BaseRepository
{
    public function findByCode(string $code): Model;
}
