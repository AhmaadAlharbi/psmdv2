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
                البحث
            </div>

            <div class="text-wrap">
                <div class="example">
                    <div class="panel panel-primary tabs-style-2">
                        <div class=" tab-menu-heading">
                            <div class="tabs-menu1">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs main-nav-line">
                                    <li><a href="#tab4" class="nav-link active" data-bs-toggle="tab">البحث في
                                            المحطات</a>
                                    </li>
                                    <li><a href="#tab5" class="nav-link" data-bs-toggle="tab">
                                            البحث في المهندسين</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="panel-body tabs-menu-body main-content-body-right border">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab4">
                                    <form action="{{route('dashboard.searchStation')}}" method="GET">
                                        <div class="row d-flex justify-content-start mb-3">
                                            <input list="ssnames" type="search" class="col-3 mx-sm-3 mb-2 form-control"
                                                name="station" placeholder="search in stations">

                                            <datalist id="ssnames">
                                                @foreach ($stations as $station)
                                                <option value="{{ $station->SSNAME }}">
                                                    @endforeach
                                            </datalist>
                                            <button type="submit"
                                                class="col-1 btn btn-secondary bg-secondary mb-2">ابحث</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="tab5">
                                    <form action="{{route('dashboard.engineerTasks')}}" method="GET">
                                        <div class="row d-flex justify-content-start mb-3">
                                            <input list="engineers" type="search"
                                                class="col-3 mx-sm-3 mb-2 form-control" name="engineer"
                                                placeholder="search in engineers">
                                            <datalist id="engineers">
                                                @foreach ($engineers as $engineer)
                                                <option value="{{ $engineer->user->name }}">
                                                    @endforeach
                                            </datalist>
                                            <button type="submit"
                                                class="col-1 btn btn-secondary bg-secondary mb-2">ابحث</button>
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
                    href="{{route('dashboard.showTasks',['status'=>'all'])}}">كل المهمات</a>
                <a class="nav-link {{ Route::is('dashboard.showTasks') && request()->status == 'pending' ? 'active' : '' }}"
                    href="{{route('dashboard.showTasks',['status'=>'pending'])}}">المهمات الغير
                    المنجزة</a>
                <a class="nav-link {{ Route::is('dashboard.showTasks') && request()->status == 'completed' ? 'active' : '' }}"
                    href="{{route('dashboard.showTasks',['status'=>'completed'])}}">المهمات المنجزة</a>
                <a class="nav-link {{ Route::is('dashboard.showTasks') && request()->status == 'mutual-tasks' ? 'active' : '' }}"
                    href="{{route('dashboard.showTasks',['status'=>'mutual-tasks'])}}">المهمات المشتركة</a>
            </nav>
        </div>
    </div>
    @endif
    @foreach($tasks as $task)
    <div class="col-12 col-sm-12 col-lg-6 col-xl-4 my-2">
        <div class="card {{$task->status =='pending'  ? 'card-danger' : 'card-success'}} h-100 ">

            <div class="card-body  ">
                <ul class="list-group   text-center">

                    <li class="list-group-item {{ ($task->status == 'pending') ? 'bg-danger': 'bg-success' }}">
                        Task #
                        {{$task->main_task->id}}
                    </li>
                    <li class="list-group-item ">{{$task->main_task->created_at}} -
                        {{ $task->toDepartment ? $task->toDepartment->name : $task->department->name }}
                    </li>
                    <li class="list-group-item "> <strong>Station<br>
                        </strong>
                        <span style="font-size:22px; font-wieght:bold;">{{$task->main_task->station->SSNAME}}</span>
                    </li>
                    <li class="list-group-item"><strong>Main Alarm
                            <br></strong>@isset($task->main_task->main_alarm->name){{$task->main_task->main_alarm->name}}@endisset
                    </li>
                    <li class="list-group-item"><strong>Equip <br></strong>{{$task->main_task->equip_number}}</li>

                    <li class="list-group-item"><strong>Nature of fault<br></strong>{{$task->main_task->problem}}
                    </li>
                    <li class="list-group-item">Action Take <br>
                        @isset($reports)
                        @foreach($reports as $report)
                        <!-- Start of the foreach loop, iterating through $reports -->
                        @if(isset($report['main_tasks_id']) && $report['main_tasks_id'] === $task->main_tasks_id)
                        <!-- Check if $report has 'main_tasks_id' property and it matches the current $task's 'main_tasks_id' -->
                        {!! $report['action_take'] !!}
                        <!-- Display the 'action_take' property of the matching $report -->
                        @if ($report['department_id'] === Auth::user()->department_id &&
                        Auth::user()->role_id ==
                        "2" && Auth::user()->department_id !== 1)
                        <form method="POST" action="{{route('dashboard.approveReports',$report['id'])}}">
                            @csrf
                            <button
                                class="btn float-end mt-3 ms-2 d-none-print {{$report['approved'] == '0' ? 'btn-success' : 'btn-info'}}">
                                <i class="fa fa-check-circle"></i> {{ $report['approved'] == '0' ? 'Approve Report'
                                :
                                'Cancel Approval' }}
                            </button>
                        </form>
                        @endif
                        @endif
                        <!-- End of the if condition -->

                        @endforeach
                        @endisset
                        <!-- End of the foreach loop -->
                    </li>
                    <!-- End of the list item -->

                    @isset($task->eng_id)
                    <a class="" href="{{route('dashboard.engineerProfile',['eng_id'=>$task->eng_id])}}">
                        <li class="list-group-item bg-light text-dark"><strong>Engineer <br></strong>
                            {{$task->engineer->name}}
                        </li>
                    </a>
                    @endisset
                </ul>
            </div>
            <div class="card-footer">
                {{-- <button class="btn {{$task->status =='pending'  ? 'btn-danger' : 'btn-success'}}">More
                    information</button> --}}
                @if(Auth::user()->role->title == 'Admin')
                <div class="row">

                    @if($task->main_task->status !== 'completed')
                    <div class="col">
                        <a class="btn btn-dark" href="{{route('dashboard.editTask', ['id' => $task->id])}}">تعديل</a>
                    </div>
                    <div class="col">
                        <form method="post" action="{{route('task.destroy', ['id' => $task->main_task->id])}}"
                            id="delete-form-{{ $task->main_task->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="deleteRecord({{ $task->main_task->id }})"
                                class="btn btn-outline-danger">حذف المهمة</button>

                        </form>
                    </div>
                    @endif

                </div>
                @endif
                @if($task->isCompleted === '1')
                <div class="col">
                    <a href="{{route('dashboard.reportDepartment',['main_task_id'=>$task->main_tasks_id,'department_id'=>$task->department_id])}}"
                        type="button" class="btn btn-success  button-icon "><i class="si si-notebook px-2"
                            data-bs-toggle="tooltip" title="" data-bs-original-title="si-notebook"
                            aria-label="si-notebook"></i>{{Auth::user()->department->name}} Report </a>
                    @if($task->source_department !== 1 && $task->source_department )
                    @if( $task->source_department !== Auth::user()->department_id)
                    <td><a href="{{route('dashboard.reportDepartment',['main_task_id'=>$task->main_tasks_id,'department_id'=>$task->source_department])}}"
                            class="btn btn-dark">Report {{$task->department->name}} </a></td>
                    @else
                    <td><a href="{{route('dashboard.reportDepartment',['main_task_id'=>$task->main_tasks_id,'department_id'=>$task->destination_department])}}"
                            class="btn btn-dark">Report {{$task->toDepartment->name}} </a></td>
                    @endif
                    @endif
                    @if($task->eng_id === Auth::user()->id)
                    <a href="{{route('dashboard.requestToUpdateReport',$task->main_tasks_id)}}" class="btn btn-dark">
                        Request to
                        update report </a>
                    @endif



                </div>
                @endif

            </div>
        </div>
    </div>

    @endforeach
    {{ $tasks->links() }}


</div>
<!-- row closed -->

@endsection

@section('scripts')
<!-- Internal Select2 js-->
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