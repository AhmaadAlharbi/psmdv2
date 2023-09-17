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
                                    style="width: {{ $totalTasksInWeek > 0 ? ($completedTasksInWeek / $totalTasksInWeek) * 100 : 0 }}%;">
                                    <span class="tx-18">
                                        {{ number_format($totalTasksInWeek > 0 ? ($completedTasksInWeek /
                                        $totalTasksInWeek) * 100 : 0, 2) }}%
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
            <div class="card mt-4">
                <div class="card-header pb-0">
                    <div class="card-title pb-0 mb-2">All-Time Statistics</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col text-center">
                            <div class="fw-bold tx-20">
                                <div>Total Tasks</div>
                                <div>{{ $totalTasksAllTime }}</div>
                                <div class="text-muted">Completed</div>
                                <div>{{ $completedTasksAllTime }}</div>
                            </div>
                            <div class="progress ht-20 mt-4">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success ht-20"
                                    style="width: {{ $totalTasksAllTime > 0 ? ($completedTasksAllTime / $totalTasksAllTime) * 100 : 0 }}%;">
                                    <span class="tx-18">
                                        {{ number_format($totalTasksAllTime > 0 ? ($completedTasksAllTime /
                                        $totalTasksAllTime) * 100 : 0, 2) }}%
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
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Browser Usage</h4>
                        <a href="javascript:void(0);" class="tx-inverse" data-bs-toggle="dropdown"><i
                                class="mdi mdi-dots-vertical text-gray"></i></a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="javascript:void(0);">Action</a>
                            <a class="dropdown-item" href="javascript:void(0);">Another
                                Action</a>
                            <a class="dropdown-item" href="javascript:void(0);">Something Else
                                Here</a>
                        </div>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-0">Tells you where your visitors originated from, such as
                        search engines, social networks or website referrals. <a href="javascript:void(0);">Learn
                            more</a></p>
                </div><!-- card-header -->
                <div class="card-body p-0">
                    <div class="browser-stats">
                        <div class="d-flex align-items-center item  border-bottom">
                            <div class="d-flex">
                                <img src="https://laravelui.spruko.com/valex/build/assets/img/svgicons/chrome.svg"
                                    alt="img" class="ht-30 wd-30 me-2">
                                <div class="">
                                    <h6 class="">Chrome</h6>
                                    <span class="sub-text">Mozilla Foundation, Inc.</span>
                                </div>
                            </div>
                            <div class="ms-auto my-auto">
                                <div class="d-flex">
                                    <span class="me-4 my-auto">35,502</span>
                                    <span class="text-success fs-15"><i class="fe fe-arrow-up"></i>12.75%</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center item  border-bottom">
                            <div class="d-flex">
                                <img src="https://laravelui.spruko.com/valex/build/assets/img/svgicons/opera.svg"
                                    alt="img" class="ht-30 wd-30 me-2">
                                <div class="">
                                    <h6 class="">Opera</h6>
                                    <span class="sub-text">Mozilla Foundation, Inc.</span>
                                </div>
                            </div>
                            <div class="ms-auto my-auto">
                                <div class="d-flex">
                                    <span class="me-4 my-auto">12,563</span>
                                    <span class="text-danger"><i class="fe fe-arrow-down"></i>15.12%</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center item  border-bottom">
                            <div class="d-flex">
                                <img src="https://laravelui.spruko.com/valex/build/assets/img/svgicons/edge.svg"
                                    alt="img" class="ht-30 wd-30 me-2">
                                <div class="">
                                    <h6 class="">Edge</h6>
                                    <span class="sub-text">Mozilla Foundation, Inc.</span>
                                </div>
                            </div>
                            <div class="ms-auto my-auto">
                                <div class="d-flex">
                                    <span class="me-4 mt-1">25,364</span>
                                    <span class="text-success"><i class="fe fe-arrow-up"></i>24.37%</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center item  border-bottom">
                            <div class="d-flex">
                                <img src="https://laravelui.spruko.com/valex/build/assets/img/svgicons/firefox.svg"
                                    alt="img" class="ht-30 wd-30 me-2">
                                <div class="">
                                    <h6 class="">Firefox</h6>
                                    <span class="sub-text">Mozilla Foundation, Inc.</span>
                                </div>
                            </div>
                            <div class="ms-auto my-auto">
                                <div class="d-flex">
                                    <span class="me-4 mt-1">14,635</span>
                                    <span class="text-success"><i class="fe fe-arrow-up"></i>15,63%</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center item border-bottom">
                            <div class="d-flex">
                                <img src="https://laravelui.spruko.com/valex/build/assets/img/svgicons/uc-browser.svg"
                                    alt="img" class="ht-30 wd-30 me-2">
                                <div class="">
                                    <h6 class="">Ucbrowser</h6>
                                    <span class="sub-text">Mozilla Foundation, Inc.</span>
                                </div>
                            </div>
                            <div class="ms-auto my-auto">
                                <div class="d-flex">
                                    <span class="me-4 mt-1">15,453</span>
                                    <span class="text-danger"><i class="fe fe-arrow-down"></i>23.70%</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center item">
                            <div class="d-flex">
                                <img src="https://laravelui.spruko.com/valex/build/assets/img/svgicons/safari.svg"
                                    alt="img" class="ht-30 wd-30 me-2">
                                <div class="">
                                    <h6 class="">Safari</h6>
                                    <span class="sub-text">Mozilla Foundation, Inc.</span>
                                </div>
                            </div>
                            <div class="ms-auto my-auto">
                                <div class="d-flex">
                                    <span class="me-4 mt-1">35,657</span>
                                    <span class="text-danger"><i class="fe fe-arrow-down"></i>12.54%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--red table --}}
    <div class="card">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mg-b-0">Secondary Table</h4>
                <a href="javascript:void(0);" class="tx-inverse" data-bs-toggle="dropdown"><i
                        class="mdi mdi-dots-horizontal text-gray"></i></a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="javascript:void(0);">Action</a>
                    <a class="dropdown-item" href="javascript:void(0);">Another
                        Action</a>
                    <a class="dropdown-item" href="javascript:void(0);">Something Else
                        Here</a>
                </div>
            </div>
            <p class="tx-12 tx-gray-500 mb-2">Example of Valex Secondary Table.. <a href="javascript:void(0);">Learn
                    more</a></p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-vcenter table-bordered text-nowrap table-danger align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-lg">ID</th>
                            <th class="text-lg">STATION</th>
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
                            @if($task->eng_id)
                            <td class="text-lg">{{$task->engineer->name}}</td>
                            @endif
                            <td>-</td>
                            <td class="text-lg">{{$task->created_at}}</td>
                            <td class="text-lg"><button class="btn btn-light">View</button></td>
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
                <h4 class="card-title mg-b-0">Success Table</h4>
                <a href="javascript:void(0);" class="tx-inverse" data-bs-toggle="dropdown"><i
                        class="mdi mdi-dots-horizontal text-gray"></i></a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="javascript:void(0);">Action</a>
                    <a class="dropdown-item" href="javascript:void(0);">Another
                        Action</a>
                    <a class="dropdown-item" href="javascript:void(0);">Something Else
                        Here</a>
                </div>
            </div>
            <p class="tx-12 tx-gray-500 mb-2">Example of Valex Success Table.. <a href="javascript:void(0);">Learn
                    more</a></p>
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
                            <th>Action Take</th>
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
                            <td>{{$task->action_take}}</td>
                            <td><a href="{{route('dashboard.reportPage',['id'=>$task->main_tasks_id])}}" type="button"
                                    class="btn btn-outline-success  button-icon "><i class="si si-notebook px-2"
                                        data-bs-toggle="tooltip" title="" data-bs-original-title="si-notebook"
                                        aria-label="si-notebook"></i>Report</a></td>
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

@endsection