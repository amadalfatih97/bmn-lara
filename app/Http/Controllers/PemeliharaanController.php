<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pemeliharaan;

class PemeliharaanController extends Controller
{
    public function index(){
        return view('pemeliharaan.list');
    }

    // public function input(Request $request){
    //     return view('pemeliharaan.input');
    // }

    public function prosesInput(Request $request){
        $request->validate([
            'kode' => 'required',
            'tglPelaksanaan' => 'required',
            'pelaksana' => 'required',
            'tindakan' => 'required',
        ]);
        $pemeliharaan = new pemeliharaan([
            /* database                      namefield */
            'barang_fk'=> $request->input('kode'),
            'tgl_pemeliharaan'=> $request->input('tglPelaksanaan'),
            'kondisi_sebelum'=> $request->input('kondisi'),
            'tindakan'=> $request->input('tindakan'),
            'pelaksana'=> $request->input('pelaksana'),
            'src_bukti'=> $request->input('src_bukti'),
        ]);
        $pemeliharaan->save();
        return redirect('/barang/list')->with('success','data pemeliharaan berhasil diinput!');
    }
}
