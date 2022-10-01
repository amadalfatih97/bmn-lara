<?php

namespace App\Http\Controllers;

use App\lokasi;

use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index(Request $request){
        $keyword = $request->get('key');
            $lokasis = lokasi::where("nama_lokasi","LIKE","%$keyword%")
            ->where("aktif","=","1")
            ->get();
        return view('lokasi.list',compact('lokasis'));
    }

    public function input(Request $request){
        return view('lokasi.input');
    }

    

    public function prosesInput(Request $request){
        /* validation */
        $request->validate([
            'nama_lokasi' => 'required|max:30'
            //,other
        ]);
        
        /* proses input */
        $lokasi = new lokasi([
            /* database                      namefield */
            'nama_lokasi'=> $request->input('nama_lokasi')
            /* , 'nama_lokasi'=> $request->input('nama_lokasi') */
            /* , 'nama_lokasi'=> $request->input('nama_lokasi') */
        ]);
        $lokasi->save();
        return redirect('/setting/lokasi/list')->with('success','data berhasil disimpan!');
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
