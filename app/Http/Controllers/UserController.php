<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Menampilkan halaman profil user
    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    // Menampilkan form edit profil
    public function edit()
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

    // Menyimpan perubahan profil
    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'alamat' => 'nullable|string|max:255',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
