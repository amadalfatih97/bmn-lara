<?php

namespace App\Http\Livewire\Permintaan;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use App\detailPinjam;
use App\permintaan;
use App\Barang;

class Lists extends Component

{
    use WithPagination;

    public function render()
    {
        if(Auth::user()->role == 'admin'){
            $permintaans    =   detailPinjam::select('detail_pinjams.permintaan_fk','users.name',
                                                    'users.id as userId','permintaans.created_at','permintaans.status')
                                ->selectRaw('COUNT(detail_pinjams.permintaan_fk) AS jumlah')
                                ->leftJoin('permintaans', 'detail_pinjams.permintaan_fk', '=', 'permintaans.id')
                                ->leftJoin('users', 'permintaans.user_fk', '=', 'users.id')
                                // ->where('users.id','=',$id)
                                // ->whereBetween('permintaans.created_at', [$this->date1, $this->date2])
                                ->groupBy('detail_pinjams.permintaan_fk')
                                ->orderBy('created_at','DESC')
                                ->paginate(5);
        }

        return view('livewire.permintaan.lists', compact('permintaans'));
    }
}
