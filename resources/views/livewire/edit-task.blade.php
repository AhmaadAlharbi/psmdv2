<div>

    <div>
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
    </div>
    <form wire:submit.prevent="update">

        <div class="text-center ">
            <label for=" ssname">Department Task</label>

            <select name="department" wire:model="selectedDepartment" class="form-control d-none">
                <option selected value="{{Auth::user()->department_id}}">{{Auth::user()->department->name}}</option>
                @foreach($departments as $department)
                <option value="{{$department->id}}">{{$department->name}}</option>
                @endforeach
            </select>
            <label for=" ssname">Please select the station name</label>
            <div class="input-group">
                @if($selectedStation == null)

                <input list="ssnames" wire:change="getStationInfo" class="form-control " wire:model="selectedStation"
                    name="station_code" id="ssname" type="search" autocomplete="off">
                @else
                <input list="ssnames" wire:change="getStationInfo" class="form-control  {{$stationDetails  ? " is-valid"
                    : " is-invalid" }}" value="{{ old('station_code') }}" wire:model="selectedStation"
                    name="station_code" id="ssname" type="search" autocomplete="off">
                @if($selectedStation)
                <div class="input-group-append">
                    <button class="btn btn-danger" type="button" wire:click="clearStation">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                @endif

                @endif
            </div>
            <datalist id="ssnames">
                @foreach ($stations as $station)
                <option value="{{ $station->SSNAME }}">
                    @endforeach
            </datalist>

            @error('selectedStation') <span class="error">{{ $message }}</span> @enderror

            <div class="invalid-feedback ">
                <p class="h6">Please select the station from the list or contact admins to add a new station</p>
            </div>
            @isset($stationDetails)
            <div class="card bg-gray-100 border
        ">
                <div class="card-body text-center">
                    <p class="card-text bg-light
                py-3">{{$stationDetails->fullName}}</p>

                    <ul class="list-group ">
                        @switch($stationDetails->control)

                        @case('JAHRA CONTROL CENTER')
                        {{-- <p class="bg-warning text-dark text-center py-3">{{$stationDetails->control}}</p> --}}
                        <li class="list-group-item list-group-item-warning  font-italic ">{{$stationDetails->control}}
                        </li>

                        @break
                        @case('SHUAIBA CONTROL CENTER')
                        <li class="list-group-item list-group-item-success  font-italic ">{{$stationDetails->control}}
                        </li>
                        @break
                        @case('TOWN CONTROL CENTER')
                        <li class="list-group-item list-group-item-danger  font-italic ">{{$stationDetails->control}}
                        </li>
                        @break
                        @case('JABRIYA CONTROL CENTER')
                        <li class="list-group-item list-group-item-info  font-italic ">{{$stationDetails->control}}</li>
                        @break
                        @default
                        <li class="{{$selectedStation ? " list-group-item list-group-item-dark font-italic"
                            : " bg-white" }} ">
                            {{$stationDetails->control}}
                        </li>
                        @endswitch
                    </ul>

                    <ul class=" list-group ">


                        <li class=" list-group-item disabled font-italic list-group-item-secondary">Make :
                            {{$stationDetails->COMPANY_MAKE}}
                        </li>
                        <li class="list-group-item font-italic disabled  list-group-item-secondary">Contract.No :
                            {{$stationDetails->Contract_No}}
                        </li>
                        <li class="list-group-item font-italic disabled  list-group-item-secondary">COMMISIONING DATE :
                            {{$stationDetails->COMMISIONING_DATE}}
                        </li>

                    </ul>

                </div>
                <div class="col-12">
                    <label for="main_alarm" class="control-label m-3">Main Alarm</label>
                    <select wire:model="selectedMainAlarm" wire:change="getEquip" name="mainAlarm" id="main_alarm"
                        class="form-select bg-white">

                        @foreach($main_alarms as $alarm)
                        @if($alarm->name !== $selectedMainAlarm)
                        <option value="{{$alarm->id}}">{{$alarm->name}}</option>
                        @endif
                        @endforeach
                        <option value="other">other</option>
                    </select>
                    @if($selectedMainAlarm === 'other')
                    <label for="">Enter Main alarm </label>
                    <input type="text" wire:model="otherMainAlarm" class="form-control">
                    @endif

                    @if (!empty($voltage))
                    <label class="my-2">Voltage</label>
                    <select wire:model="selectedVoltage" wire:change="getEquip" class="form-control mb-3"
                        name="voltage_level" id="">
                        <option value="-1">Please select Voltage</option>
                        @foreach($voltage as $v)
                        <option value="{{$v}}">{{$v}}</option>
                        @endforeach
                        <option value="other">other</option>
                    </select>
                    @if($selectedVoltage === 'other')
                    <label for="">Enter Voltage </label>
                    <input type="text" wire:model="otherVoltage" class="form-control">
                    @endif
                    <div class="col-12">
                        <label for="">Equip </label>
                        <select wire:model="selectedEquip" class="form-control mb-3" name="equip_number">
                            <option value="-1">Please select Equip</option>
                            @foreach($equip as $equipN)
                            <option value="{{$equipN->equip_number}} - {{$equipN->equip_name}}"
                                wire:change="$set('selectedEquip', '{{ $equipN->equip_name }}')">{{
                                $equipN->equip_number }} - {{ $equipN->equip_name }}</option>
                            @endforeach
                            <option value="other">other</option>
                        </select>
                        @if($selectedEquip === 'other')
                        <label for="">Enter equip number and name</label>
                        <input type="text" wire:model="otherEquip" class="form-control">
                        @endif
                    </div>
                    @elseif (!empty($transformers))
                    <label class="my-2">Transformer</label>
                    <select wire:model="selectedTransformer" class="form-control mb-3" id="">

                        <option value="-1">Please select Transformer</option>
                        @foreach($transformers as $transformer)
                        <option value="{{$transformer}}"
                            wire:change="$set('selectedTransformer', '{{ $transformer }}')">{{ $transformer }}</option>
                        @endforeach
                    </select>
                    @endif



                </div>
                @endisset


                <div class="">
                    <div class="">
                        <label for="inputName" class="control-label">Please select an engineer</label>
                        <div class="input-group">
                            <!-- Replace select tag with datalist tag -->
                            <input wire:model="selectedEngineer" list="engineerList" id="eng_name" name="eng_name"
                                class="form-control engineerSelect m-1" wire:change="getEmail" autocomplete="off">
                            @if($selectedEngineer)
                            <div class="input-group-append">
                                <button class="btn btn-danger" type="button" wire:click="clearEngineer">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            @endif
                            <datalist id="engineerList">

                                @foreach($names as $name)
                                <option value="{{$name}}"></option>
                                @endforeach
                            </datalist>
                            <input type="hidden" wire:model="user_id">
                        </div>
                        <div class="text-center">
                            <div class="example">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb breadcrumb-style2 mb-0">
                                        <li class="breadcrumb-item">
                                            <a href="javascript:void(0);" wire:click="getEngineerArea(1)">
                                                <i class="fas fa-arrow-circle-up me-2"></i> North Engineers
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="javascript:void(0);" wire:click="getEngineerArea(2)">
                                                <i class="fas fa-arrow-circle-down me-2"></i> South Engineers
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="javascript:void(0);" wire:click="getEngineerArea(3)">
                                                <i class="fas fa-arrow-circle-right me-2"></i> Middle Engineers
                                            </a>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="form-check mb-4">
                        <input wire:model="duty" wire:change="getEngineer" class="form-check-input" type="checkbox"
                            value="" id="defaultCheck1">
                        <label class="form-check-label mx-3" for="defaultCheck1">
                            Duty Engineers
                        </label>
                    </div>
                </div>
                <div class="  email">
                    {{-- <label for="inputName" class="control-label"> Email</label> --}}

                    <input wire:model="engineerEmail" type="text" class="form-control" name="eng_email"
                        id="eng_name_email" readonly>
                </div>
                <label for="" class="mt-2">Task Type</label>
                <select name="work_type" wire:model="work_type" name="work_type" class="form-control">
                    <option value="">-</option>
                    <option value="Clearance">Clearance</option>
                    <option value="Maintenance">Maintenance</option>
                    <option value="Inspection">Inspection</option>
                    <option value="outage">outage</option>
                    <option value="Installation">Installation</option>
                    <option value="General Check">General Check</option>
                    <option value="other">other</option>
                </select>
                <label for="problem" class="control-label mt-4"> Nature of Fault</label>
                <textarea list="problems" wire:model="problem" class="form-control " rows="3" name="problem"
                    id="problem"></textarea>
                <label for="exampleTextarea" class="mt-3">Notes</label>
                <textarea class="form-control" wire:model="notes" id="exampleTextarea" name="notes" rows="3"></textarea>
                @error('photos.*') <span class="error">{{ $message }}</span> @enderror

                <div id="attachment">
                    {{-- <div class="col-sm-12 col-md-12">
                        <input type="file" name="pic[]" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                            data-height="70" />
                    </div><br>
                    <div class="col-sm-12 col-md-12">
                        <input type="file" name="pic[]" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/pn g"
                            data-height="70" />
                    </div><br>
                    <div class="col-sm-12 col-md-12">
                        <input type="file" name="pic[]" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                            data-height="70" />
                    </div><br> --}}
                    <input class="form-control form-control-lg" id="formFileLg" type="file" wire:model="photos"
                        multiple>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" id="but4">
                            Submit</button>
                    </div>

                    @if($selectedStation != null)
                    <script>
                        const btnid = document.getElementById('but4');
                                btnid.addEventListener('click', () => {
                                    let timerInterval
                                    Swal.fire({
                                        title: 'Data Submission in Progress',
                                        html: 'Please wait and do not close the page',
                                        timer: 60000,
                                        timerProgressBar: true,
                                        didOpen: () => {
                                            Swal.showLoading()
                                            const b = Swal.getHtmlContainer().querySelector('b')
                                            timerInterval = setInterval(() => {
                                                b.textContent = Swal.getTimerLeft()
                                            }, 100)
                                        },
                                        willClose: () => {
                                            clearInterval(timerInterval)
                                        }
                                    }).then((result) => {
                                        /* Read more about handling dismissals below */
                                        if (result.dismiss === Swal.DismissReason.timer) {
                                            console.log('I was closed by the timer')
                                        }
                                    })
                                })
                    </script>
                    @endif
                </div>



                <!-- <div class="col-sm-12 col-md-12">
                    <input type="file" name="pic[]" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png" data-height="70" />
                </div><br> -->
                <br>
                {{-- <div class="text-center mb-3">
                    <button id="showAttachment" class="btn btn-outline-info">اضغط لإضافة المزيد من
                        المرفقات</button>
                    <button id="hideAttachment" class="btn d-none btn-outline-info">اضغط لإخفاء المزيد من
                        المرفقات</button>
                </div>
                <div id="attachmentFile" class="d-none">
                    <div class="col-sm-12 col-md-12">
                        <input type="file" name="pic[]" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                            data-height="70" />
                    </div><br>
                    <div class="col-sm-12 col-md-12">
                        <input type="file" name="pic[]" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                            data-height="70" />
                    </div><br>
                    <div class="col-sm-12 col-md-12">
                        <input type="file" name="pic[]" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                            data-height="70" />
                    </div><br>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModals">ارسال
                        البيانات</button>
                </div> --}}
            </div>
        </div>
    </form>
</div>