<?php

namespace App\Http\Livewire;

use Livewire\Component;
// use Asantibanez\LivewireCharts\Facades\LivewireCharts;
// use Asantibanez\LivewireCharts\Models\RadarChartModel;
// use Asantibanez\LivewireCharts\Models\TreeMapChartModel;
// use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Illuminate\Support\Facades\DB;
use App\Barang;
use App\satuan;
use App\lokasi;
use App\permintaan;

class HomeLive extends Component
{
    public function render()
    {
        // $columnChartModel = (new ColumnChartModel())
        //                         ->setTitle('Expenses by Type')
        //                         ->addColumn('Food', 100, '#f6ad55')
        //                         ->addColumn('Shopping', 200, '#fc8181')
        //                         ->addColumn('Travel', 300, '#90cdf4');
        $barangs = DB::table('barangs')
        ->select(DB::raw('count(merek) as qty'))
        ->where('barangs.aktif', '=', '1')
        // ->orderBy('barangs.nama_barang','asc')
        ->first();

        // $data = DB::table('detail_pinjams')
        // ->select(DB::raw('sum(qty) as total'))
        // ->leftJoin('permintaans', 'detail_pinjams.pinjam_fk', '=', 'permintaans.kode')
        // ->where('permintaans.status', '=', 'pending')
        // ->first(); 
        // $antrian = $data->total ? $data->total : '0';

        // DB::table('barangs')
        // ->select(DB::raw('count(distinct nama_barang) as qty'))
        // ->where('barangs.aktif', '=', '1')
        // ->orderBy('barangs.nama_barang','asc')
        // ->first();

        $pakai = 0; 
        //DB::table('detail_pinjams')
        // ->select(DB::raw('sum(qty) as total'))
        // ->leftJoin('permintaans', 'detail_pinjams.pinjam_fk', '=', 'permintaans.kode')
        // ->where(function ($query) {
        //     $query->where('permintaans.status', '=', 'approved')
        //     ->orWhere('permintaans.status', '=', '%applied%');
        // })
        // ->whereIn('permintaans.status', ['approved','applied'])
        // ->first();
        // dd($pakai);
        return view('livewire.home-live', compact('barangs'/* ,'antrian' */,'pakai'));
        // ->with([
        //     'columnChartModel' => $columnChartModel
        //     // 'pieChartModel' => $pieChartModel,
        //     // 'lineChartModel' => $lineChartModel,
        //     // 'areaChartModel' => $areaChartModel,
        //     // 'multiLineChartModel' => $multiLineChartModel,
        //     // 'multiColumnChartModel' => $multiColumnChartModel,
        //     // 'radarChartModel' => $radarChartModel,
        //     // 'treeChartModel' => $treeChartModel,
        // ]);
    }
}
