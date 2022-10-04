<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\pengguna;
use App\user;
use App\Barang;
use App\permintaan;
use App\detailPinjam;
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
                    ->groupBy('barangs.nama_barang')
                    ->orderBy('nama_barang','asc')
                    ->get();
        $users = DB::table('users')
                    ->orderBy('name','asc')
                    ->get();
        return view('pengguna.input', compact('barangs','users'));
    }

    

    public function prosesInput(Request $request){
        date_default_timezone_set('Asia/Jakarta');
        $notrans = 'req'.date('ymd-His');
        $status = 'finish';
        
        /* validation */
        $request->validate([
            'user' => 'required',
            'sarana' => 'required',
            'aset' => 'required',
            'perihal' => 'required',
            'mulai' => 'required',
        ]);
        
        /* proses input pengguna */
        $pengguna = new pengguna([
            /* database                      namefield */
            'aset_fk'=> $request->input('aset')
            , 'user_fk'=> $request->input('user')
            , 'permintaan_fk'=> $notrans
            , 'perihal'=> $request->input('perihal')
            , 'ket'=> $request->input('ket')
            , 'waktu_mulai'=> $request->input('mulai')
            , 'waktu_selesai'=> $request->input('kembali')
        ]);
        $pengguna->save();
        
////update data barang
        if ($request->input('finish') != 'true') {
            // update status data aset
            DB::table('barangs')->where('kode',$request->input('aset'))
                                ->update(['status'=>'false','ket'=>'terpakai']);
            // end update
            $status = 'applied';
        }
////input data permintaan
        $trans = new permintaan([
            'kode'=> $notrans,
            'user_fk'=> $request->input('user'),
            'perihal'=> $request->input('perihal'),
            'waktu_proses'=> date('Y-m-d H:i:s'),
            'waktu_pakai'=> $request->input('mulai'),
            'waktu_kembali'=> $request->input('kembali'),
            'status'=> $status,
            'ket' => 'penggunaan tidak berjangka',
        ]);
        $trans->save();
        // if ($trans) {
            $detailTrans = new detailPinjam([
                'pinjam_fk' =>$trans->kode,
                'aset_fk' => $request->input('aset'),
                'qty' => 1,
            ]);
            $detailTrans->save();
        // }
/////end permintaan
        return redirect('/pengguna/list')->with('success','data berhasil disimpan!');
    }

    public function dataById($id){
        $barangs = DB::table('barangs')
                    ->orderBy('nama_barang','asc')
                    ->get();
        $users = DB::table('users')
                    ->orderBy('name','asc')
                    ->get();
        $pengguna = DB::table('penggunas')
        ->select('penggunas.*','barangs.nama_barang', 'users.name')
        ->leftJoin('barangs', 'penggunas.aset_fk', '=', 'barangs.kode')
        ->leftJoin('users', 'penggunas.user_fk', '=', 'users.id')
        ->where('penggunas.id', '=', $id)
        ->first();
        // dd($pengguna);
        return view('pengguna.edit',compact('pengguna','barangs','users'));
    }

    public function prosesUpdate(Request $request, $id){
        /* validation */
        $request->validate([
            'user' => 'required',
            'aset' => 'required',
            'perihal' => 'required',
            'mulai' => 'required',
        ]);
        
        $pengguna = pengguna::find($id);
        /* proses update */
        $pengguna->user_fk = $request->input('user');
        $pengguna->aset_fk = $request->input('aset');
        $pengguna->perihal = $request->input('perihal');
        $pengguna->waktu_mulai = $request->input('mulai');
        $pengguna->waktu_selesai = $request->input('kembali');
        $pengguna->ket = $request->input('ket');
        $pengguna->save();

        if ($request->input('finish') == 'true') {
            //ubah status permintaan
            $permintaan = permintaan::where('kode', $pengguna->permintaan_fk)->firstOrFail();
            $permintaan->status = 'finished';
            $permintaan->ket = 'pemakaian berjangka, dikembalikan';
            $permintaan->waktu_kembali = $request->input('kembali');
            $permintaan->save();

            // rubah status data barang
            DB::table('barangs')->where('kode',$request->input('aset'))
                                ->update(['status'=>'true','ket'=>'sedia']);
        };
        // end update
        return redirect('/pengguna/list')->with('success','data berhasil di Update!');
    }

    public function prosesDelete($id){
        $pengguna = pengguna::find($id);
        // $pengguna->aktif = 0;
        // $pengguna->save();
        $pengguna->delete();
        return redirect('/pengguna/list')->with('success','data berhasil dihapus!');;
    }
}
