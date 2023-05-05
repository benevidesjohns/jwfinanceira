<?php

namespace App\Http\Controllers;

use App\Helpers\HttpHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    protected $base_url;

    public function __construct(HttpHandler $httpHandler)
    {
        $this->base_url = $httpHandler->apiBaseURL();
    }

    public function index()
    {
        return view('management.users');
    }

    public function show()
    {
        $users = Http::get($this->base_url . 'users')->json();
        $accounts = Http::get($this->base_url . 'accounts')->json();

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

                $user_id = $user['id'];
                $is_disabled = '';

                $is_associated_account = array_filter($accounts, function ($account) use ($user_id) {
                    return $account['fk_user'] == $user_id;
                });

                if ($is_associated_account) {
                    $is_disabled = 'btn-secondary disabled';
                }

                return '
                    <div class="btn-group">
                        <a href="" class="btn btn-secondary ml-auto"
                        data-toggle="modal" data-target="#modalEdit">
                            <i class="fas fa-solid fa-pen fa-lg" style="color:white"></i>
                        Editar</a>
                    </div>
                    <div class="btn-group ">
                        <a href="" class="' . 'btn btn-secondary ml-auto delete-btn' . $is_disabled . '"
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
