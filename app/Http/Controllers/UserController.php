<?php

namespace App\Http\Controllers;

use App\Helpers\HttpHandler;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
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
    }

    public function index()
    {
        return view('management.users');
    }

    public function create()
    {
        $roles = Role::all();

        return view('create.user', compact('roles'));
    }

    public function edit($id)
    {
        $data = Http::get($this->base_url . 'users/' . $id)->json();
        $user = $data['user'];

        return view('edit.user', compact('user'));
    }

    public function onCreate(Request $req)
    {
        $req->validate([
            'tipo_de_usuario' => Rule::notIn(['Selecione']),
            'nome' => 'required',
            'cpf' => 'required',
            'telefone' => 'required',
            'email' => 'required|email',
            'senha' => 'required|min:6',
            'logradouro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'required',
        ]);

        $address_data = [
            'city' => $req->cidade,
            'state' => $req->estado,
            'cep' => $req->cep,
            'address' => $req->logradouro,
        ];

        $address_data = Http::post($this->base_url . 'addresses', $address_data)->json();
        $address = $address_data['address'];

        $user_data = [
            'name' => $req->nome,
            'cpf' => $req->cpf,
            'phone_number' => $req->telefone,
            'email' => $req->email,
            'password' => Hash::make($req->senha),
            'fk_address' => $address['id'],
        ];

        $user_data = Http::post($this->base_url . 'users', $user_data)->json();
        $user = $user_data['user'];

        $user = User::find($user['id']);
        $user->assignRole($req->tipo_de_usuario);

        return redirect()->route('management/users');
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
