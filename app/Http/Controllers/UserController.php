<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.kelolaakun.index', [
            'users' => User::latest()
                          ->filter(request(['search']))
                          ->paginate(10)
                          ->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kelolaakun.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/dashboard/kelola-akun')->with('success', 'Akun baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('dashboard.kelolaakun.edit', [
            'user' => User::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $rules = [
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username,' . $id,
            'email' => 'required|email:dns|unique:users,email,' . $id,
        ];

        // Jika password diisi, tambahkan validasi password
        if($request->filled('password')) {
            $rules['password'] = 'required|min:5|max:255';
        }

        $validatedData = $request->validate($rules);

        // Jika password diisi, hash password baru
        if($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            // Jika password kosong, gunakan password lama
            unset($validatedData['password']);
        }

        User::where('id', $id)->update($validatedData);

        return redirect('/dashboard/kelola-akun')->with('success', 'Data akun berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cek apakah user yang akan dihapus bukan user yang sedang login
        if($id != auth()->user()->id) {
            User::destroy($id);
            return redirect('/dashboard/kelola-akun')->with('success', 'Akun berhasil dihapus!');
        }
        
        return redirect('/dashboard/kelola-akun')->with('error', 'Anda tidak dapat menghapus akun yang sedang digunakan!');
    }
}
