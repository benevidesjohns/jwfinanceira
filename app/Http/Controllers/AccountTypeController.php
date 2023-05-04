<?php

namespace App\Http\Controllers;

use App\Helpers\HttpHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class AccountTypeController extends Controller
{
    protected $base_url;

    public function __construct(HttpHandler $httpHandler){
        $this->base_url = $httpHandler->apiBaseURL();
    }

    public function index()
    {
        return view('types.account');
    }

    public function show()
    {
        $accountTypes = Http::get($this->base_url . 'types/account')->json();

        return DataTables::of($accountTypes)
            ->editColumn('type', function ($accountType) {
                return $accountType['type'];
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
