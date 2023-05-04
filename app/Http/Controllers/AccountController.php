<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AccountType;
use App\Services\AccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;
use App\Helpers\HttpHandler;

class AccountController extends Controller
{
    protected $service, $base_url;

    public function __construct(
        AccountService $service,
        HttpHandler $httpHandler
    ) {
        $this->service = $service;
        $this->base_url = $httpHandler->apiBaseURL();
    }

    public function index()
    {
        return view('management.accounts');
    }

    public function indexSelf()
    {
        return view('accounts');
    }

    public function show()
    {
        $accounts = Http::get($this->base_url . 'accounts')->json();

        return DataTables::of($accounts)
            ->editColumn('account_number', function ($account) {
                return $account['account_number'];
            })
            ->editColumn('name', function ($account) {
                $user = $account['user'];
                return $user['name'];
            })
            ->editColumn('type', function ($account) {
                $accountType = $account['account_type'];
                return $accountType['type'];
            })
            ->editColumn('balance', function ($account) {
                return 'R$ '. number_format($account['balance'], 2, ',', '.');
            })
            ->editColumn('acao', function ($account) {
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

    public function showSelf(Request $request)
    {
        $user = User::find($request->user()->id);

        return DataTables::of($user->accounts)
            ->editColumn('account_number', function ($account) {
                return $account['account_number'];
            })
            ->editColumn('type', function ($account) {
                $accountType = AccountType::find($account->fk_account_type);
                return $accountType->type;
            })
            ->editColumn('balance', function ($account) {
                return 'R$ '. number_format($account['balance'], 2, ',', '.');
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
