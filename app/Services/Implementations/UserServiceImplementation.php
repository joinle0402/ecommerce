<?php
namespace App\Services\Implementations;

use App\Services\Interfaces\UserService;
use App\Repositories\Interfaces\UserRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserServiceImplementation implements UserService
{
    public function __construct(protected UserRepository $userRepository) {}

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return $this->userRepository->paginate($perPage);
    }
}
