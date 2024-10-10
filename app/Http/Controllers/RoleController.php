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
            'role_id' => 'required|string|max:2|unique:roles,role_id',
            'role_name' => 'required|string|max:255'
        ], [
            'role_id.required' => 'ID Role harus diisi',
            'role_id.unique' => 'ID Role sudah digunakan',
            'role_name.required' => 'Nama role harus diisi'
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
        $validatedData = validator($request->all(), [
            'role_id' => 'required|string|max:2',
            'role_name' => 'required|string|max:255'
        ], [
            'role_id.required' => 'ID Role harus diisi',
            'role_name.required' => 'Nama role harus diisi'
        ])->validate();

        $role -> role_name = $validatedData['role_name'];
        $role->save();
        
        $id = $validatedData['role_id'];
        $success = "Data role id $id berhasil diubah";
        $failed = "Data role id $id gagal diubah";

        // Taro di view
        if ($role) {
            return redirect(route('role-index'))->with('success', $success);
        } else {
            return redirect(route('role-index'))->with('failed', $failed);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        $id = $role->role_id;
        
        $success = "Data role id $id berhasil dihapus";
        $failed = "Data role id $id gagal dihapus";

        if ($role) {
            return redirect(route('role-index'))->with('success', $success);
        } else {
            return redirect(route('role-index'))->with('failed', $failed);
        }
    }
}
