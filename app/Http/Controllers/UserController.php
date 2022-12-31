<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function showLogin()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $validation = $request->validate([
            'email' => 'required | email',
            'password' => 'required'
        ]);
        if (Auth::attempt($validation)) {
            session()->regenerate();
            return redirect()->route('dashboard');
        }
        return redirect()->back();
    }
    public function showRegister()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required | email | unique:users,email',
            'password' => 'required'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('show-login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
