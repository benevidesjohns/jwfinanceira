<?php

namespace App\Http\Controllers;

use App\Helpers\HttpHandler;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    protected $base_url, $transactions, $transaction_types, $accounts;

    public function __construct(HttpHandler $httpHandler)
    {
        $this->base_url = $httpHandler->apiBaseURL();

        $this->transactions = Http::get($this->base_url . 'transactions')->json();
        $this->transaction_types = Http::get($this->base_url . 'types/transaction')->json();
        $this->accounts = Http::get($this->base_url . 'accounts')->json();
    }

    public function index()
    {
        return view('management.transactions');
    }

    public function indexSelf()
    {
        return view('transactions');
    }

    public function create()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        $accounts = $user->accounts;
        $transaction_types = $this->transaction_types;

        return view('create.transaction', compact('accounts', 'transaction_types'));
    }

    public function onCreate(Request $req)
    {
        $req->validate([
            'fk_transaction_type' => Rule::notIn(['Selecione']),
            'amount' => 'required'
        ]);

        $data = [
            'fk_user' => Auth::user()->id,
            'fk_account' => $req->fk_account,
            'fk_transaction_type' => $req->fk_transaction_type,
            'message' => $req->message,
            'amount' => $req->amount,
            'date' => now()->format('Y-m-d H:i:s')
        ];

        Http::post($this->base_url . 'transactions', $data);

        return redirect()->route('transactions');
    }

    public function show()
    {
        $transactions = $this->transactions;

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
                return 'R$ ' . number_format($transaction['amount'], 2, ',', '.');
            })
            ->editColumn('date', function ($transaction) {
                return $transaction['date'];
            })
            ->editColumn('acao', function ($transaction) {
                $account = $transaction['account'];

                return '
                    <div class="btn-group">
                        <a href="" class="btn btn-secondary ml-auto delete-btn"
                        data-toggle="modal" data-target="#modalDelete"
                        data-route="' . '../api/transactions/' . $transaction['id'] . '"
                        data-message="' . 'Deseja excluir a transação da conta ' . $account['account_number'] . '?' . '">
                            <i class="fas fa-solid fa-trash" style="color:white"></i>
                            Excluir
                        </a>
                    </div>';
            })
            ->escapeColumns([0])
            ->make(true);
    }

    public function showSelf(Request $request)
    {
        $user = User::find($request->user()->id);
        $transactions = $user->transactions;

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
                return 'R$ ' . number_format($transaction->amount, 2, ',', '.');
            })
            ->editColumn('date', function ($transaction) {
                return $transaction->date;
            })
            ->editColumn('acao', function ($transaction) {
                $account = $transaction['account'];

                return '
                    <div class="btn-group">
                        <a href="" class="btn btn-secondary ml-auto delete-btn"
                        data-toggle="modal" data-target="#modalDelete"
                        data-route="' . '../api/transactions/' . $transaction['id'] . '"
                        data-message="' . 'Deseja excluir a transação da sua conta '
                    . $account['account_number'] . ' com R$'
                    . number_format($transaction->amount, 2, ',', '.') . '?' . '">
                            <i class="fas fa-solid fa-trash" style="color:white"></i>
                            Excluir
                        </a>
                    </div>';
            })
            ->escapeColumns([0])
            ->make(true);
    }
}
