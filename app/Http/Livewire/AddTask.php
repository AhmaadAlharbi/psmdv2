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
use Illuminate\Support\Facades\Log;
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
    public $otherTransformer = '';
    public $is_emergency = false;
    public $user_id;
    public $names = [];
    protected $listeners = ['callEngineer' => 'getEngineer'];

    public function mount()
    {
        $this->stations = Station::all();
        $this->departments = Department::where('name', '!=', Auth::user()->department->name)->get();
        $this->selectedDepartment = Auth::user()->department_id;
        $this->main_alarms = MainAlarm::where('department_id', $this->selectedDepartment)->get();
        return view('livewire.add-task');
    }
    public function render(Request $request)
    {
        return view('livewire.add-task');
    }
    public function getStationInfo()
    {
        $this->main_alarms = MainAlarm::where('department_id', $this->selectedDepartment)->get();

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
        $this->selectedEngineer = null;
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
        } else {
            $this->area = 4;
        }
    }
    public function getEquip()
    {
        $this->equip = [];
        $this->transformers = [];
        $this->selectedEquip = ''; // Set equip_name to empty string
        $this->selectedTransformer = ''; // Set equip_name to empty string
        // if ($this->selectedVoltage !== '-1') {
        //     $this->station_id = Station::where('SSNAME', $this->selectedStation)->pluck('id')->first();
        //     // dd($this->main_alarm);
        //     switch (MainAlarm::where('id', $this->selectedMainAlarm)->value('name')) {
        //         case ('General Alarm 11KV'):
        //             $this->voltage = [];
        //             array_push($this->voltage, "11KV");
        //             $this->equip = Equip::where('station_id', $this->station_id)->where('voltage_level', $this->selectedVoltage)->get();
        //             break;
        //         case ('Auto reclosure'):
        //         case ('Pilot Cable Fault Alarm'):
        //         case ('General Alarm 33KV'):
        //             $this->voltage = [];
        //             array_push($this->voltage, "33KV");
        //             $this->equip = Equip::where('station_id', $this->station_id)->where('voltage_level', $this->selectedVoltage)->get();
        //             break;
        //         case ('Dist Prot Main Alaram'):
        //         case ('Dist.Prot.Main B Alarm'):
        //         case ('Pilot cable Superv.Supply Fail Alarm'):
        //         case ('General Alarm 132KV'):
        //             $this->voltage = [];
        //             array_push($this->voltage, "132KV");
        //             $this->equip = Equip::where('station_id', $this->station_id)->where('voltage_level', $this->selectedVoltage)->get();
        //             break;
        //         case ('DC Supply 1 & 2 Fail Alarm'):
        //             $this->voltage = [];
        //             break;
        //         case ('General Alarm 300KV'):
        //             $this->voltage = [];
        //             array_push($this->voltage, "300KV");
        //             $this->equip = Equip::where('station_id', $this->station_id)->where('voltage_level', $this->selectedVoltage)->get();

        //             break;
        //         case ('B/Bar Protection Fail Alarm'):
        //             $this->voltage = [];
        //             array_push($this->voltage, "400KV", "300KV", "132KV", "33KV");
        //             $this->equip = Equip::where('station_id', $this->station_id)->where('voltage_level', $this->selectedVoltage)->get();

        //             break;
        //         case ('Transformer Clearance'):
        //         case ('Transformer out of step Alarm'):
        //             $this->voltage = [];
        //             $this->equip = [];
        //             // $this->voltage = Equip::where('station_id', $this->station_id)->where('equip_name', 'LIKE', '%TR%')->distinct()->pluck('equip_name');
        //             // $this->voltage = Equip::selectRaw('substr(equip_name,1,2)')->where('equip_name', 'LIKE', '%TR%')->distinct()->get();
        //             $this->transformers = Equip::where('station_id', $this->station_id)->where('equip_name', 'LIKE', '%TR%')->distinct()->pluck('equip_name');
        //             $this->equip = Equip::where('station_id', $this->station_id)->where('equip_name', $this->selectedVoltage)->distinct()->pluck('equip_number');
        //             break;
        //         default:
        //             // dd(MainAlarm::where('id', $this->main_alarm)->value('name'));
        //             $this->equip = [];
        //             $this->voltage = Equip::where('station_id', $this->station_id)->distinct()->pluck('voltage_level');
        //             $this->equip = Equip::where('station_id', $this->station_id)->where('voltage_level', $this->selectedVoltage)->get();
        //     }
        //     // $this->equip = Equip::where('station_id', $this->station_id)->where('voltage_level', $this->selectedVoltage)->get();

        //     // $this->equip = Equip::where('station_id', $this->station_id)->where('voltage_level', $this->selectedVoltage)->get();

        // }
        $this->equip = [];
        $this->voltage = Equip::where('station_id', $this->station_id)->distinct()->pluck('voltage_level');
        $this->equip = Equip::where('station_id', $this->station_id)->where('voltage_level', $this->selectedVoltage)->get();
    }
    /**
     * Get engineers based on department, area, and shift criteria.
     */
    // public function getEngineer()
    // {
    //     $userDepartmentId = Auth::user()->department_id;
    //     $area = $this->area;
    //     // Default to showing day shift engineers
    //     $shiftId = 1; // Assuming 1 is the ID for the day shift
    //     // Change the shift to night shift if the checkbox is checked
    //     if ($this->duty) {
    //         $shiftId = 2; // Assuming 2 is the ID for the night shift
    //     }
    //     // Query engineers based on the department

    //     //protections departments engineers (2 = Protection Department)
    //     if ($userDepartmentId === 2) {
    //         $engineers = Engineer::where('department_id', $userDepartmentId)
    //             // Use a conditional 'when' clause to filter by area if not equal to 3
    //             ->when($area != 3, function ($query) use ($area) {
    //                 $query->whereHas('areas', function ($subquery) use ($area) {
    //                     $subquery->where('areas.id', $area); // Filter by the specified area ID
    //                 });
    //             })

    //             // Further filter by shift using 'whereHas'
    //             ->whereHas('shifts', function ($subquery) use ($shiftId) {
    //                 $subquery->where('shifts.id', $shiftId); // Filter by the specified shift ID
    //             })
    //             // Get the resulting collection of engineers
    //             ->get();
    //         $this->engineers = $engineers;
    //     }
    //     //Switchgears departments engineers (5 = Protection Department)
    //     if ($userDepartmentId === 5) {
    //         $engineers = Engineer::where('department_id', $userDepartmentId)
    //             // Use a conditional 'when' clause to filter by area if not equal to 3
    //             ->when($area != 4, function ($query) use ($area) {
    //                 $query->whereHas('areas', function ($subquery) use ($area) {
    //                     $subquery->where('areas.id', $area); // Filter by the specified area ID
    //                 });
    //             })
    //             // Further filter by shift using 'whereHas'
    //             ->whereHas('shifts', function ($subquery) use ($shiftId) {
    //                 $subquery->where('shifts.id', $shiftId); // Filter by the specified shift ID
    //             })
    //             // Get the resulting collection of engineers
    //             ->get();
    //         $this->engineers = $engineers;
    //     }
    //     ///
    //     //Battreis departments engineers (3 = Battries Department)
    //     if ($userDepartmentId === 3) {
    //         $engineers = Engineer::where('department_id', $userDepartmentId)
    //             // Use a conditional 'when' clause to filter by area if not equal to 3                             
    //             // Further filter by shift using 'whereHas'
    //             ->whereHas('shifts', function ($subquery) use ($shiftId) {
    //                 $subquery->where('shifts.id', $shiftId); // Filter by the specified shift ID
    //             })
    //             // Get the resulting collection of engineers
    //             ->get();
    //         $this->engineers = $engineers;
    //     }
    // }
    protected $debounce = [
        'getEngineer' => 300, // milliseconds
    ];

    public function getEngineer()
    {
        $userDepartmentId = Auth::user()->department_id;
        $area = $this->area;

        // Determine the shift based on the duty checkbox (day shift by default)
        $shiftId = $this->duty ? 2 : 1; // Assuming 2 is the ID for night shift, and 1 for day shift

        // Start building the query
        $query = Engineer::join('users', 'users.id', '=', 'engineers.user_id')
            ->where('engineers.department_id', $userDepartmentId);
        // Filter by user input if available

        // Retrieve the engineers based on the conditions
        $engineers = $query->orderBy('users.name', 'asc')
            ->get();

        $this->engineers = $engineers;
        // Extract names from the collection
        $this->names = array_column($engineers->toArray(), 'name');



        // $query = Engineer::join('users', 'users.id', '=', 'engineers.user_id')
        //     ->where('engineers.department_id', $userDepartmentId)
        //     ->when($userDepartmentId === 2, function ($query) use ($area) {
        //         // Filter by area if the user's department is Protection
        //         return $query->when($area !== 3, function ($query) use ($area) {
        //             return $query->whereHas('areas', function ($subquery) use ($area) {
        //                 $subquery->where('areas.id', $area);
        //             });
        //         });
        //     })
        //     ->when($userDepartmentId === 5, function ($query) use ($area) {
        //         // Filter by area if the user's department is Switchgears
        //         return $query->when($area !== 4, function ($query) use ($area) {
        //             return $query->whereHas('areas', function ($subquery) use ($area) {
        //                 $subquery->where('areas.id', $area);
        //             });
        //         });
        //     })
        //     ->when(in_array($userDepartmentId, [3, 4]), function ($query) use ($shiftId) {
        //         // Filter by shift if the user's department is Batteries or Transformers
        //         return $query->whereHas('shifts', function ($subquery) use ($shiftId) {
        //             $subquery->where('shifts.id', $shiftId);
        //         });
        //     });

        // // Retrieve the engineers based on the conditions
        // $engineers = $query->orderBy('users.name', 'asc')
        //     ->get();
        // $this->engineers = $engineers;
    }
    public function clearStation()
    {
        $this->selectedStation = null;
        $this->stationDetails = null;
    }
    public function clearEngineer()
    {
        $this->selectedEngineer = null;
        $this->user_id = null;
        $this->engineerEmail = null;
        $this->getEngineer();
    }
    public function getEmail()
    {
        $selectedUserId = $this->selectedEngineer;
        // dd($selectedUserId);
        // Retrieve the user's email
        $user = User::where('name', $selectedUserId)->first();
        if ($user) {
            $this->engineerEmail = $user->email;
            $this->user_id = $user->id;
        } else {
            $this->engineerEmail = null; // Handle the case when the user is not found
            $this->user_id = null;
        }
    }

    protected $rules = [
        'selectedStation' => 'required',
    ];
    // public function submit3(Request $request)
    // {
    //     $this->validate();
    //     $this->date =  Carbon::now();
    //     $refNum = $this->date->format("Y/m") . '-' . rand(1, 10000);
    //     if (!empty($this->selectedEquip && $this->selectedEquip !== 'other')) {
    //         // If selectedEquip is not empty, set $equip_number and $equip_name to the selected values
    //         $selectedEquipArr = explode(" - ", $this->selectedEquip);
    //         $equip_number = $selectedEquipArr[0];
    //         $equip_name = $selectedEquipArr[1];
    //     } elseif (!empty($this->selectedTransformer)) {
    //         // If selectedTransformer is not empty, set $equip_number to the selected value
    //         $equip_number = $this->selectedTransformer;
    //         $equip_name = null;
    //     } else {
    //         $equip_number = $this->otherEquip;
    //         $equip_name = null;
    //     }
    //     //cehck main alarm if it is empty or not before saving to db
    //     if ($this->selectedMainAlarm === '') {
    //         $mainAlarmId = null;
    //     } else {
    //         $mainAlarmId = ($this->otherMainAlarm)
    //             ? MainAlarm::create(['name' => $this->otherMainAlarm, 'department_id' => Auth::user()->department_id])->id
    //             : $this->selectedMainAlarm;
    //     }
    //     if ($this->selectedVoltage == '') {
    //         $this->selectedVoltage = $this->otherVoltage;
    //     }
    //     //check if engineer select is empty to set it null
    //     if ($this->selectedEngineer === '') {
    //         $this->selectedEngineer = null;
    //     }
    //     if ($this->selectedVoltage === 'other' && isset($this->otherVoltage)) {
    //         $this->selectedVoltage = $this->otherVoltage;
    //     }
    //     $main_task = MainTask::create([
    //         'refNum' => $refNum,
    //         'station_id' =>  $this->station_id,
    //         'voltage_level' => $this->selectedVoltage,
    //         'equip_number' =>  $equip_number . ' - ' . $equip_name,
    //         'date' => $this->date,
    //         'problem' => $this->problem,
    //         'work_type' => $this->work_type,
    //         'notes' => $this->notes,
    //         'status' => 'pending',
    //         'main_alarm_id' => $mainAlarmId,
    //         'user_id' => Auth::user()->id,
    //     ]);

    //     $selectedDepartmentName = Department::where('id', $this->selectedDepartment)->first()->name;
    //     if ($this->selectedEngineer) {
    //         $selectedEngineerName = User::where('id', $this->selectedEngineer)->first()->name;
    //         $selectedEngineerId = User::where('id', $this->selectedEngineer)->first()->id;
    //     } else {
    //         $selectedEngineerName = null;
    //     }
    //     $main_task_id = MainTask::latest()->first()->id;
    //     TaskTimeline::create([
    //         'main_tasks_id' => $main_task_id,
    //         'department_id' => Auth::user()->department_id,
    //         'status' => 'created',
    //         'action' => "The task has been assigned by " . Auth::user()->department->name,
    //         'user_id' => Auth::user()->id
    //     ]);
    //     if ($this->selectedDepartment !== Auth::user()->department_id) {
    //         $converted_task = TaskConversions::create([
    //             'main_tasks_id' => $main_task_id,
    //             'source_department' => Auth::user()->department_id,
    //             'destination_department' => $this->selectedDepartment,
    //             'status' => 'pending'
    //         ]);
    //         TaskTimeline::create([
    //             'main_tasks_id' => $main_task_id,
    //             'department_id' => Auth::user()->department_id,
    //             'status' => 'Converted',
    //             'Action' => 'The Task has been Converted from ' . Auth::user()->department->name . ' to ' . $selectedDepartmentName,
    //             'user_id' => Auth::user()->id
    //         ]);
    //         $departmentTask = department_task_assignment::create([
    //             'department_id' => Auth::user()->department_id,
    //             'main_tasks_id' => $main_task_id,
    //             'eng_id' => $selectedEngineerId,
    //             'status' => 'converted'
    //         ]);
    //     } else {
    //         $departmentTask = department_task_assignment::create([
    //             'department_id' => $this->selectedDepartment,
    //             'main_tasks_id' => $main_task_id,
    //             'eng_id' => $this->selectedEngineer,
    //             'status' => 'pending'
    //         ]);
    //         TaskTimeline::create([
    //             'main_tasks_id' => $main_task_id,
    //             'department_id' => Auth::user()->department_id,
    //             'status' => 'Assined Engineer',
    //             'Action' => 'The Department has assined Engineer ' . $selectedEngineerName,
    //             'user_id' => Auth::user()->id
    //         ]);
    //     }
    //     foreach ($this->photos as $photo) {
    //         // $photo->store('photos');
    //         $name = $photo->getClientOriginalName();
    //         // $photo->storeAs('public', $name);
    //         $photo->storeAs('attachments/' . $main_task_id, $name, 'public');
    //         $attachments = new TaskAttachment();
    //         $attachments->main_tasks_id = $main_task_id;
    //         $attachments->department_id = Auth::user()->department_id;
    //         $attachments->file = $name;
    //         $attachments->user_id = Auth::user()->id;
    //         $attachments->save();
    //     }
    //     if ($this->selectedEngineer !== null) {
    //         $user = User::where('email', $this->engineerEmail)->first();
    //         // Notification::send($user, new TaskReport($main_task, $this->photos));
    //     }
    //     session()->flash('success', 'The Task has been added');

    //     return redirect("/dashboard/admin");
    // }
    public function submit(Request $request)
    {
        $this->validate();
        $refNum = $this->generateReferenceNumber();
        list($equip_number, $equip_name) = $this->handleEquipmentSelection();
        $mainAlarmId = $this->handleMainAlarmSelection();
        $selectedVoltage = $this->handleVoltageSelection();
        $selectedEngineer = $this->handleEngineerSelection();
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
            'is_emergency' => $this->is_emergency
        ]);
        $this->recordTaskTimeline($main_task->id, $selectedEngineer);
        // Step 1.1: Check if the selected department is different from the user's department
        // Step 1.1: Check if the selected department is different from the user's department
        if ($this->selectedDepartment !== Auth::user()->department_id) {
            $mainTask = $this->handleTaskConversion();
        } else {
            $mainTask = $this->handleDepartmentTaskAssignment();
        }
        // Retrieve the main task ID from the created MainTask instance
        $main_task_id = $mainTask->id;
        $this->uploadAttachments($main_task->id);
        // $this->sendNotifications($main_task, $this->engineerEmail);
        try {
            $this->sendNotifications($main_task, $this->engineerEmail);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error sending notification email: ' . $e->getMessage());

            // You can customize the error message based on your needs
            session()->flash('error', 'An issue occurred while attempting to send the email. However, your data has been successfully saved.');
            return redirect('/');
        }
        session()->flash('success', 'The Task has been added');

        // Step 7.2: Redirect the user to a specific page
        return redirect("/dashboard/admin");
    }
    private function generateReferenceNumber()
    {
        // Generate the reference number based on your business logic
        $date = Carbon::now();
        return $date->format("Y/m") . '-' . rand(1, 10000);
    }
    private function handleEquipmentSelection()
    {
        // Step 2.2: Logic for handling equipment selection
        if (!empty($this->selectedEquip && $this->selectedEquip !== 'other')) {
            $selectedEquipArr = explode(" - ", $this->selectedEquip);
            $equip_number = $selectedEquipArr[0];
            $equip_name = $selectedEquipArr[1];
        } elseif (!empty($this->selectedTransformer)) {
            $equip_number = $this->selectedTransformer;
            $equip_name = null;
            if ($this->selectedTransformer == 'other') {
                $equip_number = $this->otherEquip;
                $equip_name = null;
            }
        } else {
            $equip_number = $this->otherEquip;
            $equip_name = null;
        }

        // Return the result as a list
        return [$equip_number, $equip_name];
    }
    private function handleMainAlarmSelection()
    {
        // Step 3.1: Logic for handling main alarm selection
        if ($this->selectedMainAlarm === '') {
            $this->selectedMainAlarm = null;
        } else {
            return ($this->otherMainAlarm)
                ? MainAlarm::create(['name' => $this->otherMainAlarm, 'department_id' => Auth::user()->department_id])->id
                : $this->selectedMainAlarm;
        }
    }

    private function handleVoltageSelection()
    {
        // Step 3.2: Logic for handling voltage selection
        $selectedVoltage = $this->selectedVoltage;
        if ($selectedVoltage == '') {
            $selectedVoltage = $this->otherVoltage;
        }

        return $selectedVoltage;
    }
    private function handleEngineerSelection()
    {
        // Step 4.1: Logic for handling engineer selection
        $selectedEngineer = $this->selectedEngineer;
        if ($selectedEngineer === '') {
            $selectedEngineer = null;
        }

        return $selectedEngineer;
    }
    private function recordTaskTimeline($mainTaskId, $selectedEngineer)
    {
        // Logic for recording task timeline events
        $user = Auth::user(); // Get the currently authenticated user

        // Example: Recording a task creation event
        TaskTimeline::create([
            'main_tasks_id' => $mainTaskId,
            'department_id' => $user->department_id,
            'status' => 'created',
            'action' => "The task has been assigned by " . $user->department->name,
            'user_id' => $user->id
        ]);

        // // If an engineer is assigned, record an additional event
        // if ($selectedEngineer !== null) {
        //     TaskTimeline::create([
        //         'main_tasks_id' => $mainTaskId,
        //         'department_id' => $user->department_id,
        //         'status' => 'assigned',
        //         'action' => 'The task has been assigned to engineer ' . $selectedEngineer,
        //         'user_id' => $user->id
        //     ]);
        // }

        // Add more events as needed based on your application's requirements
    }
    private function uploadAttachments($mainTaskId)
    {
        foreach ($this->photos as $photo) {
            $name = $photo->getClientOriginalName();
            $photo->storeAs('attachments/' . $mainTaskId, $name, 'public');

            $attachments = new TaskAttachment();
            $attachments->main_tasks_id = $mainTaskId;
            $attachments->department_id = Auth::user()->department_id;
            $attachments->file = $name;
            $attachments->user_id = Auth::user()->id;
            $attachments->save();
        }
    }

    private function sendNotifications($mainTask, $engineerEmail)
    {
        try {
            if ($engineerEmail !== null) {
                $user = User::where('email', $engineerEmail)->first();
                if ($user) {
                    // Assuming you have defined a notification class called TaskReport
                    Notification::send($user, new TaskReport($mainTask, $this->photos));
                }
            }
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error sending notification email: ' . $e->getMessage());

            // You can customize the error message based on your needs
            session()->flash('error', 'An issue occurred while attempting to send the email. However, your data has been successfully saved.');
            // Redirect to the homepage or any other desired location
            return redirect()->route('dashboard.userIndex');
        }


        // Add more notification methods as per your application's requirements
    }
    private function handleTaskConversion()
    {
        // Step 1: Logic for creating a TaskConversions record
        $sourceDepartment = Auth::user()->department_id;
        $destinationDepartment = $this->selectedDepartment;
        $mainTask = MainTask::latest()->first();
        $main_task_id = $mainTask->id; // Retrieve the ID of the created MainTask
        $departmentTask = department_task_assignment::create([
            'department_id' => $sourceDepartment,
            'main_tasks_id' => $main_task_id,
            'status' => 'pending',
            'is_emergency' => $this->is_emergency
        ]);

        $converted_task = TaskConversions::create([
            'main_tasks_id' => $main_task_id,
            'source_department' => $sourceDepartment,
            'destination_department' => $destinationDepartment,
            'status' => 'pending'
        ]);


        // Step 2: Record timeline event for the task conversion
        $this->recordTaskConversionTimeline($main_task_id, $destinationDepartment);

        // Continue with any additional logic as needed

        return $converted_task;
    }
    private function handleDepartmentTaskAssignment()
    {
        // Step 1: Logic for department task assignment

        // Create the MainTask record and retrieve the ID
        $mainTask = MainTask::latest()->first();
        $main_task_id = $mainTask->id; // Retrieve the ID of the created MainTask

        $destinationDepartment = $this->selectedDepartment;
        $selectedEngineer = $this->selectedEngineer;
        // Check if the user with the specified ID exists
        $user = User::find($selectedEngineer);
        if ($user) {
            $engineerName = $user->name;
        } else {
            // Handle the case where the user doesn't exist
            $engineerName = 'User not found';
        }        // Create the department_task_assignment record
        $departmentTask = department_task_assignment::create([
            'department_id' => $destinationDepartment,
            'main_tasks_id' => $main_task_id,
            'eng_id' => $this->user_id,
            'status' => 'pending',
            'is_emergency' => $this->is_emergency
        ]);

        // Step 2: Record timeline event for department task assignment
        $this->recordDepartmentTaskAssignmentTimeline($main_task_id, $this->selectedEngineer);

        // Continue with any additional logic as needed

        return $departmentTask;
    }
    private function recordTaskConversionTimeline($mainTaskId, $destinationDepartment)
    {
        $selectedDepartmentName = Department::where('id', $this->selectedDepartment)->first()->name;

        TaskTimeline::create([
            'main_tasks_id' => $mainTaskId,
            'department_id' => $destinationDepartment, // Or any other relevant department ID
            'status' => 'Converted',
            'action' => 'The Task has been Converted from ' . Auth::user()->department->name . ' to ' . $selectedDepartmentName,
            'user_id' => Auth::user()->id
        ]);
    }
    private function recordDepartmentTaskAssignmentTimeline($mainTaskId, $selectedEngineer)
    {
        // Logic to record the timeline event for department task assignment
        // You can customize this part to record the timeline event as per your requirements.
        TaskTimeline::create([
            'main_tasks_id' => $mainTaskId,
            'department_id' => Auth::user()->department_id,
            'status' => 'Assigned Engineer',
            'action' => 'The task has been assigned to Engineer ' . $selectedEngineer,
            'user_id' => Auth::user()->id
        ]);
    }
}
