<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class TransactionTypeController extends Controller
{
    public function index()
    {
        return view('types.transaction');
    }

    public function show()
    {
        $data = Http::get('http://api.local/api/types/transaction')->json();

        return DataTables::of($data)
            ->editColumn('id', function ($transactionType) {
                return $transactionType['id'];
            })
            ->editColumn('type', function ($transactionType) {
                return $transactionType['type'];
            })
            ->editColumn('acao', function () {
                return '<a href="" class="btn btn-dark ml-auto">X</a>';
            })
            ->escapeColumns([0])
            ->make(true);
    }
}
