<?php


namespace App\Http\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    /** @var User  */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function store($userData)
    {
        return $this->user->fill($userData)->save();
    }

    public function findById($userId)
    {
        return $this->user->where('id', $userId)->first();
    }

    public function getAll()
    {
        return $this->user->all();
    }
}
