@extends('layouts.app')

@section('styles')
<style>
    .alarm-date,
    .is-seen {
        display: flex;
        flex-direction: column;
    }

    .alarm-date span,
    .is-seen span {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .badge {
        margin-left: 10px;
    }
</style>
@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                Profile</span>
        </div>
    </div>

</div>
<!-- breadcrumb -->

<!-- row -->
<div class="row row-sm">
    <div class="col-xl-4">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="ps-0">
                    <div class="main-profile-overview">
                        <div class="main-img-user profile-user">
                            {{-- <img alt="" src="{{asset('assets/img/faces/6.jpg')}}"><a
                                class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a> --}}
                        </div>
                        <div class="d-flex justify-content-center mg-b-20">
                            <div>
                                <h2 class="">{{$engineer->name}}</h2>
                                <p class="main-profile-name-text">قسم {{$engineer->department->name}} </p>
                            </div>
                        </div>

                        <img src="{{asset('assets/img/dashboard/engineers/statistics.svg')}}" alt="">
                    </div><!-- main-profile-overview -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="row row-sm">
            <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
                <div class="card ">
                    <div class="card-body">
                        <div class="counter-status d-flex md-mb-0">
                            <div class="counter-icon bg-primary-transparent">
                                <i class="icon-layers text-primary"></i>
                            </div>
                            <div class="ms-auto">
                                <a href="{{route('dashboard.engineerTask',['id'=>$engineer->id,'status'=>'all'])}}">
                                    <h5 class="tx-13">Tasks</h5>
                                    <h2 class="mb-0 tx-22 mb-1 mt-1">{{$totalTasks}}</h2>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
                <div class="card ">
                    <div class="card-body">
                        <div class="counter-status d-flex md-mb-0">
                            <div class="counter-icon bg-danger-transparent">
                                <i class="icon-paypal text-danger"></i>
                            </div>
                            <div class="ms-auto">
                                <a href="{{route('dashboard.engineerTask',['id'=>$engineer->id,'status'=>'pending'])}}">

                                    <div class="ms-auto">
                                        <h5 class="tx-13">All Pending Tasks</h5>
                                        <h2 class="mb-0 tx-22 mb-1 mt-1">{{$totalPendingTasks}}</h2>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
                <div class="card ">
                    <div class="card-body">
                        <div class="counter-status d-flex md-mb-0">
                            <div class="counter-icon bg-success-transparent">
                                <i class="icon-rocket text-success"></i>
                            </div>
                            <div class="ms-auto">
                                <a
                                    href="{{route('dashboard.engineerTask',['id'=>$engineer->id,'status'=>'completed'])}}">
                                    <div class="ms-auto">
                                        <h5 class="tx-13">All Completed Tasks</h5>
                                        <h2 class="mb-0 tx-22 mb-1 mt-1">{{$totalCompletedTasks}}</h2>
                                    </div>
                                </a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="tabs-menu ">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs profile navtab-custom panel-tabs">
                        <li class="">
                            <a href="#month" data-bs-toggle="tab" class="active" aria-expanded="true"> <span
                                    class="visible-xs"><i class="las la-user-circle tx-16 me-1"></i></span> <span
                                    class="hidden-xs">Monthly Statistics</span> </a>
                        </li>
                        <li class="">
                            <a href="#year" data-bs-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i
                                        class="las la-images tx-15 me-1"></i></span>
                                <span class="hidden-xs">Yearly Statistics</span> </a>
                        </li>
                        <li class="">
                            <a href="#all" data-bs-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i
                                        class="las la-images tx-15 me-1"></i></span>
                                <span class="hidden-xs">Full Statistics</span> </a>
                        </li>
                        {{-- <li class="">
                            <a href="#friends" data-bs-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i
                                        class="las la-life-ring tx-16 me-1"></i></span>
                                <span class="hidden-xs">FRIENDS</span> </a>
                        </li>
                        <li class="">
                            <a href="#settings" data-bs-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i
                                        class="las la-cog tx-16 me-1"></i></span>
                                <span class="hidden-xs">SETTINGS</span> </a>
                        </li> --}}
                    </ul>
                </div>
                <div class="tab-content border border-top-0 p-4 br-dark">
                    <div class="tab-pane active" id="month">
                        <div class="container py-4">
                            <h4>Engineer's Tasks Statistics for Current Month</h4>
                            <p class="mb-4">Month: {{ \Carbon\Carbon::now()->format('F Y') }}</p>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="table-responsive border">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Description</th>
                                                    <th>Count</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Total tasks</td>
                                                    <td>{{$tasksInMonth}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Total pending tasks</td>
                                                    <td>{{$pendingTasksInMonth}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Total completed tasks</td>
                                                    <td>{{$completedTasksInMonth}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <h4 class="my-3">Engineer's Tasks for Current Month</h4>
                                    <p class="mb-4">Month: {{ \Carbon\Carbon::now()->format('F Y') }}</p>
                                    <div class="table-responsive border mt-5">


                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Station</th>
                                                    <th>Status</th>
                                                    <th> Date</th>
                                                    <th>Seen</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($tasksMonthAll as $task)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $task->main_task->station->SSNAME }}</td>
                                                    <td>{{ $task->status }}</td>
                                                    <td>
                                                        <div class="alarm-date">
                                                            <span>Alarm Date:</span>
                                                            {{ $task->created_at ? $task->created_at->format('j F, Y
                                                            \a\t g:i A') : '' }} <br>
                                                            @if ($task->main_task->section_tasks->isNotEmpty())
                                                            <span> Completed Date</span>
                                                            <span class="badge bg-success">

                                                                {{
                                                                optional($task->main_task->section_tasks->first())->created_at
                                                                ?
                                                                $task->main_task->section_tasks->first()->created_at->format('j
                                                                F, Y \a\t g:i A')
                                                                : ''
                                                                }}
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="is-seen">
                                                            <span
                                                                class="badge {{ $task->isSeen ? 'bg-success' : 'bg-danger' }}">{{
                                                                $task->isSeen ? 'Yes' : 'No' }}</span>
                                                        </div>


                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    @if($tasksInMonth > 0)
                                    <div class="chart-container" style="height: 400px;">
                                        <canvas id="currentMonthChart"></canvas>
                                    </div>
                                    @else
                                    <div class="text-center mt-4">
                                        <p class="mb-2">No tasks in the current month to show.</p>
                                        <i class="fas fa-exclamation-circle text-danger" style="font-size: 24px;"></i>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>







                    <div class="tab-pane" id="year">

                        <div class="container py-4">
                            <h4>Engineer's Tasks Statistics for Current Year : {{ \Carbon\Carbon::now()->format('Y') }}
                            </h4>
                            <div class="row">
                                <div class="col-md-12">
                                    @if($tasksInYear > 0)
                                    <div style="width: 650px; height: 400px;">
                                        <canvas id="tasksByMonthChart"></canvas>
                                    </div>
                                    @else
                                    <div class="text-center mt-4">
                                        <p class="mb-2">No tasks in the current month to show.</p>
                                        <i class="fas fa-exclamation-circle text-danger" style="font-size: 24px;"></i>
                                    </div>
                                    @endif
                                    <div class="table-responsive ">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Description</th>
                                                    <th>Count</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Total tasks</td>
                                                    <td>{{$tasksInYear}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Total pending tasks</td>
                                                    <td>{{$totalPendingTasksYear}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Total completed tasks</td>
                                                    <td>{{$totalCompletedTasksYear}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                                <div class="col-md-12">
                                    <h4 class="my-3">Engineer's Tasks for Current Year : {{
                                        \Carbon\Carbon::now()->format(' Y') }}</h4>
                                    <div class="table-responsive border mt-5">


                                        <table id="example3"
                                            class="border-top-0  table table-bordered text-nowrap border-bottom">

                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Station</th>
                                                    <th>Status</th>
                                                    <th> Date</th>
                                                    <th>Seen</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($tasksYearAll as $task)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $task->main_task->station->SSNAME }}</td>
                                                    <td>{{ $task->status }}</td>
                                                    <td>
                                                        <div class="alarm-date">
                                                            <span>Alarm Date:</span>
                                                            {{ $task->created_at ? $task->created_at->format('j F, Y
                                                            \a\t g:i A') : '' }} <br>
                                                            @if ($task->main_task->section_tasks->isNotEmpty())
                                                            <span> Completed Date</span>
                                                            <span class="badge bg-success">

                                                                {{
                                                                optional($task->main_task->section_tasks->first())->created_at
                                                                ?
                                                                $task->main_task->section_tasks->first()->created_at->format('j
                                                                F, Y \a\t g:i A')
                                                                : ''
                                                                }}
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="is-seen">
                                                            <span
                                                                class="badge {{ $task->isSeen ? 'bg-success' : 'bg-danger' }}">{{
                                                                $task->isSeen ? 'Yes' : 'No' }}</span>
                                                        </div>


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
                    <div class="tab-pane" id="all">
                        <div class="container py-4">
                            <h4>Engineer's Tasks Statistics for All Time</h4>
                            </h4>
                            <div class="row">
                                <div class="col-md-12">
                                    @if($tasksInYear > 0)
                                    <div style="width: 650px; height: 400px;">
                                        <canvas id="tasksChart" width="800" height="400"></canvas>


                                    </div>
                                    @else
                                    <div class="text-center mt-4">
                                        <p class="mb-2">No tasks in the current month to show.</p>
                                        <i class="fas fa-exclamation-circle text-danger" style="font-size: 24px;"></i>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive ">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Description</th>
                                                    <th>Count</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Total tasks</td>
                                                    <td>{{$totalTasks}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Total pending tasks</td>
                                                    <td>{{$pendingTasks}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Total completed tasks</td>
                                                    <td>{{$completedTask}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <h4 class="my-3">Engineer's Tasks for Current Year : {{
                                        \Carbon\Carbon::now()->format(' Y') }}</h4>
                                    <div class="table-responsive border mt-5">


                                        <table id="archive"
                                            class="border-top-0  table table-bordered text-nowrap border-bottom">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Station</th>
                                                    <th>Status</th>
                                                    <th> Date</th>
                                                    <th>Seen</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($tasksAll as $task)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $task->main_task->station->SSNAME }}</td>
                                                    <td>{{ $task->status }}</td>
                                                    <td>
                                                        <div class="alarm-date">
                                                            <span>Alarm Date:</span>
                                                            {{ $task->created_at ? $task->created_at->format('j F, Y
                                                            \a\t g:i A') : '' }} <br>
                                                            @if ($task->main_task->section_tasks->isNotEmpty())
                                                            <span> Completed Date</span>
                                                            <span class="badge bg-success">

                                                                {{
                                                                optional($task->main_task->section_tasks->first())->created_at
                                                                ?
                                                                $task->main_task->section_tasks->first()->created_at->format('j
                                                                F, Y \a\t g:i A')
                                                                : ''
                                                                }}
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="is-seen">
                                                            <span
                                                                class="badge {{ $task->isSeen ? 'bg-success' : 'bg-danger' }}">{{
                                                                $task->isSeen ? 'Yes' : 'No' }}</span>
                                                        </div>


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
</div>
<!-- row closed -->

@endsection

@section('scripts')
<!-- Internal Select2.min js -->
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

<!-- DATA TABLE JS-->
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
<!-- smart photo master js -->
<script src="{{asset('assets/plugins/SmartPhoto-master/smartphoto.js')}}"></script>
<script src="{{asset('assets/js/gallery-1.js')}}"></script>
<!--Internal  Chart.bundle js -->
<script src="{{asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>

<!-- Internal Chartjs js -->
<script src="{{asset('assets/js/chart.chartjs.js')}}"></script>
<script>
    var ctx1 = document.getElementById('currentMonthChart').getContext('2d');
    var currentMonthChart = new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: ['Completed', 'Pending'],
            datasets: [{
                label: 'Tasks',
                data: [{{ $completedTasksInMonth }}, {{ $pendingTasksInMonth }}],
                backgroundColor: [
                    'rgb(75, 192, 192)',
                    'rgb(255, 99, 132)'
                ],
                borderColor: [
                    'rgba(255, 255, 255, 1)',
                    'rgba(255, 255, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    var ctx2 = document.getElementById('currentYearChart').getContext('2d');
    var currentYearChart = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ['Completed', 'Pending'],
            datasets: [{
                label: 'Tasks',
                data: [{{ $completedTasksInYear }}, {{ $pendingTasksInYear }}],
                backgroundColor: [
                    'rgb(75, 192, 192)',
                    'rgb(255, 99, 132)'
                ],
                borderColor: [
                    'rgba(255, 255, 255, 1)',
                    'rgba(255, 255, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>

<script>
    var pendingTaskCounts = {!! json_encode($pendingTaskCountsYearArr) !!};
    var completedTaskCounts = {!! json_encode($completedTaskCountsYearArr) !!};
    var months = {!! json_encode($months) !!};

    var ctx = document.getElementById('tasksByMonthChart').getContext('2d');
    var tasksByMonthChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Completed Tasks',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                data: completedTaskCounts
            }, {
                label: 'Pending Tasks',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                data: pendingTaskCounts
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var tasksByYear = {!! json_encode($tasksByYear) !!};
    var years = Object.keys(tasksByYear);
    var completedTasksData = [];
    var pendingTasksData = [];

    years.forEach(function(year) {
        completedTasksData.push(tasksByYear[year].completed);
        pendingTasksData.push(tasksByYear[year].pending);
    });

    var ctx = document.getElementById('tasksChart').getContext('2d');
    var tasksChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: years,
            datasets: [{
                label: 'Completed Tasks',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                data: completedTasksData
            }, {
                label: 'Pending Tasks',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                data: pendingTasksData
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

@endsection