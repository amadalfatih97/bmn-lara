<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Barang;
use App\detailPinjam;
use App\permintaan;
use Livewire\Component;
use Livewire\WithPagination;

class PermintaanLive extends Component
{
    use WithPagination;
    public $date1 = '' ;
    public $date2 = '';
    public $kodebrg, $namabrg, $qty, $stok, $tglkeluar, $orderProducts=[];
    
    // public function mount(){
    //     $this->orderProducts = [
    //         ['product_id' => '', 'quantity' =>0]
    //     ];
    // }

    // show all permintaan
    public function render()
    {
        $id = Auth::user()->id;
        $datenow = date('Y-m-d', strtotime('+1 day'));
        $month1ago = date('Y-m-d', strtotime('-1 month', strtotime( $datenow ))); 

        $this->date1 = $this->date1 ? $this->date1 : $month1ago;
        $this->date2 = $this->date2 ? $this->date2 : $datenow;

        if(Auth::user()->role == 'admin'){
            $permintaans    =   detailPinjam::select('detail_pinjams.pinjam_fk','users.name','users.id as userId','permintaans.created_at','permintaans.status')
                                ->selectRaw('COUNT(detail_pinjams.pinjam_fk) AS jumlah')
                                ->leftJoin('permintaans', 'detail_pinjams.pinjam_fk', '=', 'permintaans.kode')
                                ->leftJoin('users', 'permintaans.user_fk', '=', 'users.id')
                                // ->where('users.id','=',$id)
                                ->whereBetween('permintaans.created_at', [$this->date1, $this->date2])
                                ->groupBy('detail_pinjams.pinjam_fk')
                                ->orderBy('created_at','DESC')
                                ->paginate(5);
        }else{
            $permintaans    =   detailPinjam::select('detail_pinjams.pinjam_fk','users.name','users.id as userId','permintaans.created_at','permintaans.status')
                                ->selectRaw('COUNT(detail_pinjams.pinjam_fk) AS jumlah')
                                ->leftJoin('permintaans', 'detail_pinjams.pinjam_fk', '=', 'permintaans.kode')
                                ->leftJoin('users', 'permintaans.user_fk', '=', 'users.id')
                                ->where('users.id','=',$id)
                                // ->whereBetween('permintaans.created_at', [$this->date1, $this->date2])
                                ->groupBy('detail_pinjams.pinjam_fk')
                                ->orderBy('created_at','DESC')
                                ->paginate(5);
        }
        return view('livewire.permintaan.permintaan-live', compact('permintaans'));
    }

    // show modal add produk
    public function eventAdd(){
        $this->kodebrg = ''; $this->qty=0; $this->stok=0; $this->tglkeluar= date('Y-m-d');
        $this->orderProducts=[];
        $this->dispatchBrowserEvent('openAddModal');
    }

    // public function findstok($kode){
    //     $detail=Barang::select('kode','namabarang','namasatuan','stok')
    //     ->rightJoin('satuans', 'barangs.idsatuan', '=', 'satuans.id')
    //     ->where('kode', 'LIKE', $kode)
    //     ->get()
    //     ->first();
    //     $this->namabrg = $detail->namabarang;
    //     $this->stok = $detail->stok . ' ' .$detail->namasatuan;
    // }

    // add item request
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


    // public function save(){
    //     // $this->validate([
    //     //     'kodebrg'=>'required',
    //     //     'qty'=>'required'
    //     // ]);
    //     date_default_timezone_set('Asia/Jakarta');
    //     $notrans = 'OUT'.date('ymd-His');

    //     // $trans = new transaksi([
    //     //     /* database                      namefield */
    //     //     'kode'=> $notrans,
    //     //     'tanggal_trans'=> $this->tglkeluar,
    //     //     'user_fk'=> 'inputuser',
    //     //     'type_trans'=> 'out',
    //     //     'status'=> 'pending'
    //     // ]);
    //     // $trans->save();
    //     // foreach ($this->kodebrg as $item => $value) {
    //     //     $datas = array(
    //     //         'trans_fk' => $trans->kode,
    //     //         'barang_fk' => $this->kodebrg[$item],
    //     //         'quantity' => $this->qty[$item]
    //     //     );
    //     //     detailTrans::create($datas);
    //     // }
    //     $this->dispatchBrowserEvent('saveSuccessed', [
    //         'brg'=>json_encode($this->kodebrg)
    //     ]);

    //     // return redirect('/barang-keluar/list')->with('success','data berhasil diinput!');
    // }
}
