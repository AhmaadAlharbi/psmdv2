@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                Empty</span>
        </div>
    </div>
    <div class="d-flex my-xl-auto right-content">
        <div class="pe-1 mb-xl-0">
            <button type="button" class="btn btn-info btn-icon me-2 btn-b"><i
                    class="mdi mdi-filter-variant"></i></button>
        </div>
        <div class="pe-1 mb-xl-0">
            <button type="button" class="btn btn-danger btn-icon me-2"><i class="mdi mdi-star"></i></button>
        </div>
        <div class="pe-1 mb-xl-0">
            <button type="button" class="btn btn-warning  btn-icon me-2"><i class="mdi mdi-refresh"></i></button>
        </div>
        <div class="mb-xl-0">
            <div class="btn-group dropdown">
                <button type="button" class="btn btn-primary">14 Aug 2019</button>
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                    id="dropdownMenuDate" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuDate"
                    x-placement="bottom-end">
                    <a class="dropdown-item" href="javascript:void(0);">2015</a>
                    <a class="dropdown-item" href="javascript:void(0);">2016</a>
                    <a class="dropdown-item" href="javascript:void(0);">2017</a>
                    <a class="dropdown-item" href="javascript:void(0);">2018</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb -->

<!-- row -->
<div class="row">
    <form action="{{route('submitOldReport')}}" method="post">
        @csrf
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="col">
                        <label for=" ssname" class="mt-2">Please Choose a Station Name.</label>
                        <div class="input-group">
                            <input list="ssnames" class="form-control" name="station_code" id="ssname" type="search"
                                autocomplete="off">

                            <div class="input-group-append">
                                <button class="btn btn-danger" type="button">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>

                        </div>
                        <datalist id="ssnames">
                            @foreach ($stations as $station)
                            <option value="{{ $station->SSNAME }}">
                                @endforeach
                        </datalist>
                    </div>
                    <div class="col">
                        <label for="selectedMainAlarm" class="control-label m-3">Main Alarm</label>
                        <select name="mainAlarm" id="main_alarm" class="form-control">
                            <!--placeholder-->
                            <option>-</option>
                            @foreach($main_alarms as $main_alarm)
                            <option value="{{$main_alarm->id}}">{{$main_alarm->name}}</option>
                            @endforeach
                            <option value="other">other</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="equip" class="control-label m-3">Equip</label>
                        <input type="text" class="form-control" name="equip">
                    </div>
                    <div class="col">
                        <label for="inputName" class="control-label">Please select an engineer</label>
                        <div class="input-group">
                            <input list="engineerList" id="eng_name" name="eng_name"
                                class="form-control engineerSelect m-1" autocomplete="off">

                            <div class="input-group-append">
                                <button class="btn btn-danger" type="button">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>

                        </div>
                        <datalist id="engineerList">
                            <option value="-">-</option>
                            @foreach($engineers as $engineer)
                            <option value="{{$engineer->user->name}}">{{$engineer->user->name}}</option>
                            @endforeach
                        </datalist>
                    </div>
                    <div class="col">
                        <label for="" class="mt-2">Task Type</label>
                        <select name="work_type" wire:model="work_type" name="work_type" class="form-control">
                            <option value="">-</option>
                            <option value="Clearance">Clearance</option>
                            <option value="Maintenance">Maintenance</option>
                            <option value="Inspection">Inspection</option>
                            <option value="outage">outage</option>
                            <option value="Installation">Installation</option>
                            <option value="other">other</option>
                        </select>

                    </div>
                    <div class="col">
                        <label for="problem" class="control-label mt-4"> Nature of Fault</label>
                        <textarea list="problems" wire:model="problem" class="form-control " rows="3" name="problem"
                            id="problem"></textarea>
                        <label for="exampleTextarea" class="mt-3">Notes</label>
                        <textarea class="form-control" wire:model="notes" id="exampleTextarea" name="notes"
                            rows="3"></textarea>
                    </div>
                    <div class="col mt-3">
                        <button class="btn btn-primary btn-block ">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- row closed -->

@endsection

@section('scripts')

<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>

@endsection