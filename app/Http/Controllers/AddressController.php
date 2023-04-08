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

    public function sendByResponseType($data, $status, $responseType, $isMessage)
    {
        if ($responseType == 'xml') {
            $view = $isMessage ? 'message' : 'address';

            return response()
                ->view($view, compact('data', 'status'), $status)
                ->header('Content-Type', 'text/xml');

        } else if ($responseType == 'json' || $responseType == null) {
            return response()->json($data, $status);

        } else {
            return response(status: 400);
        }
    }

    public function getContentByRequestType($requestType, $content)
    {
        if ($requestType == 'xml') {
            $sxe = simplexml_load_string($content);

            $keys = [];
            $values = [];
            for ($i=0; $i < $sxe->count(); $i++) {
                array_push($keys, $sxe->children()[$i]->getName());
                array_push($values, $sxe->children()[$i]->__toString());
            }

            return array_combine($keys, $values);
        }

        if ($requestType == 'json' || $requestType == null) {
            return (array) json_decode($content);
        }

        return null;
    }

    public function store(Request $req)
    {
        $requestType = $req->getContentTypeFormat();
        $responseType = $req->query('form');

        $content = $this->getContentByRequestType($requestType, $req->getContent());

        if ($content == null) {
            return $this->sendByResponseType([
                'message' => 'This request type format isn\'t available'
            ], 400, $responseType, True);
        }

        $data = $this->serviceAddress->store($content);

        $status = array_pop($data);
        $isMessage = $status >= 400;

        return $this->sendByResponseType($data, $status, $responseType, $isMessage);
    }

    public function get(Request $req, $id)
    {
        $data = $this->serviceAddress->get($id);

        $status = array_pop($data);
        $responseType = $req->query('form');
        $isMessage = $status >= 400;

        return $this->sendByResponseType($data, $status, $responseType, $isMessage);
    }

    public function getList(Request $req)
    {
        $addresses = $this->serviceAddress->getList();
        $responseType = $req->query('form');
        $isMessage = False;

        return $this->sendByResponseType($addresses, 200, $responseType, $isMessage);
    }

    public function update(Request $req, $id)
    {
        $requestType = $req->getContentTypeFormat();
        $responseType = $req->query('form');

        $content = $this->getContentByRequestType($requestType, $req->getContent());

        if ($content == null) {
            return $this->sendByResponseType([
                'message' => 'This request type format isn\'t available'
            ], 400, $responseType, True);
        }

        $data = $this->serviceAddress->update($content, $id);

        $status = array_pop($data);
        $responseType = $req->query('form');
        $isMessage = $status >= 400;

        return $this->sendByResponseType($data, $status, $responseType, $isMessage);
    }

    public function destroy(Request $req, $id)
    {
        $data = $this->serviceAddress->destroy($id);

        $status = array_pop($data);
        $responseType = $req->query('form');
        $isMessage = True;

        return $this->sendByResponseType($data, $status, $responseType, $isMessage);
    }
}
