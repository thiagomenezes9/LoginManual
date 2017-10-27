<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{



    public function login(){
        return view('auth.login');

    }


    public function register(){

        return view('auth.register');
    }



    public function attempt(Request $request){
        $this->validate($request,[
           'email' => ['required','max:255','email'],
            'password'=>['required','min:6','max:255']

        ]);


        $credentials = $request->only('email','password');

        if(!Auth::attempt($credentials)){
            return redirect()->back()->with('fail','Usuário ou senha invalidos SEU BURRO!!')->withInput();
        }

        return redirect('dashboard');



    }


}
