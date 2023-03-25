<?php

namespace App\Http\Controllers;

use App\Services\TransactionTypeService;
use Illuminate\Http\Request;

class TransactionTypeController extends Controller
{
    private $serviceTransactionType;

    public function __construct(TransactionTypeService $serviceTransactionType)
    {
        $this->serviceTransactionType = $serviceTransactionType;
    }

    /**
     * Summary of store
     * @param Request $req
     * @return mixed
     */
    public function store(Request $req)
    {
        return $this->serviceTransactionType->store([
            'type' => $req->type,
        ]);
    }

    public function get($id)
    {
        return $this->serviceTransactionType->get($id);
    }

    public function getList()
    {
        return $this->serviceTransactionType->getList();
    }

    /**
     * Summary of update
     * @param Request $req
     * @param mixed $id
     * @return mixed
     */
    public function update(Request $req, $id)
    {
        return $this->serviceTransactionType->update([
            'type' => $req->type,
        ], $id);
    }

    public function destroy($id)
    {
        return $this->serviceTransactionType->destroy($id);
    }
}
