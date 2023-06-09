<?php

namespace App\Http\Controllers\API;

use App\Helpers\HttpHandler;
use App\Http\Controllers\Controller;
use App\Services\AccountService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    private $service, $httpHandler;

    public function __construct(
        AccountService $service,
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
                'name' => $req->name,
                'account_number' => fake()->unique()->numerify('######'),
                'fk_user' => $req->fk_user,
                'balance' => 0,
                'fk_account_type' => $req->fk_account_type
            ];
        } else {
            return $this->httpHandler->sendByResponseType(
                'account',
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
            'account',
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
            'account',
            $data,
            $status,
            $responseType,
            $isMessage
        );
    }

    public function getList(Request $req)
    {
        $accounts = $this->service->getList();
        $responseType = $req->query('form');
        $isMessage = False;

        return $this->httpHandler->sendByResponseType(
            'account',
            $accounts,
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
        $responseType = $req->query('form') ?? 'json';

        if ($responseType == 'xml') {
            $content = $this->httpHandler->getContentByRequestType($requestType, $req->getContent());
        } else if ($responseType == 'json') {
            $content = [
                'name' => $req->name,
            ];
        } else {
            return $this->httpHandler->sendByResponseType(
                'account',
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
            'account',
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
            'account',
            $data,
            $status,
            $responseType,
            $isMessage
        );
    }
}
