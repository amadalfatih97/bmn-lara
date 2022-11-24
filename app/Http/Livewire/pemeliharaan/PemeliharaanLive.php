<?php

namespace App\Http\Livewire\pemeliharaan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Barang;
use App\satuan;
use App\lokasi;
use Livewire\WithPagination;

class PemeliharaanLive extends Component
{
    use WithPagination;
    public $keyword = '';
    public $detail=[
            'kode'=>'',
            'kategori'=>'',
            'tanggal'=>'',
            'kondisi'=>'',
            'pelaksana'=>'',
            'tindakan'=>'',
            'merek'=>'',
            'lokasi'=>''
    ];

    public function render()
    {
        $datas = DB::table('pemeliharaans')
        ->select('pemeliharaans.*', 'barangs.merek', 'barangs.kategori_fk','barangs.kode_item')
        ->leftJoin('barangs', 'pemeliharaans.barang_fk', '=', 'barangs.kode_item')
        // // ->where('barangs.status', '=', 'true')
        ->where(function ($query) {
            $query->where('merek', 'LIKE', '%'.$this->keyword.'%')
            ->orWhere('kategori_fk', 'LIKE', '%'.$this->keyword.'%')
            ->orWhere('kode_item', 'LIKE', '%'.$this->keyword.'%');
        })
        ->orderBy('tgl_pemeliharaan','desc')
        ->paginate(5);

        return view('livewire.pemeliharaan.pemeliharaan-live',compact('datas'));
    }

    public function openDetail($kode){
        $data = DB::table('pemeliharaans')
        ->select('pemeliharaans.*', 'barangs.merek', 'barangs.kategori_fk','lokasis.nama_lokasi')
        ->leftJoin('barangs', 'pemeliharaans.barang_fk', '=', 'barangs.kode_item')
        ->leftJoin('lokasis', 'barangs.lokasi_fk', '=', 'lokasis.id')
        ->where('pemeliharaans.id', '=', $kode)
        ->first();
        $this->detail =[
            'kode'=>$data->barang_fk,
            'kategori'=>$data->kategori_fk,
            'tanggal'=>$data->tgl_pemeliharaan,
            'kondisi'=>$data->kondisi_sebelum,
            'pelaksana'=>$data->pelaksana,
            'tindakan'=>$data->tindakan,
            'merek'=>$data->merek,
            'lokasi'=>$data->nama_lokasi
        ] ;
        $this->dispatchBrowserEvent('openModalDetail',[
            'kode'=>$kode
        ]);
    }
}
