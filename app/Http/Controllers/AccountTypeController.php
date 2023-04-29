<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountTypeController extends Controller
{
    public function index(){
        return view('types.account');
    }
}
