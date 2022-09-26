<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Barang;
use App\satuan;
use App\lokasi;
class BarangController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index(Request $request){
        
        return view('barang.list');
    }
    
    public function join(){
        
        /* $kodebarang='INV00';
        $barang = Barang::where('kode', $kodebarang)->firstOrFail();;
        $barang->update(['stok' => 5]); */
        date_default_timezone_set('Asia/Jakarta');
        // $barang2 = barang::find(1);
        $date = date('d-m-y H:i:s');//8/29/2011 11:16:12 AM
        // $dt = new DateTime('8/29/2011 11:16:12 AM');

        // $date = $dt->format('m/d/Y');
        // $time = $dt->format('H:i:s');
        return response()->json($date, 200);
        // dd($data);
    }

    public function input(Request $request){
        $satuans = DB::table('satuans')
                    ->orderBy('nama_satuan','asc')
                    ->get();
        $lokasis = DB::table('lokasis')
        ->orderBy('nama_lokasi','asc')
        ->get();
        // $data = DB::table('barangs')->latest('id')->first();
        // $last = isset($data->id) ? $data->id : 0;
        return view('barang.input', compact('satuans','lokasis'/* ,'last' */));
    }

    public function prosesInput(Request $request){
        /* validation */
        $request->validate([
            'namabarang' => 'required|max:30',
            'kode' => 'required|max:30',
            'stok' => 'required|max:4',
            'satuan' => 'required|max:3',
            'lokasi' => 'required|max:3',
            'kondisi' => 'required|max:30',
            'status' => 'required|max:30',
            'ket' => 'max:250',
        ]);
        
        /* proses input */
        $barang = new Barang([
            /* database                      namefield */
            'nama_barang'=> $request->input('namabarang'),
            'kode'=> $request->input('kode'),
            'satuan_fk'=> $request->input('satuan'),
            'lokasi_fk'=> $request->input('lokasi'),
            'stok'=> $request->input('stok'),
            'kondisi'=> $request->input('kondisi'),
            'status'=> $request->input('status'),
            'ket'=> $request->input('ket'),
        ]);
        // $masuk = new masuk([
        //     'kodebarang' => $request->input('kode'),
        //     'qty'=> $request->input('stok'),
        //     'tanggalmasuk'=>$request->input('tanggalmasuk'),
        // ]);
        $savebarang = $barang->save();
        if ($savebarang) {
            # code...
            // $masuk->save();
            return redirect('/barang/list')->with('success','data berhasil disimpan!');
        }
    }


    public function dataById($id){
        $barang = barang::find($id);
        $satuans = satuan::all();
        $lokasis = lokasi::all();
        return view('barang.edit',compact('barang','satuans','lokasis'));
        // return $id;
    }

    public function prosesUpdate(Request $request, $id){
        $barang = barang::find($id);
        /* validation */
        $request->validate([
            'namabarang' => 'required|max:30',
            'kode' => 'required|max:30',
            'stok' => 'required|max:4',
            'satuan' => 'required|max:3',
            'lokasi' => 'required|max:3',
            'kondisi' => 'required|max:30',
            'status' => 'required|max:30',
            'ket' => 'max:250',
        ]);
        
        /* proses update */
        $barang->nama_barang = $request->input('namabarang');
        $barang->kode = $request->input('kode');
        $barang->stok = $request->input('stok');
        $barang->satuan_fk = $request->input('satuan');
        $barang->lokasi_fk = $request->input('lokasi');
        $barang->kondisi = $request->input('kondisi');
        $barang->status = $request->input('status');
        $barang->ket = $request->input('ket');
        $barang->save();
        return redirect('/barang/list')->with('success','data berhasil diupdate!');;
    }

    public function prosesDelete($id){
        // return $id;
        $barang = Barang::find($id);
        // $barang->delete();
        $barang->aktif = 0;
        $barang->stok = 0;
        $barang->save();
        return redirect('/barang/list')->with('success','data berhasil dihapus!');;
    }

    
}
