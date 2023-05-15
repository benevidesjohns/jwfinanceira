<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AccountType;
use App\Services\AccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;
use App\Helpers\HttpHandler;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    protected $accountService, $base_url, $accounts, $transactions, $account_types;

    public function __construct(
        AccountService $accountService,
        HttpHandler $httpHandler
    ) {
        $this->accountService = $accountService;
        $this->base_url = $httpHandler->apiBaseURL();

        $this->accounts = Http::get($this->base_url . 'accounts')->json();
        $this->transactions = Http::get($this->base_url . 'transactions')->json();
        $this->account_types = Http::get($this->base_url . 'types/account')->json();
    }

    public function index()
    {
        return view('management.accounts');
    }

    public function indexSelf()
    {
        return view('accounts');
    }

    public function create()
    {
        $user_id = Auth::user()->id;
        $account_types = $this->account_types;

        return view('create.account', compact('account_types', 'user_id'));
    }

    public function edit($id)
    {
        $data = Http::get($this->base_url . 'accounts/' . $id)->json();
        $account = $data['account'];
        $account_type = $account['account_type'];
        $type = $account_type['type'];
        $account_types = $this->account_types;

        return view('edit.account', compact('account', 'account_types', 'type'));
    }

    public function show()
    {
        $accounts = $this->accounts;
        $transactions = $this->transactions;

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
                return 'R$ ' . number_format($account['balance'], 2, ',', '.');
            })
            ->editColumn('acao', function ($account) use ($transactions) {
                $is_button_disabled = $this->accountService->verifyAssociation($account, $transactions, false);

                return '
                    <div class="btn-group">
                        <a href="' . 'accounts/' . $account['id'] . '/edit' . '" class="btn btn-secondary ml-auto">
                            <i class="fas fa-solid fa-pen fa-lg" style="color:white"></i>
                        Editar</a>
                    </div>
                    <div class="btn-group">
                        <a href="" class="' . "btn btn-secondary ml-auto delete-btn" . $is_button_disabled . '"
                            data-toggle="modal" data-target="#modalDelete"
                            data-route="' . '../api/accounts/' . $account['id'] . '"
                            data-message="' . 'Deseja excluir a conta ' . $account['account_number'] . '?' . '">
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

        // TODO: Testar esse formato de requisição de dados pela API
        // Se funcionar, adaptar para a requisição de transações (showSelf)

        // $accounts = Http::get($this->base_url . 'accounts')->json();

        // $id = $request->user()->id;
        // $user_accounts = array_filter($accounts, function ($account) use ($id) {
        //     return $account['fk_user'] == $id;
        // });

        $transactions = $this->transactions;

        return DataTables::of($user->accounts)
            ->editColumn('account_number', function ($account) {
                return $account['account_number'];
            })
            ->editColumn('type', function ($account) {
                $accountType = AccountType::find($account->fk_account_type);
                return $accountType->type;
            })
            ->editColumn('balance', function ($account) {
                return 'R$ ' . number_format($account['balance'], 2, ',', '.');
            })
            ->editColumn('acao', function ($account) use ($transactions) {
                $is_button_disabled = $this->accountService->verifyAssociation($account, $transactions, false);

                return '
                    <div class="btn-group">
                        <a href="' . 'accounts/' . $account['id'] . '/edit' . '" class="btn btn-secondary ml-auto">
                            <i class="fas fa-solid fa-pen fa-lg" style="color:white"></i>
                        Editar</a>
                    </div>
                    <div class="btn-group">
                        <a href="" class="' . "btn btn-secondary ml-auto delete-btn" . $is_button_disabled . '"
                            data-toggle="modal" data-target="#modalDelete"
                            data-route="' . '../api/accounts/' . $account['id'] . '"
                            data-message="' . 'Deseja excluir a conta ' . $account['account_number'] . '?' . '">
                            <i class="fas fa-solid fa-trash" style="color:white"></i>
                            Excluir
                        </a>
                    </div>';
            })
            ->escapeColumns([0])
            ->make(true);
    }
}
