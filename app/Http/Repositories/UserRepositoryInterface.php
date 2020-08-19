<?php


namespace App\Http\Repositories;


interface UserRepositoryInterface
{
    public function store($userData);

    public function findById($userId);

    public function getAll();
}
