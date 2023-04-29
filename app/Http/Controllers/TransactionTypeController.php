<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionTypeController extends Controller
{
    public function index(){
        return view('types.transaction');
    }
}
