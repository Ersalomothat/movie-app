<?php

namespace App\Repository;

use App\Models\User;

class UserRepository
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user ?? new User();
    }

    public function find($id):User
    {
        return User::find($id);
    }
    public function findByEmail(string $email)
    {
        return $this->user->whereEmail($email)->first();
    }

    public function create($user): User
    {
        return $this->user->create($user);
    }

    public function delete($id)
    {
        return $this->user->delete($id);

    }


}
