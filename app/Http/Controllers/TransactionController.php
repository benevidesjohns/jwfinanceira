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
        $data = Http::get($this->base_url . 'users/' . $user_id)->json();

        $user = $data['user'];
        $accounts = $user['accounts'];
        $transaction_types = Http::get($this->base_url . 'types/transaction')->json();

        return view('create.transaction', compact('accounts', 'transaction_types'));
    }

    public function onCreate(Request $req)
    {
        $req->validate([
            'conta' => Rule::notIn(['Selecione']),
            'tipo_de_transacao' => Rule::notIn(['Selecione']),
            'valor_da_transacao' => 'required'
        ]);

        $data = [
            'fk_user' => Auth::user()->id,
            'fk_account' => $req->conta,
            'fk_transaction_type' => $req->tipo_de_transacao,
            'message' => $req->mensagem,
            'amount' => $req->valor_da_transacao,
            'date' => now()->format('Y-m-d H:i:s')
        ];

        Http::post($this->base_url . 'transactions', $data);

        return redirect()->route('transactions');
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
