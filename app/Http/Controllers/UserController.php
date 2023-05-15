<?php

namespace App\Http\Controllers;

use App\Helpers\HttpHandler;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    protected $userService, $base_url, $users, $accounts;

    public function __construct(
        UserService $userService,
        HttpHandler $httpHandler
    ) {
        $this->userService = $userService;
        $this->base_url = $httpHandler->apiBaseURL();

        $this->users = Http::get($this->base_url . 'users')->json();
        $this->accounts = Http::get($this->base_url . 'accounts')->json();
    }

    public function index()
    {
        return view('management.users');
    }

    public function create()
    {
        return view('create.user');
    }

    public function edit($id)
    {
        $data = Http::get($this->base_url . 'users/' . $id)->json();
        $user = $data['user'];

        return view('edit.user', compact('user'));
    }

    public function show()
    {
        $users = $this->users;
        $accounts = $this->accounts;

        return DataTables::of($users)
            ->editColumn('name', function ($user) {
                return $user['name'];
            })
            ->editColumn('email', function ($user) {
                return $user['email'];
            })
            ->editColumn('phone_number', function ($user) {
                return $user['phone_number'];
            })
            ->editColumn('cpf', function ($user) {
                return $user['cpf'];
            })
            ->editColumn('acao', function ($user) use ($accounts) {
                $is_button_disabled = $this->userService->verifyAssociation($user, $accounts);

                return '
                    <div class="btn-group">
                        <a href="' . 'users/' . $user['id'] . '/edit' . '" class="btn btn-secondary ml-auto">
                            <i class="fas fa-solid fa-pen fa-lg" style="color:white"></i>
                        Editar</a>
                    </div>
                    <div class="btn-group ">
                        <a href="" class="' . 'btn btn-secondary ml-auto delete-btn' . $is_button_disabled . '"
                        data-toggle="modal" data-target="#modalDelete"
                        data-route="' . '../api/users/' . $user['id'] . '"
                        data-message="' . 'Deseja excluir o usuário ' . $user['name'] . '?' . '">
                        <i class="fas fa-solid fa-trash" style="color:white"></i>
                        Excluir</a>
                    </div>';
            })
            ->escapeColumns([0])
            ->make(true);
    }
}
