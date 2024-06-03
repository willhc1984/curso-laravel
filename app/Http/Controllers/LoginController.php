<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //Login
    public function index() {
        //Carregar view
        return view('login.index');
    }
}
