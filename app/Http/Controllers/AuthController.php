<?php

namespace App\Http\Controllers;

use App\Mail\RegisterSuccessMail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function registerPage()
    {
        return view('auth.register');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name'=>'required|min:2',
            'email' =>'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'same:password'
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email' => $request->email,
            'password' => Hash::make($request-> password),
        ]);

        Mail::to($user->email)->send(new RegisterSuccessMail($user));

        return redirect()->route('auth.login-page')->with("success_register", "Вы успешно зарегестрировались! Войдите в аккаунт");
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => "Логин или пароль введен неверно!"
        ])->onlyInput("email");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
