<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

use App\Models\User;


class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request)
    {
        
        $role = Role::where('name', 'User')->first();
        
        $store = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id' => $role->id,
            'password'=> Hash::make($request->password),
        ]);
        if($store){
            return redirect()->route('login')->with('succes', 'Register Berhasil, silakan login');
        }else{
            return redirect()->back()->with('eror', 'Register gagal, Silakan coba lagi');
    }
    }
}
