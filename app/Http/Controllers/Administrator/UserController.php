<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\UserService;
use App\Services\Interfaces\WardService;
use App\Services\Interfaces\DistrictService;
use App\Services\Interfaces\ProvinceService;
use App\Http\Requests\Administrator\Users\StoreUserRequest;

class UserController extends Controller
{
    public function __construct(
        protected UserService $userService,
        protected ProvinceService $provinceService,
        protected DistrictService $districtService,
        protected WardService $wardService,
    ) {}

    public function index(): View
    {
        $users = $this->userService->paginate(10);
        return view('administrator.pages.users.index', compact('users'));
    }

    public function create(): View
    {
        $provinces = $this->provinceService->all();
        return view('administrator.pages.users.create', compact('provinces'));
    }

    public function store(StoreUserRequest $request)
    {
        dd($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
