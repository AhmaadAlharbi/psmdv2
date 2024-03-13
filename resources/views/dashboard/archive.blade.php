@extends('layouts.app')



@section('styles')
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">


@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Reports Archive</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                {{Auth::user()->department->name}}</span>
        </div>
    </div>

</div>
<!-- breadcrumb -->

<!-- row -->
<div class="row">
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
                                            Stations</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane active" id="tab4">
                            <form action="{{ route('dashboard.searchArchive') }}" method="get" class="row g-3">
                                @csrf
                                <div class="col-md-3">
                                    @livewire('station-equip')
                                </div>
                                <div class="col-md-3">
                                    <label for="engineer" class="form-label">Engineer</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                        <input list="engineers" type="search" class="form-control" id="engineer"
                                            name="engineer" placeholder="Search for engineer">
                                        <datalist id="engineers">
                                            @foreach ($engineers as $engineer)
                                            <option value="{{ $engineer->user->arabic_name }}">
                                                @endforeach
                                        </datalist>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="task_date_from" class="form-label">From</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-calendar3"></i></span>
                                        <input class="form-control fc-datepicker" placeholder="DD/MM/YYYY" type="text"
                                            id="task_date_from" name="task_Date" autocomplete="off">
                                    </div>
                                    <label for="task_date_to" class="form-label">To</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-calendar3"></i></span>
                                        <input class="form-control fc-datepicker" placeholder="DD/MM/YYYY" type="text"
                                            id="task_date_to" name="task_Date2" autocomplete="off">
                                    </div>
                                </div>



                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>

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
                    <i class="bi bi-people"></i> Mutual Tasks
                </a>
            </nav>

        </div>
    </div>
    {{--!!!! cards --}}
    @php
    /*
    @foreach($tasks as $task)
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card {{$task->status =='pending' ? 'border-danger' : 'border-success'}} h-100">
            <div class="card-body">
                <h5 class="card-title text-center">Task #{{$task->departmentsAssienments->first()->id}}</h5>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item bg-warning">
                        Occurred on {{$task->created_at->format('j F, Y \a\t g:i A') }}</li>
                    <li class="list-group-item bg-success">
                        @if($task->section_tasks->isNotEmpty())
                        Completed on {{ $task->section_tasks->first()->created_at->format('j F, Y \a\t g:i A') }}
                        @else
                        No completion data available
                        @endif</li>
                    <li class="list-group-item"><strong>Station:</strong> {{$task->station->SSNAME}}</li>
                    <li class="list-group-item"><strong>Main Alarm:</strong>
                        @isset($task->main_alarm->name){{$task->main_alarm->name}}@endisset</li>
                    <li class="list-group-item"><strong>Equip:</strong> {{$task->equip_number}}</li>
                    <li class="list-group-item"><strong>Nature of Fault:</strong> {{$task->problem}}</li>
                    <li class="list-group-item"><strong>Action Take:</strong> {!!
                        $task->section_tasks->first()->action_take !!}</li>
                    {{-- <li class="list-group-item"><strong>Engineer:</strong> <a
                            href="{{route('dashboard.engineerProfile',['eng_id'=>$task->section_tasks()->eng_id])}}">{{$task->section_tasks->engineer->name}}</a>
                    </li> --}}
                </ul>
            </div>
            <div class="card-footer">
                @if($task->status === 'completed')
                <a href="{{route('dashboard.reportDepartment',['main_task_id'=>$task->id,'department_id'=>$task->section_tasks->first()->department_id])}}"
                    type="button" class="btn btn-outline-success btn-sm"><i class="si si-notebook me-1"></i> Report</a>
                @endif
            </div>
        </div>
    </div>
    @endforeach
    {{ $tasks->links() }}
    */
    @endphp


    {{-- !!table--}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Archive Data</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="archive" class="table table-bordered table-hover table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Task #</th>
                            <th>Station</th>
                            <th>Department</th>
                            <th>Engineer</th>
                            <th>Date</th>
                            <th>Main Alarm</th>
                            <th>Equip</th>
                            <th>Nature of Fault</th>
                            <th>Action Taken</th>
                            <th>Report</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $task->departmentsAssienments->first()->id }}</td>
                            <td class="fw-bold">{{ $task->station->SSNAME }}</td>
                            <td class="fw-bold">{{ $task->departmentsAssienments->first()->department->name }}</td>
                            <td>

                                <a
                                    href="{{ route('dashboard.engineerProfile', ['eng_id' => $task->section_tasks->first()->eng_id]) }}">
                                    {{ $task->section_tasks->first()->engineer->arabic_name }}
                                </a>

                            </td>
                            <td>
                                <strong>Occurred:</strong>
                                <span class="badge bg-primary">
                                    <i class="fas fa-calendar"></i> {{ $task->created_at->format('j F, Y \a\t g:i A') }}
                                </span><br>
                                @if($task->section_tasks->isNotEmpty())
                                <strong>Completed:</strong>
                                <span class="badge bg-success">
                                    <i class="fas fa-check-circle"></i> {{
                                    $task->section_tasks->first()->created_at->format('j F, Y \a\t g:i A') }}
                                </span>
                                @else
                                <span class="text-muted">No completion data available</span>
                                @endif
                            </td>

                            <td>@isset($task->main_alarm->name){{ $task->main_alarm->name }}@endisset</td>
                            <td>{{ $task->equip_number }}</td>
                            <td>{{ $task->problem }}</td>
                            <td>{!! $task->section_tasks->first()->action_take !!}</td>

                            <td>
                                <a href="{{ route('dashboard.reportDepartment', ['main_task_id' => $task->id, 'department_id' => $task->section_tasks->first()->department_id]) }}"
                                    class="btn btn-outline-success btn-sm">
                                    <i class="si si-notebook me-1"></i> Report
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $tasks->links() }}
        </div>
    </div>


</div>



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