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
        <div class="card border">
            <h5 class="card-header bg-danger text-white">Pending Tasks</h5>
            <div class="card-body">
                @forelse($pendingTasks as $task)
                <div class="card mb-3">
                    <div class="card-header bg-danger text-white">
                        Task #{{$task->id}}
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <strong>Created At:</strong> {{$task->created_at}}
                        </p>
                        <p class="card-text">
                            <strong>Station:</strong> {{$task->main_task->station->SSNAME}}
                        </p>
                        <p class="card-text">
                            <strong>Main Alarm:</strong>
                            @isset($task->main_alarm->name){{$task->main_task->main_alarm->name}}@endisset
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
                        <p class="card-text">
                            <strong>Engineer:</strong> <a
                                href="{{route('dashboard.engineerProfile',['eng_id'=>$task->eng_id])}}">{{$task->engineer->name}}</a>
                        </p>
                    </div>
                    <div class="card-footer">
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
        <div class="card border">
            <h5 class="card-header">Completed Tasks</h5>
            <div class="card-body">
                @foreach($completedTasks as $task)
                <div class="card mb-3">
                    <div class="card-header bg-primary text-white">
                        Task #{{$task->id}}
                    </div>
                    <div class="card-body">
                        <p class="card-text mb-2">

                            <span style="font-size:22px; font-weight:bold;"> Station:
                                {{$task->main_task->station->SSNAME}}</span>
                        </p>
                        <p class="card-text mb-2">
                            <strong>Date:</strong> {{ \Carbon\Carbon::parse($task->created_at)->format('Y-m-d H:i') }}
                        </p>
                        <div class="card-text mb-2">
                            <strong>Nature of Fault:</strong>
                            <p class="mb-0 fs-5 text-muted">{{$task->main_task->problem}}</p>
                            <!-- Increased font size -->

                        </div>
                        <div class="card-text mb-2">
                            <strong>Action Take:</strong>
                            <p class="mb-0 fs-5">{!! strip_tags($task->action_take) !!}</p> <!-- Increased font size -->

                        </div>
                        <p class="card-text mb-2">
                            <strong>Engineer:</strong> {{$task->engineer->name}}
                        </p>
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
                @endforeach
            </div>
        </div>
        {{ $completedTasks->links() }}
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