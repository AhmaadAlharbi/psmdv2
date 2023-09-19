@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">

    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">لوحة التحكم</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                {{Auth::user()->department->name}}</span>

        </div>

    </div>
    <div class="btn-group dropdown">
        <button type="button" class="btn btn-primary">لوحة التحكم حسب التحكم</button>
        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuDate" x-placement="bottom-end">
            <a class="dropdown-item" href="{{route('dashboard.indexControl',['control'=>'JAHRA CONTROL CENTER'])}}">تحكم
                الجهراء</a>
            <a class="dropdown-item"
                href="{{route('dashboard.indexControl',['control'=>'SHUAIBA CONTROL CENTER'])}}">تحكم
                الشعيبة</a>
            <a class="dropdown-item"
                href="{{route('dashboard.indexControl',['control'=>'JABRIYA CONTROL CENTER'])}}">تحكم
                الجابرية</a>
            <a class="dropdown-item" href="{{route('dashboard.indexControl',['control'=>'TOWN CONTROL CENTER'])}}">تحكم
                المدينة</a>
            <a class="dropdown-item"
                href="{{route('dashboard.indexControl',['control'=>'NATIONAL CONTROL CENTER'])}}">تحكم
                الوطني</a>
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

    <div class="col-xl-3 col-lg-6 col-md-6 ">

        <a href="{{route('dashboard.engineersList')}}">
            <div class="card  bg-primary-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon">
                            <i class="icon icon-people"></i>
                        </div>
                        <div class="ms-auto">
                            <h5 class="tx-18 tx-white-8 mb-3 ">عدد المهندسين </h5>
                            <h2 class="counter mb-0 text-white">{{$engineersCount}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
        <a href="{{route('dashboard.showTasks',['status'=>'pending'])}}">
            <div class="card  bg-danger-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-warning">
                            <i class="icon icon-rocket"></i>
                        </div>
                        <div class="ms-auto">
                            <h5 class="tx-18 tx-white-8 mb-3">عدد الأعطال الغير منجزة</h5>
                            <h2 class="counter mb-0 text-white">{{$pendingTasksCount}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
        <a href="{{route('dashboard.showTasks',['status'=>'completed'])}}">
            <div class="card  bg-success-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-primary">
                            <i class="icon icon-docs"></i>
                        </div>
                        <div class="ms-auto">
                            <h5 class="tx-18 tx-white-8 mb-3">عدد الأعطال المنجزة</h5>
                            <h2 class="counter mb-0 text-white">{{$completedTasksCount}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
        <a href="{{route('dashboard.archive')}}">

            <div class="card  bg-warning-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-success">
                            <i class="icon icon-emotsmile"></i>
                        </div>
                        <div class="ms-auto">
                            <h5 class="tx-18 tx-white-8 mb-3">ارشيف التقارير</h5>
                            <h2 class="counter mb-0 text-white">{{$completedTasksCount}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
        <a href="{{route('dashboard.showTasks',['status'=>'mutual-tasks'])}}">

            <div class="card  bg-purple-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-success">
                            <i class="icon icon-emotsmile"></i>
                        </div>
                        <div class="ms-auto">
                            <h5 class="tx-18 tx-white-8 mb-3">مهمات مشتركة مع الاقسام</h5>
                            <h2 class="counter mb-0 text-white">{{$mutualTasksCount}}</h2>
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

    <div class="row">
        <div class="col">
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
        </div>
        <div class="col">
            {{-- TOP 5 engineers this month--}}
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="card-body">
                            <div class="main-content-label">
                                Pie Chart
                            </div>
                            <div class="chartjs-wrapper-demo" style="width: 300px; height: 300px;">
                                <!-- Add or adjust these styles -->
                                <canvas id="chartPie" width="400" height="400"></canvas>
                            </div>
                        </div>
                    </div><!-- row -->
                </div>
            </div>

        </div>
        {{--red table --}}
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">المهمات المنشئة - Local Tasks</h4>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter table-bordered text-nowrap table-danger align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-lg">ID</th>
                                <th class="text-lg">STATION</th>
                                <th class="text-lg">Main Alarm</th>
                                <th class="text-lg">ENGINEER</th>
                                <th class="text-lg">DATE</th>
                                <th class="text-lg">OPERATION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pendingTasks as $task)
                            <tr>
                                <th scope="row" class="text-lg">{{ $loop->iteration }}</th>
                                <td class="text-lg">{{$task->main_task->station->SSNAME}}</td>
                                <td class="text-lg">{{$task->main_task->main_alarm->name}}</td>
                                @if($task->eng_id)
                                <td class="text-lg">{{$task->engineer->name}} - {{$task->engineer->department->name}}
                                </td>
                                @else
                                <td>-</td>
                                @endif

                                <td class="text-lg">{{$task->created_at}}</td>
                                <td><a href="{{route('dashboard.editTask',$task->main_tasks_id)}}"
                                        class="btn btn-light">View</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        {{-- incoming table--}}
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">المهمات الواردة - Incoming Tasks</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter table-bordered text-nowrap table-info align-items-center mb-0">
                        <thead>
                            <tr>
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
                                <td><a href="{{route('dashboard.editTask',$task->main_tasks_id)}}"
                                        class="btn btn-light">View</a></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- outgoing tasks--}}
        <div class="card">
            <div class="card-header pb-0">
                <h4 class="card-title mg-b-0">Outgoing Tasks - المهمات المرسلة</h4>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table
                        class="table table-vcenter table-bordered text-nowrap  table-warning align-items-center mb-0">
                        <thead>
                            <tr>
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
                                <td class="bg-danger"> {{$task->status}} </td>
                                @else
                                <td class="bg-success">{{$task->status}}</td>
                                @endif
                                <td><a href="{{route('dashboard.reportDepartment',['main_task_id'=>$task->main_tasks_id,'department_id'=>$task->destination_department])}}"
                                        class="btn btn-light">View</a></td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- green table--}}
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">المهمات المنجزة - Completed Tasks</h4>


                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter table-bordered text-nowrap table-success align-items-center mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>STATION</th>
                                <th>Main alarm</th>
                                <th>ENGINEER</th>
                                <th>Department</th>
                                <th>Action Take</th>
                                <th>Date</th>
                                <th>Report</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($completedTasks as $task)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{$task->main_task->station->SSNAME}}</td>
                                <td>{{$task->main_task->main_alarm->name}}</td>
                                <td>{{$task->engineer->name}}</td>
                                <td>{{$task->engineer->department->name}}</td>
                                <td>{{$task->action_take}}</td>
                                <td>{{$task->created_at}}</td>
                                <td><a href="{{route('dashboard.reportPage',['id'=>$task->main_tasks_id])}}"
                                        type="button" class="btn btn-outline-success  button-icon "><i
                                            class="si si-notebook px-2" data-bs-toggle="tooltip" title=""
                                            data-bs-original-title="si-notebook" aria-label="si-notebook"></i>Report</a>
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
//delete tasks
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