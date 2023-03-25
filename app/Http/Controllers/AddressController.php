<?php

namespace App\Http\Controllers;

use App\Services\AddressService;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    private $serviceAddress;

    public function __construct(AddressService $serviceAddress)
    {
        $this->serviceAddress = $serviceAddress;
    }

    /**
     * Summary of store
     * @param Request $req
     * @return mixed
     */
    public function store(Request $req)
    {
        return $this->serviceAddress->store([
            'city' => $req->city,
            'state' => $req->state,
            'cep' => $req->cep,
            'address' => $req->address
        ]);
    }

    public function get($id)
    {
        return $this->serviceAddress->get($id);
    }

    public function getList()
    {
        return $this->serviceAddress->getList();
    }

    /**
     * Summary of update
     * @param Request $req
     * @param mixed $id
     * @return mixed
     */
    public function update(Request $req, $id)
    {
        return $this->serviceAddress->update([
            'city' => $req->city,
            'state' => $req->state,
            'cep' => $req->cep,
            'address' => $req->address
        ], $id);
    }

    public function destroy($id)
    {
        return $this->serviceAddress->destroy($id);
    }
}
