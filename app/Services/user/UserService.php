<?php

namespace App\Services\user;

use App\Repository\UserRepository;

class UserService implements UserServiceInterface
{
    private UserRepository $userRepository;
    public function __construct(UserRepository $repository)
    {
        $this->userRepository = $repository;

    }

    public function create($data)
    {
        // TODO: Implement create() method.
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
    }

    public function findByEmail($email)
    {
        // TODO: Implement findByEmail() method.
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function delete($id)
    {
       $this->userRepository->delete($id);
    }
}
