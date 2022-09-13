<?php

namespace App\Http\Livewire;

use App\Barang;
use App\detailTrans;
use App\transaksi;
use Livewire\Component;

class PermintaanLive extends Component
{
    public $kodebrg, $namabrg, $qty, $stok, $tglkeluar, $orderProducts=[];
    // public function mount(){
    //     $this->orderProducts = [
    //         ['product_id' => '', 'quantity' =>0]
    //     ];
    // }
    public function render()
    {
        $barangs =  Barang::select('*')
                    ->where('aktif', '=', '1')
                    ->orderBy('namabarang', 'ASC')->get();
        info($this->orderProducts);
        return view('livewire.permintaan.permintaan-live',compact('barangs'));
    }

    public function eventAdd(){
        $this->kodebrg = ''; $this->qty=0; $this->stok=0; $this->tglkeluar= date('Y-m-d');
        $this->orderProducts=[];
        $this->dispatchBrowserEvent('openAddModal');
    }

    public function findstok($kode){
        $detail=Barang::select('kode','namabarang','namasatuan','stok')
        ->rightJoin('satuans', 'barangs.idsatuan', '=', 'satuans.id')
        ->where('kode', 'LIKE', $kode)
        ->get()
        ->first();
        $this->namabrg = $detail->namabarang;
        $this->stok = $detail->stok . ' ' .$detail->namasatuan;
    }

    public function addProduct()
    {
        $exist=0;
        // if (count($this->orderProducts) > 0 ) {
            foreach ($this->orderProducts as $key => $orderProduct) {
                if ($this->orderProducts[$key]['product_id'] == $this->kodebrg) {
                    $this->orderProducts[$key] = [
                        'product_id' => $this->kodebrg, 
                        'namabrg' => $this->namabrg,
                        'quantity' => $this->qty
                    ];
                    $exist= 1;
                }
            }
            if($exist == 0){
                $this->orderProducts[] = ['product_id' => $this->kodebrg, 'namabrg' => $this->namabrg, 'quantity' => $this->qty];
            }
        
    }

    public function save(){
        // $this->validate([
        //     'kodebrg'=>'required',
        //     'qty'=>'required'
        // ]);
        date_default_timezone_set('Asia/Jakarta');
        $notrans = 'OUT'.date('ymd-His');

        // $trans = new transaksi([
        //     /* database                      namefield */
        //     'kode'=> $notrans,
        //     'tanggal_trans'=> $this->tglkeluar,
        //     'user_fk'=> 'inputuser',
        //     'type_trans'=> 'out',
        //     'status'=> 'pending'
        // ]);
        // $trans->save();
        // foreach ($this->kodebrg as $item => $value) {
        //     $datas = array(
        //         'trans_fk' => $trans->kode,
        //         'barang_fk' => $this->kodebrg[$item],
        //         'quantity' => $this->qty[$item]
        //     );
        //     detailTrans::create($datas);
        // }
        $this->dispatchBrowserEvent('saveSuccessed', [
            'brg'=>json_encode($this->kodebrg)
        ]);

        // return redirect('/barang-keluar/list')->with('success','data berhasil diinput!');
    }
}
