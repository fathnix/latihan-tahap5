<?php

namespace App\Repositories\Interface;

interface UserRepository{
    public function create(array $data);
    public function findEmail(string $email);
}
