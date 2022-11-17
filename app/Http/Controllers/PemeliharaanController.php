<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pemeliharaan;

class PemeliharaanController extends Controller
{
    public function index(){
        return view('pemeliharaan.list');
    }

    public function input(Request $request){
        return view('pemeliharaan.input');
    }
}
