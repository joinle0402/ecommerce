<?php
namespace App\Repositories\Implementations;

use App\Models\User;
use App\Repositories\Interfaces\UserRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserRepositoryImplementation extends BaseRepositoryImplementation implements UserRepository
{
    public function __construct(protected User $user)
    {
        parent::__construct($user);
    }

    public function paginate(int $perPage = 10, array $conditions = []): LengthAwarePaginator
    {
        return $this->model->query()->where($conditions)->orderBy('id', 'DESC')->paginate($perPage);
    }
}
