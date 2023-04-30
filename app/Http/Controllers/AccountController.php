<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AccountType;
use App\Services\AccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class AccountController extends Controller
{
    protected $service;

    public function __construct(
        AccountService $service,
    ) {
        $this->service = $service;
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
        $data = Http::get('http://api.local/api/accounts')->json();

        return DataTables::of($data)
            ->editColumn('id', function ($account) {
                return $account['id'];
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
                return $account['balance'];
            })
            ->editColumn('acao', function () {
                return '<a href="" class="btn btn-dark ml-auto">X</a>';
            })
            ->escapeColumns([0])
            ->make(true);
    }

    public function showSelf(Request $request)
    {
        $user = User::find($request->user()->id);

        return DataTables::of($user->accounts)
            ->editColumn('id', function ($account) {
                return $account['id'];
            })
            ->editColumn('type', function ($account) {
                $accountType = AccountType::find($account->fk_account_type);
                return $accountType->type;
            })
            ->editColumn('balance', function ($account) {
                return $account->balance;
            })
            ->editColumn('acao', function () {
                return '<a href="" class="btn btn-dark ml-auto">X</a>';
            })
            ->escapeColumns([0])
            ->make(true);
    }
}
