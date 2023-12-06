@extends('layouts.app')

@section('styles')
<style>
    .task-action-container * {
        color: #646464 !important;
        font-size: 15px !important;
        font-style: italic !important;
    }
</style>
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
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
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

    <div class="card mg-b-20" id="tabs-style2">
        <div class="card-body">
            {{-- <div class="main-content-label mg-b-5">
                Basic Style2 Tabs
            </div>
            <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.
            </p> --}}
            <div class="text-wrap">
                <div class="example">
                    <div class="panel panel-primary tabs-style-2">
                        <div class=" tab-menu-heading">
                            <div class="tabs-menu1">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs main-nav-line">
                                    <li><a href="#tab4" class="nav-link me-1 active" data-bs-toggle="tab">Tasks
                                            Statistics</a>
                                    </li>
                                    <li><a href="#tab6" class="nav-link" data-bs-toggle="tab">Engineers Statistics</a>
                                    </li>
                                    <li><a href="#tab5" class="nav-link me-1" data-bs-toggle="tab">Reports & User
                                            Approvals</a></li>


                                </ul>
                            </div>
                        </div>
                        <div class="panel-body tabs-menu-body main-content-body-right border">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab4">
                                    <div class="col-md-12 card">
                                        <div class="card-header pb-0">
                                            <div class="card-title pb-0 mb-2">Tasks Statistics</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 text-center">
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
                                                                {{ number_format($totalTasksInDay > 0 ?
                                                                ($completedTasksInDay /
                                                                $totalTasksInDay) * 100 : 0, 2) }}%
                                                            </span>
                                                        </div>
                                                    </div>

                                                </div><!-- col -->
                                                <div class="col-sm-12 col-md-6 border-start text-center">
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
                                                                {{ $totalTasksInWeek > 0 ? number_format(min(100,
                                                                ($completedTasksInWeek /
                                                                $totalTasksInWeek) * 100), 2) : 0 }}%
                                                            </span>
                                                        </div>

                                                    </div>
                                                </div><!-- col -->
                                                <div class="col-sm-12 col-md-6 border-start text-center">
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
                                                                {{ number_format($totalTasksInMonth > 0 ?
                                                                ($completedTasksInMonth /
                                                                $totalTasksInMonth) * 100 : 0, 2) }}%
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div><!-- col -->
                                            </div><!-- row -->
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="tab5">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6 text-center">
                                            <h3>Reports Ready for Approval ({{$pendingReportsCount}}) </h3>
                                            <a href="{{route('dashboard.pendingReports')}}" class="btn btn-dark">Check
                                                Pending
                                                Reports</a>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <li class="icons-list-item"><i
                                                        class="fa fa-hourglass-end text-danger"></i></li>
                                            </div>

                                        </div>
                                        <div class="col-xs-12 col-md-6 text-center">
                                            <h3>Users Ready for Approval ({{$usersPendingCount}}) </h3>
                                            <a href="{{route('dashboard.pendingUsers')}}" class="btn btn-warning">Check
                                                Users
                                            </a>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <li class="icons-list-item"><i
                                                        class="fa fa-hourglass-end text-danger"></i></li>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab6">
                                    <p>Explore the table below to view a detailed summary of engineers, highlighting
                                        completed and pending tasks.</p>


                                    <div class="table-responsive">
                                        <table class="table border-top-0 table-bordered text-nowrap border-bottom"
                                            id="basic-datatable">
                                            <thead>
                                                <tr>
                                                    <th class="wd-15p border-bottom-0">#</th>
                                                    <th class="wd-15p border-bottom-0"><i class="fas fa-user"></i> Name
                                                    </th>
                                                    <th class="wd-15p border-bottom-0"><i class="fas fa-tasks"></i>
                                                        Assigned Tasks</th>
                                                    <th class="wd-20p border-bottom-0"><i
                                                            class="fas fa-check-circle"></i> Completed
                                                        Tasks</th>
                                                    <th class="wd-15p border-bottom-0"><i class="fas fa-clock"></i>
                                                        Pending Tasks</th>
                                                    <th class="wd-15p border-bottom-0"><i class="fas fa-percent"></i>
                                                        Completion Percentage</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($engineerData as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>

                                                    <td>{{ $data['name'] }}</td>
                                                    <td>{{ $data['assigned_tasks'] }}</td>
                                                    <td class=" bg-light">
                                                        {{
                                                        $data['completed_tasks'] }}</td>
                                                    <td class="bg-secondary">{{
                                                        $data['pending_tasks']}}
                                                    </td>
                                                    <td>
                                                        @if (array_key_exists('completion_percentage', $data))
                                                        {{ $data['completion_percentage'] }}%
                                                        @else
                                                        N/A
                                                        @endif
                                                    </td>

                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- tasks have no engineers yet--}}
    @if (!$unAssignedTasks->isEmpty())
    <div class="card">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mg-b-0"><i class="fas fa-tasks"></i> Tasks need to be assigned to engineers</h4>
            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table id="unassigned-tasks" class="border-top-0  table table-bordered text-nowrap border-bottom">
                    <thead>
                        <tr class="bg-secondary-gradient">
                            <th class="text-lg">ID</th>
                            <th class="text-lg">STATION</th>
                            <th class="text-lg d-none d-md-table-cell">Main Alarm</th>
                            <th class="text-lg d-none d-md-table-cell">DATE</th>
                            <th class="text-lg">OPERATION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($unAssignedTasks as $task)
                        <tr>
                            <th scope="row" class="text-lg">{{ $loop->iteration }}</th>
                            <td class="text-lg">
                                @if($task->main_task->station_id)
                                {{$task->main_task->station->SSNAME}}
                                @else
                                -
                                @endif
                            </td>

                            <td class="text-lg d-none d-md-table-cell">
                                @if(isset($task->main_task->main_alarm_id))
                                {{$task->main_task->main_alarm->name}}
                                @else
                                -

                            </td>
                            @endif
                            <td class="text-lg d-none d-md-table-cell">{{$task->created_at}}</td>
                            <td>
                                <button type="button" class="btn btn-outline-secondary dropdown-toggle"
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
                                    <li>
                                        <form method="post"
                                            action="{{ route('task.destroy', ['id' => $task->main_task->id]) }}"
                                            id="delete-form-{{ $task->main_task->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="deleteRecord({{ $task->main_task->id }})"
                                                class="dropdown-item"> <i class="fas fa-trash "></i> Delete
                                                Task</button>
                                        </form>
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
                                        <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button">
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




            </div>
        </div>
    </div>

    @endif

    {{--red table --}}
    @if (!$pendingTasks->isEmpty())
    {{-- large screen Table only --}}

    <div class="card">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mg-b-0"> Local Tasks</h4>
            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table id="pending-tasks" class="border-top-0  table table-bordered text-nowrap border-bottom">
                    <thead>
                        <tr class="bg-warning-gradient">
                            <th class="text-lg">ID</th>
                            <th class="text-lg">STATION</th>
                            <th class="text-lg">Main Alarm</th>
                            <th class="text-lg">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendingTasks as $task)
                        <tr>
                            <th scope="row" class="text-lg">{{ $loop->iteration }}</th>
                            <td class="text-lg">
                                @if($task->main_task->station_id)
                                {{$task->main_task->station->SSNAME}}
                                @else
                                -
                                @endif
                            </td>

                            <td class="text-lg">
                                @if(isset($task->main_task->main_alarm_id))
                                {{$task->main_task->main_alarm->name}}
                                @else
                                -

                            </td>
                            @endif
                            <td>
                                <br>
                                @if($task->eng_id)
                                <Strong>Engineer</Strong>:
                                <a href="{{route('dashboard.engineerProfile',['eng_id'=>$task->eng_id])}}">
                                    {{$task->engineer->name}} - {{$task->engineer->department->name}}
                                </a>
                                @else
                                -
                                @endif
                                <br>

                                <strong>Status</strong> <span class="badge bg-danger me-1">{{$task->status}}</span>
                                <br>

                                <strong>Date:</strong>{{$task->created_at}}
                                <br>
                                <Strong>Viewed</Strong> :

                                @if($task->isSeen)
                                <i class="fas fa-check-circle text-success"></i>
                                <!-- Font Awesome check-circle icon for "Yes" -->
                                @else
                                <i class="fas fa-times-circle text-danger"></i>
                                <!-- Font Awesome times-circle icon for "No" -->
                                @endif
                                <br>
                                <button type="button" class="btn btn-outline-danger btn-sm mb-1 dropdown-toggle"
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
                                    <li>
                                        <form method="post"
                                            action="{{ route('task.destroy', ['id' => $task->main_task->id]) }}"
                                            id="delete-form-{{ $task->main_task->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="deleteRecord({{ $task->main_task->id }})"
                                                class="dropdown-item"> <i class="fas fa-trash "></i> Delete
                                                Task</button>
                                        </form>
                                    </li>
                                    <li>
                                        <form id="resendTaskForm" method="post"
                                            action="{{ route('resendTask', ['id' => $task->main_task->id]) }}">
                                            @csrf
                                            <button type="button" class="dropdown-item" onclick="confirmResend()">
                                                <i class="fas fa-paper-plane"></i> Resend Task
                                            </button>
                                        </form>
                                    </li>

                                    <script>
                                        function confirmResend() {
                                            // Use SweetAlert for confirmation
                                            Swal.fire({
                                                title: 'Are you sure?',
                                                text: 'You are about to resend the task.',
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Yes, resend it!'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    // If the user confirms, submit the form
                                                    document.getElementById('resendTaskForm').submit();
                                                }
                                            });
                                        }
                                    </script>







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
                                        <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button">
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




            </div>
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
                <table id="incoming-tasks" class="border-top-0  table table-bordered text-nowrap border-bottom">
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
                <table id="outgoing-tasks" class="border-top-0  table table-bordered text-nowrap border-bottom">
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
                                        <a href="{{route('dashboard.getAllReportsForAtask',$task->main_tasks_id)}}"
                                            class="dropdown-item">View Report</a>
                                        <a href="{{route('dashboard.editTask',$task->main_tasks_id)}}"
                                            class="dropdown-item">Edit</a>
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
                                        <form action="{{ route('dashboard.deleteConvertedTask', ['id' => $task->id]) }}"
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
                                        <form action="{{ route('dashboard.cancelConvertedTask', ['id' => $task->id]) }}"
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

    <div class="card">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mg-b-0"> Completed Tasks</h4>
            </div>

        </div>
        <div class="card-body ">
            <div class="table-responsive">
                <table id="completed-tasks" class="border-top-0 table table-bordered text-nowrap border-bottom">
                    <thead>
                        <tr class="bg-success-gradient">
                            <th>ID</th>
                            <th>STATION</th>
                            <th>Main alarm</th>
                            <th>Engineer Details</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($completedTasks as $task)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{$task->main_task->station->SSNAME}}</td>
                            <td>
                                @isset($task->main_alarm_id)
                                {{$task->main_task->main_alarm->name}}
                                @endisset
                            </td>
                            <td>
                                <div class="details-container">
                                    <div class="engineer-details">
                                        <strong>Engineer:</strong>
                                        <a href="{{ route('dashboard.engineerProfile',['eng_id'=>$task->eng_id]) }}">
                                            {{$task->engineer->name}} - {{$task->engineer->department->name}}
                                        </a>
                                    </div>
                                    <div class="additional-details">
                                        <strong>Action Take:</strong>
                                        <div class="task-action-container">
                                            {!! $task->action_take !!}
                                        </div>
                                        <br>

                                        <strong>Status:</strong> <span
                                            class="badge bg-success me-1">{{$task->status}}</span>
                                        <br>
                                        <strong>Date:</strong>{{$task->created_at}}
                                    </div>
                                </div>
                                <div class="actions-dropdown mt-3">

                                    <button type="button" class="btn btn-outline-success btn-sm mb-1 dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fe fe-settings"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{ route('dashboard.reportPage',['id'=>$task->id]) }}">
                                                <i class="fas fa-eye"></i> View Report</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('dashboard.editTask', $task->main_tasks_id) }}">
                                                <i class="fas fa-edit"></i> Edit</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('dashboard.timeline', ['id' => $task->main_tasks_id]) }}">
                                                <i class="fas fa-history"></i> History</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">
                                                <i class="fas fa-exchange-alt"></i> Move to Another Department</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>




                        </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>

    </div>


    @endif
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
@if(session('error'))
<script>
    $(document).ready(function() {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                html: '{!! session('error') !!}'
            });
        });
</script>
@endif







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
<script>
    function deleteRecord(id) {
          Swal.fire({
            title: 'Are you sure about the deletion choice?',
            text: 'Please select your option below',
            icon: 'Warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete the task',
            cancelButtonText: 'Cancel',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
          }).then((result) => {
            if (result.isConfirmed) {
              document.getElementById('delete-form-' + id).submit();
            }
          });
        }
</script>
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>

<!--Internal  Datatable js -->
<script src="{{asset('assets/js/table-data.js')}}"></script>
@endsection