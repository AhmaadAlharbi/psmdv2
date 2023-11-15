@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                Empty</span>
        </div>

    </div>

</div>
<!-- breadcrumb -->

<!-- row -->
<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h1>Daily Trouble Report</h1>
                <p class="lead mb-2">Search for tasks at a specific date:</p>

                <div class="input-group mb-3">

                    <form action="{{route('dailyReportSearchTasks')}}" method="post">
                        @csrf
                        <!-- Include this line to add CSRF protection -->

                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                            </div>
                            <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text"
                                name="selectedDate" value="{{$selectedDate}}">


                            <button class="btn btn-info" type="submit">Search</button>
                        </div>
                    </form>

                </div><!-- input-group -->
            </div>
            {{-- town dcc table --}}
            @if (!$townDccTasks->isEmpty())
            <h3 class="card-title mt-5 bg-danger text-white px-2 py-3 text-center">Town-DCC</h3>

            <div class="card-body">
                <div class="table-responsive">

                    <table id="town-dcc" class="border-top-0  table table-bordered text-nowrap border-bottom">

                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Substation</th>
                                <th class="wd-15p border-bottom-0">Circuit / Equipment</th>
                                <th class="wd-20p border-bottom-0">Date</th>
                                <th class="wd-15p border-bottom-0">Time</th>
                                <th class="wd-10p border-bottom-0">Alarms/indication</th>
                                <th class="wd-25p border-bottom-0">Observation & Action take</th>
                                <th class="wd-25p border-bottom-0">Engineer Name</th>
                                <th class="wd-25p border-bottom-0">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $townDccTasks as $task )
                            <tr>
                                <td>{{$task->station->SSNAME}}</td>
                                <td>{{$task->equip_number}}</td>
                                <td>{{ $task->created_at->format('Y-m-d') }}</td>
                                <td>{{ $task->created_at->format('H:i') }}</td>
                                <td>{{$task->main_alarm->name}}</td>
                                <td>
                                    @if($task->section_tasks->isNotEmpty())
                                    {!! $task->section_tasks->first()->action_take !!}
                                    @else
                                    -
                                    @endif
                                </td>
                                <td>
                                    @if($task->section_tasks->isNotEmpty())
                                    {{$task->section_tasks->first()->user->name }}
                                    @else
                                    -
                                    @endif
                                </td>

                                <td>{{$task->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>

        {{-- jahra dcc table--}}
        @if (!$jahraDccTasks->isEmpty())
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-5 bg-warning text-white px-2 py-3 text-center">Jahra-DCC</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table id="jahra-dcc" class="border-top-0  table table-bordered text-nowrap border-bottom">

                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Substation</th>
                                <th class="wd-15p border-bottom-0">Circuit / Equipment</th>
                                <th class="wd-20p border-bottom-0">Date</th>
                                <th class="wd-15p border-bottom-0">Time</th>
                                <th class="wd-10p border-bottom-0">Alarms/indication</th>
                                <th class="wd-25p border-bottom-0">Observation & Action take</th>
                                <th class="wd-25p border-bottom-0">Engineer Name</th>
                                <th class="wd-25p border-bottom-0">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $jahraDccTasks as $task )
                            <tr>
                                <td>{{$task->station->SSNAME}}</td>
                                <td>{{$task->equip_number}}</td>
                                <td>{{ $task->created_at->format('Y-m-d') }}</td>
                                <td>{{ $task->created_at->format('H:i') }}</td>
                                <td>
                                    @if($task->main_alarm_id)
                                    {{$task->main_alarm->first()->name}}
                                    @else
                                    -
                                    @endif
                                </td>
                                <td>
                                    @if($task->section_tasks->isNotEmpty())
                                    {!! $task->section_tasks->first()->action_take !!}
                                    @else
                                    -
                                    @endif
                                </td>
                                <td>
                                    @if($task->section_tasks->isNotEmpty())
                                    {{$task->section_tasks->first()->user->name }}
                                    @else
                                    -
                                    @endif
                                </td>

                                <td>{{$task->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
        {{-- suabia dcc table--}}
        @if (!$shuaibaDccTasks->isEmpty())

        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-5 bg-success text-white px-2 py-3 text-center">SHUAIBA CONTROL CENTER</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table id="shuaiba-dcc" class="border-top-0  table table-bordered text-nowrap border-bottom">

                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Substation</th>
                                <th class="wd-15p border-bottom-0">Circuit / Equipment</th>
                                <th class="wd-20p border-bottom-0">Date</th>
                                <th class="wd-15p border-bottom-0">Time</th>
                                <th class="wd-10p border-bottom-0">Alarms/indication</th>
                                <th class="wd-25p border-bottom-0">Observation & Action take</th>
                                <th class="wd-25p border-bottom-0">Engineer Name</th>
                                <th class="wd-25p border-bottom-0">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $shuaibaDccTasks as $task )
                            <tr>
                                <td>{{$task->station->SSNAME}}</td>
                                <td>{{$task->equip_number}}</td>
                                <td>{{ $task->created_at->format('Y-m-d') }}</td>
                                <td>{{ $task->created_at->format('H:i') }}</td>
                                <td>
                                    @if($task->main_alarm_id)
                                    {{$task->main_alarm->first()->name}}
                                    @else
                                    -
                                    @endif
                                </td>
                                <td>
                                    @if($task->section_tasks->isNotEmpty())
                                    {!! $task->section_tasks->first()->action_take !!}
                                    @else
                                    -
                                    @endif
                                </td>
                                <td>
                                    @if($task->section_tasks->isNotEmpty())
                                    {{$task->section_tasks->first()->user->name }}
                                    @else
                                    -
                                    @endif
                                </td>

                                <td>{{$task->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @endif
        {{-- national dcc table--}}
        @if (!$nationalDccTasks->isEmpty())

        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-5 bg-dark text-white px-2 py-3 text-center">NATIONAL CONTROL CENTER</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="shuaiba-dcc" class="border-top-0  table table-bordered text-nowrap border-bottom">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Substation</th>
                                <th class="wd-15p border-bottom-0">Circuit / Equipment</th>
                                <th class="wd-20p border-bottom-0">Date</th>
                                <th class="wd-15p border-bottom-0">Time</th>
                                <th class="wd-10p border-bottom-0">Alarms/indication</th>
                                <th class="wd-25p border-bottom-0">Observation & Action take</th>
                                <th class="wd-25p border-bottom-0">Engineer Name</th>
                                <th class="wd-25p border-bottom-0">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nationalDccTasks as $task )
                            <tr>
                                <td>{{$task->station->SSNAME}}</td>
                                <td>{{$task->equip_number}}</td>
                                <td>{{ $task->created_at->format('Y-m-d') }}</td>
                                <td>{{ $task->created_at->format('H:i') }}</td>
                                <td>
                                    @if($task->main_alarm_id)
                                    {{$task->main_alarm->first()->name}}
                                    @else
                                    -
                                    @endif
                                </td>
                                <td>
                                    @if($task->section_tasks->isNotEmpty())
                                    {!! $task->section_tasks->first()->action_take !!}
                                    @else
                                    -
                                    @endif
                                </td>
                                <td>
                                    @if($task->section_tasks->isNotEmpty())
                                    {{$task->section_tasks->first()->user->name }}
                                    @else
                                    -
                                    @endif
                                </td>

                                <td>{{$task->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
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