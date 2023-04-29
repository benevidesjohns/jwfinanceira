<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Helpers\HttpHandler;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    private $service, $httpHandler;

    public function __construct(
        TransactionService $service,
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
                'transaction',
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
            'transaction',
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
            'transaction',
            $data,
            $status,
            $responseType,
            $isMessage
        );
    }

    public function getList(Request $req)
    {
        $transactions = $this->service->getList();
        $responseType = $req->query('form');
        $isMessage = False;

        return $this->httpHandler->sendByResponseType(
            'transaction',
            $transactions,
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
                'transaction',
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
            'transaction',
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
            'transaction',
            $data,
            $status,
            $responseType,
            $isMessage
        );
    }
}
