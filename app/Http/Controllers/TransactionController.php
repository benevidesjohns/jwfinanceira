<?php

namespace App\Http\Controllers;

use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    private $transaction;

    public function __construct(TransactionService $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Summary of store
     * @param Request $req
     * @return mixed
     */
    public function store(Request $req)
    {
        return $this->transaction->store([
            'date' => $req->date,
            'amount' => $req->amount,
            'fk_account' => $req->fk_account,
            'fk_transaction_type' => $req->fk_transaction_type,
        ]);
    }

    public function get($id)
    {
        return $this->transaction->get($id);
    }

    public function getList()
    {
        return $this->transaction->getList();
    }

    /**
     * Summary of update
     * @param Request $req
     * @param mixed $id
     * @return mixed
     */
    public function update(Request $req, $id)
    {
        return $this->transaction->update([
            'date' => $req->date,
            'amount' => $req->amount,
            'fk_account' => $req->fk_account,
            'fk_transaction_type' => $req->fk_transaction_type,
        ], $id);
    }

    public function destroy($id)
    {
        return $this->transaction->destroy($id);
    }
}
