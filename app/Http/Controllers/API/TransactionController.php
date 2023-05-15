<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Helpers\HttpHandler;
use App\Services\AccountService;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    private $service, $accountService, $httpHandler;

    public function __construct(
        TransactionService $service,
        AccountService $accountService,
        HttpHandler $httpHandler
    ) {
        $this->service = $service;
        $this->accountService = $accountService;
        $this->httpHandler = $httpHandler;
    }

    public function store(Request $req)
    {
        $requestType = $req->getContentTypeFormat();
        $responseType = $req->query('form') ?? 'json';

        if ($responseType == 'xml') {
            $content = $this->httpHandler->getContentByRequestType($requestType, $req->getContent());
        } else if ($responseType == 'json') {
            $account = $this->accountService->get($req->fk_account);
            $user_id = $account['account']->user->id;

            $content = [
                'fk_user' => $user_id,
                'fk_account' => $req->fk_account,
                'fk_transaction_type' => $req->fk_transaction_type,
                'message' => $req->message,
                'amount' => $req->amount,
                'date' => now()->format('Y-m-d H:i:s')
            ];
        } else {
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
