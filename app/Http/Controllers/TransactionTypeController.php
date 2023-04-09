<?php

namespace App\Http\Controllers;

use App\Helpers\HttpHandler;
use App\Services\TransactionTypeService;
use Illuminate\Http\Request;

class TransactionTypeController extends Controller
{
    private $service, $httpHandler;

    public function __construct(
        TransactionTypeService $service,
        HttpHandler $httpHandler
    ) {
        $this->service = $service;
        $this->httpHandler = $httpHandler;
    }

    public function store(Request $req)
    {
        $requestType = $req->getContentTypeFormat();
        $responseType = $req->query('form');

        $content = $this->httpHandler->getContentByRequestType($requestType, $req->getContent());

        if ($content == null) {
            return $this->httpHandler->sendByResponseType(
                'transaction_type',
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
            'transaction_type',
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
            'transaction_type',
            $data,
            $status,
            $responseType,
            $isMessage
        );
    }

    public function getList(Request $req)
    {
        $accountsType = $this->service->getList();
        $responseType = $req->query('form');
        $isMessage = False;

        return $this->httpHandler->sendByResponseType(
            'transaction_type',
            $accountsType,
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
                'transaction_type',
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
            'transaction_type',
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

        return $this->httpHandler->sendByResponseType(
            'transaction_type',
            $data,
            $status,
            $responseType,
            True
        );
    }
}
