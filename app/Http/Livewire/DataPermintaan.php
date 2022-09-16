<?php

namespace App\Http\Livewire;
use App\Barang;

use Livewire\Component;

class DataPermintaan extends Component
{
    public $jadwalpakai, $jadwalkembali, $keperluan, $search='', $requestAsets=[], $searchAsets=[];


    public function render()
    {
        $barangs = Barang::select('barangs.kode','nama_barang', 'nama_satuan', 'kondisi', 'status')
        ->leftJoin('satuans', 'barangs.satuan_fk', '=', 'satuans.id')
        ->leftJoin('lokasis', 'barangs.lokasi_fk', '=', 'lokasis.id')
        ->where('barangs.aktif', '=', '1')
        ->where(function ($query) {
            $query->where('nama_barang', 'LIKE', '%'.$this->search.'%')
            ->orWhere('nama_satuan', 'LIKE', '%'.$this->search.'%')
            ->orWhere('nama_lokasi', 'LIKE', '%'.$this->search.'%');
        })
        ->orderBy('barangs.nama_barang','asc')
        ->limit(10)->get();
        info($this->requestAsets);
        return view('livewire.permintaan.data-permintaan', compact('barangs'));
    }

    public function addProduct()
    {
        $this->dispatchBrowserEvent('openFindModal');
    }

    public function search(){
        $barangs = Barang::select('barangs.kode','nama_barang', 'nama_satuan', 'kondisi', 'status')
        ->leftJoin('satuans', 'barangs.satuan_fk', '=', 'satuans.id')
        ->leftJoin('lokasis', 'barangs.lokasi_fk', '=', 'lokasis.id')
        ->where('barangs.aktif', '=', '1')
        ->where(function ($query) {
            $query->where('nama_barang', 'LIKE', '%'.$this->search.'%')
            ->orWhere('nama_satuan', 'LIKE', '%'.$this->search.'%')
            ->orWhere('nama_lokasi', 'LIKE', '%'.$this->search.'%');
        })
        ->orderBy('barangs.nama_barang','asc');
        
    }

    public function detailAset(){
        $this->dispatchBrowserEvent('openAsetModal');
    }

    public function onAdding(){
        $exist=0;
        // if (count($this->orderProducts) > 0 ) {
            foreach ($this->requestAsets as $key => $requestItem) {
                if ($this->requestAsets[$key]['productid'] == $this->kode) {
                    $this->requestAsets[$key] = [
                        'productid' => $this->kode, 
                        'nameitem' => $this->nama_barang
                    ];
                    $exist= 1;
                }
            }
            if($exist == 0){
                $this->requestAsets[] = ['productid' => $this->kode, 'nameitem' => $this->nama_barang];
            }
    }

    public function removeItem($index){
        unset($this->requestAsets[$index]);
        $this->requestAsets = array_values($this->requestAsets);
    }
}
