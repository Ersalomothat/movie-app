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
        return $this->userRepository->create($data);
    }

    public function findById($id) : User
    {
       return $this->userRepository->find($id);
    }

    public function findByEmail($email) :User
    {
        return $this->userRepository->findByEmail($email);
    }

    public function getAll():array
    {
        return [];
    }

    public function delete($id):bool
    {
        return $this->userRepository->delete($id);
    }
}
