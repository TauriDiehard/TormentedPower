<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Auth\VerifiesEmails;

class UserController extends Controller
{
    public function create(){
        return view('register');
    }
    
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required', 'min:5','unique:users'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        $formFields['password'] = Hash::make($formFields['password']);

        $user = User::create($formFields);
        auth()->login($user);
        return redirect('/Addon');
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/Addon');
    }

    public function login()
    {
       return view('login');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            
            return redirect('/Addon');

        }

        return back()->withErrors(['name' =>'Invalid bejeletkezés'])->onlyInput('name');
    }
}