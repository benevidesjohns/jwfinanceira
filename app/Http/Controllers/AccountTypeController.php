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
                return '<a href="" class="btn btn-dark ml-auto">X</a>';
            })
            ->escapeColumns([0])
            ->make(true);
    }
}
