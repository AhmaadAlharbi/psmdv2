@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Alarms</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                {{Auth::user()->department->name}}</span>
        </div>
    </div>

</div>
<!-- breadcrumb -->

<!-- row -->
<div class="row">
    <div class="card">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="card-header">
            <h3 class="card-title">Basic Edit Table</h3>
            <a class="btn ripple btn-primary" data-bs-target="#modaldemo1" data-bs-toggle="modal" href="">
                <i class="fas fa-plus"></i> Add Alarm
            </a>
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <!-- add modal -->
            <div class="modal" id="modaldemo1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">New Alarm</h6>
                            </h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <form action="{{route('main_alarm.store')}}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <h6>Add new Alarm</h6>
                                <input type="text" class="form-control" name="name">

                            </div>
                            <div class="modal-footer">
                                <button class="btn ripple btn-primary" type="submit">Save changes</button>
                                <button class="btn ripple btn-secondary" data-bs-dismiss="modal"
                                    type="button">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Basic modal -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="completed-tasks" class="border-top-0  table table-bordered text-nowrap border-bottom">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Alarm name</th>
                            <th>Department</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mainAlarms as $alarm)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td> {{$alarm->name}}</td>
                            <td>{{$alarm->department->name}}</td>
                            <td>
                                <a href="#" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#update-alarm-{{ $alarm->id }}"> <i class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteConfirmationModal-{{ $alarm->id }}"> <i
                                        class="fa fa-trash"></i> </a>

                            </td>
                        </tr>
                        {{-- edit modal --}}
                        <div class="modal fade" id="update-alarm-{{ $alarm->id }}" tabindex="-1"
                            aria-labelledby="update-alarm-{{ $alarm->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="update-alarm-{{ $alarm->id }}">
                                            Update Alarms </h5> <button type="button" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('main_alarm.update', ['id' => $alarm->id]) }}"
                                            method="POST">
                                            @csrf @method('PATCH')
                                            <input class="form-control" type="text" name="alarm_name"
                                                value="{{$alarm->name}}">
                                            <input class="form-control" type="hidden" name="alarm_id"
                                                value="{{$alarm->id}}">

                                    </div>
                                    <div class="modal-footer"> <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button> <button
                                            class="btn btn-outline-danger" id="deleteTask" data-id="{{ $alarm->id }}">
                                            <i class="fa fa-edit"></i> submit </button> </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{--delete modal--}}
                        <div class="modal fade" id="deleteConfirmationModal-{{ $alarm->id }}" tabindex="-1"
                            aria-labelledby="deleteConfirmationModalLabel-{{ $alarm->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteConfirmationModalLabel-{{ $alarm->id }}">
                                            Delete Confirmation </h5> <button type="button" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body"> Are you sure you want to delete this task?
                                        <form action="{{ route('main_alarm.destroy', ['id' => $alarm->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" value="{{ $alarm->id }}" name="task_id">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button class="btn btn-outline-danger" id="deleteTask"
                                            data-id="{{ $alarm->id }}">
                                            <i class="fa fa-trash"></i> Delete </button>
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