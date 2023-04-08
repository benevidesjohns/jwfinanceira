<?php

namespace App\Http\Controllers;

use App\Helpers\HttpHandler;
use App\Services\AccountTypeService;
use Illuminate\Http\Request;

class AccountTypeController extends Controller
{
    private $serviceAccountType, $httpHandler;

    public function __construct(AccountTypeService $serviceAccountType, HttpHandler $httpHandler)
    {
        $this->serviceAccountType = $serviceAccountType;
        $this->httpHandler = $httpHandler;
    }

    public function store(Request $req)
    {
        // return $this->serviceAccountType->store([
        //     'type' => $req->type,
        // ]);

        $requestType = $req->getContentTypeFormat();
        $responseType = $req->query('form');

        $content = $this->httpHandler->getContentByRequestType($requestType, $req->getContent());

        if ($content == null) {
            return $this->httpHandler->sendByResponseType('type', [
                'message' => 'This request type format isn\'t available'
            ], 400, $responseType, True);
        }

        $data = $this->serviceAccountType->store($content);

        $status = array_pop($data);
        $isMessage = $status >= 400;

        return $this->httpHandler->sendByResponseType('type', $data, $status, $responseType, $isMessage);
    }

    public function get(Request $req, $id)
    {
        // return $this->serviceAccountType->get($id);

        $data = $this->serviceAccountType->get($id);

        $status = array_pop($data);
        $responseType = $req->query('form');
        $isMessage = $status >= 400;

        return $this->httpHandler->sendByResponseType('type', $data, $status, $responseType, $isMessage);
    }

    public function getList(Request $req)
    {
        // return $this->serviceAccountType->getList();

        $accountsType = $this->serviceAccountType->getList();
        $responseType = $req->query('form');
        $isMessage = False;

        return $this->httpHandler->sendByResponseType('type', $accountsType, 200, $responseType, $isMessage);
    }

    /**
     * Summary of update
     * @param Request $req
     * @param mixed $id
     * @return mixed
     */
    public function update(Request $req, $id)
    {
        // return $this->serviceAccountType->update([
        //     'type' => $req->type,
        // ], $id);

        $requestType = $req->getContentTypeFormat();
        $responseType = $req->query('form');

        $content = $this->httpHandler->getContentByRequestType($requestType, $req->getContent());

        if ($content == null) {
            return $this->httpHandler->sendByResponseType('type', [
                'message' => 'This request type format isn\'t available'
            ], 400, $responseType, True);
        }

        $data = $this->serviceAccountType->update($content, $id);

        $status = array_pop($data);
        $isMessage = $status >= 400;

        return $this->httpHandler->sendByResponseType('type', $data, $status, $responseType, $isMessage);
    }

    public function destroy(Request $req, $id)
    {
        // return $this->serviceAccountType->destroy($id);

        $data = $this->serviceAccountType->destroy($id);

        $status = array_pop($data);
        $responseType = $req->query('form');
        $isMessage = True;

        return $this->httpHandler->sendByResponseType('type', $data, $status, $responseType, $isMessage);
    }
}
