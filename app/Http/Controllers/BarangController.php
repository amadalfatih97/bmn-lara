<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Barang;
use App\satuan;
use App\lokasi;
use App\permintaan;
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

    public function byItem($key){
        
        return view('barang.view',compact('key'));
    }

    public function input(Request $request){
        $barangs = DB::table('kategoris')
                    ->where('aktif', '=', '1')
                    ->orderBy('nama_kategori','asc')
                    ->get();
        $satuans = DB::table('satuans')
                    ->where('aktif', '=', '1')
                    ->orderBy('nama_satuan','asc')
                    ->get();
        $lokasis = DB::table('lokasis')
                    ->where('aktif', '=', '1')
                    ->orderBy('nama_lokasi','asc')
                    ->get();
        // $data = DB::table('barangs')->latest('id')->first();
        // $last = isset($data->id) ? $data->id : 0;
        return view('barang.input', compact('barangs','satuans','lokasis'/* ,'last' */));
    }

    public function prosesInput(Request $request){
        /* validation */
        $request->validate([
            'tglperolehan' => 'required',
            'kategori' => 'required',
            'kodebmn' => 'required|max:50',
            'merek' => 'required|max:100',
            'kodeitem' => 'required|max:50',
            'lokasi' => 'required',
            'satuan' => 'required',
            'kondisi' => 'required|max:3',
            'status' => 'required|max:30',
            'tag' => 'max:250',
            'ket' => 'max:250',
        ]);
        
        /* proses input */
        $barang = new Barang([
            /* database                      namefield */
            'merek'=> $request->input('merek'),
            'kode_bmn'=> $request->input('kodebmn'),
            'kode_item'=> $request->input('kodeitem'),
            'kategori_fk'=> $request->input('kategori'),
            'keyword'=> $request->input('tag'),
            'satuan_fk'=> $request->input('satuan'),
            'lokasi_fk'=> $request->input('lokasi'),
            'tgl_perolehan'=> $request->input('tglperolehan'),
            'kondisi'=> $request->input('kondisi'),
            'status'=> $request->input('status'),
            'type'=> $request->input('switchservice') ? $request->input('switchservice') : 0,
            'pemeliharaan_terakhir'=> $request->input('terakhircek'),
            'jadwal_service'=> $request->input('waktupemeliharaan'),
            'ket'=> $request->input('ket'),
        ]);
        // $masuk = new masuk([
        //     'kodebarang' => $request->input('kode'),
        //     'qty'=> $request->input('stok'),
        //     'tanggalmasuk'=>$request->input('tanggalmasuk'),
        // ]);
        // $savebarang = 
        $barang->save();
        // if ($savebarang) {
            # code...
            // $masuk->save();
            return redirect('/barang/list')->with('success','data berhasil disimpan!');
        // }
    }

    public function barangMasuk(Request $request){
        /* validation */
        $request->validate([
            'namabarang' => 'required|max:100',
            'kode' => 'required|max:30',
            // 'satuan' => 'required|max:3',
            'lokasi' => 'required|max:3',
            'kondisi' => 'required|max:30',
            'status' => 'required|max:30',
        ]);
        $satuan = DB::table('barangs')
                    ->select('satuan_fk','jenis')
                    ->where('nama_barang', '=', $request->input('namabarang'))
                    ->first();
        // dd($satuan);
        /* proses input */
        $barang = new Barang([
            /* database                      namefield */
            'nama_barang'=> $request->input('namabarang'),
            'kode'=> $request->input('kode'),
            'jenis'=> $satuan->jenis,
            'satuan_fk'=> $satuan->satuan_fk,
            'lokasi_fk'=> $request->input('lokasi'),
            'stok'=> 1,
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
            'namabarang' => 'required|max:100',
            'jenis' => 'required|max:100',
            'kode' => 'required|max:100',
            'satuan' => 'required|max:3',
            'lokasi' => 'required|max:3',
            'kondisi' => 'required|max:30',
            'status' => 'required|max:30',
            'ket' => 'max:250',
        ]);
        
        /* proses update */
        $barang->jenis = $request->input('jenis');
        $barang->nama_barang = $request->input('namabarang');
        $barang->kode = $request->input('kode');
        $barang->stok = 1;
        $barang->satuan_fk = $request->input('satuan');
        $barang->lokasi_fk = $request->input('lokasi');
        $barang->kondisi = $request->input('kondisi');
        $barang->status = $request->input('status');
        $barang->ket = $request->input('ket');
        $barang->save();
        return redirect('/barang/list')->with('success','data berhasil diupdate!');;
    }

    public function riwayat($kode){
        $riwayat = DB::table('detail_pinjams')
        ->select('permintaans.perihal', 'permintaans.user_fk', 'permintaans.waktu_pakai', 'permintaans.waktu_kembali', 'permintaans.ket'
                ,'users.name','detail_pinjams.aset_fk','barangs.nama_barang','permintaans.kode'
                )
        ->leftJoin('permintaans', 'detail_pinjams.pinjam_fk' , '=', 'permintaans.kode')
        ->leftJoin('users', 'permintaans.user_fk', '=', 'users.id')
        ->leftJoin('barangs', 'detail_pinjams.aset_fk', '=', 'barangs.kode')
        ->where('nama_barang', '=', $kode)
        ->orderBy('permintaans.waktu_pakai','DESC')
        ->get();
        // dd($riwayat);
        return view('barang.riwayat',compact('riwayat'));
    }

    public function pemeliharaan($kode){
        $riwayat = DB::table('pemeliharaans')
        ->select('pemeliharaans.*','barangs.nama_barang')
        ->leftJoin('barangs', 'pemeliharaans.aset_fk', '=', 'barangs.kode')
        ->where('nama_barang', '=', $kode)
        ->orderBy('pemeliharaans.waktu_pelaksanaan','DESC')
        ->get();
        // dd($riwayat);
        return view('pemeliharaan.riwayat',compact('riwayat'));
    }

    public function prosesDelete($id,$key){
        // return $id;
        // dd($key);
        $barang = Barang::find($id);
        // $barang->delete();
        $barang->aktif = 0;
        $barang->stok = 0;
        $barang->save();
        return redirect('/barang/view/'.$key)->with('success','data berhasil dihapus!');;
    }

    public function stok($key){
        $stok = DB::table('barangs')
        ->select(DB::raw('count(nama_barang) as stok'))
        ->where('barangs.nama_barang', '=', $key)
        ->where('barangs.aktif', '=', '1')->first();
        dd($stok);
        // return $stok;
    }

    /* find stok */
    public function findstok(Request $request){
        // $stok=Barang::select('stok')->where('kode', $request->id)->first();
        $detail= DB::table('barangs')
        ->select('barangs.nama_barang', DB::raw('count(nama_barang) as stok'))
        ->where('barangs.nama_barang', '=', $request->name)
        ->where('barangs.status', '=', 'true')
        ->first();
        // ->where('barangs.aktif', '=', '1')->first();
        return response()->json($detail,200);
    }

    public function findByName(Request $request)
    {
        $datas = Barang::select('id','nama_barang', 'kode')
        ->where('nama_barang', $request->key)
        ->where('status', 'true')
        ->get();
        // return response()->json($data);
        foreach($datas as $data){
            echo "<option value='$data->kode'>$data->kode</option>";
        }
    }
}
