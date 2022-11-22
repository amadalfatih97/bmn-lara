<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Barang;
use App\lokasi;
class BarangViewLive extends Component
{

    public $key;
    public $search='';
    public $selectLokasi='';
    public $lokasis=[];
    public $selectPemeliharaan=[
        'kode'=>'',
        'merek'=>'',
        'tglPelaksanaan'=>'',
        'pelaksana'=>'',
        'kondisi'=>'',
        'tindakan'=>''
    ];

    public function mount(){
        $this->lokasis = lokasi::all();
        // $this->lokasis = DB::table('barangs')
        // ->select('barangs.lokasi_fk', 'lokasis.nama_lokasi')
        // ->leftJoin('lokasis', 'barangs.lokasi_fk', '=', 'lokasis.id')
        // ->groupBy('barangs.lokasi_fk')
        // ->get();
        // dd($this->lokasis);
    }
    
    public function render()
    {
        $barangs = DB::table('barangs')
        ->select('barangs.*','lokasis.nama_lokasi')
        ->leftJoin('lokasis', 'barangs.lokasi_fk', '=', 'lokasis.id')
        ->where('barangs.kategori_fk', '=', $this->key)
        ->where('barangs.aktif', '=', '1')
        ->where('barangs.lokasi_fk', 'LIKE', '%'.$this->selectLokasi.'%')
        ->where(function ($query) {
            $query->where('merek', 'LIKE', '%'.$this->search.'%')
            ->orWhere('kode_item', 'LIKE', '%'.$this->search.'%');
        })
        ->orderBy('barangs.merek','asc')
        ->paginate(5);
        // dd($barangs);
        return view('livewire.barang-view-live', compact('barangs'));
    }

    public function openInputModal($kode,$merek){
        $this->selectPemeliharaan=    [
            'kode'  => $kode,
            'merek' => $merek,
            'tglPelaksanaan'=>'',
            'pelaksana'=>'',
            'kondisi'=>'',
            'tindakan'=>''
        ];
            // dd($this->selectPemeliharaan);
        $this->dispatchBrowserEvent('openAddPemeliharaanModal');
    }

    // public function updatedselectLokasi(){
    //     dd($this->selectLokasi);
    // }
}
