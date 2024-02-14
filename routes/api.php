<?php

use App\Http\Controllers\Api\AddressController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/provinces/{province_code}/districts', [AddressController::class, 'findDistrictsByProvinceCode']);
Route::get('/districts/{district_code}/wards', [AddressController::class, 'findWardsByDistrictCode']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
