<?php

namespace Nisimpo\Auth\Http\Controllers;

use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function index(){
        return view('nisimpo::users.index');
    }
}
