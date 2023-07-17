<?php

namespace App\Services\user;

use App\Models\User;
use App\Repository\UserRepository;

class UserService implements UserServiceInterface
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $repository)
    {
        $this->userRepository = $repository;

    }

    public function create($data): User
    {
        $user = $this->userRepository->create($data);
        $user->balance()->updateOrCreate([
            'user_id' => $user["id"]
        ], [
                'amount' => 0
            ]
        );
        return $user;
    }

    public function findById($id): User
    {
        return $this->userRepository->find($id);
    }

    public function findByEmail($email): User
    {
        return $this->userRepository->findByEmail($email);
    }

    public function getAll(): array
    {
        return [];
    }

    public function delete($id): bool
    {
        return $this->userRepository->delete($id);
    }
}
