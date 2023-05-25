<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    
    // public function () {
    //     return view('home');
    // }

    public function index(){
        return view('users.index');
    }

    public function create(){
        return view('users.create');
    }


    public function login(){
        return view('users.login');
    }
}
