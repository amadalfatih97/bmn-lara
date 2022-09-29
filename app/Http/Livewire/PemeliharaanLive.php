<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Barang;
use App\pemeliharaan;
class PemeliharaanLive extends Component
{
    public $keyword = '';
    public function render()
    {
        // $keyword = $request->get('key') ? $request->get('key') : '' ;
        $pemeliharaans = DB::table('pemeliharaans')
        ->select('pemeliharaans.*','barangs.nama_barang')
        ->leftJoin('barangs', 'pemeliharaans.aset_fk', '=', 'barangs.kode')
        // ->where('barangs.aktif', '=', '1')
        ->where('nama_barang', 'LIKE', '%'.$this->keyword.'%')
        ->orderBy('nama_barang','asc')
        ->get();
        // return view('pemeliharaan.list',compact('pemeliharaans'));
        return view('livewire.pemeliharaan.pemeliharaan-live',compact('pemeliharaans'));
    }
}
