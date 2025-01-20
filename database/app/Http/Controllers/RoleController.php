<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('roles.index-role', [
            'roles' => Role::all()
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('roles.create-role', compact('roles'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|string|max:2|unique:role,id',
            'nama_role' => 'required|string|max:255|unique:role,nama_role',
        ], [
            'id.required' => 'ID Role harus diisi',
            'id.unique' => 'ID Role sudah digunakan',
            'nama_role.required' => 'Nama Role harus diisi',
            'nama_role.unique' => 'Nama Role sudah digunakan',
        ]);
    
        try {
            $role = Role::create($validatedData);
    
            return redirect()->route('role-index')->with('success', 'Role berhasil ditambahkan.');
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') { // Duplicate entry error code
                return redirect()->back()->with('error', 'Role dengan nama yang sama sudah ada.');
            }
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
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
        return view('roles.edit-role', [
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $validatedData = $request->validate([
            'nama_role' => 'required|string|max:255',
        ], [
            'nama_role.required' => 'Nama role harus diisi',
            'nama_role.unique' => 'Nama role sudah ada'
        ]);
    
        $role->update($validatedData);
    
        return redirect()->route('role-index')->with('success', 'Role berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
    $role->delete();
    return redirect()->route('role-index')->with('success', 'Role berhasil dihapus.');
    }
}
