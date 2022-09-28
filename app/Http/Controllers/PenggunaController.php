<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\pengguna;
use App\user;
use App\Barang;
class PenggunaController extends Controller
{
    public function index(Request $request){
        $keyword = $request->get('key') ? $request->get('key') : '' ;
        $penggunas = DB::table('penggunas')
        ->select('penggunas.*','barangs.nama_barang', 'users.name')
        ->leftJoin('barangs', 'penggunas.aset_fk', '=', 'barangs.kode')
        ->leftJoin('users', 'penggunas.user_fk', '=', 'users.id')
        // ->where('barangs.aktif', '=', '1')
        ->where('nama_barang', 'LIKE', '%'.$keyword.'%')
        ->orderBy('nama_barang','asc')
        ->get();
        // dd($penggunas);
        return view('pengguna.list',compact('penggunas'));
    }

    public function input(Request $request){
        $barangs = DB::table('barangs')
                    ->orderBy('nama_barang','asc')
                    ->get();
        $users = DB::table('users')
                    ->orderBy('name','asc')
                    ->get();
        return view('pengguna.input', compact('barangs','users'));
    }

    

    public function prosesInput(Request $request){
        /* validation */
        $request->validate([
            'user' => 'required',
            'aset' => 'required',
            'perihal' => 'required',
            'mulai' => 'required',
        ]);
        
        /* proses input */
        $pengguna = new pengguna([
            /* database                      namefield */
            'aset_fk'=> $request->input('aset')
            , 'user_fk'=> $request->input('user')
            , 'perihal'=> $request->input('perihal')
            , 'ket'=> $request->input('ket')
            , 'waktu_mulai'=> $request->input('mulai')
            , 'waktu_selesai'=> $request->input('kembali')
        ]);
        $pengguna->save();
        // ini dipindah ke update
        if ($request->input('finish') == 'true') {
            DB::table('barangs')->where('kode',$request->input('aset'))
                                ->update(['status'=>'true','ket'=>'sedia']);
        };
        // end update
        return redirect('/pengguna/list')->with('success','data berhasil disimpan!');
    }

    public function dataById($id){
        $lokasi = lokasi::find($id);
        return view('lokasi.edit',compact('lokasi'));
        // return $id;
    }

    public function prosesUpdate(Request $request, $id){
        $lokasi = lokasi::find($id);
        /* validation */
        $request->validate([
            'nama_lokasi' => 'required|max:30'
            //,other
        ]);
        
        /* proses update */
        // echo var_dump($request->input());
        $lokasi->nama_lokasi = $request->input('nama_lokasi');
        $lokasi->save();
        return redirect('/setting/lokasi/list')->with('success','data berhasil diupdate!');;
    }

    public function prosesDelete($id){
        // return $id;
        $lokasi = lokasi::find($id);
        $lokasi->aktif = 0;
        $lokasi->save();
        // $lokasi->delete();
        return redirect('/setting/lokasi/list')->with('success','data berhasil dihapus!');;
    }
}
