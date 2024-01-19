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

class EditTask extends Component
{
    public $task;
    public $task_id;
    use WithFileUploads;
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
    protected $listeners = ['callEngineer' => 'getEngineer'];
    public $otherMainAlarm = '';
    public $otherVoltage = '';
    public $otherEquip = '';
    public $departmentTask = '';
    public $mainTasksConverted = '';
    public $user_id;
    public $names = [];
    public $ncc_area = null;

    public function __construct($task_id)
    {
        $this->task_id = $task_id;
    }

    public function mount()
    {
        $this->stations = Station::all();
        $this->main_alarms = MainAlarm::where('department_id', Auth::user()->department_id)->get();
        $this->task = MainTask::find($this->task_id);
        $this->mainTasksConverted = $this->task->departmentsAssienments->where('department_id', 2);
        $isTaskedConverted = $this->task->conversions->filter(function ($conversion) {
            return $conversion->source_department == Auth::user()->department_id || $conversion->destination_department == Auth::user()->department_id;
        });

        // Now $isTaskedConverted contains only the desired conversions

        // Now you can use $isTaskedConverted as needed

        //  $this->mainTasksConverted->eng_id;
        $this->departmentTask = department_task_assignment::where('main_tasks_id', $this->task_id)->where('department_id', Auth::user()->department_id)->first();

        $this->station_id =  $this->task->station->id;
        $this->selectedStation = Station::where('id', $this->station_id)->value('SSNAME');
        $this->stationDetails = Station::where('id',  $this->task->station_id)->first();
        $this->selectedVoltage = $this->task->voltage_level;
        $this->work_type = $this->task->work_type;
        // $this->selectedMainAlarm = optional($this->task->main_alarm)->id;
        $this->selectedEngineer = $this->departmentTask && $this->departmentTask->eng_id
            // If the above condition is true, set $this->selectedEngineer to the name of the associated engineer
            ? $this->departmentTask->engineer->name
            // If the condition is false (either $this->departmentTask is null or 'eng_id' is null), set $this->selectedEngineer to null
            : null;
        $this->user_id = $this->departmentTask ? $this->departmentTask->eng_id : null;
        $userDepartmentId = Auth::user()->department_id;
        // Set the Area based on the Department of the authenticated User.
        $this->setArea();
        $this->getEmail();
        $controlCenter = $this->stationDetails->control;
        $this->getEngineer();
        $this->problem = $this->task->problem;
        $this->notes = $this->task->notes;
        $this->voltage = Equip::where('station_id', $this->task->station->id)->distinct()->pluck('voltage_level');
        $this->selectedEquip = $this->task->equip_number;
        $this->selectedMainAlarm = $this->task->main_alarm_id;
        // $this->selectedTransformer = $this->task->equip_number;
        $this->departments = Department::where('name', '!=', Auth::user()->department->name)->get();
        $this->selectedDepartment = Auth::user()->department_id;
        $this->equip = Equip::where('station_id', $this->task->station->id)->where('voltage_level', $this->selectedVoltage)->get();
    }

    public function render()
    {
        return view('livewire.edit-task');
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
        $this->selectedMainAlarm = MainAlarm::where('department_id', 2)->first()->id;
        $this->engineerEmail = null;
        $this->selectedVoltage = null;
        $this->selectedEquip = null;
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
            $this->area =   $this->ncc_area;
        }
    }
    // Set the Area for Department 5.
    private function setAreaForDeptFive()
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
        $userDepartmentId = Auth::user()->department_id;
        $area = $this->area;

        // Default to showing day shift engineers
        $shiftId = 1; // Assuming 1 is the ID for the day shift

        // Change the shift to night shift if the checkbox is checked
        if ($this->duty) {
            $shiftId = 2; // Assuming 2 is the ID for the night shift
        }

        $query = Engineer::join('users', 'users.id', '=', 'engineers.user_id')
            ->where('engineers.department_id', $userDepartmentId);

        $engineers = $query->when($userDepartmentId === 2 || $userDepartmentId === 5, function ($query) use ($area) {
            return $query->when($area !== 3 && $area !== 4, function ($query) use ($area) {
                return $query->whereHas('areas', function ($subquery) use ($area) {
                    $subquery->where('areas.id', $area);
                });
            });
        })
            ->when(in_array($userDepartmentId, [3, 4]), function ($query) use ($shiftId) {
                return $query->whereHas('shifts', function ($subquery) use ($shiftId) {
                    $subquery->where('shifts.id', $shiftId);
                });
            })
            ->orderBy('users.name', 'asc')
            ->get();

        $this->engineers = $engineers;
        $this->names = $engineers->pluck('name')->toArray();
    }
    public function getEngineerArea($area)
    {
        $this->clearEngineer();
        $this->area = $area;
        $userDepartmentId = Auth::user()->department_id;
        $shiftId = $this->duty ? 2 : 1;

        $query = Engineer::join('users', 'users.id', '=', 'engineers.user_id')
            ->where('engineers.department_id', $userDepartmentId);

        $engineers = $query->when($userDepartmentId === 2 || $userDepartmentId === 5, function ($query) use ($area) {
            return $query->when($area !== 3 && $area !== 4, function ($query) use ($area) {
                return $query->whereHas('areas', function ($subquery) use ($area) {
                    $subquery->where('areas.id', $area);
                });
            });
        })
            ->when(in_array($userDepartmentId, [3, 4]), function ($query) use ($shiftId) {
                return $query->whereHas('shifts', function ($subquery) use ($shiftId) {
                    $subquery->where('shifts.id', $shiftId);
                });
            })
            ->orderBy('users.name', 'asc')
            ->get();

        $this->engineers = $engineers;
        $this->names = $engineers->pluck('name')->toArray();
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


    public function update()
    {
        // Step 1: Handle Voltage Selection
        $this->handleVoltageSelection();

        // Step 2: Handle Equipment Selection
        list($equip_number, $equip_name) = $this->handleEquipmentSelection();

        // Step 3: Handle Main Alarm Selection
        $mainAlarmId = $this->handleMainAlarmSelection();

        // Step 4: Handle Engineer Selection and Update MainTask
        $this->handleEngineerSelection($equip_number, $equip_name, $mainAlarmId);

        // Step 5: Record Task Timeline
        if ($this->selectedEngineer) {
            $this->recordTaskTimeline();
        }
        // Step 6: Check for Department Differences
        if ($this->isDepartmentDifferent($this->selectedDepartment)) {
            // Step 7: Handle Task Conversion
            $this->handleTaskConversion();
        } else {
            // Step 8: Handle Department Task Assignment
            $this->handleDepartmentTaskAssignment();
        }


        $this->sendNotifications($this->task, $this->engineerEmail);
        $this->uploadAttachments($this->task->id);
        session()->flash('success', 'Updated successfully.');
        return redirect("/dashboard/admin");
    }
    private function handleVoltageSelection()
    {
        if ($this->selectedVoltage === 'other' && isset($this->otherVoltage)) {
            $this->selectedVoltage = $this->otherVoltage;
        }
    }
    private function handleEquipmentSelection()
    {
        $equip_number = null;
        $equip_name = null;

        if (!empty($this->selectedEquip && $this->selectedEquip !== 'other')) {
            $selectedEquipArr = explode(" - ", $this->selectedEquip);
            $equip_number = $selectedEquipArr[0];
            $equip_name = $selectedEquipArr[1];
        } elseif (!empty($this->selectedTransformer)) {
            $equip_number = $this->selectedTransformer;
        } else {
            $equip_number = $this->otherEquip;
        }

        return [$equip_number, $equip_name];
    }
    private function handleMainAlarmSelection()
    {
        if ($this->selectedMainAlarm !== 'other') {
            $mainAlarmId = $this->selectedMainAlarm;
        } else {
            $newMainAlarm = MainAlarm::create([
                'name' => $this->otherMainAlarm,
                'department_id' => Auth::user()->department_id,
            ]);
            $mainAlarmId = $newMainAlarm->id;
        }

        return $mainAlarmId;
    }
    private function handleEngineerSelection($equip_number, $equip_name, $mainAlarmId)
    {
        if ($this->selectedEngineer === '') {
            $this->selectedEngineer = null;
        }

        // Update the MainTask with the provided data, including equip_number
        $this->task->update([
            'station_id' => $this->station_id,
            'voltage_level' => $this->selectedVoltage,
            'equip_number' => $equip_number . ' - ' . $equip_name,
            'problem' => $this->problem,
            'work_type' => $this->work_type,
            'notes' => $this->notes,
            'status' => 'pending',
            'main_alarm_id' => $mainAlarmId,
        ]);
    }
    public function clearStation()
    {
        $this->selectedStation = null;
        $this->stationDetails = null;
    }
    public function clearEngineer()
    {
        $this->selectedEngineer = null;
        $this->engineerEmail = null;
        $this->user_id = null;
        $this->getEngineer();
    }
    private function recordTaskTimeline()
    {
        // Record timeline events
        $mainTaskId = $this->task->id;
        $selectedEngineerName = User::where('id', $this->user_id)->first()->name;
        $userDepartmentId = Auth::user()->department_id;
        $mainTask = $this->task;

        $assignments = $mainTask->departmentsAssienments->where('department_id', $userDepartmentId)->first();
        if ($assignments && $this->selectedEngineer !== $assignments->eng_id) {
            // Update the assignment
            $assignments->update([
                'eng_id' => $this->user_id,
            ]);

            TaskTimeline::create([
                'main_tasks_id' => $mainTaskId,
                'department_id' => $userDepartmentId,
                'status' => 'Updated Engineer',
                'Action' => 'The Department has assigned Engineer ' . $selectedEngineerName,
                'user_id' => Auth::user()->id
            ]);
        } else {
            TaskTimeline::create([
                'main_tasks_id' => $mainTaskId,
                'department_id' => $userDepartmentId,
                'status' => 'Updated Task',
                'action' => "The task has been Updated",
                'user_id' => Auth::user()->id
            ]);
        }
    }
    private function handleTaskConversion()
    {
        $mainTaskId = $this->task->id;
        $userDepartmentId = Auth::user()->department_id;

        $isTaskConverted = $this->task->conversions->filter(function ($conversion) use ($userDepartmentId) {
            return $conversion->source_department == $userDepartmentId || $conversion->destination_department == $userDepartmentId;
        });

        if ($isTaskConverted->isEmpty()) {
            $convertedTask = TaskConversions::create([
                'main_tasks_id' => $mainTaskId,
                'source_department' => $userDepartmentId,
                'destination_department' => $this->selectedDepartment,
                'status' => 'pending'
            ]);

            $selectedDepartmentName = Department::where('id', $this->selectedDepartment)->first()->name;

            TaskTimeline::create([
                'main_tasks_id' => $mainTaskId,
                'department_id' => $userDepartmentId,
                'status' => 'Converted',
                'Action' => 'The Task has been Converted from ' . Auth::user()->department->name . ' to ' . $selectedDepartmentName,
                'user_id' => Auth::user()->id
            ]);

            // Create a new department task assignment for the selected department
            $departmentTask = department_task_assignment::create([
                'department_id' => $this->selectedDepartment,
                'main_tasks_id' => $mainTaskId,
                'eng_id' => $this->user_id,
                'status' => 'pending'
            ]);
        }
    }
    private function handleDepartmentTaskAssignment()
    {
        // Handle department task assignment
        $mainTaskId = $this->task->id;
        $userDepartmentId = Auth::user()->department_id;
        $sharedTasks = TaskConversions::where('main_tasks_id', $mainTaskId)
            ->where('source_department', $userDepartmentId)
            ->where('status', 'completed')
            ->first();
        if ($sharedTasks) {
            $sharedTasks->delete();
        }
        $departmentTask = $this->task->departmentsAssienments()
            ->where('department_id', 1)
            ->first();
        if ($departmentTask) {
            $departmentTask->update([
                'eng_id' => $this->user_id
            ]);
        }

        // Update the existing department task assignment for the user's department
        $userDepartmentTask = department_task_assignment::where('main_tasks_id', $mainTaskId)
            ->where('department_id', $userDepartmentId)
            ->first();
        if ($userDepartmentTask) {
            $userDepartmentTask->update([
                'eng_id' => $this->user_id,
                'status' => 'pending',
                'isCompleted' => "0",
                'isSeen' => "0",
                'area_id' => $this->area

            ]);
        } else {
            // Create a new department task assignment for the user's department

            $userDepartmentTask = department_task_assignment::create([
                'department_id' => $userDepartmentId,
                'main_tasks_id' => $mainTaskId,
                'eng_id' => $this->user_id,
                'status' => 'pending',
                'area_id' => $this->area

            ]);
        }
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
            return redirect('/');
        }
    }
    private function isDepartmentDifferent($selectedDepartment)
    {

        return $selectedDepartment != Auth::user()->department_id;
    }
}
