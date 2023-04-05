<?php

namespace App\Http\Controllers;

use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    private $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function store(Request $req)
    {
        return $this->transactionService->store($req->all());
    }

    public function get($id)
    {
        return $this->transactionService->get($id);
    }

    public function getList()
    {
        return $this->transactionService->getList();
    }

    public function update(Request $req, $id)
    {
        return $this->transactionService->update($req->all(), $id);
    }

    public function destroy($id)
    {
        return $this->transactionService->destroy($id);
    }
}
