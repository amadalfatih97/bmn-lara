<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Barang;
use App\Keluhan;
use App\User;
use App\Lokasi;

class KeluhanController extends Controller
{
    public function index(Request $request){
        $keluhans = DB::table('keluhans')
        ->select('keluhans.*','barangs.kategori_fk','barangs.merek','barangs.lokasi_fk','barangs.kode_item'
                ,'lokasis.nama_lokasi','users.name')
        ->leftJoin('barangs', 'keluhans.aset_fk', '=', 'barangs.id')
        ->leftJoin('lokasis', 'barangs.lokasi_fk', '=', 'lokasis.id')
        ->leftJoin('users', 'keluhans.user_fk', '=', 'users.id')
        // // ->where('barangs.aktif', '=', '1')
        // ->where('nama_barang', 'LIKE', '%'.$keyword.'%')
        ->orderBy('created_at','DESC')
        ->get();
        // dd($keluhans);
        return view('keluhan.list',compact('keluhans'));
    }

    public function input(Request $request){
        $lokasis = Lokasi::all();
        // dd($lokasis);
        $barangs = DB::table('barangs')
                    // ->groupBy('merek')
                    ->orderBy('kategori_fk','asc')
                    ->get();
        return view('keluhan.input', compact('barangs','lokasis'));
    }

    public function prosesInput(Request $request){
        /* validation */
        $request->validate([
            'lokasi' => 'required',
            'kategori' => 'required',
            'kode' => 'required',
            'desc' => 'required|max:200'
        ]);
        
        /* proses input */
        $keluhan = new Keluhan([
            /* database                      namefield */
            'aset_fk'=> $request->input('kode')
            , 'user_fk'=> Auth::user()->id
            , 'ket'=> $request->input('desc')
            , 'created_at'=> date('Y-m-d h:m:s')
            , 'status'=> 1
        ]);
        $keluhan->save();
        return redirect()->back()->with('success','Laporan keluhan terkirim!');;
    }

    public function dataById($id){
        $keluhan = DB::table('keluhans')
        ->select('keluhans.*','barangs.kategori_fk','barangs.merek','barangs.lokasi_fk','barangs.kode_item'
                ,'lokasis.nama_lokasi','users.name')
        ->leftJoin('barangs', 'keluhans.aset_fk', '=', 'barangs.id')
        ->leftJoin('lokasis', 'barangs.lokasi_fk', '=', 'lokasis.id')
        ->leftJoin('users', 'keluhans.user_fk', '=', 'users.id')
        ->where('keluhans.id', '=', $id)
        // ->where('nama_barang', 'LIKE', '%'.$keyword.'%')
        ->orderBy('created_at','asc')
        ->first();
        // dd($keluhan);
        return view('keluhan.detail',compact('keluhan'));
        // return $id;
    }

    public function accept(Request $request, $id){
        // dd('tes');
        $keluhan = Keluhan::find($id);
        $keluhan->status = 2;
        $keluhan->save();
        // $satuan->delete();
        return redirect()->back()->with('success','Laporan diterima!');;

    }

    public function prosesDelete($id){
        // return $id;
        $keluhan = Keluhan::find($id);
        $keluhan->aktif = 0;
        $keluhan->save();
        // $keluhan->delete();
        return redirect('/keluhan/list')->with('success','data berhasil dihapus!');;
    }

    public function proses($id){
        $keluhan = Keluhan::find($id);
        // dd($detail);
        $keluhan->status = 2;
        $keluhan->save();
    }
}
