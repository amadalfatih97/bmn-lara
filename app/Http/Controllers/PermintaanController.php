<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\permintaan;
use App\detailPinjam;

class PermintaanController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request){
        
        return view('Permintaan.list');
    }

    // public function byUser(Request $request, $id){
        
    // }

    public function input(Request $request){
        return view('Permintaan.input');
    }

    // input permintaan
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $notrans = 'req'.date('ymd-His');
        $request->validate([
            'jadwalpakai' => 'required',
            'jadwalkembali' => 'required',
            'keperluan' => 'required',
        ]);
        $trans = new permintaan([
            /* database                      namefield */
            'kode'=> $notrans,
            'user_fk'=> Auth::user()->id,
            'perihal'=> $request->input('keperluan'),
            'waktu_proses'=> date('Y-m-d H:i:s'),
            'waktu_pakai'=> $request->input('jadwalpakai'),
            'waktu_kembali'=> $request->input('jadwalkembali'),
            'status'=> 'pending',
            'ket' => 'pinjam'
        ]);
        $trans->save();
        // if ($proses) {
            foreach ($request->requestAsets as $item => $value) {
                $datas = array(
                    'pinjam_fk' =>$trans->kode,
                    'aset_fk' => $value['productid'],
                );
                detailPinjam::create($datas);
            }
        // }
        return redirect('/permintaan')->with('success','data berhasil diinput!');
    }

    // show detail permintaan by id permintaan
    public function requestdetail($id){
        $kode = $id;
        $pinjam = //permintaan::where('kode', $kode)->firstOrFail();
        permintaan::select('permintaans.*','users.name')
                    ->leftJoin('users', 'permintaans.user_fk', '=', 'users.id')
                    ->where('permintaans.kode', $kode)->first();
        // ->get();
        
        $detail = DB::table('detail_pinjams')
        ->select('detail_pinjams.pinjam_fk','detail_pinjams.aset_fk',
                    'barangs.nama_barang','satuans.nama_satuan')
        // ->selectRaw('COUNT(barangs.nama_barang) AS qty')
        ->leftJoin('barangs','detail_pinjams.aset_fk','=','barangs.kode')
        ->leftJoin('satuans','barangs.satuan_fk','=','satuans.id')
        ->where('detail_pinjams.pinjam_fk', 'LIKE', '%'.$kode.'%')
        ->get();
        // dd($pinjam);
        return view('permintaan.detail', compact('pinjam','detail'));
    }

    // approve permintaan
    public function approve($id){
        $permintaan = permintaan::where('kode', $id)->firstOrFail();
        $permintaan->status = 'approved';
        $permintaan->save();
        // $satuan->delete();
        return redirect('/permintaan/list')->with('success','permintaan disetujui!');;
    }
}
