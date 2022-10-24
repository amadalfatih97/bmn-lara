<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Barang;
use App\Keluhan;
use App\User;

class KeluhanController extends Controller
{
    public function index(Request $request){
        $keluhans = DB::table('keluhans')
        ->select('keluhans.*','barangs.nama_barang','barangs.lokasi_fk','barangs.kode'
                ,'lokasis.nama_lokasi','users.name')
        ->leftJoin('barangs', 'keluhans.aset_fk', '=', 'barangs.kode')
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
        $barangs = DB::table('barangs')
                    ->groupBy('nama_barang')
                    ->orderBy('nama_barang','asc')
                    ->get();
        return view('keluhan.input', compact('barangs'));
    }

    public function prosesInput(Request $request){
        /* validation */
        $request->validate([
            'sarana' => 'required',
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
        ->select('keluhans.*','barangs.jenis','barangs.nama_barang','barangs.lokasi_fk','barangs.kode'
                ,'lokasis.nama_lokasi','users.name')
        ->leftJoin('barangs', 'keluhans.aset_fk', '=', 'barangs.kode')
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
