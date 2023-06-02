<?php

namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleControlller extends Controller
{
    
    public function index()
    {
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }
    
    public function create()
    {
        
        return view('role.create');
    }
    
    public function store(Request $request)
    {
        
        $role = Role::create([
            'nama' => $request->name,
        ]);
        
        
        return redirect()->route('role.index');
    }
    
    public function edit($id)
    {
        
        $role = Role::find($id);
        
       
        return view('role.edit', compact('role'));
    }
    
    public function update(Request $request, $id)
    {
       
        $role = Role::find($id);
        
        
        $role->update([
            'name' => $request->name,
        ]);
        
       
        return redirect()->route('role.index');
    }
    
    public function destroy($id)
    {
        // ambil data role berdasarkan id
        $role = Role::find($id);
        
        // hapus data role
        $role->delete();
        
        // alihkan halaman ke halaman roles
        return redirect()->route('role.index');
    }
}
