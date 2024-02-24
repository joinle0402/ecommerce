<?php
namespace App\Services\Implementations;

use App\Services\Interfaces\UserService;
use App\Repositories\Interfaces\UserRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserServiceImplementation implements UserService
{
    public function __construct(protected UserRepository $userRepository) {}

    public function paginate(int $perPage = 15, array $conditions = []): LengthAwarePaginator
    {
        return $this->userRepository->paginate($perPage, $conditions);
    }

    public function create(array $data): Model
    {
        $data['password'] = Hash::make("1");
        return $this->userRepository->create($data);
    }

    public function deleteById(int $id): mixed
    {
        return $this->userRepository->deleteById($id);
    }

    public function deleteByIds(array $ids): mixed
    {
        return $this->userRepository->deleteByIds($ids);
    }
}
