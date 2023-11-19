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
    @if (!$mainTasks->isEmpty())
    {{-- large screen Table only --}}

    <div class="card">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mg-b-0"> Local Tasks</h4>
            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table id="user-tasks" class="border-top-0  table table-bordered text-nowrap border-bottom">
                    <thead>
                        <tr class="bg-purple-gradient">
                            <th class="text-lg">ID</th>
                            <th class="text-lg">STATION</th>
                            <th class="text-lg d-none d-md-table-cell">Main Alarm</th>
                            <th class="text-lg d-none d-md-table-cell">Status</th>
                            <th class="text-lg">ENGINEER</th>
                            <th class="text-lg d-none d-md-table-cell">DATE</th>
                            <td class="text-lg">Seen</td>
                            <th class="text-lg">OPERATION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mainTasks as $task)
                        <tr>
                            <th scope="row" class="text-lg">{{ $loop->iteration }}</th>
                            <td class="text-lg">
                                @if($task->main_task->station_id)
                                {{$task->main_task->station->SSNAME}}
                                @else
                                -
                                @endif
                            </td>

                            <td class="text-lg d-none d-md-table-cell">
                                @if(isset($task->main_task->main_alarm_id))
                                {{$task->main_task->main_alarm->name}}
                                @else
                                -

                            </td>
                            @endif
                            <td class="d-none d-md-table-cell">
                                @if($task->status == 'pending')
                                <span class="badge bg-danger me-1">{{$task->status}}</span>
                                @else
                                <span class="badge bg-success me-1">{{$task->status}}</span>

                                @endif
                            </td>


                            <td class="text-lg">
                                @if($task->eng_id)
                                <a href="{{route('dashboard.engineerProfile',['eng_id'=>$task->eng_id])}}">
                                    {{$task->engineer->name}} - {{$task->engineer->department->name}}
                                </a>
                                @else
                                -
                                @endif
                            </td>
                            <td class="text-lg d-none d-md-table-cell">{{$task->created_at}}</td>
                            <td>
                                @if($task->isSeen)
                                <i class="fas fa-check-circle text-success"></i>
                                <!-- Font Awesome check-circle icon for "Yes" -->
                                @else
                                <i class="fas fa-times-circle text-danger"></i>
                                <!-- Font Awesome times-circle icon for "No" -->
                                @endif
                            </td>





                            <td>
                                <button type="button" class="btn btn-purple dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fe fe-settings"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="{{ route('dashboard.viewTask', ['id' => $task->id]) }}">
                                            <i class="fas fa-eye"></i> View</a></li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('dashboard.editTask', $task->main_tasks_id) }}">
                                            <i class="fas fa-edit"></i> Edit</a></li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('dashboard.timeline', ['id' => $task->main_tasks_id]) }}">
                                            <i class="fas fa-history"></i> History</a></li>
                                    <li>
                                        <a class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#moveTask-{{ $task->id }}">
                                            <i class="fas fa-exchange-alt"></i> Move to Another Department
                                        </a>
                                    </li>






                                </ul>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal" id="moveTask-{{ $task->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="moveTaskLabel-{{ $task->id }}">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">Update this task</h6>
                                        <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('dashboard.convertTask', $task->main_tasks_id) }}"
                                            method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="departmentSelect">Select Department</label>
                                                <input type="hidden" name="main_task"
                                                    value="{{ $task->main_tasks_id }}">
                                                <select id="departmentSelect" name="departmentSelect"
                                                    class="form-select">
                                                    <option value="{{ Auth::user()->department_id }}">
                                                        {{ Auth::user()->department->name }}
                                                    </option>
                                                    @foreach ($departments as $department)
                                                    @if ($department->id !==
                                                    Auth::user()->department_id)
                                                    <option value="{{ $department->id }}">{{
                                                        $department->name }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="notes">Notes</label>
                                                <textarea id="notes" name="notes" class="form-control"></textarea>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn ripple btn-primary" type="submit">Save
                                            changes</button>
                                        <button class="btn ripple btn-secondary" data-bs-dismiss="modal"
                                            type="button">Close</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>




            </div>
        </div>
    </div>

    @endif
</div>
<!-- row closed -->

@endsection

@section('scripts')

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