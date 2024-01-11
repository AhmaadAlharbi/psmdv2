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
            <form action="{{route('taskNote.store',$task->id)}}" method="post">
                @csrf
                <div class="">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Station</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"
                            value="{{$task->main_task->station->SSNAME}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Main Alarm</label>
                        @if ($task->main_task->main_alarm)
                        <input type="text" class="form-control" id="exampleInputEmail1"
                            value="{{$task->main_task->main_alarm->name}}">
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nature of fault</label>
                        <textarea class="form-control">{{$task->main_task->problem}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Engineer</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password"
                            value="{{$task->engineer->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Notes</label>
                        <textarea name="notes" class="form-control" placeholder="Textarea" rows="3"
                            placeholder="Write notes"></textarea>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary mt-3 mb-0">Submit</button>
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