<?php

namespace App\Services\user;

interface UserServiceInterface
{
    public function create($data);
    public function findById($id);
    public function findByEmail($email);
    public function getAll();
    public function delete($id);
}
