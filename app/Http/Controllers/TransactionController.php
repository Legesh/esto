<?php

namespace App\Http\Controllers;

use App\Http\Repositories\TransactionRepositoryInterface;
use App\Http\Requests\TransactionRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class TransactionController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * The user repository instance.
     */
    protected $transaction;

    /**
     * Create a new controller instance.
     *
     * @param TransactionRepositoryInterface $transaction
     */
    public function __construct(TransactionRepositoryInterface $transaction)
    {
        $this->transaction = $transaction;
    }

    public function store($userId, TransactionRequest $request)
    {
        try{
            $this->transaction->store($userId, $request->all());
            return \response('Transaction created', Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return \response($e->getMessage(), 200);
        }
    }

    public function find($user_id, $transaction_id)
    {
        try{
            $transaction = $this->transaction->findById($transaction_id);
            return \response()->json($transaction);
        } catch (\Exception $e) {
            return \response($e->getMessage(), 200);
        }
    }

    public function getAll($user_id)
    {
        try{
            $transactions = $this->transaction->getAllForUser($user_id);
            return \response()->json($transactions);
        } catch (\Exception $e) {
            return \response($e->getMessage(), 200);
        }
    }
}
