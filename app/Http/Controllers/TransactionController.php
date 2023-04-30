<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    public function index()
    {
        return view('management.transactions');
    }

    public function indexSelf()
    {
        return view('transactions');
    }

    public function show()
    {
        $data = Http::get('http://api.local/api/transactions')->json();

        return DataTables::of($data)
            ->editColumn('id', function ($transaction) {
                return $transaction['id'];
            })
            ->editColumn('type', function ($transaction) {
                $transactionType = $transaction['transaction_type'];
                return $transactionType['type'];
            })
            ->editColumn('account', function ($transaction) {
                $account = $transaction['account'];
                return $account['id'];
            })
            ->editColumn('amount', function ($transaction) {
                return $transaction['amount'];
            })
            ->editColumn('date', function ($transaction) {
                return $transaction['date'];
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

    public function showSelf(Request $request)
    {
        $user = User::find($request->user()->id);
        $accounts = $user->accounts;

        $transactions = collect();
        foreach ($accounts as $account) {
            $transactions = $transactions->merge($account->transactions)->collect();
        }

        // return $transactions;

        return DataTables::of($transactions)
            ->editColumn('id', function ($transaction) {
                return $transaction->id;
            })
            ->editColumn('type', function ($transaction) {
                $transactionType = $transaction->transactionType;
                return $transactionType->type;
            })
            ->editColumn('account', function ($transaction) {
                $account = $transaction->account;
                return $account->id;
            })
            ->editColumn('amount', function ($transaction) {
                return $transaction->amount;
            })
            ->editColumn('date', function ($transaction) {
                return $transaction->date;
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
