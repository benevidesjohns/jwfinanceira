<?php

namespace App\Http\Controllers;

use App\Helpers\HttpHandler;
use App\Services\AccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class AccountTypeController extends Controller
{
    protected $accountService, $base_url, $accounts, $accountTypes;

    public function __construct(
        AccountService $accountService,
        HttpHandler $httpHandler
    ) {
        $this->base_url = $httpHandler->apiBaseURL();
        $this->accountService = $accountService;

        $this->accountTypes = Http::get($this->base_url . 'types/account')->json();
        $this->accounts = Http::get($this->base_url . 'accounts')->json();
    }

    public function index()
    {
        return view('types.account');
    }

    public function create()
    {
        return view('management.create.account_type');
    }

    public function edit()
    {
        return view('management.edit.account_type');
    }

    public function show()
    {
        $accountTypes = $this->accountTypes;
        $accounts = $this->accounts;

        return DataTables::of($accountTypes)
            ->editColumn('type', function ($accountType) {
                return $accountType['type'];
            })
            ->editColumn('acao', function ($accountType) use ($accounts) {
                $is_button_disabled = $this->accountService->verifyAssociation($accountType, $accounts, true);

                return '
                <div class="btn-group">
                    <a href="" class="btn btn-secondary ml-auto">
                        <i class="fas fa-solid fa-pen fa-lg" style="color:white"></i>
                    Editar</a>
                </div>
                <div class="btn-group">
                <a href="" class="' . "btn btn-secondary ml-auto delete-btn" . $is_button_disabled . '"
                    data-toggle="modal" data-target="#modalDelete"
                    data-route="' . '../api/types/account/' . $accountType['id'] . '"
                    data-message="' . 'Deseja excluir o tipo ' . $accountType['type'] . ' para contas?' . '">
                    <i class="fas fa-solid fa-trash" style="color:white"></i>
                    Excluir
                </a>
                </div>';
            })
            ->escapeColumns([0])
            ->make(true);
    }
}
