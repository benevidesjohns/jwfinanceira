<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $serviceCustomer;

    public function __construct(CustomerService $serviceCustomer)
    {
        $this->serviceCustomer = $serviceCustomer;
    }

    /**
     * Summary of store
     * @param Request $req
     * @return mixed
     */
    public function store(Request $req)
    {
        return $this->serviceCustomer->store([
            'phone_number' => $req->phone_number,
            'fk_address' => $req->fk_address,
        ]);
    }

    public function get($id)
    {
        return $this->serviceCustomer->get($id);
    }

    public function getList()
    {
        return $this->serviceCustomer->getList();
    }

    /**
     * Summary of update
     * @param Request $req
     * @param mixed $id
     * @return mixed
     */
    public function update(Request $req, $id)
    {
        return $this->serviceCustomer->update([
            'phone_number' => $req->phone_number,
            'fk_address' => $req->fk_address,
        ], $id);
    }

    public function destroy($id)
    {
        return $this->serviceCustomer->destroy($id);
    }
}
