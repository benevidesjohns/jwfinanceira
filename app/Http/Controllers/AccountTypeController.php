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
    }

    public function index()
    {
        return view('types.account');
    }

    public function create()
    {
        return view('create.account_type');
    }

    public function onCreate(Request $req)
    {
        $req->validate([
            'nome' => 'required|unique:App\Models\AccountType,type',
        ]);

        $data = [
            'type' => $req->nome,
        ];

        Http::post($this->base_url . 'types/account', $data);

        return redirect()->route('types/account');
    }

    public function edit($id)
    {
        $data = Http::get($this->base_url . 'types/account/' . $id)->json();
        $account_type = $data['accountType'];

        return view('edit.account_type', compact('account_type'));
    }

    public function onEdit($id)
    {

    }

    public function show()
    {
        $accountTypes = Http::get($this->base_url . 'types/account')->json();
        $accounts = Http::get($this->base_url . 'accounts')->json();

        return DataTables::of($accountTypes)
            ->editColumn('type', function ($accountType) {
                return $accountType['type'];
            })
            ->editColumn('acao', function ($accountType) use ($accounts) {
                $is_button_disabled = $this->accountService->verifyAssociation($accountType, $accounts, true);

                return '
                <div class="btn-group">
                    <a href="' . 'account/' . $accountType['id'] . '/edit' . '" class="' . 'btn btn-secondary ml-auto' . $is_button_disabled . '">
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
