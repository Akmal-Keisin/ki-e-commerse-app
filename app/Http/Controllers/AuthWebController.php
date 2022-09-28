<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthWebController extends Controller
{
    public function getLogin() 
    {
        return view('livewire.auth_login');
    }

    public function authLogin(Request $request) 
    {
        $validatedData = $request->validate([
            'phone_number' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['phone_number' => $request->phone_number, 'password' => $request->password, 'role' => 'Admin'])) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }
        return back()->withErrors([
            'errors' => 'Phone number or password does not valid',
        ]);
    }

    public function authLogout(Request $request) 
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/login');
    }
}
