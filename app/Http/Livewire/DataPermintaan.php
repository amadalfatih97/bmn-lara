<?php

namespace App\Http\Livewire;
use App\Barang;
use App\User;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class DataPermintaan extends Component
{
    public $jadwalpakai, $jadwalkembali, $keperluan, $search='', $requestAsets=[], $searchAsets=[];
    public $productId, $qty, $stok, $nameitem, $selectJenis='';


    public function render()
    {
        $users = User::where("aktif","=","1")->get();

        $jenis = Barang::select('jenis')
        ->where('barangs.aktif', '=', '1')
        ->groupBy('barangs.jenis')
        ->orderBy('barangs.jenis','asc')
        ->limit(50)->get();

        $barangs = Barang::select('barangs.kode','nama_barang', 'nama_satuan', 'kondisi', 'status')
        ->leftJoin('satuans', 'barangs.satuan_fk', '=', 'satuans.id')
        ->leftJoin('lokasis', 'barangs.lokasi_fk', '=', 'lokasis.id')
        ->where('barangs.jenis', 'like', $this->selectJenis)
        ->where(function ($query) {
            $query->where('nama_barang', 'LIKE', '%'.$this->search.'%')
            ->orWhere('nama_satuan', 'LIKE', '%'.$this->search.'%')
            ->orWhere('nama_lokasi', 'LIKE', '%'.$this->search.'%');
        })
        ->groupBy('barangs.nama_barang')
        ->orderBy('barangs.nama_barang','asc')
        ->limit(50)->get();

        info($this->requestAsets);
        return view('livewire.permintaan.data-permintaan', compact('jenis','users','barangs'));
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
        $barang = DB::table('barangs')
        ->select('barangs.nama_barang')
        ->where('barangs.kode', '=', $this->productId)->first();
        // dd($barang);
        // if (count($this->orderProducts) > 0 ) {
            foreach ($this->requestAsets as $key => $requestItem) {
                if ($this->requestAsets[$key]['productid'] == $this->productId) {
                    $this->requestAsets[$key] = [
                        'productid' => $this->productId, 
                        'nameitem' => $this->requestAsets[$key]['nameitem'], 
                        'qty' => $this->qty
                    ];
                    $exist= 1;
                }
            }
            if($exist == 0){
                $this->requestAsets[] =     ['productid' => $this->productId, 
                                            'nameitem' =>$barang->nama_barang,// $this->nameitem, 
                                            'qty'=>$this->qty];
            }
        $this->dispatchBrowserEvent('openToast',[
            'type'=>'success',
            'title'=>'berhasil',
            'msg'=>'aset berhasil ditambahkan!'
        ]);
    }

    public function onAdding0($kode, $name){
        $exist=0;
        // if (count($this->orderProducts) > 0 ) {
            foreach ($this->requestAsets as $key => $requestItem) {
                if ($this->requestAsets[$key]['productid'] == $kode) {
                    $this->requestAsets[$key] = [
                        'productid' => $kode, 
                        'nameitem' => $name
                    ];
                    $exist= 1;
                }
            }
            if($exist == 0){
                $this->requestAsets[] = ['productid' => $kode, 'nameitem' => $name];
            }
        $this->dispatchBrowserEvent('openToast',[
            'type'=>'success',
            'title'=>'berhasil',
            'msg'=>'aset berhasil ditambahkan!'
        ]);
    }

    public function removeItem($index){
        unset($this->requestAsets[$index]);
        $this->requestAsets = array_values($this->requestAsets);
    }
}
