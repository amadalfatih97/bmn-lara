<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Barang;
use App\pemeliharaan;

class PemeliharaanController extends Controller
{
    public function index(Request $request){
        $keyword = $request->get('key') ? $request->get('key') : '' ;
        $pemeliharaans = DB::table('pemeliharaans')
        ->select('pemeliharaans.*','barangs.nama_barang')
        ->leftJoin('barangs', 'pemeliharaans.aset_fk', '=', 'barangs.kode')
        // ->where('barangs.aktif', '=', '1')
        ->where('nama_barang', 'LIKE', '%'.$keyword.'%')
        ->orderBy('nama_barang','asc')
        ->get();
        return view('pemeliharaan.list',compact('pemeliharaans'));
    }

    public function input(Request $request){
        $barangs = DB::table('barangs')
                    ->orderBy('nama_barang','asc')
                    ->get();
        return view('pemeliharaan.input', compact('barangs'));
    }

    

    public function prosesInput(Request $request){
        
        /* validation */
        $request->validate([
            'aset' => 'required',
            'tanggal' => 'required',
            'hasil' => 'required',
        ]);
        
        /* proses input pengguna */
        $datas = new pemeliharaan([
            /* database                      namefield */
            'aset_fk'=> $request->input('aset')
            , 'waktu_pelaksanaan'=> $request->input('tanggal')
            , 'hasil'=> $request->input('hasil')
            , 'tindak_lanjut'=> $request->input('tindaklanjut')
            , 'ket'=> $request->input('ket')
            , 'img'=> $request->input('img')
        ]);
        $datas->save();
        return redirect('/pemeliharaan/list')->with('success','data berhasil disimpan!');
    }

    public function dataById($id){
        $barangs = DB::table('barangs')
                    ->orderBy('nama_barang','asc')
                    ->get();
        $pemeliharaan = DB::table('pemeliharaans')
        ->select('pemeliharaans.*','barangs.nama_barang')
        ->leftJoin('barangs', 'pemeliharaans.aset_fk', '=', 'barangs.kode')
        ->where('pemeliharaans.id', '=', $id)
        ->first();
        // dd($pengguna);
        return view('pemeliharaan.edit',compact('pemeliharaan','barangs'));
    }

    public function prosesUpdate(Request $request, $id){
        /* validation */
        $request->validate([
            'aset' => 'required',
            'tanggal' => 'required',
            'hasil' => 'required',
        ]);
        
        $pemeliharaan = pemeliharaan::find($id);
        /* proses update */
        $pemeliharaan->aset_fk = $request->input('aset');
        $pemeliharaan->hasil = $request->input('hasil');
        $pemeliharaan->waktu_pelaksanaan = $request->input('tanggal');
        $pemeliharaan->tindak_lanjut = $request->input('tindaklanjut');
        $pemeliharaan->ket = $request->input('ket');
        $pemeliharaan->img = $request->input('img');
        $pemeliharaan->save();

        // end update
        return redirect('/pemeliharaan/list')->with('success','data berhasil di Update!');
    }

    public function prosesDelete($id){
        $pemeliharaan = pemeliharaan::find($id);
        // $pemeliharaan->aktif = 0;
        // $pemeliharaan->save();
        $pemeliharaan->delete();
        return redirect('/pemeliharaan/list')->with('success','data berhasil dihapus!');;
    }
}
