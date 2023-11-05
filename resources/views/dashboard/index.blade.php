@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">

    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Dashboard</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                {{Auth::user()->department->name}}</span>

        </div>

    </div>
    <div class="btn-group dropdown">
        <button type="button" class="btn btn-primary">
            <i class="fas fa-cog"></i> Control Panel - Filter by Control
        </button>

        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuDate" x-placement="bottom-end">
            <a class="dropdown-item"
                href="{{ route('dashboard.indexControl', ['control' => 'JAHRA CONTROL CENTER']) }}">Al Jahra Control</a>
            <a class="dropdown-item"
                href="{{ route('dashboard.indexControl', ['control' => 'SHUAIBA CONTROL CENTER']) }}">Shuaiba
                Control</a>
            <a class="dropdown-item"
                href="{{ route('dashboard.indexControl', ['control' => 'JABRIYA CONTROL CENTER']) }}">Jabriya
                Control</a>
            <a class="dropdown-item"
                href="{{ route('dashboard.indexControl', ['control' => 'TOWN CONTROL CENTER']) }}">Town Control</a>
            <a class="dropdown-item"
                href="{{ route('dashboard.indexControl', ['control' => 'NATIONAL CONTROL CENTER']) }}">National
                Control</a>
        </div>
    </div>

</div>
<div class="row ">
    {{-- @if(session('success'))
    <div class="alert alert-success">
        <div class="card bd-0 mg-b-20 bg-success">
            <div class="card-body text-white">
                <div class="main-error-wrapper">
                    <i class="si si-check mg-b-20 tx-50"></i>
                    <h4 class="mg-b-0"> {{ session('success') }}</h4>
                </div>
            </div>
        </div>
    </div>
    @endif --}}

    {{--engineers --}}
    <div class="col-xl-4 col-lg-6 col-md-6">
        <a href="{{ route('dashboard.engineersList') }}">
            <div class="card bg-primary-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="ms-auto">
                            <h5 class="tx-18 tx-white-8 mb-3">Engineers</h5>
                            <h2 class="counter mb-0 text-white">{{ $engineersCount }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    {{--pending tasks--}}
    <div class="col-xl-4 col-lg-6 col-md-6">
        <a href="{{ route('dashboard.showTasks', ['status' => 'pending']) }}">
            <div class="card bg-danger-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-warning">
                            <i class="fas fa-hourglass-half"></i>
                        </div>
                        <div class="ms-auto">
                            <h5 class="tx-18 tx-white-8 mb-3">Pending Tasks</h5>
                            <h2 class="counter mb-0 text-white">{{ $pendingTasksCount }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    {{-- completed tasks --}}
    <div class="col-xl-4 col-lg-6 col-md-6">
        <a href="{{ route('dashboard.showTasks', ['status' => 'completed']) }}">
            <div class="card bg-success-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-primary">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="ms-auto">
                            <h5 class="tx-18 tx-white-8 mb-3">Completed Tasks</h5>
                            <h2 class="counter mb-0 text-white">{{ $completedTasksCount }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>


    {{-- Shared Department Tasks --}}
    <div class="col-xl-4 col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="card-order">
                    <a href="{{ route('dashboard.showTasks', ['status' => 'mutual-tasks']) }}">
                        <h6 class="mb-2">Shared Department Tasks</h6>
                        <h2 class="text-end">
                            <i class="fas fa-share-square icon-size float-start text-primary"></i>
                            <span>{{ $mutualTasksCount }}</span>
                        </h2>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Reports Archive --}}
    <div class="col-xl-4 col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="card-order">
                    <a href="{{ route('dashboard.archive') }}">
                        <h6 class="mb-2">Reports Archive</h6>
                        <h2 class="text-end">
                            <i class="fas fa-archive icon-size float-start text-primary"></i>
                            <span>{{ $completedTasksCount }}</span>
                        </h2>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- substations --}}
    <div class="col-xl-4 col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="card-order">
                    <a href="{{ route('stations.index') }}">
                        <h6 class="mb-2">Substations</h6>
                        <h2 class="text-end">
                            <i class="fas fa-bolt icon-size float-start text-primary"></i>
                            <span>{{ $stationsCount }}</span>
                        </h2>
                    </a>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- breadcrumb -->

<!-- row -->
<div class="row">

    <div class="row">
        <div class="col-xl-6 d-none d-xl-block">
            {{-- statistcs--}}
            <div class="card">
                <div class="card-header pb-0">
                    <div class="card-title pb-0 mb-2">Tasks Statistics</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col text-center">
                            <div class="fw-bold tx-20">
                                <div class="text-primary"> Today Tasks</div>
                                <div>{{ $totalTasksInDay }}</div>
                                <div class="text-muted">Completed</div>
                                <div>{{ $completedTasksInDay }}</div>
                            </div>
                            <div class="progress ht-20 mt-4">

                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary ht-20"
                                    style="width: {{ $totalTasksInDay > 0 ? ($completedTasksInDay / $totalTasksInDay) * 100 : 0 }}%;">
                                    <span class="tx-18">
                                        {{ number_format($totalTasksInDay > 0 ? ($completedTasksInDay /
                                        $totalTasksInDay) * 100 : 0, 2) }}%
                                    </span>
                                </div>
                            </div>

                        </div><!-- col -->
                        <div class="col border-start text-center">
                            <div class="fw-bold tx-20">
                                <div class="text-warning">This Week Tasks</div>
                                <div>{{ $totalTasksInWeek }}</div>
                                <div class="text-muted">Completed</div>
                                <div>{{ $completedTasksInWeek }}</div>
                            </div>
                            <div class="progress ht-20 mt-4">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning ht-20"
                                    style="width: {{ $totalTasksInWeek > 0 ? min(100, ($completedTasksInWeek / $totalTasksInWeek) * 100) : 0 }}%;">
                                    <span class="tx-18">
                                        {{ $totalTasksInWeek > 0 ? number_format(min(100, ($completedTasksInWeek /
                                        $totalTasksInWeek) * 100), 2) : 0 }}%
                                    </span>
                                </div>

                            </div>
                        </div><!-- col -->
                        <div class="col border-start text-center">
                            <div class="fw-bold tx-20">
                                <div class="text-danger"> This Month Tasks</div>
                                <div>{{ $totalTasksInMonth }}</div>
                                <div class="text-muted">Completed</div>
                                <div>{{ $completedTasksInMonth }}</div>
                            </div>
                            <div class="progress ht-20 mt-4">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger ht-20"
                                    style="width: {{ $totalTasksInMonth > 0 ? ($completedTasksInMonth / $totalTasksInMonth) * 100 : 0 }}%;">
                                    <span class="tx-18">
                                        {{ number_format($totalTasksInMonth > 0 ? ($completedTasksInMonth /
                                        $totalTasksInMonth) * 100 : 0, 2) }}%
                                    </span>
                                </div>
                            </div>
                        </div><!-- col -->
                    </div><!-- row -->
                </div>

            </div>
            <div class="card">
                <div class="card-header pb-0">
                    <div class="card-title pb-0 mb-2">Pending Reports</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col text-center">
                            <h3>Reports Ready for Approval ({{$pendingReportsCount}}) </h3>
                            <a href="{{route('dashboard.pendingReports')}}" class="btn btn-dark">Check Pending
                                Reports</a>
                            <div class="d-flex justify-content-center align-items-center">
                                <li class="icons-list-item"><i class="fa fa-hourglass-end text-danger"></i></li>
                            </div>

                        </div>
                        <div class="col text-center">
                            <h3>Users Ready for Approval ({{$usersPendingCount}}) </h3>
                            <a href="{{route('dashboard.pendingUsers')}}" class="btn btn-secondary">Check Users
                            </a>
                            <div class="d-flex justify-content-center align-items-center">
                                <li class="icons-list-item"><i class="fa fa-hourglass-end text-danger"></i></li>
                            </div>

                        </div>
                    </div><!-- row -->
                </div>
            </div>
        </div>
        <div class="col-xl-6 scrollable-div" style="height: 600px; overflow-y: scroll;">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        {{-- pie chart --}}
                        {{-- <div class="card-body">
                            <div class="main-content-label">
                                Pie Chart
                            </div>
                            <div class="chartjs-wrapper-demo" style="width: 300px; height: 300px;">
                                <!-- Add or adjust these styles -->
                                <canvas id="chartPie" width="400" height="400"></canvas>
                            </div>
                        </div> --}}
                        {{--time line --}}

                    </div><!-- row -->
                </div>
                <div class="card-body">
                    @foreach($completedTasks as $task)

                    <div class="card card-info">

                        <div class="card-body  ">
                            <ul class="list-group   text-center">
                                <li class="list-group-item bg-info-gradient text-white">Task # {{$task->id}}
                                </li>

                                <li class="list-group-item " style="font-size:18px; font-wieght:bold;">
                                    Station :
                                    {{$task->main_task->station->SSNAME}}<br>
                                    <span style="font-size:16px">{{
                                        \Carbon\Carbon::parse($task->created_at)->format('Y-m-d') }} | {{
                                        \Carbon\Carbon::parse($task->created_at)->format('H:i') }}</span>

                                </li>

                                <li class="list-group-item " style="font-size:16px;"><strong>Nature of
                                        fault<br></strong>
                                    {{$task->main_task->problem}}
                                </li>

                                <li class="list-group-item bg-light" style="font-size:16px;"><strong>Action
                                        Take<br></strong>
                                    {!! strip_tags($task->action_take) !!}


                                </li>
                                <a class="" href="{{route('dashboard.engineerProfile',['eng_id'=>$task->eng_id])}}">
                                    <li class="list-group-item text-dark bg-light"><strong>Engineer
                                            <br></strong>
                                        {{$task->engineer->name}}
                                    </li>
                                </a>

                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('dashboard.reportPage',['id'=>$task->id])}}"
                                class="btn btn-dark btn-lg btn-block"><i class="si si-notebook px-2"
                                    data-bs-toggle="tooltip" title="" data-bs-original-title="si-notebook"
                                    aria-label="si-notebook"></i>Report</a></button>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
        {{--red table --}}
        @if (!$pendingTasks->isEmpty())
        {{-- large screen Table only --}}

        <div class="card d-none d-xl-block">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0"> Local Tasks</h4>

                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-vcenter table-bordered text-nowrap table-striped align-items-center mb-0">
                        <thead>
                            <tr class="bg-warning-gradient">
                                <th class="text-lg">ID</th>
                                <th class="text-lg">STATION</th>
                                <th class="text-lg d-none d-md-table-cell">Main Alarm</th>
                                <th class="text-lg d-none d-md-table-cell">Status</th>
                                <th class="text-lg">ENGINEER</th>
                                <th class="text-lg d-none d-md-table-cell">DATE</th>
                                <th class="text-lg">OPERATION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pendingTasks as $task)
                            <tr>
                                <th scope="row" class="text-lg">{{ $loop->iteration }}</th>
                                <td class="text-lg"> {{$task->main_task->station->SSNAME}} </td>
                                @if(isset($task->main_task->main_alarm_id))
                                <td class="text-lg d-none d-md-table-cell">{{$task->main_task->main_alarm->name}}</td>
                                <td class="d-none d-md-table-cell">
                                    <span class="badge bg-danger me-1">{{$task->status}}</span>
                                </td>
                                @else
                                <td class="d-none d-md-table-cell">-</td>
                                <td class="d-none d-md-table-cell">-</td>
                                @endisset
                                <td class="text-lg">
                                    @if($task->eng_id)
                                    <a href="{{route('dashboard.engineerProfile',['eng_id'=>$task->eng_id])}}">
                                        {{$task->engineer->name}} - {{$task->engineer->department->name}}
                                    </a>
                                    @else
                                    -
                                    @endif
                                </td>
                                <td class="text-lg d-none d-md-table-cell">{{$task->created_at}}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-settings"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{ route('dashboard.viewTask', ['id' => $task->id]) }}">
                                                <i class="fas fa-eye"></i> View</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('dashboard.editTask', $task->main_tasks_id) }}">
                                                <i class="fas fa-edit"></i> Edit</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('dashboard.timeline', ['id' => $task->main_tasks_id]) }}">
                                                <i class="fas fa-history"></i> History</a></li>
                                        <li>
                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#moveTask-{{ $task->id }}">
                                                <i class="fas fa-exchange-alt"></i> Move to Another Department
                                            </a>
                                        </li>






                                    </ul>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal" id="moveTask-{{ $task->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="moveTaskLabel-{{ $task->id }}">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title">Update this task</h6>
                                            <button aria-label="Close" class="close" data-bs-dismiss="modal"
                                                type="button">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('dashboard.convertTask', $task->main_tasks_id) }}"
                                                method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="departmentSelect">Select Department</label>
                                                    <input type="hidden" name="main_task"
                                                        value="{{ $task->main_tasks_id }}">
                                                    <select id="departmentSelect" name="departmentSelect"
                                                        class="form-select">
                                                        <option value="{{ Auth::user()->department_id }}">
                                                            {{ Auth::user()->department->name }}
                                                        </option>
                                                        @foreach ($departments as $department)
                                                        @if ($department->id !==
                                                        Auth::user()->department_id)
                                                        <option value="{{ $department->id }}">{{
                                                            $department->name }}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="notes">Notes</label>
                                                    <textarea id="notes" name="notes" class="form-control"></textarea>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn ripple btn-primary" type="submit">Save
                                                changes</button>
                                            <button class="btn ripple btn-secondary" data-bs-dismiss="modal"
                                                type="button">Close</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>


                    {{ $pendingTasks->links() }}

                </div>
            </div>
        </div>
        {{-- Mobile Table only --}}
        <div class="card d-xl-none">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0"> Local Tasks</h4>

                </div>
            </div>
            <div class="card-body">

                {{-- <div class="table-responsive">
                    <table class="table table-vcenter table-bordered text-nowrap table-striped align-items-center mb-0">
                        <thead>
                            <tr class="bg-warning-gradient">
                                <th class="text-lg">ID</th>
                                <th class="text-lg">STATION</th>
                                <th class="text-lg">ENGINEER</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pendingTasks as $task)
                            <tr>
                                <th scope="row" class="text-lg">{{ $loop->iteration }}</th>
                                <td class="text-lg"> {{$task->main_task->station->SSNAME}}</td>
                                <td class="text-lg">
                                    @if($task->eng_id)

                                    <a class="btn btn-secondary btn-w-xs mb-1"
                                        href="{{ route('dashboard.viewTask', ['id' => $task->id]) }}">
                                        <i class="fas fa-eye"></i></a>
                                    @else
                                    -
                                    @endif
                                </td>

                            </tr>
                            <!-- Modal -->
                            <div class="modal" id="moveTask-{{ $task->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="moveTaskLabel-{{ $task->id }}">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title">Update this task</h6>
                                            <button aria-label="Close" class="close" data-bs-dismiss="modal"
                                                type="button">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('dashboard.convertTask', $task->main_tasks_id) }}"
                                                method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="departmentSelect">Select Department</label>
                                                    <input type="hidden" name="main_task"
                                                        value="{{ $task->main_tasks_id }}">
                                                    <select id="departmentSelect" name="departmentSelect"
                                                        class="form-select">
                                                        <option value="{{ Auth::user()->department_id }}">
                                                            {{ Auth::user()->department->name }}
                                                        </option>
                                                        @foreach ($departments as $department)
                                                        @if ($department->id !==
                                                        Auth::user()->department_id)
                                                        <option value="{{ $department->id }}">{{
                                                            $department->name }}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="notes">Notes</label>
                                                    <textarea id="notes" name="notes" class="form-control"></textarea>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn ripple btn-primary" type="submit">Save
                                                changes</button>
                                            <button class="btn ripple btn-secondary" data-bs-dismiss="modal"
                                                type="button">Close</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>


                    {{ $pendingTasks->links() }}

                </div> --}}
                <a href="{{ route('dashboard.showTasks', ['status' => 'pending']) }}" class="btn btn-danger">click here
                    to show all pending tasks</a>
            </div>
        </div>
        @endif

        {{-- incoming table--}}
        @if (!$incomingTasks->isEmpty())
        <div class="card d-none d-xl-block">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">Incoming Tasks</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter table-bordered text-nowrap table-striped align-items-center mb-0">
                        <thead>
                            <tr class="bg-info-gradient">
                                <th>ID</th>
                                <th>STATION</th>
                                <th>FROM</th>
                                <th>TO</th>
                                <th>Date</th>
                                <th>OPERATION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($incomingTasks as $task)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$task->main_task->station->SSNAME}}</td>
                                <td>{{$task->department->name}}</td>
                                <td>{{$task->toDepartment->name}}</td>
                                <td>{{$task->created_at}}</td>
                                <td>
                                    <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fe fe-settings"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            @if($task->status =='completed')
                                            <a href="{{route('dashboard.editTask',$task->main_tasks_id)}}"
                                                class="dropdown-item">View</a>
                                            @endif
                                        </li>

                                        <li><a class="dropdown-item"
                                                href="{{ route('dashboard.editTask', $task->main_tasks_id) }}">
                                                <i class="fas fa-edit"></i> Edit</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('dashboard.timeline', ['id' => $task->main_tasks_id]) }}">
                                                <i class="fas fa-history"></i> History</a></li>
                                    </ul>



                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
        {{-- outgoing tasks--}}
        @if (!$outgoingTasks->isEmpty())
        <div class="card d-none d-xl-block">
            <div class="card-header pb-0">
                <h4 class="card-title mg-b-0">Outgoing Tasks</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter table-bordered text-nowrap table-striped align-items-center mb-0">
                        <thead>
                            <tr class="bg-pink-gradient">
                                <th>ID</th>
                                <th>STATION</th>
                                <th>FROM</th>
                                <th>TO</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>OPERATION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($outgoingTasks as $task)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$task->main_task->station->SSNAME}}</td>
                                <td>{{$task->department->name}}</td>
                                <td>{{$task->toDepartment->name}}</td>
                                <td>{{$task->created_at}}</td>
                                @if($task->status === 'pending')
                                <td> <span class="badge bg-danger me-1">Pendng</span></td>
                                @else
                                <td> <span class="badge bg-success me-1">{{$task->status}}</span>
                                </td>
                                @endif
                                <td>

                                    <button type="button" class="btn btn-outline-danger dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-settings"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            @if($task->status =='completed')
                                            <a href="{{route('dashboard.editTask',$task->main_tasks_id)}}"
                                                class="dropdown-item">View</a>
                                            @endif
                                        </li>

                                        {{-- <li><a class="dropdown-item"
                                                href="{{ route('dashboard.viewTask', $task->main_tasks_id) }}">
                                                <i class="fas fa-eye"></i> View</a></li> --}}
                                        <li><a class="dropdown-item"
                                                href="{{ route('dashboard.timeline', ['id' => $task->main_tasks_id]) }}">
                                                <i class="fas fa-history"></i> History</a></li>
                                        <li>
                                            <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#deleteConfirmationModal-{{ $task->id }}">
                                                <i class="fa fa-trash"></i> Delete
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#cancelConfirmationModal-{{ $task->id }}">
                                                <i class="fas fa-times"></i> Cancel Tracking
                                            </a>
                                        </li>
                                    </ul>



                                </td>


                            </tr>
                            <!-- Delete Confirmation Modal -->
                            <div class="modal fade" id="deleteConfirmationModal-{{ $task->id }}" tabindex="-1"
                                aria-labelledby="deleteConfirmationModalLabel-{{ $task->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteConfirmationModalLabel-{{ $task->id }}">
                                                Delete Confirmation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this converted task?
                                            <form
                                                action="{{ route('dashboard.deleteConvertedTask', ['id' => $task->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" value="{{$task->id}}" name="task_id">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            {{-- <button type="submit" class="btn btn-danger"
                                                id="confirmDelete">Delete</button> --}}
                                            <button class="btn btn-outline-danger" id="deleteTask"
                                                data-id="{{ $task->id }}">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>

                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- cancel Confirmation Modal -->
                            <div class="modal fade" id="cancelConfirmationModal-{{ $task->id }}" tabindex="-1"
                                aria-labelledby="cancelConfirmationModal-{{ $task->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="cancelConfirmationModal-{{ $task->id }}">
                                                Delete Confirmation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to cancel this converted task?
                                            <form
                                                action="{{ route('dashboard.cancelConvertedTask', ['id' => $task->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" value="{{$task->id}}" name="task_id">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            {{-- <button type="submit" class="btn btn-danger"
                                                id="confirmDelete">Delete</button> --}}
                                            <button class="btn btn-outline-danger" id="deleteTask"
                                                data-id="{{ $task->id }}">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>

                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
        {{-- green table--}}
        @if (!$completedTasks->isEmpty())

        <div class="card d-none d-xl-block">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0"> Completed Tasks</h4>


                </div>

            </div>

        </div>
        {{-- Mobile Table only --}}
        <div class="card d-xl-none">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0"> Completed Tasks</h4>

                </div>
            </div>
            <div class="card-body">
                <a href="{{ route('dashboard.showTasks', ['status' => 'completed']) }}" class="btn btn-success">click
                    here
                    to show all completed tasks</a>
            </div>
        </div>

        @endif
    </div>




</div>
<!-- row closed -->

@endsection

@section('scripts')
<script src="{{asset('assets/js/index.js')}}"></script>
<!--Internal Counters -->
<script src="{{asset('assets/plugins/counters/waypoints.min.js')}}"></script>
<script src="{{asset('assets/plugins/counters/counterup.min.js')}}"></script>

<!--Internal Time Counter -->
<script src="{{asset('assets/plugins/counters/jquery.missofis-countdown.js')}}"></script>
<script src="{{asset('assets/plugins/counters/counter.js')}}"></script>

<!--Internal  Chart.bundle js -->
<script src="{{asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>

<!-- Internal Chartjs js -->
<script src="{{asset('assets/js/chart.chartjs.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

<!--Internal  Sweet-Alert js-->
<script src="{{asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/plugins/sweet-alert/jquery.sweet-alert.js')}}"></script>

<!-- Sweet-alert js  -->
<script src="{{asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/sweet-alert.js')}}"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('success') }}'
                });
            @endif
        });
</script>




<script>
    function deleteRecord(id) {
      Swal.fire({
        title: 'هل أنت متأكد من خيار الحذف؟',
        text: 'يرجى تحديد خيارك بالأسفل',
        icon: 'تحذير',
        showCancelButton: true,
        confirmButtonText: 'نعم ، احذف المهمة',
        cancelButtonText: 'إلغاء',
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('delete-form-' + id).submit();
        }
      });
    }
</script>


<script>
    // JavaScript code to create a pie chart using Chart.js
    var ctx = document.getElementById('chartPie').getContext('2d');
    var data = {
        labels: ['Completed Tasks', 'Remaining Tasks'],
        datasets: [{
            data: [{{ $completedTasksAllTime }}, {{ $totalTasksAllTime - $completedTasksAllTime }}],
            backgroundColor: ['#11d43d', '#ff1947']
        }]
    };
    var options = {
        responsive: true
    };
    var pieChart = new Chart(ctx, {
        type: 'pie',
        data: data,
        options: options
    });
</script>
@endsection