<?php

namespace App\Services\user;
use App\Models\User;

interface UserServiceInterface
{
    public function create($data): User;
    public function findById($id):User;
    public function findByEmail($email):User;
    public function getAll():array;
    public function delete($id):bool;
    public function logIn($email, $password):bool;

}
