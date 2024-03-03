@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">

    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">PSMD</h4>

            <span class="text-muted mt-1 tx-13 ms-2 mb-0">/

                {{Auth::user()->department->name}}
            </span>

        </div>
    </div>

</div>
<div class="row ">
    @if(session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
    @endif

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

    <div class="col-xl-4 col-lg-6 col-md-6">
        <a href="{{route('dashboard.showTasks',['status'=>'pending'])}}">
            <div class="card  bg-danger-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-warning">
                            <i class="fas fa-hourglass-half"></i>
                        </div>
                        <div class="ms-auto">
                            <h5 class="tx-18 tx-white-8 mb-3">Pending Tasks</h5>
                            <h2 class="counter mb-0 text-white">{{$pendingTasksCount}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6">
        <a href="{{route('dashboard.ShowTasksEngineer',['status'=>'completed'])}}">
            <div class="card  bg-success-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-primary">
                            <i class="far fa-check-circle"></i>
                        </div>
                        <div class="ms-auto">
                            <h5 class="tx-18 tx-white-8 mb-3">Completed Tasks</h5>
                            <h2 class="counter mb-0 text-white">{{$completedTasksCount}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6">
        <a href="{{route('dashboard.archive')}}">

            <div class="card  bg-warning-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-success">
                            <i class="fas fa-folder-open"></i>
                        </div>
                        <div class="ms-auto">
                            <h5 class="tx-18 tx-white-8 mb-3">Reports Archive</h5>
                            <h2 class="counter mb-0 text-white">{{$archiveCount}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<!-- breadcrumb -->

<!-- row -->
<div class="row">
    <div class="col-12 col-sm-12 col-lg-6 col-xl-4">
        <div class="card border h-100">
            <h5 class="card-header bg-danger-gradient text-white">Pending Tasks</h5>
            <div class="card-body">

                @forelse($pendingTasks as $task)
                <div class="card mb-3">
                    <div class="card-header bg-danger text-white">
                        Task #{{$task->id}}
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Created At:</strong> {{$task->created_at}}
                            </li>
                            <li class="list-group-item font-weight-bold tx fs-5">

                                <strong>Station:</strong> {{$task->main_task->station->SSNAME}}
                                <br>-{{$task->main_task->station->FULLNAME}}
                            </li>
                            <li class="list-group-item">
                                <strong>Main Alarm:</strong>
                                @isset($task->main_alarm->name){{$task->main_task->main_alarm->name}}@endisset
                            </li>
                            <li class="list-group-item">
                                <strong>Work Type:</strong> {{$task->main_task->work_type}}
                            </li>
                            <li class="list-group-item">
                                <strong>Equip:</strong> {{$task->main_task->equip_number}}
                            </li>
                            <li class="list-group-item">
                                <strong>Nature of Fault:</strong> {{$task->main_task->problem}}
                            </li>
                            <li class="list-group-item">
                                <strong>Notes:</strong> {{$task->main_task->notes}}
                            </li>
                            <li class="list-group-item">
                                <strong>Engineer:</strong> <a
                                    href="{{route('dashboard.engineerProfile',['eng_id'=>$task->eng_id])}}">{{$task->engineer->name}}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        @if($task->task_note()->where('department_task_assignment_id',
                        $task->id)->exists())
                        <a href="{{ route('taskNote.show', ['department_task_id' => $task->main_tasks_id]) }}"
                            class="btn btn-dark btn-block">
                            <i class="fas fa-clipboard-list"></i> View Task Notes to Complete the Task
                        </a>
                        @endif
                        @if(now() <= $task->due_date && $task->due_time)
                            <div class="alert alert-warning scheduled-completion">
                                <i class="fas fa-clock mr-2"></i>
                                Scheduled for Completion on Date {{ $task->due_date }} - {{
                                \Carbon\Carbon::parse($task->due_time)->format('h:i A') }}
                            </div>
                            @endif
                            <a href="/engineer-task-page/{{$task->main_tasks_id}}" class="btn btn-danger btn-block">
                                <i class="fas fa-plus-circle"></i> Add Report
                            </a>


                    </div>
                </div>
                @empty
                <div class="alert alert-danger" role="alert">
                    <strong>No pending tasks!</strong> There are no pending tasks to display.
                </div>
                @endforelse
            </div>
            {{ $pendingTasks->links() }}
        </div>
    </div>
    <div class="col-xl-8 col-md-12 col-lg-6">
        {{-- Awaiting Approval Reports --}}

        {{-- Awaiting Approval Reports --}}
        {{-- Awaiting Approval Reports --}}
        <div class="card border">

            <h5 class="card-header bg-secondary text-white">Reports Awaiting Approval</h5>
            <div class="card-body">
                @foreach($pendingReports as $task)
                @if($task->main_task && $task->main_task->section_tasks->isNotEmpty())
                <div class="card mb-3 opacity-75">
                    <div class="card-header bg-secondary text-white">
                        Task #{{$task->id}}
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item font-weight-bold tx fs-5">
                                <span class="">Station:</span> {{$task->main_task->station->SSNAME}}
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold">Date:</span>
                                {{ \Carbon\Carbon::parse($task->created_at)->format('Y-m-d H:i') }}
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold">Nature of Fault:</span>
                                <p class="fs-5 fs-sm-4 text-muted">{{$task->main_task->problem}}</p>
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold">Action Taken:</span>
                                <p class="fs-5 fs-sm-4">{!!
                                    strip_tags($task->main_task->section_tasks->first()->action_take) !!}</p>
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold">Engineer:</span> {{$task->engineer->name}}
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        @if($task->eng_id === Auth::user()->id)
                        @php
                        $latestAdminNote = $task->task_note->sortByDesc('created_at')->first(function ($note) {
                        return $note->user_id != $note->eng_id;
                        });
                        @endphp

                        @if($latestAdminNote)
                        <div class="alert alert-info">

                            <p class="text-danger fw-bold">*There are notes requiring your attention to complete your
                                report
                            </p>

                            <strong>{{ $latestAdminNote->user->name }}:</strong> {{ $latestAdminNote->notes }}<br>
                            <p class="text-muted">Created on: {{ $latestAdminNote->created_at->format('M d, Y \a\t
                                H:i A') }}</p>

                            </p>
                        </div>
                        <a href="{{ route('taskNote.show', ['department_task_id' => $task->main_tasks_id]) }}"
                            class="btn btn-primary">
                            <i class="fas fa-clipboard-list"></i> View Report Notes
                        </a>
                        @else
                        <p class="text-danger fw-bold">*This report requires approval from the section head to be
                            displayed.</p>
                        @endif
                        <a href="{{ route('dashboard.requestToUpdateReport',  $task->main_task->section_tasks->first()->id) }}"
                            class="btn btn-secondary">
                            <i class="fas fa-pencil-alt"></i> Update Report
                        </a>
                        @endif
                    </div>
                </div>
                @endif
                @endforeach
            </div>

        </div>


        {{-- completed tasks for all engineers --}}
        <div class="card border">
            <h5 class="card-header  bg-primary-gradient text-white">Completed Tasks</h5>
            <div class="card-body">
                @forelse($completedTasks as $task)
                <div class="card mb-3">
                    <div class="card-header bg-primary text-white">
                        Task #{{$task->id}}
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item font-weight-bold tx fs-5">
                                <span class="">Station:</span>
                                {{$task->main_task->station->SSNAME}}
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold">Date:</span>
                                {{ \Carbon\Carbon::parse($task->created_at)->format('Y-m-d H:i') }}
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold">Nature of Fault:</span>
                                <p class="fs-5  fs-sm-4 text-muted">{{$task->main_task->problem}}</p>
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold">Action Take:</span>
                                <p class="fs-5 fs-sm-4">{!! strip_tags($task->action_take) !!}</p>

                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold">Engineer:</span> {{$task->engineer->name}}
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        @if($task->eng_id === Auth::user()->id)
                        <a href="{{ route('dashboard.requestToUpdateReport', $task->id) }}" class="btn btn-primary">
                            <i class="fas fa-pencil-alt"></i> Update Report
                        </a>
                        @endif
                        <a href="{{route('dashboard.reportPage',['id'=>$task->id])}}"
                            class="btn btn-outline-primary float-end">
                            <i class="si si-notebook px-2" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="si-notebook" aria-label="si-notebook"></i>Report
                        </a>
                    </div>
                </div>
                @empty
                <div class="alert alert-warning" role="alert">
                    <strong>No completed tasks!</strong> There are no completed tasks to display.
                </div>
                @endforelse
            </div>
            {{ $completedTasks->links() }}
        </div>
    </div>





    <!-- row closed -->

    @endsection

    @section('scripts')
    <script src="{{asset('assets/js/index.js')}}"></script>
    @if(session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
    @endif

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
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>


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

    @endsection