<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SigninController extends Controller
{
    public function index(){
        $data['title'] = " Sign in";
        return view('front-pages.signin', $data);
    }
}
