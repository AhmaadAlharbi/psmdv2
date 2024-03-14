<?php

namespace App\Http\Livewire;

use App\Models\Equip;
use App\Models\Station;
use Livewire\Component;

class EquipPage extends Component
{
    public $stations = [];
    public $selectedStation;
    public $station_id;
    public $equip = [];
    public $voltages = [];

    public function render()
    {
        return view('livewire.equip-page');
    }
    public function mount()
    {
        $this->stations = Station::orderBy('SSNAME')->get();
        // $this->voltages = Equip::distinct()->pluck('voltage_level')->toArray();
    }
    public function search()
    {
        $station_id = Station::firstWhere('SSNAME', $this->selectedStation)->id;
        $this->equip = Equip::where('station_id', $station_id)->get();
    }
    public function clearStation()
    {
        $this->selectedStation = null;
        $this->equip = [];
    }
}
