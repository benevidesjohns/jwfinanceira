<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('management.users');
    }

    public function show()
    {
        $data = Http::get('http://api.local/api/users')->json();
        return DataTables::of($data)
            ->editColumn('id', function ($user) {
                return $user['id'];
            })
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
