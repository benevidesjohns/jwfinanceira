<?php

namespace App\Http\Controllers;

use App\Services\TransactionTypeService;
use Illuminate\Http\Request;

class TransactionTypeController extends Controller
{
    private $serviceTransactionType;

    public function __construct(TransactionTypeService $serviceTransactionType)
    {
        $this->serviceTransactionType = $serviceTransactionType;
    }

    public function sendByFormType($data, $status, $formType)
    {
        if ($formType == 'xml') {
            $view = $status >= 400 ? 'error' : 'type';
            return response()
                ->view($view, compact('data'), $status)
                ->header('Content-Type', 'text/xml');
        } else if ($formType == 'json') {
            return response()->json($data, $status);
        } else {
            return response(status: 400);
        }
    }

    public function store(Request $req)
    {
        return $this->serviceTransactionType->store([
            'type' => $req->type,
        ]);
    }

    public function get($id)
    {
        return $this->serviceTransactionType->get($id);
    }

    public function getList()
    {
        return $this->serviceTransactionType->getList();
    }

    /**
     * Summary of update
     * @param Request $req
     * @param mixed $id
     * @return mixed
     */
    public function update(Request $req, $id)
    {
        return $this->serviceTransactionType->update([
            'type' => $req->type,
        ], $id);
    }

    public function destroy($id)
    {
        return $this->serviceTransactionType->destroy($id);
    }
}
