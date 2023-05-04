<?php

namespace App\Http\Controllers;

use App\Helpers\HttpHandler;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    protected $base_url;

    public function __construct(HttpHandler $httpHandler)
    {
        $this->base_url = $httpHandler->apiBaseURL();
    }

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
        $transactions = Http::get($this->base_url . 'transactions')->json();

        return DataTables::of($transactions)
            ->editColumn('type', function ($transaction) {
                $transactionType = $transaction['transaction_type'];
                return $transactionType['type'];
            })
            ->editColumn('account', function ($transaction) {
                $account = $transaction['account'];
                return $account['account_number'];
            })
            ->editColumn('amount', function ($transaction) {
                return 'R$ '. number_format($transaction['amount'], 2, ',', '.');
            })
            ->editColumn('date', function ($transaction) {
                return $transaction['date'];
            })
            ->editColumn('acao', function ($transaction) {
                return '
                <div class="btn-group">
                    <a href="" class="btn btn-secondary ml-auto">
                        <i class="fas fa-solid fa-pen fa-lg" style="color:white"></i>
                        Editar
                    </a>
                </div>

                <div class="btn-group">
                <form action="' . $this->base_url . 'transactions/' . $transaction['id'] . '" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-secondary">
                            <i class="fas fa-solid fa-trash" style="color:white"></i>
                            Excluir
                        </button>
                    </form>
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

        return DataTables::of($transactions)
            ->editColumn('type', function ($transaction) {
                $transactionType = $transaction->transactionType;
                return $transactionType->type;
            })
            ->editColumn('account', function ($transaction) {
                $account = $transaction->account;
                return $account->account_number;
            })
            ->editColumn('amount', function ($transaction) {
                return 'R$ '. number_format($transaction->amount, 2, ',', '.');
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
