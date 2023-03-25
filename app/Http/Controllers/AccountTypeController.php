<?php

namespace App\Http\Controllers;

use App\Services\AccountTypeService;
use Illuminate\Http\Request;

class AccountTypeController extends Controller
{
    private $serviceAccountType;

    public function __construct(AccountTypeService $serviceAccountType)
    {
        $this->serviceAccountType = $serviceAccountType;
    }

    /**
     * Summary of store
     * @param Request $req
     * @return mixed
     */
    public function store(Request $req)
    {
        return $this->serviceAccountType->store([
            'type' => $req->type,
        ]);
    }

    public function get($id)
    {
        return $this->serviceAccountType->get($id);
    }

    public function getList()
    {
        return $this->serviceAccountType->getList();
    }

    /**
     * Summary of update
     * @param Request $req
     * @param mixed $id
     * @return mixed
     */
    public function update(Request $req, $id)
    {
        return $this->serviceAccountType->update([
            'type' => $req->type,
        ], $id);
    }

    public function destroy($id)
    {
        return $this->serviceAccountType->destroy($id);
    }
}
