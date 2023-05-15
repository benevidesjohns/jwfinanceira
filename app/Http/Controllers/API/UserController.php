<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Helpers\HttpHandler;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $service, $httpHandler;

    public function __construct(
        UserService $service,
        HttpHandler $httpHandler
    ) {
        $this->service = $service;
        $this->httpHandler = $httpHandler;
    }

    /**
     * Summary of store
     * @param Request $req
     * @return mixed
     */
    public function store(Request $req)
    {
        $requestType = $req->getContentTypeFormat();
        $responseType = $req->query('form') ?? 'json';

        if ($responseType == 'xml') {
            $content = $this->httpHandler->getContentByRequestType($requestType, $req->getContent());
        } else if ($responseType == 'json') {
            $content = [
                'name' => $req->name,
                'cpf' => $req->cpf,
                'phone_number' => $req->phone_number,
                'email' => $req->email,
                'password' => $req->password,
                'fk_address' => $req->fk_address,
            ];
        } else {
            return $this->httpHandler->sendByResponseType(
                'user',
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
            'user',
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
            'user',
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
            'user',
            $addresses,
            200,
            $responseType,
            $isMessage
        );
    }

    /**
     * Summary of update
     * @param Request $req
     * @param mixed $id
     * @return mixed
     */
    public function update(Request $req, $id)
    {
        $requestType = $req->getContentTypeFormat();
        $responseType = $req->query('form');

        $content = $this->httpHandler->getContentByRequestType($requestType, $req->getContent());

        if ($content == null) {
            return $this->httpHandler->sendByResponseType(
                'user',
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
            'user',
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
            'user',
            $data,
            $status,
            $responseType,
            $isMessage
        );
    }
}
