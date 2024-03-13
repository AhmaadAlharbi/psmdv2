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
    {{-- @if(Auth::user()->role->title === 'Admin') --}}
    <div class="card mg-b-20" id="tabs-style2">
        <div class="card-body">
            <div class="main-content-label mg-b-5">
                Search
            </div>

            {{-- <div class="text-wrap">
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
                                                    @foreach ($engineers->sortBy('user.arabic_name') as $engineer)
                                                    <option value="{{ $engineer->user->arabic_name }}">
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
            </div> --}}
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
            {{-- @endif --}}

            <div class="">
                <div class="row">
                    <div class="col-12">
                        <table id="archive" class="table">
                            <thead>
                                <tr>
                                    <th>Task</th>
                                    <th>Station</th>
                                    <th>Department</th>

                                    <th>Dates</th>
                                    <th>Status</th>

                                    <th>Engineer</th>
                                    <th>Main Alarm</th>
                                    <th>Equip</th>
                                    <th>Nature of Fault</th>
                                    <th>Notes</th>
                                    <th>Action Take</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                <tr>
                                    <td>{{$task->id}}</td>
                                    <td>{{$task->main_task->station->SSNAME}}</td>
                                    <td><span class="badge bg-light rounded">{{$task->department->name}}</span></td>
                                    <td>
                                        <strong>Occurred:</strong>
                                        <span class="badge bg-primary">
                                            <i class="fas fa-calendar"></i> {{ $task->created_at->format('j F, Y \a\t
                                            g:i A') }}
                                        </span><br>
                                        @if($task->main_task->section_tasks->isNotEmpty())
                                        <strong>Completed:</strong>
                                        <span class="badge bg-success">
                                            <i class="fas fa-check-circle"></i> {{
                                            $task->main_task->section_tasks->first()->created_at->format('j F, Y \a\t
                                            g:i A') }}
                                        </span>
                                        @else
                                        <span class="text-muted">No completion data available</span>
                                        @endif

                                    </td>
                                    <td>
                                        @php
                                        $badgeStatus = '';
                                        if ($task->status == 'pending') {
                                        $badgeStatus = 'badge bg-danger';
                                        } elseif ($task->status != 'pending' && $task->isCompleted == '0') {
                                        $badgeStatus = 'badge bg-warning';
                                        } elseif ($task->status != 'pending' && $task->isCompleted == '1') {
                                        $badgeStatus = 'badge bg-success';
                                        }
                                        @endphp
                                        <span class="{{$badgeStatus}}">{{$task->status}}</span>
                                    </td>
                                    <td>
                                        <a
                                            href="{{ $task->eng_id ? route('dashboard.engineerProfile', ['eng_id' => $task->eng_id]) : '#' }}">
                                            {{ optional($task->engineer)->name ?: '-' }}
                                        </a>

                                    </td>
                                    <td>@isset($task->main_task->main_alarm->name){{$task->main_task->main_alarm->name}}@endisset
                                    </td>
                                    <td>{{$task->main_task->equip_number}}</td>
                                    <td>{{$task->main_task->problem}}</td>
                                    <td>{{$task->main_task->notes}}</td>
                                    <td>
                                        @foreach($task->main_task->section_tasks->reverse() as $sectionTask)
                                        {!!$sectionTask->action_take!!}
                                        @endforeach

                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-primary dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fe fe-settings"></i>

                                        </button>
                                        <div class="dropdown-menu tx-13">
                                            @if($task->isCompleted == "0" && $task->eng_id == Auth::user()->id)
                                            <a class="dropdown-item"
                                                href="/engineer-task-page/{{$task->main_tasks_id}}">Add
                                                Report</a>



                                            @else
                                            <a class="dropdown-item"
                                                href="{{ route('taskNote.show', ['department_task_id' => $task->main_tasks_id]) }}">Add
                                                Task Notes</a>
                                            @foreach($task->main_task->section_tasks->reverse() as $sectionTask)
                                            <a class="dropdown-item"
                                                href="{{ route('dashboard.reportPage',['id'=>$sectionTask->id])}}">
                                                View Report</a>
                                            @endforeach

                                            @endif

                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{ $tasks->links() }}

        </div>
    </div>



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