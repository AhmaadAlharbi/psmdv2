<?php

namespace App\Http\Livewire;

use App\Models\Equip;
use App\Models\Station;
use Livewire\Component;
use App\Models\MainTask;

class StationEquip extends Component
{
    public $stations = [];
    public $selectedStation;
    public $station_id;
    public $voltage = [];
    public $selectedVoltage;
    public $equip = [];
    public $selectedEquip;
    public function mount()
    {
        $this->stations = Station::all();
    }
    public function render()
    {
        // $equip_name = Task::where('section_id', 2)->pluck('equip_number');
        return view('livewire.station-equip');
    }
    // public function getEquip($station_id)
    // {
    //     $voltage = Equip::where('station_id', $station_id)->pluck('voltage');
    //     return view('livewire.station-equip', compact('stations', 'voltage'));
    // }
    public function getVoltage()

    {
        sleep(1);
        $this->selectedVoltage = '';
        $this->selectedEquip = '';
        if ($this->selectedStation !== '-1') {
            $this->station_id = Station::where('SSNAME', $this->selectedStation)->pluck('id')->first();
            $this->voltage = Equip::where('station_id', $this->station_id)->distinct()->pluck('voltage_level');
        }
    }
    public function getEquip()
    {
        sleep(1);

        if ($this->selectedVoltage !== '-1') {

            $this->station_id = Station::where('SSNAME', $this->selectedStation)->pluck('id')->first();
            // $this->equip = Equip::where('station_id', $this->station_id)->where('voltage_level', $this->selectedVoltage)->get();
            // $this->equip = MainTask::where('station_id', $this->station_id)->where('voltage_level', $this->selectedVoltage)->pluck('equip_number');
            $this->equip = MainTask::where('station_id', $this->station_id)
                ->where('voltage_level', $this->selectedVoltage)
                ->select('equip_number')
                ->distinct()

                ->get();
        }
    }
}
