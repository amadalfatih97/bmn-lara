<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kategori;

class KategoriController extends Controller
{
    public function index(Request $request){
        $keyword = $request->get('key');
            $kategoris = kategori::where("nama_kategori","LIKE","%$keyword%")
            ->where("aktif","=","1")
            ->get();
        return view('kategori.list',compact('kategoris'));
    }

    public function input(Request $request){
        return view('kategori.input');
    }

    

    public function prosesInput(Request $request){
        /* validation */
        $request->validate([
            'nama_kategori' => 'required|max:30',
            'ket' => 'max:30'
        ]);
        
        /* proses input */
        $kategori = new kategori([
            /* database                      namefield */
            'nama_kategori'=> $request->input('nama_kategori')
            , 'ket'=> $request->input('ket')
        ]);
        $kategori->save();
        return redirect('/setting/kategori/list')->with('success','data berhasil disimpan!');
    }

    public function dataById($id){
        $kategori = kategori::find($id);
        return view('kategori.edit',compact('kategori'));
        // return $id;
    }

    public function prosesUpdate(Request $request, $id){
        $kategori = kategori::find($id);
        /* validation */
        $request->validate([
            'nama_kategori' => 'required|max:30',
            'ket' => 'max:30'
        ]);
        
        /* proses update */
        // echo var_dump($request->input());
        $kategori->nama_kategori = $request->input('nama_kategori');
        $kategori->ket = $request->input('ket');
        $kategori->save();
        return redirect('/setting/kategori/list')->with('success','data berhasil diupdate!');;
    }

    public function prosesDelete($id){
        // return $id;
        $kategori = kategori::find($id);
        $kategori->aktif = 0;
        $kategori->save();
        // $kategori->delete();
        return redirect('/setting/kategori/list')->with('success','data berhasil dihapus!');;
    }
}
