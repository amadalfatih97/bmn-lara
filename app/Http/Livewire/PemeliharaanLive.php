<?php

namespace App\Http\Livewire;

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
    public $asets=[];
    public $lokasis=[];
    public $kategoris=[];
    public $selectLokasi='';
    public $selectKategori='';
    public $searchMerek='daikin';

    public function render()
    {
        $datas = DB::table('pemeliharaans')
        ->select('pemeliharaans.*', 'barangs.merek', 'barangs.kategori_fk','barmgs.kode_item')
        ->leftJoin('barangs', 'pemeliharaans.barang_fk', '=', 'barangs.id')
        // // ->where('barangs.status', '=', 'true')
        ->where(function ($query) {
            $query->where('merek', 'LIKE', '%'.$this->keyword.'%')
            ->orWhere('kategori_fk', 'LIKE', '%'.$this->keyword.'%')
            ->orWhere('kode_item', 'LIKE', '%'.$this->keyword.'%');
        })
        ->orderBy('tgl_pemeliharaan','asc')
        ->paginate(5);

        return view('livewire.pemeliharaan-live',compact('datas'));
    }

    public function openInputModal(){
        $this->selectLokasi='';
        $this->selectKategori='';
        $this->searchMerek='';
        $this->kategoris=[];
        $this->lokasis = lokasi::all();
        // dd($this->lokasis);
        $this->dispatchBrowserEvent('openAddModal');
    }

    public function updatedSelectLokasi(){
        // Barang::where('lokasi_fk',$this->selectLokasi)->get();
        $this->selectKategori='';
        $this->searchMerek='';
        $this->kategoris = DB::table('barangs')
        ->select('barangs.*')
        ->groupBy('kategori_fk')
        ->get();
        // dd($this->kategoris);

        $barang = DB::table('barangs')
        ->select('barangs.*')
        ->where('barangs.aktif', '=', '1')
        ->where('lokasi_fk', 'LIKE', '%'.$this->selectLokasi.'%')
        // ->where(function ($query) {
        //     $query->where('lokasi_fk', '=', '%'.$this->selectLokasi.'%')
        //     // ->orWhere('kategori_fk', 'LIKE', '%'.$this->selectKategori.'%')
        //     ->orwhere('merek', 'LIKE', '%'.$this->searchMerek.'%');
        // })
        ->orderBy('barangs.kategori_fk','asc')
        ->get();
        // dd($barang);
        $this->asets = $barang;
    }

    public function updatedSelectKategori(){
        // dd('updated ktg');
        // Barang::where('lokasi_fk',$this->selectLokasi)->get();
        $this->searchMerek='';

        $barang = DB::table('barangs')
        ->select('barangs.*')
        ->where('barangs.aktif', '=', '1')
        ->where('lokasi_fk', 'LIKE', '%'.$this->selectLokasi.'%')
        ->where('kategori_fk', 'LIKE', '%'.$this->selectKategori.'%')
        // ->where(function ($query) {
        //     $query
        //     ->or
        //     // ->orwhere('merek', 'LIKE', '%'.$this->searchMerek.'%');
        // })
        ->orderBy('barangs.kategori_fk','asc')
        ->get();
        // dd($barang);
        $this->asets = $barang;
    }
}
