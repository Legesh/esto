<?php


namespace App\Http\Repositories;


interface TransactionRepositoryInterface
{
    public function store($userId, $transactionData);

    public function findById($transactionId);

    public function getAllForUser($userId);
}
