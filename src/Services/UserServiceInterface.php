<?php


namespace App\Services;


use App\Request\UserCreateData;

interface UserServiceInterface
{
    public function create(UserCreateData $data);
}
