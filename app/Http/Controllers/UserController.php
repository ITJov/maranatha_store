<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customers.index-customer', [
            'users' => User::all()
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create-customer',[
            'roles' => Role::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:users,name',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string',
            'role_id' => 'required|string|max:2|exists:role,id',
        ]);

        $id = IdGenerator::generate(['table' => 'users', 'length' => 10, 'prefix' => 'PGN-']);

        User::create([
            'id' => $id,
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role_id' => $validatedData['role_id'],
        ]);

        return redirect()->route('customer-index')->with('success', 'Pengguna berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('customers.edit-customer',[
            'users' => $user,
            'roles' => Role::all()
        ]);    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:users,name,' . $id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $id, 
            'password' => 'nullable|string', 
            'role_id' => 'required|string|max:2|exists:role,id', 
        ], [
            'name.required' => 'Nama customer harus diisi',
            'name.unique' => 'Nama customer sudah ada',
            'email.required' => 'Email customer harus diisi',
            'email.unique' => 'Email customer sudah ada',
            'role_id.required' => 'Role customer harus diisi',
        ]);
    
        // Cari user berdasarkan ID
        $user = User::findOrFail($id);
    
        // Update data
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
    
        // Jika password diisi, update password
        if ($request->filled('password')) {
            $user->password = Hash::make($validatedData['password']);
        }
    
        $user->role_id = $validatedData['role_id'];
    
        // Simpan perubahan
        $user->save();
    
        return redirect()->route('customer-index')->with('success', 'Pengguna berhasil diperbarui');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('customer-index')->with('success', 'Pengguna berhasil dihapus');
    }
}
