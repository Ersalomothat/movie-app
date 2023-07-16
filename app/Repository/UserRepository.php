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

    public function create($user) {
        return $this->user->create($user);
    }
    public function delete($id)
    {
        $this->user->delete($id);

    }


}
