<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class AddressController extends Controller
{
    public function index()
    {
        return view('management.addresses');
    }

    public function show()
    {
        $data = Http::get('http://api.local/api/addresses')->json();

        return DataTables::of($data)
            ->editColumn('id', function ($address) {
                return $address['id'];
            })
            ->editColumn('city', function ($address) {
                return $address['city'];
            })
            ->editColumn('state', function ($address) {
                return $address['state'];
            })
            ->editColumn('cep', function ($address) {
                return $address['cep'];
            })
            ->editColumn('address', function ($address) {
                return $address['address'];
            })
            ->editColumn('acao', function () {
                return '<a href="" class="btn btn-dark ml-auto">X</a>';
            })
            ->escapeColumns([0])
            ->make(true);
    }
}
