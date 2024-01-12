@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Create Task Note</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
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

    </div>
</div>
<!-- breadcrumb -->

<!-- row -->
<div class="row">
    <div class="card  box-shadow-0 ">
        <div class="card-header">
            <h4 class="card-title mb-1">Vertical Form</h4>
            <p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>
        </div>
        <div class="card-body pt-0">
            <form action="{{ route('taskNote.store', $task->id) }}" method="post">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Task Details</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <h6 class="text-muted">Station</h6>
                                                <p class="card-text">{{ $task->main_task->station->SSNAME }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <h6 class="text-muted">Main Alarm</h6>
                                                @if ($task->main_task->main_alarm)
                                                <p class="card-text">{{ $task->main_task->main_alarm->name }}</p>
                                                @endif
                                            </div>
                                            <div class="mb-4">
                                                <h6 class="text-muted">Nature of Fault</h6>
                                                <p class="card-text">{{ $task->main_task->problem }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <h6 class="text-muted">Engineer</h6>
                                                <p class="card-text">{{ $task->engineer->name }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <h6 class="text-muted">Notes</h6>
                                                <textarea name="notes" class="form-control" placeholder="Write notes"
                                                    rows="3"></textarea>
                                                <button type="submit" class="btn btn-primary mt-3 mb-0">Submit</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </form>



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

@endsection