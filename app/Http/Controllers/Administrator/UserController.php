<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\RedirectResponse;
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

    public function index(Request $request): View
    {
        $users = $this->userService->paginate($request->query('per_page', 10));
        return view('administrator.pages.users.index', compact('users'));
    }

    public function create(): View
    {
        $provinces = $this->provinceService->all();
        return view('administrator.pages.users.create', compact('provinces'));
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $this->userService->create($request->validated());
        return redirect()->route('admin.users.index')->with('success', 'Thêm mới thành công!');
    }

    public function show(int $id): void {}

    public function edit(int $id): string
    {
        return "edit-".$id;
    }

    public function update(Request $request, string $id): void
    {

    }

    public function destroy(int $id): RedirectResponse
    {
        $this->userService->deleteById($id);
        return redirect()->route('admin.users.index')->with('success', 'Xóa thành công!');
    }

    public function destroyMany(Request $request): RedirectResponse
    {
        $this->userService->deleteByIds($request->input('checkedRows'));
        return redirect()->route('admin.users.index')->with('success', 'Deleted users successfully!');
    }
}
