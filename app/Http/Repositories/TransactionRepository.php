<?php


namespace App\Http\Repositories;

use App\Models\Transaction;

class TransactionRepository implements TransactionRepositoryInterface
{
    /** @var Transaction  */
    protected $transaction;
    /** @var UserRepositoryInterface  */
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository, Transaction $transaction)
    {
        $this->userRepository = $userRepository;
        $this->transaction = $transaction;
    }

    public function store($userId, $transaction)
    {
        $user = $this->userRepository->findById($userId);
        return $user->transactions()->save($this->transaction->fill($transaction));
    }

    public function findById($transactionId)
    {
        return $this->transaction->where('id', $transactionId)->first();
    }

    public function getAllForUser($userId)
    {
        return $this->transaction->where('user_id', $userId)->get();
    }
}
