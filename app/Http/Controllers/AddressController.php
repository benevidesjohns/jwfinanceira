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

    public function sendByFormType($data, $status, $formType)
    {
        if ($formType == 'xml') {
            $view = $status >= 400 ? 'error' : 'Customer.address';
            return response()
                ->view($view, compact('data'), $status)
                ->header('Content-Type', 'text/xml');
        } else if ($formType == 'json') {
            return response(json_encode($data), $status);
        } else {
            return response(status: 400);
        }
    }

    public function store(Request $req)
    {
        return $this->serviceAddress->store([
            'city' => $req->city,
            'state' => $req->state,
            'cep' => $req->cep,
            'address' => $req->address
        ]);
    }

    public function get(Request $req, $id)
    {
        $formType = $req->query('form');
        $data = $this->serviceAddress->get($id);
        $status = array_pop($data);
        $addresses = [array_pop($data)];

        return $this->sendByFormType($addresses, $status, $formType);
    }

    public function getList(Request $req)
    {
        $addresses = $this->serviceAddress->getList();
        $formType = $req->query('form');

        return $this->sendByFormType($addresses, 200, $formType);
    }

    public function update(Request $req, $id)
    {
        $formType = $req->query('form');

        $data = $this->serviceAddress->update([
            'city' => $req->city,
            'state' => $req->state,
            'cep' => $req->cep,
            'address' => $req->address
        ], $id);

        return $this->sendByFormType($data, 200, $formType);
    }

    public function destroy($id)
    {
        return $this->serviceAddress->destroy($id);
    }
}
