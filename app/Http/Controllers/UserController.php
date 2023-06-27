<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller

{

    public function index()
    {
        return view('user.login');
    }

    public function login()
    {
        if (view()->exists('user.login')) {
            return view('user.login');
        } else {
            return response()->view('errors.404');
            // return abort(404);
        }
    }

    public function process(Request $request)
    {

        $validated = $request->validate([
            "email" => ['required', 'email'],
            "password" => 'required'
        ]);

        if (auth()->attempt($validated)) {
            $request->session()->regenerate();

            return redirect('/dashboard')->with('message', 'welcome back');
        }

        return back()->withErrors(['email' => 'Login failed'])->onlyInput('email');
    }

    public function register()
    {
        return view('user.register');
    }

    public function storeUsers(Request $request)
    {
        // dd($Request);
        $validated = $request->validate([
            "name" => ['required', 'min:4'],
            "email" => ['required', 'email', Rule::unique(
                'users',
                'email'
            )],
            "password" => 'required|confirmed|min:6'
        ]);

        $validated['password'] =  bcrypt($validated['password']);
        $user =  User::create($validated);
        auth()->login($user);
        return  back()->with('message', 'Data was Successfully Registered!');
    }

    public function logout(Request $request)
    {

        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'logout success');
    }
}
