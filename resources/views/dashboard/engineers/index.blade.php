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
                            <i class="icon icon-rocket"></i>
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
                            <i class="icon icon-docs"></i>
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
                            <i class="icon icon-emotsmile"></i>
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
        @foreach($pendingTasks as $task)
        <div class="card card-danger">
            <h5 class="card-title p-4">Pending Tasks</h5>

            <div class="card-body  ">
                <ul class="list-group   text-center">
                    <li class="list-group-item bg-danger-gradient text-white"> Task # {{$task->id}} </li>
                    <li class="list-group-item ">{{$task->created_at}}</li>
                    <li class="list-group-item "> <strong>Station<br> </strong> {{$task->main_task->station->SSNAME}}
                    </li>
                    <li class="list-group-item"><strong>Main Alarm
                            <br></strong>@isset($task->main_alarm->name){{$task->main_task->main_alarm->name}}@endisset
                    </li>
                    <li class="list-group-item"><strong>Equip <br></strong>{{$task->main_task->equip_number}}</li>

                    <li class="list-group-item"><strong>Nature of fault<br></strong>{{$task->main_task->problem}}
                    </li>
                    <a class="" href="{{route('dashboard.engineerProfile',['eng_id'=>$task->eng_id])}}">
                        <li class="list-group-item text-dark bg-light"><strong>Engineer
                                <br></strong>{{$task->engineer->name}}
                        </li>
                    </a>
                </ul>
            </div>
            <div class="card-footer">

                <button data-bs-toggle="dropdown" class="btn btn-danger btn-block w-100">Actions <i
                        class="icon ion-ios-arrow-down tx-11 mg-l-3"></i></button>

                <div class="dropdown-menu">
                    {{-- <a href="{{route('dashboard.editTask',['id'=>$task->id])}}" class="dropdown-item">تعديل</a>
                    --}}
                    <a href="/engineer-task-page/{{$task->main_tasks_id}}"
                        class="btn btn-outline-secondary dropdown-item">Engineer
                        report</a>
                </div><!-- dropdown-menu -->

            </div>
        </div>

        @endforeach
        @empty($pendingTasksCount)
        <div class="card card-danger">

            <div class="card-body  ">
                <ul class="list-group   text-center">
                    <li class="list-group-item bg-danger-gradient text-white"> Task </li>

                    <li class="list-group-item"><strong>Nothing to view<br></strong>

                    </li>


                </ul>
            </div>

        </div>
        @endempty

        {{ $pendingTasks->links() }}

    </div>


    <div class="col-xl-8 col-md-12 col-lg-6">
        <div class="card border ">
            <h5 class="card-title p-4">التقارير المنجزة</h5>

            @foreach($completedTasks as $task)

            <div class="card card-info">

                <div class="card-body  ">
                    <ul class="list-group   text-center">
                        <li class="list-group-item bg-info-gradient text-white">Task # {{$task->id}} </li>

                        <li class="list-group-item " style="font-size:18px; font-wieght:bold;">
                            Station :
                            {{$task->main_task->station->SSNAME}}<br>
                            <hr>
                            <span style="font-size:16px">{{
                                \Carbon\Carbon::parse($task->created_at)->format('Y-m-d') }} | {{
                                \Carbon\Carbon::parse($task->created_at)->format('H:i') }}</span>
                        </li>

                        <li class="list-group-item " style="font-size:16px;"><strong>Nature of fault<br></strong>
                            {{$task->main_task->problem}}
                        </li>
                        <li class="list-group-item"><strong>Equip <br></strong>{{$task->main_task->equip_number}}</li>

                        <li class="list-group-item bg-light" style="font-size:16px;"><strong>Action Take<br></strong>
                            {!! strip_tags($task->action_take) !!}


                        </li>
                        <a class="" href="{{route('dashboard.engineerProfile',['eng_id'=>$task->eng_id])}}">
                            <li class="list-group-item text-dark bg-light"><strong>Engineer <br></strong>
                                {{$task->engineer->name}}
                            </li>
                        </a>

                    </ul>
                </div>
                <div class="card-footer">
                    {{-- <a href="{{route('dashboard.reportPage',['id'=>$task->main_task->id])}}" type="button"
                        class="btn btn-info  button-icon "><i class="si si-notebook px-2" data-bs-toggle="tooltip"
                            title="" data-bs-original-title="si-notebook" aria-label="si-notebook"></i>Report</a> --}}
                    <a href="{{route('dashboard.reportPage',['id'=>$task->id])}}"
                        class="btn btn-dark btn-lg btn-block"><i class="si si-notebook px-2" data-bs-toggle="tooltip"
                            title="" data-bs-original-title="si-notebook"
                            aria-label="si-notebook"></i>Report</a></button>

                    {{-- <a href="/engineer-task-page/{{$task->id}}" class="btn btn-outline-secondary">Engineer
                        report</a> --}}

                </div>
            </div>
            @endforeach

        </div>
        {{ $completedTasks->links() }}


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