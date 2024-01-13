@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Task Notes</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                {{Auth::user()->department->name}}</span>
        </div>
    </div>

</div>
<!-- breadcrumb -->

<!-- row -->
<div class="row">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Task Notes</h3>
            <p class="card-text">
                Keep track of important details and updates related to this task. You can read or add notes to
                communicate with the assigned engineer.
            </p>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('taskNote.store', $task->id) }}" method="post">
                        @csrf
                        <div class="card shadow mb-4">
                            <div class="card-header bg-primary text-white">
                                <h6 class="m-0 font-weight-bold"><i class="fas fa-tasks"></i> Task Details</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <h6 class="text-muted"><i class="fas fa-building"></i> Station</h6>
                                            <p class="card-text">{{ $task->main_task->station->SSNAME }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <h6 class="text-muted"><i class="fas fa-bell"></i> Main Alarm</h6>
                                            @if ($task->main_task->main_alarm)
                                            <p class="card-text">{{ $task->main_task->main_alarm->name }}</p>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <h6 class="text-muted"><i class="fas fa-exclamation-triangle"></i> Nature of
                                                Fault</h6>
                                            <p class="card-text">{{ $task->main_task->problem }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <h6 class="text-muted"><i class="fas fa-tools"></i> Action Take</h6>
                                            <p class="card-text">{!! $report->action_take ?? 'No action taken yet' !!}
                                            </p>

                                            @if(optional($report)->eng_id === Auth::user()->id)
                                            <a href="{{ route('dashboard.requestToUpdateReport', $report->id) }}"
                                                class="btn btn-success">
                                                <i class="fas fa-pencil-alt"></i> Update Report
                                            </a>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <h6 class="text-muted"><i class="fas fa-user"></i> Engineer</h6>
                                            <p class="card-text">{{ $task->engineer->name }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <h6 class="text-muted"><i class="fas fa-sticky-note"></i> Notes</h6>
                                            <textarea name="notes" class="form-control" placeholder="Write notes"
                                                rows="3"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-check"></i>
                                            Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>User</th>

                                    <th>Notes</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tasksNotes as $note)
                                <tr
                                    class="{{ $note->user_id == Auth::user()->id ? 'table-success' : 'table-warning' }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $note->user->name }}</td>

                                    <td>{{ $note->notes }}</td>
                                    <td>{{ $note->created_at->format('M d, Y H:i A') }}</td>
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
<!-- row closed -->

@endsection

@section('scripts')
@if(session('success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire(
            'Success',
            '{{ session('success') }}',
            'success'
        );
    });
</script>
@endif
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

@endsection