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

    <div class="card">
        <div class="card-header">
            <h3 class="card-title"></h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                {{-- North Area--}}
                <div class="mb-4">
                    <h4 class="fw-bold text-primary mb-0">North Area</h4>
                    <hr class="my-2">
                </div>

                <table id="north-tasks" class="table table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Task ID</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Report</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($northTasks as $task)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <td>{{$task->main_task->id}}</td>
                            <td>{{ $task->main_task->created_at->format('d M, Y H:i A') }}</td>
                            <td>
                                @foreach($task->main_task->section_tasks->reverse() as $sectionTask)
                                @if(!$sectionTask->approved && $sectionTask->department_id ==
                                Auth::user()->department_id)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="bg-info text-white p-2 mb-3">
                                            Department: <strong>{{ $sectionTask->department->name }}</strong>
                                        </div>
                                        <p class="mb-3">
                                            <strong>Station:</strong> {{$task->main_task->station->SSNAME}}
                                        </p>
                                        <p class="mb-3"><strong>Engineer:</strong> {{ $sectionTask->engineer->name }}
                                        </p>
                                        <p class="mb-3"><strong>Status:</strong> {{ $sectionTask->status }}</p>
                                        <p class="mb-3"><strong>Action Take:</strong>
                                        <div class="overflow-auto whitespace-pre-line">{!! $sectionTask->action_take !!}
                                        </div>
                                        </p>
                                        </p>
                                        <div class="btn-group ms-2 mt-2 mb-2">
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-dark" data-bs-toggle="dropdown"
                                                    id="dropdownMenuButton" type="button">Actions <i
                                                        class="fas fa-caret-down ms-1"></i></button>

                                                <div class="dropdown-menu tx-13">
                                                    @if($sectionTask->eng_id === Auth::user()->id)
                                                    <a href="{{ route('dashboard.requestToUpdateReport', $sectionTask->id) }}"
                                                        class="dropdown-item">
                                                        <i class="fas fa-pencil-alt"></i> Update Report
                                                    </a>
                                                    @endif
                                                    @if($sectionTask->department_id == Auth::user()->department_id)
                                                    <form method="POST"
                                                        action="{{ route('dashboard.approveReports', $sectionTask->id) }}">
                                                        @csrf
                                                        <button type="submit"
                                                            class="dropdown-item {{ $sectionTask->approved == '0' ? 'btn-success' : 'btn-info' }}">
                                                            <i class="fa fa-check-circle"></i>
                                                            {{ $sectionTask->approved == '0' ? 'Approve Report' :
                                                            'Cancel Approval' }}
                                                        </button>
                                                    </form>
                                                    @endif
                                                    <form method="GET"
                                                        action="{{ route('taskNote.show', ['department_task_id' => $task->main_tasks_id]) }}">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item">
                                                            <i class="fas fa-sticky-note me-1"></i> Write Note to
                                                            Engineer
                                                        </button>
                                                    </form>
                                                    <form id="deleteForm{{$sectionTask->id}}"
                                                        action="{{ route('deleteSectionTask', $sectionTask->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item delete-btn"
                                                            data-section-task-id="{{ $sectionTask->id }}">
                                                            <i class="fas fa-trash me-1"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
        <div class="card-body mt-5">

            {{-- South Area--}}
            <div class="mb-4">
                <h4 class="fw-bold text-success mb-0">South Area</h4>
                <hr class="my-2">
            </div>

            <table id="south-tasks" class="table border-top-0  table-bordered text-nowrap border-bottom"
                id="responsive-datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Task ID</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Report</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($southTasks as $task)
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <td>{{$task->main_task->id}}</td>
                        <td>{{ $task->main_task->created_at->format('d M, Y H:i A') }}</td>
                        <td>
                            @foreach($task->main_task->section_tasks->reverse() as $sectionTask)
                            @if(!$sectionTask->approved && $sectionTask->department_id ==
                            Auth::user()->department_id)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="bg-info text-white p-2 mb-3">
                                        Department: <strong>{{ $sectionTask->department->name }}</strong>
                                    </div>
                                    <p class="mb-3">
                                        <strong>Station:</strong> {{$task->main_task->station->SSNAME}}
                                    </p>
                                    <p class="mb-3"><strong>Engineer:</strong> {{ $sectionTask->engineer->name }}
                                    </p>
                                    <p class="mb-3"><strong>Status:</strong> {{ $sectionTask->status }}</p>
                                    <p class="mb-3"><strong>Action Take:</strong>
                                    <div class="overflow-auto whitespace-pre-line">{!! $sectionTask->action_take !!}
                                    </div>
                                    </p>
                                    </p>
                                    <div class="btn-group ms-2 mt-2 mb-2">
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true"
                                                class="btn ripple btn-dark" data-bs-toggle="dropdown"
                                                id="dropdownMenuButton" type="button">Actions <i
                                                    class="fas fa-caret-down ms-1"></i></button>

                                            <div class="dropdown-menu tx-13">
                                                @if($sectionTask->eng_id === Auth::user()->id)
                                                <a href="{{ route('dashboard.requestToUpdateReport', $sectionTask->id) }}"
                                                    class="dropdown-item">
                                                    <i class="fas fa-pencil-alt"></i> Update Report
                                                </a>
                                                @endif
                                                @if($sectionTask->department_id == Auth::user()->department_id)
                                                <form method="POST"
                                                    action="{{ route('dashboard.approveReports', $sectionTask->id) }}">
                                                    @csrf
                                                    <button type="submit"
                                                        class="dropdown-item {{ $sectionTask->approved == '0' ? 'btn-success' : 'btn-info' }}">
                                                        <i class="fa fa-check-circle"></i>
                                                        {{ $sectionTask->approved == '0' ? 'Approve Report' :
                                                        'Cancel Approval' }}
                                                    </button>
                                                </form>
                                                @endif
                                                <form method="GET"
                                                    action="{{ route('taskNote.show', ['department_task_id' => $task->main_tasks_id]) }}">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item">
                                                        <i class="fas fa-sticky-note me-1"></i> Write Note to
                                                        Engineer
                                                    </button>
                                                </form>
                                                <form id="deleteForm{{$sectionTask->id}}"
                                                    action="{{ route('deleteSectionTask', $sectionTask->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item delete-btn"
                                                        data-section-task-id="{{ $sectionTask->id }}">
                                                        <i class="fas fa-trash me-1"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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