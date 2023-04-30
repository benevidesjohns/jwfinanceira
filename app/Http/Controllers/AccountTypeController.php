<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class AccountTypeController extends Controller
{
    public function index()
    {
        return view('types.account');
    }

    public function show()
    {
        $data = Http::get('http://api.local/api/types/account')->json();

        return DataTables::of($data)
            ->editColumn('id', function ($accountType) {
                return $accountType['id'];
            })
            ->editColumn('type', function ($accountType) {
                return $accountType['type'];
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
