@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">ارشيف التقارير</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                {{Auth::user()->department->name}}</span>
        </div>
    </div>
    <div class="d-flex my-xl-auto right-content">
        <div class="pe-1 mb-xl-0">
            <button type="button" class="btn btn-info btn-icon me-2 btn-b"><i
                    class="mdi mdi-filter-variant"></i></button>
        </div>
        <div class="pe-1 mb-xl-0">
            <button type="button" class="btn btn-danger btn-icon me-2"><i class="mdi mdi-star"></i></button>
        </div>
        <div class="pe-1 mb-xl-0">
            <button type="button" class="btn btn-warning  btn-icon me-2"><i class="mdi mdi-refresh"></i></button>
        </div>
        <div class="mb-xl-0">
            <div class="btn-group dropdown">
                <button type="button" class="btn btn-primary">14 Aug 2019</button>
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                    id="dropdownMenuDate" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuDate"
                    x-placement="bottom-end">
                    <a class="dropdown-item" href="javascript:void(0);">2015</a>
                    <a class="dropdown-item" href="javascript:void(0);">2016</a>
                    <a class="dropdown-item" href="javascript:void(0);">2017</a>
                    <a class="dropdown-item" href="javascript:void(0);">2018</a>
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

                                </ul>
                            </div>
                        </div>
                        <div class="panel-body tabs-menu-body main-content-body-right border">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab4">
                                    <form action="{{route('dashboard.searchArchive')}}" method="get">
                                        @csrf
                                        @livewire('station-equip')
                                        <label for="">المهندس</label>
                                        <input list="engineers" type="search" class="col-8 mx-sm-3 mb-2 form-control"
                                            name="engineer">
                                        <datalist id="engineers">

                                            @foreach ($engineers as $engineer)
                                            <option value="{{ $engineer->user->name }}">
                                                @endforeach
                                        </datalist>
                                        <div class="col">
                                            <label for="">من</label>

                                            <div class="col-8 mx-sm-3 input-group">
                                                <div class="input-group-text">
                                                    <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                                </div>
                                                <input class="form-control fc-datepicker" placeholder="DD/MM/YYYY"
                                                    type="text" name="task_Date">
                                            </div><!-- input-group -->
                                        </div>
                                        <div class="col">
                                            <label for="">إلى</label>

                                            <div class="col-8 mx-sm-3 input-group">
                                                <div class="input-group-text">
                                                    <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                                </div>
                                                <input class="form-control fc-datepicker" placeholder="DD/MM/YYYY"
                                                    type="text" name="task_Date2">
                                            </div><!-- input-group -->
                                        </div>
                                </div>

                                <input type="submit" class="btn btn-dark my-4 " value="البحث">
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
            </nav>
        </div>
    </div>
    @foreach($tasks as $task)
    <div class="col-12 col-sm-12 col-lg-6 col-xl-4">
        <div class="card {{$task->status =='pending'  ? 'card-danger' : 'card-success'}} h-100">

            <div class="card-body  ">
                <ul class="list-group   text-center">

                    <li class="list-group-item {{ ($task->status == 'pending') ? 'bg-danger': 'bg-success' }}">Task #
                        {{$task->id}}
                    </li>
                    <li class="list-group-item ">{{$task->created_at}}</li>
                    <li class="list-group-item "> <strong>Station<br>
                        </strong>
                        <span style="font-size:22px; font-wieght:bold;">{{$task->main_task->station->SSNAME}}</span>
                    </li>
                    <li class="list-group-item"><strong>Main Alarm
                            <br></strong>@isset($task->main_task->main_alarm->name){{$task->main_task->main_alarm->name}}@endisset
                    </li>

                    </li>
                    <li class="list-group-item"><strong>Equip <br></strong>{{$task->main_task->equip_number}}</li>
                    <li class="list-group-item"><strong>Nature of fault<br></strong>{{$task->main_task->problem}}
                    </li>
                    <a class="" href="{{route('dashboard.engineerProfile',['eng_id'=>$task->eng_id])}}">
                        <li class="list-group-item bg-light text-dark"><strong>Engineer <br></strong>
                            {{$task->engineer->name}}
                        </li>
                    </a>
                </ul>
            </div>
            <div class="card-footer">

                @if($task->status === 'completed')
                <a href="{{route('dashboard.reportDepartment',['main_task_id'=>$task->main_tasks_id,'department_id'=>$task->department_id])}}"
                    type="button" class="btn btn-outline-success  button-icon "><i class="si si-notebook px-2"
                        data-bs-toggle="tooltip" title="" data-bs-original-title="si-notebook"
                        aria-label="si-notebook"></i>Report</a>

                @endif

            </div>
        </div>
    </div>

    @endforeach
    {{ $tasks->links() }}

</div>


@endsection

@section('scripts')
<!--Internal  jquery.maskedinput js -->
<script src="{{asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>

<!--Internal  spectrum-colorpicker js -->
<script src="{{asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>

<!-- Internal Select2.min js -->
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

<!--Internal Ion.rangeSlider.min js -->
<script src="{{asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>

<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>

<!-- Ionicons js -->
<script src="{{asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>

<!--Internal  pickerjs js -->
<script src="{{asset('assets/plugins/pickerjs/picker.min.js')}}"></script>

<!--internal color picker js-->
<script src="{{asset('assets/plugins/colorpicker/pickr.es5.min.js')}}"></script>
<script src="{{asset('assets/js/colorpicker.js')}}"></script>

<!--Bootstrap-datepicker js-->
<script src="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>

<!-- Internal form-elements js -->
<script src="{{asset('assets/js/form-elements.js')}}"></script>


@endsection