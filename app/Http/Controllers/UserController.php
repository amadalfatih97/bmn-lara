<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
Use App\User;
use Illuminate\Support\Str;
class UserController extends Controller
{

    public function index(){
        $users = User::where("aktif","=","1")->get();
        // dd($users);
        return view('user.list', compact('users'));
    }
    
    public function input(Request $request){
        return view('user.input');
    }

    

    public function prosesInput(Request $request){
        /* validation */
        $request->validate([
            'nama' => 'required|max:20',
            'username' => 'required|max:30',
            'role' => 'required|max:30',
            'unit' => 'required|max:30'
        ]);
        
        /* proses input */
        $user = new User([
            /* database                      namefield */
            'name'=> $request->input('nama')
            , 'username'=> $request->input('username')
            , 'role'=> $request->input('role')
            , 'unit'=> $request->input('unit')
            , 'password'=> bcrypt($request->input('password'))
            , 'remember_token'=> Str::random(60)
        ]);
        $user->save();
        return redirect('/user/list')->with('success','data berhasil disimpan!');
    }

    public function dataById($id){
        $user = user::find($id);
        return view('user.edit',compact('user'));
        // return $id;
    }

    public function prosesUpdate(Request $request, $id){
        $user = User::find($id);
        /* validation */
        $request->validate([
            'nama' => 'required|max:20',
            'username' => 'required|max:30',
            'role' => 'required|max:30',
            'unit' => 'required|max:30'
        ]);
        
        /* proses update */
        // echo var_dump($request->input());
        $user->name = $request->input('nama');
        $user->username = $request->input('username');
        $user->role = $request->input('role');
        $user->unit = $request->input('unit');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect('/user/list')->with('success','data berhasil diupdate!');;
    }

    public function prosesDelete($id){
        // return $id;
        $user = User::find($id);
        $user->aktif = 0;
        $user->save();
        // $satuan->delete();
        return redirect('/user/list')->with('success','data berhasil dihapus!');;
    }

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
