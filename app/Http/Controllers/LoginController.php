<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function create(){
        return view('Login.create');
    }
    
            function store(LoginRequest $request) 
    {
     if (Auth::attempt($request->validated(),true)) {
        return redirect()->route('home');
     }
     return redirect()->back()->withInput($request->only('email'))->withErrors(['email'=>'The provided credentials are incorrect.']);
}
    }
    
