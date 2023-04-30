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
