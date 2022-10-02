<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Barang;
use App\satuan;
use App\lokasi;
use Livewire\WithPagination;

class BarangLive extends Component
{
    use WithPagination;
    public $keyword = '';
    protected $listeners= ['delete'];

    public function render()
    {
        // $barangs = Barang::all();
        // $barangs = Barang::paginate(2);
        $barangs = DB::table('barangs')
        ->select('barangs.nama_barang','barangs.id', 'satuans.nama_satuan'/* , 'nama_lokasi' */, DB::raw('count(nama_barang) as qty'))
        ->leftJoin('satuans', 'barangs.satuan_fk', '=', 'satuans.id')
        // ->leftJoin('lokasis', 'barangs.lokasi_fk', '=', 'lokasis.id')
        ->where('barangs.aktif', '=', '1')
        // ->where('barangs.status', '=', 'true')
        ->where(function ($query) {
            $query->where('nama_barang', 'LIKE', '%'.$this->keyword.'%')
            ->orWhere('nama_satuan', 'LIKE', '%'.$this->keyword.'%');
            // ->orWhere('kode', 'LIKE', '%'.$this->keyword.'%')
            // ->orWhere('nama_lokasi', 'LIKE', '%'.$this->keyword.'%');
        })
        ->groupBy('nama_Barang')
        ->orderBy('barangs.nama_barang','asc')
        ->paginate(5);
        // ->get();
        // dd($barangs);
        return view('livewire.barang.barang-live',compact('barangs'));
    }

    public function confirmDelete($kode,$title,$message){
        $this->dispatchBrowserEvent('SwalConfirm',[
            'kode'=>$kode,
            'title'=>$title,
            'msg'=>$message
        ]);
    }

    public function delete($kode){
        $barang = Barang::find($kode);
        $barang->aktif = 0;
        $barang->stok = 0;
        $del= $barang->save(); 
        if ($del) {
            // $this->dispatchBrowserEvent('deleted');
            return redirect('/barang/list')->with('success','data berhasil dihapus!');;
        }
    }
}
