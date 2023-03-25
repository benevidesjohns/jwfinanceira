<?php

namespace App\Http\Controllers;

use App\Services\AccountService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    private $serviceAccount;

    public function __construct(AccountService $serviceAccount)
    {
        $this->serviceAccount = $serviceAccount;
    }

    /**
     * Summary of store
     * @param Request $req
     * @return mixed
     */
    public function store(Request $req)
    {
        return $this->serviceAccount->store([
            'balance' => $req->balance,
            'fk_customer' => $req->fk_customer,
            'fk_account_type' => $req->fk_account_type
        ]);
    }

    public function get($id)
    {
        return $this->serviceAccount->get($id);
    }

    public function getList()
    {
        return $this->serviceAccount->getList();
    }

    /**
     * Summary of update
     * @param Request $req
     * @param mixed $id
     * @return mixed
     */
    public function update(Request $req, $id)
    {
        return $this->serviceAccount->update([
            'balance' => $req->balance,
            'fk_customer' => $req->fk_customer,
            'fk_account_type' => $req->fk_account_type
        ], $id);
    }

    public function destroy($id)
    {
        return $this->serviceAccount->destroy($id);
    }
}
