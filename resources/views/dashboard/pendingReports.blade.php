@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Pending Reports</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                {{Auth::user()->department->name}}</span>
        </div>
    </div>

</div>
<!-- breadcrumb -->

<!-- row -->
<div class="row">
    <div class="card col-md-12 mb-4">
        <div class="card-header">
            <h3 class="card-title">North Tasks</h3>
        </div>
        <div class="card-body">
            {{-- North Area --}}
            <div class="mb-4">
                <h4 class="fw-bold text-primary mb-3">North Area</h4>
                <hr class="my-2">
            </div>

            <div class="table-responsive">
                <table id="north-tasks" class="table table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th class="">#</th>
                            <th scope="col">Report</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($northTasks as $task)
                        <tr>
                            <td>{{$loop->iteration}}</td>

                            <td>
                                <div class="accordion" id="taskAccordion{{$task->id}}">
                                    @foreach($task->main_task->section_tasks->reverse() as $sectionTask)
                                    @if(!$sectionTask->approved && $sectionTask->department_id ==
                                    Auth::user()->department_id)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="taskHeading{{$sectionTask->id}}">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#taskCollapse{{$sectionTask->id}}" aria-expanded="false"
                                                aria-controls="taskCollapse{{$sectionTask->id}}">
                                                {{$task->main_task->station->SSNAME}}
                                            </button>
                                        </h2>
                                        <div id="taskCollapse{{$sectionTask->id}}" class="accordion-collapse collapse"
                                            aria-labelledby="taskHeading{{$sectionTask->id}}"
                                            data-bs-parent="#taskAccordion{{$task->id}}">
                                            <div class="accordion-body">
                                                <div class="card mb-3">
                                                    <div class="card-header bg-primary text-white p-2">
                                                        Report Details
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <p class="mb-3 mt-3">
                                                                    <strong>Alarm Occurred:</strong> <span
                                                                        class="text-break">{{
                                                                        $task->main_task->created_at->format('d M, Y H:i
                                                                        A') }}</span>

                                                                </p>
                                                                <p class="mb-3">
                                                                    <strong>Station:</strong> <span
                                                                        class="text-break">{{
                                                                        $task->main_task->station->SSNAME }}</span>
                                                                </p>
                                                                <div class="mb-3">
                                                                    <strong>Main Alarm:</strong>
                                                                    @if ($task->main_task->main_alarm)
                                                                    <span class="text-break">{{
                                                                        $task->main_task->main_alarm->name }}</span>
                                                                    @else
                                                                    No main alarm specified
                                                                    @endif
                                                                </div>
                                                                <p class="mb-3">
                                                                    <strong>Work Type:</strong> <span
                                                                        class="text-break">{{
                                                                        $task->main_task->work_type }}</span>
                                                                </p>
                                                                <p class="mb-3">
                                                                    <strong>Equip:</strong> <span class="text-break">{{
                                                                        $task->main_task->equip_number }}</span>
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <strong>Nature of Fault:</strong>
                                                                    <div class="card bg-light p-2">
                                                                        <p class="mb-0">{{ $task->main_task->problem }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <p class="mb-3">
                                                                    <strong>Engineer:</strong> <span
                                                                        class="text-break">{{
                                                                        $sectionTask->engineer->name }}</span>
                                                                </p>
                                                                <p class="mb-3">
                                                                    <strong>Status:</strong> <span class="text-break">{{
                                                                        $sectionTask->status }}</span>
                                                                </p>
                                                                <div class="mb-3">
                                                                    <strong>Action Taken:</strong>
                                                                    <div class="card bg-light p-2">
                                                                        <p class="mb-0 text-break">{!!
                                                                            $sectionTask->action_take !!}</p>
                                                                        <br>
                                                                        <strong>Completed on:</strong> <span
                                                                            class="text-break">{{
                                                                            $sectionTask->created_at->format('d M, Y H:i
                                                                            A') }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="btn-group d-md-flex flex-md-row d-sm-flex flex-sm-column"
                                                            role="group">
                                                            @if(Auth::user()->id == $sectionTask->engineer->id )
                                                            <a href="{{ route('dashboard.requestToUpdateReport', $sectionTask->id) }}"
                                                                class="btn btn-primary me-md-2 mb-2 mb-md-0">
                                                                <i class="fas fa-pencil-alt"></i> Update Report
                                                            </a>
                                                            @endif
                                                            <form method="POST"
                                                                action="{{ route('dashboard.approveReports', $sectionTask->id) }}"
                                                                class="me-md-2 mb-2 mb-md-0">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn {{ $sectionTask->approved == '0' ? 'btn-success' : 'btn-info' }}">
                                                                    <i class="fa fa-check-circle"></i>
                                                                    {{ $sectionTask->approved == '0' ? 'Approve Report'
                                                                    : 'Cancel Approval' }}
                                                                </button>
                                                            </form>
                                                            <form method="GET"
                                                                action="{{ route('taskNote.show', ['department_task_id' => $task->main_tasks_id]) }}"
                                                                class="me-md-2 mb-2 mb-md-0">
                                                                @csrf
                                                                <button type="submit" class="btn btn-primary">
                                                                    <i class="fas fa-sticky-note me-1"></i> Write Note
                                                                    to Engineer
                                                                </button>
                                                            </form>
                                                            <form id="deleteForm{{$sectionTask->id}}"
                                                                action="{{ route('deleteSectionTask', $sectionTask->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class=" btn btn-danger delete-btn"
                                                                    data-section-task-id="{{ $sectionTask->id }}">
                                                                    <i class="fas fa-trash me-1"></i> Delete
                                                                </button>
                                                            </form>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!-- South Area Tasks -->
    <div class="card col-md-12 mb-4">
        <div class="card-header">
            <h3 class="card-title">South Area</h3>
        </div>
        <div class="card-body">
            {{-- South Area --}}
            <div class="mb-4">
                <h4 class="fw-bold text-primary mb-3">South Area</h4>
                <hr class="my-2">
            </div>
            <!-- Table for South Tasks -->
            <div class="table-responsive">
                <table id="south-tasks" class="table table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th class="">#</th>
                            <th scope="col">Report</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($southTasks as $task)
                        <tr>
                            <td>{{$loop->iteration}}</td>

                            <td>
                                <div class="accordion" id="taskAccordion{{$task->id}}">
                                    @foreach($task->main_task->section_tasks->reverse() as $sectionTask)
                                    @if(!$sectionTask->approved && $sectionTask->department_id ==
                                    Auth::user()->department_id)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="taskHeading{{$sectionTask->id}}">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#taskCollapse{{$sectionTask->id}}" aria-expanded="false"
                                                aria-controls="taskCollapse{{$sectionTask->id}}">
                                                {{$task->main_task->station->SSNAME}}
                                            </button>
                                        </h2>
                                        <div id="taskCollapse{{$sectionTask->id}}" class="accordion-collapse collapse"
                                            aria-labelledby="taskHeading{{$sectionTask->id}}"
                                            data-bs-parent="#taskAccordion{{$task->id}}">
                                            <div class="accordion-body">
                                                <div class="card mb-3">
                                                    <div class="card-header bg-primary text-white p-2">
                                                        Report Details
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <p class="mb-3 mt-3">
                                                                    <strong>Alarm Occurred:</strong> <span
                                                                        class="text-break">{{
                                                                        $task->main_task->created_at->format('d M, Y H:i
                                                                        A') }}</span>

                                                                </p>
                                                                <p class="mb-3">
                                                                    <strong>Station:</strong> <span
                                                                        class="text-break">{{
                                                                        $task->main_task->station->SSNAME }}</span>
                                                                </p>
                                                                <div class="mb-3">
                                                                    <strong>Main Alarm:</strong>
                                                                    @if ($task->main_task->main_alarm)
                                                                    <span class="text-break">{{
                                                                        $task->main_task->main_alarm->name }}</span>
                                                                    @else
                                                                    No main alarm specified
                                                                    @endif
                                                                </div>
                                                                <p class="mb-3">
                                                                    <strong>Work Type:</strong> <span
                                                                        class="text-break">{{
                                                                        $task->main_task->work_type }}</span>
                                                                </p>
                                                                <p class="mb-3">
                                                                    <strong>Equip:</strong> <span class="text-break">{{
                                                                        $task->main_task->equip_number }}</span>
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <strong>Nature of Fault:</strong>
                                                                    <div class="card bg-light p-2">
                                                                        <p class="mb-0">{{ $task->main_task->problem }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <p class="mb-3">
                                                                    <strong>Engineer:</strong> <span
                                                                        class="text-break">{{
                                                                        $sectionTask->engineer->name }}</span>
                                                                </p>
                                                                <p class="mb-3">
                                                                    <strong>Status:</strong> <span class="text-break">{{
                                                                        $sectionTask->status }}</span>
                                                                </p>
                                                                <div class="mb-3">
                                                                    <strong>Action Taken:</strong>
                                                                    <div class="card bg-light p-2">
                                                                        <p class="mb-0 text-break">{!!
                                                                            $sectionTask->action_take !!}</p>
                                                                        <br>
                                                                        <strong>Completed on:</strong> <span
                                                                            class="text-break">{{
                                                                            $sectionTask->created_at->format('d M, Y H:i
                                                                            A') }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="btn-group d-md-flex flex-md-row d-sm-flex flex-sm-column"
                                                            role="group">
                                                            @if(Auth::user()->id == $sectionTask->engineer->id )
                                                            <a href="{{ route('dashboard.requestToUpdateReport', $sectionTask->id) }}"
                                                                class="btn btn-primary me-md-2 mb-2 mb-md-0">
                                                                <i class="fas fa-pencil-alt"></i> Update Report
                                                            </a>
                                                            @endif
                                                            <form method="POST"
                                                                action="{{ route('dashboard.approveReports', $sectionTask->id) }}"
                                                                class="me-md-2 mb-2 mb-md-0">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn {{ $sectionTask->approved == '0' ? 'btn-success' : 'btn-info' }}">
                                                                    <i class="fa fa-check-circle"></i>
                                                                    {{ $sectionTask->approved == '0' ? 'Approve Report'
                                                                    : 'Cancel Approval' }}
                                                                </button>
                                                            </form>
                                                            <form method="GET"
                                                                action="{{ route('taskNote.show', ['department_task_id' => $task->main_tasks_id]) }}"
                                                                class="me-md-2 mb-2 mb-md-0">
                                                                @csrf
                                                                <button type="submit" class="btn btn-primary">
                                                                    <i class="fas fa-sticky-note me-1"></i> Write Note
                                                                    to Engineer
                                                                </button>
                                                            </form>
                                                            <form id="deleteForm{{$sectionTask->id}}"
                                                                action="{{ route('deleteSectionTask', $sectionTask->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class=" btn btn-danger delete-btn"
                                                                    data-section-task-id="{{ $sectionTask->id }}">
                                                                    <i class="fas fa-trash me-1"></i> Delete
                                                                </button>
                                                            </form>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
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


<!-- row closed -->

@endsection

@section('scripts')
<!-- Internal Select2.min js -->
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();

                const sectionTaskId = this.getAttribute('data-section-task-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`deleteForm${sectionTaskId}`).submit();
                    }
                });
            });
        });
    });
</script>
<script>
    // Check for success message in the response and display SweetAlert
    @if(session('success'))
        Swal.fire('Success!', '{{ session('success') }}', 'success');
    @endif
</script>
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



@endsection