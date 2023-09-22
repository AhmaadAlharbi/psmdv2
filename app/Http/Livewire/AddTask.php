<?php

namespace App\Http\Livewire;

use DateTime;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Equip;
use App\Models\Station;
use Livewire\Component;
use App\Models\Engineer;
use App\Models\MainTask;
use App\Models\MainAlarm;
use App\Models\Department;
use App\Models\SectionTask;
use App\Models\TaskTimeline;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use App\Models\TaskAttachment;
use App\Models\TaskConversions;
use App\Notifications\TaskReport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\department_task_assignment;
use Illuminate\Support\Facades\Notification;


class AddTask extends Component
{
    use WithFileUploads;
    public $task;
    public $stations = [];
    public $selectedStation;
    public $stationDetails;
    public $station_id;
    public $voltage = [];
    public $main_alarms = [];
    public $selectedVoltage;
    public $equip = [];
    public $selectedEquip;
    public $transformers = [];
    public $selectedTransformer;
    public $engineers = [];
    public $selectedEngineer;
    public $area;
    public $engineerEmail;
    public $duty = false;
    public $selectedMainAlarm;
    public $work_type;
    public $date;
    public $problem;
    public $notes;
    public $photos = [];
    public $pic1;
    public $pic2;
    public $selectedEquipTr;
    public $route_id = 2;
    public $departments = [];
    public $selectedDepartment;
    public $otherMainAlarm = '';
    public $otherVoltage = '';
    public $otherEquip = '';

    protected $listeners = ['callEngineer' => 'getEngineer'];
    public function mount()
    {
        $this->stations = Station::all();
        $this->main_alarms = MainAlarm::where('department_id', Auth::user()->department_id)->get();
        $this->departments = Department::where('name', '!=', Auth::user()->department->name)->get();
        $this->selectedDepartment = Auth::user()->department_id;

        return view('livewire.add-task');
    }
    public function render(Request $request)
    {
        return view('livewire.add-task');
    }
    public function getStationInfo()
    {
        // Reset all the properties to their default values.
        $this->resetProperties();

        // Find the Station with the selected name.
        $station = Station::where('SSNAME', $this->selectedStation)->first();

        // If the Station is not found, return.
        if ($station === null) {
            return;
        }

        // Set the details of the found Station.
        $this->setStationDetails($station);

        // Set the Area based on the Department of the authenticated User.
        $this->setArea();

        // Emit an event to call the Engineer selection function.
        $this->emit('callEngineer', $this->area);
    }

    // Reset all the properties to their default values.
    private function resetProperties()
    {
        $this->engineers = [];
        $this->voltage = [];
        $this->transformers = [];
        $this->equip = [];
        $this->area = 0;
        $this->selectedMainAlarm = '';
        $this->engineerEmail = '';
        $this->selectedVoltage = '';
        $this->selectedEquip = '';
        $this->selectedEngineer = '';
    }

    // Set the details of the given Station.
    private function setStationDetails($station)
    {
        $this->stationDetails = $station;
        $this->station_id = $station->id;
    }

    // Set the Area based on the Department of the authenticated User.
    private function setArea()
    {
        switch (Auth::user()->department_id) {
            case 2:
                // Set the Area for Department 2.
                $this->setAreaForDeptTwo();
                break;
            case 5:
                // Set the Area for Department 5.
                $this->setAreaForDeptFive();
                break;
            default:
                $this->area = 1;
        }
    }

    // Set the Area for Department 2.
    private function setAreaForDeptTwo()
    {
        $controlCenter = $this->stationDetails->control;
        if ($controlCenter === 'JAHRA CONTROL CENTER' || $controlCenter === 'TOWN CONTROL CENTER') {
            $this->area = 1;
        } elseif ($controlCenter === 'SHUAIBA CONTROL CENTER' || $controlCenter === 'JABRIYA CONTROL CENTER') {
            $this->area = 2;
        } else {
            $this->area = 3;
        }
    }
    // Set the Area for Department 5.
    private function setAreaForDeptFive()
    {
        $controlCenter = $this->stationDetails->control;

        if ($controlCenter === 'JAHRA CONTROL CENTER' || $controlCenter === 'TOWN CONTROL CENTER') {
            $this->area = 1;
        } elseif ($controlCenter === 'SHUAIBA CONTROL CENTER') {
            $this->area = 2;
        } elseif ($controlCenter === 'JABRIYA CONTROL CENTER') {
            $this->area = 3;
        }
    }
    public function getEquip()
    {
        $this->equip = [];
        $this->transformers = [];
        $this->selectedEquip = ''; // Set equip_name to empty string
        $this->selectedTransformer = ''; // Set equip_name to empty string
        if ($this->selectedVoltage !== '-1') {
            $this->station_id = Station::where('SSNAME', $this->selectedStation)->pluck('id')->first();
            // dd($this->main_alarm);
            switch (MainAlarm::where('id', $this->selectedMainAlarm)->value('name')) {
                case ('General Alarm 11KV'):
                    $this->voltage = [];
                    array_push($this->voltage, "11KV");
                    $this->equip = Equip::where('station_id', $this->station_id)->where('voltage_level', $this->selectedVoltage)->get();
                    break;
                case ('Auto reclosure'):
                case ('Pilot Cable Fault Alarm'):
                case ('General Alarm 33KV'):
                    $this->voltage = [];
                    array_push($this->voltage, "33KV");
                    $this->equip = Equip::where('station_id', $this->station_id)->where('voltage_level', $this->selectedVoltage)->get();
                    break;
                case ('Dist Prot Main Alaram'):
                case ('Dist.Prot.Main B Alarm'):
                case ('Pilot cable Superv.Supply Fail Alarm'):
                case ('General Alarm 132KV'):
                    $this->voltage = [];
                    array_push($this->voltage, "132KV");
                    $this->equip = Equip::where('station_id', $this->station_id)->where('voltage_level', $this->selectedVoltage)->get();
                    break;
                case ('DC Supply 1 & 2 Fail Alarm'):
                    $this->voltage = [];
                    break;
                case ('General Alarm 300KV'):
                    $this->voltage = [];
                    array_push($this->voltage, "300KV");
                    $this->equip = Equip::where('station_id', $this->station_id)->where('voltage_level', $this->selectedVoltage)->get();

                    break;
                case ('B/Bar Protection Fail Alarm'):
                    $this->voltage = [];
                    array_push($this->voltage, "400KV", "300KV", "132KV", "33KV");
                    $this->equip = Equip::where('station_id', $this->station_id)->where('voltage_level', $this->selectedVoltage)->get();

                    break;
                case ('Transformer Clearance'):
                case ('Transformer out of step Alarm'):
                    $this->voltage = [];
                    $this->equip = [];
                    // $this->voltage = Equip::where('station_id', $this->station_id)->where('equip_name', 'LIKE', '%TR%')->distinct()->pluck('equip_name');
                    // $this->voltage = Equip::selectRaw('substr(equip_name,1,2)')->where('equip_name', 'LIKE', '%TR%')->distinct()->get();
                    $this->transformers = Equip::where('station_id', $this->station_id)->where('equip_name', 'LIKE', '%TR%')->distinct()->pluck('equip_name');
                    $this->equip = Equip::where('station_id', $this->station_id)->where('equip_name', $this->selectedVoltage)->distinct()->pluck('equip_number');
                    break;
                default:
                    // dd(MainAlarm::where('id', $this->main_alarm)->value('name'));
                    $this->equip = [];
                    $this->voltage = Equip::where('station_id', $this->station_id)->distinct()->pluck('voltage_level');
                    $this->equip = Equip::where('station_id', $this->station_id)->where('voltage_level', $this->selectedVoltage)->get();
            }
            // $this->equip = Equip::where('station_id', $this->station_id)->where('voltage_level', $this->selectedVoltage)->get();

            // $this->equip = Equip::where('station_id', $this->station_id)->where('voltage_level', $this->selectedVoltage)->get();

        }
    }
    public function getEngineer()
    {
        if ($this->area == 3) {
            if ($this->duty === false) {
                $this->engineers = Engineer::where('department_id', Auth::user()->department_id)->where('shift', 0)->get();
            } else {
                $this->engineers = Engineer::where('department_id', Auth::user()->department_id)->where('shift', 1)->get();
            }
        } else {
            if ($this->duty === false) {
                $this->engineers = Engineer::where('department_id', Auth::user()->department_id)->where('area', $this->area)->where('shift', 0)->get();
            } else {
                $this->engineers = Engineer::where('department_id', Auth::user()->department_id)->where('area', $this->area)->where('shift', 1)->get();
            }
        }
    }
    public function getEmail()
    {
        $this->engineerEmail = User::where('id', $this->selectedEngineer)->pluck('email')->first();
    }
    protected $rules = [
        'selectedStation' => 'required',
    ];
    public function submit(Request $request)
    {
        $this->validate();
        $this->date =  Carbon::now();
        $refNum = $this->date->format("Y/m") . '-' . rand(1, 10000);
        if (!empty($this->selectedEquip && $this->selectedEquip !== 'other')) {
            // If selectedEquip is not empty, set $equip_number and $equip_name to the selected values
            $selectedEquipArr = explode(" - ", $this->selectedEquip);
            $equip_number = $selectedEquipArr[0];
            $equip_name = $selectedEquipArr[1];
        } elseif (!empty($this->selectedTransformer)) {
            // If selectedTransformer is not empty, set $equip_number to the selected value
            $equip_number = $this->selectedTransformer;
            $equip_name = null;
        } else {
            $equip_number = $this->otherEquip;
            $equip_name = null;
        }
        //cehck main alarm if it is empty or not before saving to db
        if ($this->selectedMainAlarm === '') {
            $mainAlarmId = null;
        } else {
            $mainAlarmId = ($this->otherMainAlarm)
                ? MainAlarm::create(['name' => $this->otherMainAlarm, 'department_id' => Auth::user()->department_id])->id
                : $this->selectedMainAlarm;
        }
        if ($this->selectedVoltage == '') {
            $this->selectedVoltage = $this->otherVoltage;
        }
        //check if engineer select is empty to set it null
        if ($this->selectedEngineer === '') {
            $this->selectedEngineer = null;
        }
        if ($this->selectedVoltage === 'other' && isset($this->otherVoltage)) {
            $this->selectedVoltage = $this->otherVoltage;
        }
        $main_task = MainTask::create([
            'refNum' => $refNum,
            'station_id' =>  $this->station_id,
            'voltage_level' => $this->selectedVoltage,
            'equip_number' =>  $equip_number . ' - ' . $equip_name,
            'date' => $this->date,
            'problem' => $this->problem,
            'work_type' => $this->work_type,
            'notes' => $this->notes,
            'status' => 'pending',
            'main_alarm_id' => $mainAlarmId,
            'user_id' => Auth::user()->id,
        ]);

        $selectedDepartmentName = Department::where('id', $this->selectedDepartment)->first()->name;
        $selectedEngineerName = User::where('id', $this->selectedEngineer)->first()->name;
        $main_task_id = MainTask::latest()->first()->id;
        TaskTimeline::create([
            'main_tasks_id' => $main_task_id,
            'department_id' => Auth::user()->department_id,
            'status' => 'created',
            'action' => "The task has been assigned by " . Auth::user()->name . "from the " . Auth::user()->department->name
        ]);
        if ($this->selectedDepartment !== Auth::user()->department_id) {
            $converted_task = TaskConversions::create([
                'main_tasks_id' => $main_task_id,
                'source_department' => Auth::user()->department_id,
                'destination_department' => $this->selectedDepartment,
            ]);
            TaskTimeline::create([
                'main_tasks_id' => $main_task_id,
                'department_id' => Auth::user()->department_id,
                'status' => 'Converted',
                'Action' => 'The Task has been Converted from ' . Auth::user()->department->name . ' to ' . $selectedDepartmentName . " by " . Auth::user()->name
            ]);
            $departmentTask = department_task_assignment::create([
                'department_id' => Auth::user()->department_id,
                'main_tasks_id' => $main_task_id,
                'eng_id' => $this->selectedEngineer,
                'status' => 'pending'
            ]);
        } else {
            $departmentTask = department_task_assignment::create([
                'department_id' => $this->selectedDepartment,
                'main_tasks_id' => $main_task_id,
                'eng_id' => $this->selectedEngineer,
                'status' => 'pending'
            ]);
            TaskTimeline::create([
                'main_tasks_id' => $main_task_id,
                'department_id' => Auth::user()->department_id,
                'status' => 'Assined Engineer',
                'Action' => 'The Department has assined Engineer ' . $selectedEngineerName . " by " . Auth::user()->name
            ]);
        }
        foreach ($this->photos as $photo) {
            // $photo->store('photos');
            $name = $photo->getClientOriginalName();
            // $photo->storeAs('public', $name);
            $photo->storeAs('attachments/' . $main_task_id, $name, 'public');
            $attachments = new TaskAttachment();
            $attachments->main_tasks_id = $main_task_id;
            $attachments->department_id = Auth::user()->department_id;
            $attachments->file = $name;
            $attachments->user_id = Auth::user()->id;
            $attachments->save();
        }
        if ($this->selectedEngineer !== null) {
            $user = User::where('email', $this->engineerEmail)->first();
            // Notification::send($user, new TaskReport($main_task, $this->photos));
        }
        session()->flash('success', 'تم الاضافة بنجاح');

        return redirect("/dashboard/admin");
    }
}
