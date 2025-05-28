<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;

class AuthAdminController extends Controller
{
    public function ShowloginAdmin()
    {
        return view('admin.login');
    }
   public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (AdminModel::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->with('error', 'Email atau password salah.');
    }

    public function logout(Request $request)
    {
        AdminModel::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
    
}
