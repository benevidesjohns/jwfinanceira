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

    public function sendByFormType($data, $status, $formType, $isMessage)
    {
        if ($formType == 'xml') {
            $view = $isMessage ? 'message' : 'address';

            return response()
                ->view($view, compact('data', 'status'), $status)
                ->header('Content-Type', 'text/xml');

        } else if ($formType == 'json' || $formType == null) {
            return response()->json($data, $status);

        } else {
            return response(status: 400);
        }
    }

    public function store(Request $req)
    {
        $data = $this->serviceAddress->store([
            'city' => $req->city,
            'state' => $req->state,
            'cep' => $req->cep,
            'address' => $req->address
        ]);

        $status = array_pop($data);
        $formType = $req->query('form');
        $isMessage = $status >= 400;

        return $this->sendByFormType($data, $status, $formType, $isMessage);
    }

    public function get(Request $req, $id)
    {
        $data = $this->serviceAddress->get($id);

        $status = array_pop($data);
        $formType = $req->query('form');
        $isMessage = $status >= 400;

        return $this->sendByFormType($data, $status, $formType, $isMessage);
    }

    public function getList(Request $req)
    {
        $addresses = $this->serviceAddress->getList();
        $formType = $req->query('form');
        $isMessage = False;

        return $this->sendByFormType($addresses, 200, $formType, $isMessage);
    }

    public function update(Request $req, $id)
    {
        $content = json_decode($req->getContent());

        $data = $this->serviceAddress->update($content, $id);

        $status = array_pop($data);
        $formType = $req->query('form');
        $isMessage = $status >= 400;

        return $this->sendByFormType($data, $status, $formType, $isMessage);
    }

    public function destroy(Request $req, $id)
    {
        $data = $this->serviceAddress->destroy($id);

        $status = array_pop($data);
        $formType = $req->query('form');
        $isMessage = True;

        return $this->sendByFormType($data, $status, $formType, $isMessage);
    }
}
