<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function login(Request $request){
        // Auth::logout();
        return view('login');
    }

    public function prosesLogin(Request $request){

        // dd($request->all());
        if(Auth::attempt($request->only('username','password'))){
            return redirect('/');
        }
        return redirect('login');
    }

    public function prosesLogot(){
        Auth::logout();
        return redirect('login');
    }
}
