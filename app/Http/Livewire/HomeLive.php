<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\RadarChartModel;
use Asantibanez\LivewireCharts\Models\TreeMapChartModel;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

class HomeLive extends Component
{
    public function render()
    {
        $columnChartModel = (new ColumnChartModel())
                                ->setTitle('Expenses by Type')
                                ->addColumn('Food', 100, '#f6ad55')
                                ->addColumn('Shopping', 200, '#fc8181')
                                ->addColumn('Travel', 300, '#90cdf4');

        return view('livewire.home-live')
        ->with([
            'columnChartModel' => $columnChartModel
            // 'pieChartModel' => $pieChartModel,
            // 'lineChartModel' => $lineChartModel,
            // 'areaChartModel' => $areaChartModel,
            // 'multiLineChartModel' => $multiLineChartModel,
            // 'multiColumnChartModel' => $multiColumnChartModel,
            // 'radarChartModel' => $radarChartModel,
            // 'treeChartModel' => $treeChartModel,
        ]);
    }
}
