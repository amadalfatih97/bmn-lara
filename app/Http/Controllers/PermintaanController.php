<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaksi;
use App\detailTrans;

class PermintaanController extends Controller
{
    public function index(Request $request){
        
        return view('Permintaan.list');
    }

    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $notrans = 'OUT'.date('ymd-His');
        $request->validate([
            // 'kode' => 'required',
            'tanggalkeluar' => 'required',
            // 'userfk' => 'required',
            // 'type_trans' => 'required|max:20',
        ]);
        $trans = new transaksi([
            /* database                      namefield */
            'kode'=> $notrans,
            'tanggal_trans'=> $request->input('tanggalkeluar'),
            'user_fk'=> 'user01',
            'type_trans'=> 'req',
            'status'=> 'pending'
        ]);
        $trans->save();
        foreach ($request->orderProducts as $item => $value) {
            $datas = array(
                'trans_fk' =>$notrans,
                'barang_fk' => $value['product_id'],
                'quantity' => $value['quantity']
            );
            detailTrans::create($datas);
        }
        // dd($datas);
        // foreach ($request->orderProducts as $product) {
        //     $order->products()->attach(
        //         $product['product_id'],
        //         ['quantity' => $product['quantity']]
        //     );
        // }
        return redirect('/permintaan')->with('success','data berhasil diinput!');
        // return 'Order stored successfully!';
    }
}
