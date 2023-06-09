<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\HttpHandler;
use App\Services\AddressService;

class AddressController extends Controller
{
    private $service, $httpHandler;

    public function __construct(
        AddressService $service,
        HttpHandler $httpHandler
    ) {
        $this->service = $service;
        $this->httpHandler = $httpHandler;
    }

    public function store(Request $req)
    {
        $requestType = $req->getContentTypeFormat();
        $responseType = $req->query('form') ?? 'json';

        if ($responseType == 'xml') {
            $content = $this->httpHandler->getContentByRequestType($requestType, $req->getContent());
        } else if ($responseType == 'json') {
            $content = [
                'city' => $req->city,
                'state' => $req->state,
                'cep' => $req->cep,
                'address' => $req->address,
            ];
        } else {
            return $this->httpHandler->sendByResponseType(
                'address',
                ['info' => 'This request type format isn\'t available'],
                400,
                $responseType,
                True
            );
        }

        $data = $this->service->store($content);

        $status = array_pop($data);
        $isMessage = $status >= 400;

        return $this->httpHandler->sendByResponseType(
            'address',
            $data,
            $status,
            $responseType,
            $isMessage
        );
    }

    public function get(Request $req, $id)
    {
        $data = $this->service->get($id);

        $status = array_pop($data);
        $responseType = $req->query('form');
        $isMessage = $status >= 400;

        return $this->httpHandler->sendByResponseType(
            'address',
            $data,
            $status,
            $responseType,
            $isMessage
        );
    }

    public function getList(Request $req)
    {
        $addresses = $this->service->getList();
        $responseType = $req->query('form');
        $isMessage = False;

        return $this->httpHandler->sendByResponseType(
            'address',
            $addresses,
            200,
            $responseType,
            $isMessage
        );
    }

    public function update(Request $req, $id)
    {
        $requestType = $req->getContentTypeFormat();
        $responseType = $req->query('form');

        $content = $this->httpHandler->getContentByRequestType($requestType, $req->getContent());

        if ($content == null) {
            return $this->httpHandler->sendByResponseType(
                'address',
                ['info' => 'This request type format isn\'t available'],
                400,
                $responseType,
                True
            );
        }

        $data = $this->service->update($content, $id);

        $status = array_pop($data);
        $isMessage = $status >= 400;

        return $this->httpHandler->sendByResponseType(
            'address',
            $data,
            $status,
            $responseType,
            $isMessage
        );
    }

    public function destroy(Request $req, $id)
    {
        $data = $this->service->destroy($id);

        $status = array_pop($data);
        $responseType = $req->query('form');
        $isMessage = True;

        return $this->httpHandler->sendByResponseType(
            'address',
            $data,
            $status,
            $responseType,
            $isMessage
        );
    }
}
