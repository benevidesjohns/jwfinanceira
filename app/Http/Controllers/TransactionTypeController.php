<?php

namespace App\Http\Controllers;

use App\Helpers\HttpHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class TransactionTypeController extends Controller
{
    protected $base_url;

    public function __construct(HttpHandler $httpHandler){
        $this->base_url = $httpHandler->apiBaseURL();
    }

    public function index()
    {
        return view('types.transaction');
    }

    public function show()
    {
        $transactionTypes = Http::get($this->base_url . 'types/transaction')->json();

        return DataTables::of($transactionTypes)
            ->editColumn('type', function ($transactionType) {
                return $transactionType['type'];
            })
            ->editColumn('acao', function () {
                return '
                <div class="btn-group">
                    <a href="" class="btn btn-secondary ml-auto">
                        <i class="fas fa-solid fa-pen fa-lg" style="color:white"></i>
                    Editar</a>
                </div>
                <div class="btn-group">
                    <a href="" class="btn btn-secondary ml-auto">
                    <i class="fas fa-solid fa-trash" style="color:white"></i>
                    Excluir</a>
                </div>';
            })
            ->escapeColumns([0])
            ->make(true);
    }
}
