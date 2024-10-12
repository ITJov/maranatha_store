<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('role.index', [
            'roles' => Role::all()
        ]); // masukkan tujuan view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role.create', [
            'roles' => Role::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|string|max:2|unique:roles,role_id',
            'nama_role' => 'required|string|max:255'
        ], [
            'id.required' => 'ID Role harus diisi',
            'id.unique' => 'ID Role sudah digunakan',
            'nama_role.required' => 'Nama role harus diisi'
        ]);
    
        $role = new Role($validatedData);
        $role->save();
    
        $success = 'Data role berhasil ditambahkan';
        $failed = 'Data role gagal ditambahkan';
    
        if ($role) {
            return redirect(route('role-index'))->with('success', $success);
        } else {
            return redirect(route('role-index'))->with('failed', $failed);
        }
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('role.edit', [
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        
    }
}
