<?php

namespace App\Http\Controllers;

use App\Helpers\HttpHandler;
use App\Services\AccountService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    private $serviceAccount, $httpHandler;

    public function __construct(
        AccountService $serviceAccount,
        HttpHandler $httpHandler
    )
    {
        $this->serviceAccount = $serviceAccount;
        $this->httpHandler = $httpHandler;
    }

    public function store(Request $req)
    {
        $requestType = $req->getContentTypeFormat();
        $responseType = $req->query('form');

        $content = $this->httpHandler->getContentByRequestType($requestType, $req->getContent());

        if ($content == null) {
            return $this->httpHandler->sendByResponseType('account', [
                'message' => 'This request type format isn\'t available'
            ], 400, $responseType, True);
        }

        $data = $this->serviceAccount->store($content);

        $status = array_pop($data);
        $isMessage = $status >= 400;

        return $this->httpHandler->sendByResponseType('account', $data, $status, $responseType, $isMessage);
    }

    public function get(Request $req, $id)
    {
        $data = $this->serviceAccount->get($id);

        $status = array_pop($data);
        $responseType = $req->query('form');
        $isMessage = $status >= 400;

        return $this->httpHandler->sendByResponseType('account', $data, $status, $responseType, $isMessage);
    }

    public function getList(Request $req)
    {
        $accounts = $this->serviceAccount->getList();
        $responseType = $req->query('form');
        $isMessage = False;

        return $this->httpHandler->sendByResponseType('account', $accounts, 200, $responseType, $isMessage);
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
            return $this->httpHandler->sendByResponseType('account', [
                'message' => 'This request type format isn\'t available'
            ], 400, $responseType, True);
        }

        $data = $this->serviceAccount->update($content, $id);

        $status = array_pop($data);
        $isMessage = $status >= 400;

        return $this->httpHandler->sendByResponseType('account', $data, $status, $responseType, $isMessage);
    }

    public function destroy(Request $req, $id)
    {
        $data = $this->serviceAccount->destroy($id);

        $status = array_pop($data);
        $responseType = $req->query('form');
        $isMessage = True;

        return $this->httpHandler->sendByResponseType('account', $data, $status, $responseType, $isMessage);
    }
}
