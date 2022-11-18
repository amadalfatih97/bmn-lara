<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Barang;
class BarangViewLive extends Component
{

    public $key;
    public $search='';

    public function render()
    {
        $barangs = DB::table('barangs')
        ->select('barangs.*','lokasis.nama_lokasi')
        ->leftJoin('lokasis', 'barangs.lokasi_fk', '=', 'lokasis.id')
        ->where('barangs.kategori_fk', '=', $this->key)
        ->where('barangs.aktif', '=', '1')
        ->where(function ($query) {
            $query->where('merek', 'LIKE', '%'.$this->search.'%')
            ->orWhere('kode_item', 'LIKE', '%'.$this->search.'%');
        })
        ->orderBy('barangs.merek','asc')
        ->get();
        // dd($barangs);
        return view('livewire.barang-view-live', compact('barangs'));
    }

    public function openInputModal(){
        $this->dispatchBrowserEvent('openAddModal');
    }
}
