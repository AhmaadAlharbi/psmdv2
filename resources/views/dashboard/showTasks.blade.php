@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Tasks</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
            </span>
        </div>
    </div>

</div>
<!-- breadcrumb -->

<!-- row -->
<div class="row">
    @if(Auth::user()->role->title === 'Admin')
    <div class="card mg-b-20" id="tabs-style2">
        <div class="card-body">
            <div class="main-content-label mg-b-5">
                Search
            </div>

            <div class="text-wrap">
                <div class="example">
                    <div class="panel panel-primary tabs-style-2">
                        <div class=" tab-menu-heading">
                            <div class="tabs-menu1">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs main-nav-line">
                                    <li><a href="#tab4" class="nav-link active" data-bs-toggle="tab">
                                            Search in stations
                                        </a>
                                    </li>
                                    <li><a href="#tab5" class="nav-link" data-bs-toggle="tab">
                                            Search in Engineers</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="panel-body tabs-menu-body main-content-body-right border">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab4">
                                    <form action="{{route('dashboard.searchStation')}}" method="GET">
                                        <div class="row d-flex justify-content-start mb-3">
                                            <div class="col">
                                                <input list="ssnames" type="search" class=" mb-2 form-control"
                                                    name="station" placeholder="search in stations">
                                                <datalist id="ssnames">
                                                    @foreach ($stations as $station)
                                                    <option value="{{ $station->SSNAME }}">
                                                        @endforeach
                                                </datalist>
                                                <button type="submit" class=" btn btn-secondary bg-secondary mb-2">
                                                    <i class="bi bi-search"></i> Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="tab5">
                                    <form action="{{route('dashboard.engineerTasks')}}" method="GET">
                                        <div class="row d-flex justify-content-start mb-3">
                                            <div class="col">
                                                <input list="engineers" type="search" class="mb-2 form-control"
                                                    name="engineer" placeholder="search in engineers">
                                                <datalist id="engineers">
                                                    @foreach ($engineers as $engineer)
                                                    <option value="{{ $engineer->user->name }}">
                                                        @endforeach
                                                </datalist>
                                                <button type="submit" class=" btn btn-secondary bg-secondary mb-2">
                                                    <i class="bi bi-search"></i> Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="example">
        <div class="p-3 bg-light text-dark border">
            <nav class="nav main-nav flex-column flex-md-row">
                <a class="nav-link {{ Route::is('dashboard.showTasks') && request()->status == 'all' ? 'active' : '' }}"
                    href="{{ route('dashboard.showTasks', ['status' => 'all']) }}">
                    <i class="bi bi-list-task"></i> All Tasks
                </a>
                <a class="nav-link {{ Route::is('dashboard.showTasks') && request()->status == 'pending' ? 'active' : '' }}"
                    href="{{ route('dashboard.showTasks', ['status' => 'pending']) }}">
                    <i class="bi bi-clock-history"></i> Pending Tasks
                </a>
                <a class="nav-link {{ Route::is('dashboard.showTasks') && request()->status == 'completed' ? 'active' : '' }}"
                    href="{{ route('dashboard.showTasks', ['status' => 'completed']) }}">
                    <i class="bi bi-check-circle-fill"></i> Completed Tasks
                </a>
                <a class="nav-link {{ Route::is('dashboard.showTasks') && request()->status == 'mutual-tasks' ? 'active' : '' }}"
                    href="{{ route('dashboard.showTasks', ['status' => 'mutual-tasks']) }}">
                    <i class="bi bi-people"></i> Pending Mutual Tasks
                </a>
                <a class="nav-link {{ Route::is('dashboard.showTasks') && request()->status == 'all-mutual-tasks' ? 'active' : '' }}"
                    href="{{ route('dashboard.showTasks', ['status' => 'all-mutual-tasks']) }}">
                    <i class="bi bi-people"></i> All Mutual Tasks
                </a>
            </nav>

        </div>
    </div>
    @endif

    <div class="container">
        <div class="row">
            @foreach($tasks as $task)
            <div class="col-12 col-sm-12 col-lg-6 col-xl-4 my-2">
                <div class="card {{$task->status =='pending'  ? 'card-danger' : 'card-success'}} h-100">
                    <div class="card-body">
                        <h5 class="card-title">Task #{{$task->main_task->id}}</h5>
                        <p class="card-text">
                            <strong>Created At:</strong> {{$task->main_task->created_at}}<br>
                            <strong>Department:</strong> <span
                                class="badge bg-light rounded">{{$task->department->name}}</span>
                        </p>
                        <p class="card-text">
                            <strong>Station:</strong> <span
                                style="font-size:22px; font-weight:bold;">{{$task->main_task->station->SSNAME}}</span>
                        </p>
                        <p class="card-text">
                            <strong>Main Alarm:</strong>
                            @isset($task->main_task->main_alarm->name){{$task->main_task->main_alarm->name}}@endisset
                        </p>
                        <p class="card-text">
                            <strong>Equip:</strong> {{$task->main_task->equip_number}}
                        </p>
                        <p class="card-text">
                            <strong>Nature of Fault:</strong> {{$task->main_task->problem}}
                        </p>
                        <p class="card-text">
                            <strong>Notes:</strong> {{$task->main_task->notes}}
                        </p>
                        <h6 class="card-subtitle mb-2 text-muted">Action Take:</h6>
                        <div class="card-body">
                            <div>
                                <p class="card-sub-title"><strong>Click the buttons below to show and hide action take
                                        for this task.</strong></p>
                            </div>
                            <div>
                                <div>

                                    <button data-toggle="collapse"
                                        data-target="#collapseExample{{ $task->main_task->id }}" aria-expanded="false"
                                        class="btn btn-secondary" aria-label="Toggle Action Takes"
                                        id="toggleButton{{ $task->main_task->id }}">
                                        <span class="d-md-none">Toggle</span> <span class="toggle-text">Show</span>
                                        Action Takes
                                    </button>
                                    <div class="collapse mt-4" id="collapseExample{{ $task->main_task->id }}">
                                        <div>
                                            <h5>Action Take Details</h5>

                                            @foreach($task->main_task->section_tasks as $sectionTask)
                                            <div class="card mt-3">
                                                <div class="card-body">
                                                    <p><strong>Engineer:</strong> {{ $sectionTask->engineer->name }}</p>
                                                    <p><strong>Department:</strong> {{ $sectionTask->department->name }}
                                                    </p>
                                                    <p><strong>Action Take:</strong> {!!
                                                        strip_tags($sectionTask->action_take) !!}</p>
                                                    <p><strong>Created at:</strong> {{ $sectionTask->created_at }}</p>
                                                    <div class="d-flex">
                                                        @if($sectionTask->eng_id === Auth::user()->id)
                                                        <a href="{{ route('dashboard.requestToUpdateReport', $sectionTask->id) }}"
                                                            class="btn btn-sm btn-dark mx-2 mb-1">
                                                            <i class="fas fa-pencil-alt"></i> Update Report
                                                        </a>
                                                        @endif

                                                        @if($sectionTask->department_id == Auth::user()->department_id)
                                                        <form method="POST"
                                                            action="{{ route('dashboard.approveReports', $sectionTask->id) }}">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-sm btn-{{ $sectionTask->approved == '0' ? 'success' : 'info' }}">
                                                                <i class="fa fa-check-circle"></i>
                                                                {{ $sectionTask->approved == '0' ? 'Approve Report' :
                                                                'Cancel Approval' }}
                                                            </button>
                                                        </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach




                                            @if($task->eng_id && $task->isCompleted == "0")
                                            <a class=""
                                                href="{{route('dashboard.engineerProfile',['eng_id'=>$task->eng_id])}}">
                                                <p class="card-text mt-3"><strong>Engineer:</strong>
                                                    {{$task->engineer->name}}</p>
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="btn-group">
                            <button data-bs-toggle="dropdown" class="btn {{$task->isCompleted == " 1" ? 'btn-success'
                                : 'btn-danger' }} btn-block w-100">
                                Actions <i class="icon ion-ios-arrow-down tx-11 mg-l-3"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item"
                                    href="{{ route('dashboard.timeline', ['id' => $task->main_tasks_id]) }}">
                                    <i class="fas fa-history"></i> History
                                </a>
                                @if(Auth::user()->role->title === 'Admin' )
                                <a href="{{ route('dashboard.editTask', ['id' => $task->main_task->id]) }}"
                                    class="dropdown-item">Edit</a>
                                @if(Auth::user()->department_id == $task->department_id)
                                <form method="post" action="{{ route('task.destroy', ['id' => $task->main_task->id]) }}"
                                    id="delete-form-{{ $task->main_task->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="deleteRecord({{ $task->main_task->id }})"
                                        class="dropdown-item">Delete Task</button>
                                </form>
                                @endif
                                @endif
                                @if($task->isCompleted === '1')
                                <a href="{{ route('dashboard.reportDepartment', ['main_task_id' => $task->main_tasks_id, 'department_id' => $task->department_id]) }}"
                                    class="dropdown-item">
                                    <i class="si si-notebook px-2" data-bs-toggle="tooltip" title=""
                                        data-bs-original-title="si-notebook" aria-label="si-notebook"></i>
                                    {{ Auth::user()->department->name }} Report
                                </a>
                                @if($task->source_department !== 1 && $task->source_department)
                                @php
                                $reportRoute = $task->source_department !== Auth::user()->department_id ?
                                'dashboard.reportDepartment' : 'dashboard.reportDepartment';
                                $departmentId = $task->source_department !== Auth::user()->department_id ?
                                $task->source_department : $task->destination_department;
                                $departmentName = $task->source_department !== Auth::user()->department_id ?
                                $task->department->name : $task->toDepartment->name;
                                @endphp
                                <a href="{{ route($reportRoute, ['main_task_id' => $task->main_tasks_id, 'department_id' => $departmentId]) }}"
                                    class="dropdown-item">Report {{ $departmentName }}</a>
                                @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    {{ $tasks->links() }}



</div>
<!-- row closed -->

@endsection

@section('scripts')
<!-- Internal Select2 js-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toggleButtons = document.querySelectorAll('[data-toggle="collapse"]');

        toggleButtons.forEach(function (toggleButton) {
            toggleButton.addEventListener('click', function () {
                var targetId = this.getAttribute('data-target');
                var toggleText = this.querySelector('.toggle-text');
                var collapseElement = document.querySelector(targetId);

                if (collapseElement.style.display === 'block') {
                    collapseElement.style.display = 'none';
                    toggleText.textContent = 'Show';
                } else {
                    collapseElement.style.display = 'block';
                    toggleText.textContent = 'Hide';
                }
            });
        });
    });
</script>

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
//delete tasks
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toggleButtons = document.querySelectorAll('[data-bs-toggle="collapse"]');
        
        toggleButtons.forEach(function (toggleButton) {
            toggleButton.addEventListener('click', function () {
                var targetId = this.getAttribute('aria-controls');
                var toggleText = this.querySelector('.toggle-text');
                var collapseElement = new bootstrap.Collapse(document.getElementById(targetId));
                
                if (collapseElement._isShown) {
                    toggleText.textContent = 'Show';
                } else {
                    toggleText.textContent = 'Hide';
                }
            });
        });

        var collapseElements = document.querySelectorAll('.collapse');

        collapseElements.forEach(function (collapseElement) {
            // Update button text on Bootstrap collapse events
            collapseElement.addEventListener('hidden.bs.collapse', function () {
                var buttonId = this.getAttribute('aria-labelledby');
                var toggleButton = document.getElementById(buttonId);
                var toggleText = toggleButton.querySelector('.toggle-text');
                toggleText.textContent = 'Show';
            });

            collapseElement.addEventListener('shown.bs.collapse', function () {
                var buttonId = this.getAttribute('aria-labelledby');
                var toggleButton = document.getElementById(buttonId);
                var toggleText = toggleButton.querySelector('.toggle-text');
                toggleText.textContent = 'Hide';
            });
        });
    });
</script>


@endsection