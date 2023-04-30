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
                return '<a href="" class="btn btn-dark ml-auto">X</a>';
            })
            ->escapeColumns([0])
            ->make(true);
    }
}
