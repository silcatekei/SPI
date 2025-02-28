<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {

    $validator = Validator::make($request->all(), [
        'username' => 'required',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

        $credentials = $request->only('username', 'password');

         if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
             return redirect()->intended(route('admin.dashboard'));
        }


        return redirect()->back()->withErrors([
            'username' => 'Invalid credentials',
        ])->withInput();
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function admin()
    {
        return view('admin');
    }

     public function logout(Request $request)
    {
         Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}