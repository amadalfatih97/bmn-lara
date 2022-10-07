<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\permintaan;
use App\detailPinjam;
use App\Barang;

class PermintaanController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request){
        
        return view('permintaan.list');
    }

    // public function byUser($id){
        // $userId = $id; 
        // dd($userId);
        // return view('Permintaan.list', compact('userId'));
    // }

    public function input(Request $request){
        return view('permintaan.input');
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
            // 'ket' => 'required',
        ]);
        $user = Auth::user()->role == 'pegawai' ? Auth::user()->id : $request->input('user');
        $trans = new permintaan([
            /* database                      namefield */
            'kode'=> $notrans,
            'user_fk'=> $user,
            'perihal'=> $request->input('keperluan'),
            'waktu_proses'=> date('Y-m-d H:i:s'),
            'waktu_pakai'=> $request->input('jadwalpakai'),
            'waktu_kembali'=> $request->input('jadwalkembali'),
            'status'=> 'pending',
            'ket' => $request->input('ket') ? $request->input('ket') : '-',
        ]);
        $trans->save();
        // if ($proses) {
            foreach ($request->requestAsets as $item => $value) {
                $datas = array(
                    'pinjam_fk' =>$trans->kode,
                    'aset_fk' => $value['productid'],
                    'qty' => $value['qty'],
                );
                detailPinjam::create($datas);
            }
        // }
        return redirect('/permintaan/list')->with('success','data berhasil diinput!');
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
        ->select('detail_pinjams.pinjam_fk','detail_pinjams.aset_fk','detail_pinjams.qty',
                    'barangs.nama_barang','barangs.jenis','barangs.kode','satuans.nama_satuan')
        // ->selectRaw('COUNT(barangs.nama_barang) AS qty')
        ->leftJoin('barangs','detail_pinjams.aset_fk','=','barangs.kode')
        ->leftJoin('satuans','barangs.satuan_fk','=','satuans.id')
        ->where('detail_pinjams.pinjam_fk', 'LIKE', '%'.$kode.'%')
        ->get();
        // dd($pinjam);
        return view('permintaan.detail', compact('pinjam','detail'));
    }

    // approve permintaan
    public function approve(Request $request, $id){
        $permintaan = permintaan::where('kode', $id)->firstOrFail();
        $detail = detailPinjam::where('pinjam_fk', $id)->get();
        // dd($detail);
        $permintaan->status = 'approved';
        $permintaan->ket = $request->ket;
        $permintaan->save();
        //update status barang jadi tidak tersedia
        foreach ($detail as $item => $value) {
            DB::table('barangs')->where('kode',$value['aset_fk'])
                                ->update(['status'=>'false','ket'=>'terpakai']);
        }
        return redirect()->back()->with('success','permintaan disetujui!');;
    }

    // applied permintaan
    public function applied(Request $request, $id){
        $permintaan = permintaan::where('kode', $id)->firstOrFail();
        $permintaan->status = 'applied';
        $permintaan->ket = $request->ket;
        $permintaan->save();
        // $satuan->delete();
        // return redirect('/permintaan/list')->with('success','Barang diterima bersangkutan!');;
        return redirect()->back()->with('success','Barang diterima bersangkutan!');;

    }

    // selesaikan permintaan
    public function finished(Request $request, $id){
        $permintaan = permintaan::where('kode', $id)->firstOrFail();
        $detail = detailPinjam::where('pinjam_fk', $id)->get();
        $permintaan->status = 'finished';
        $permintaan->ket = $request->ket;
        $permintaan->save();
        //update status barang jadi tersedia
        foreach ($detail as $item => $value) {
            DB::table('barangs')->where('kode',$value['aset_fk'])
                                ->update(['status'=>'true','ket'=>'sedia']);
        }
        return redirect()->back()->with('success','Peminjaman selesai Dikembalikan!');;
    }
}
