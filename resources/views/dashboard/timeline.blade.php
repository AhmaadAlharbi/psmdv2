@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Task Timeline</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                {{Auth::user()->department->name}}</span>
        </div>
    </div>

</div>
<!-- breadcrumb -->

<!-- Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header custom-card-header">
            </div>
            <div class="card-body">
                <div class="vtimeline">
                    @foreach($tasksTracking as $key => $task)
                    <div
                        class="timeline-wrapper {{ $key % 2 === 0 ? 'timeline-wrapper-warning' : 'timeline-wrapper-info timeline-inverted' }} ">
                        <div class="timeline-badge {{ $key % 2 === 0 ? 'success' : 'info' }}">
                            <div
                                class="d-flex justify-content-center align-items-center mt-2 text-white font-weight-bold">

                            </div>

                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h6 class="timeline-title">{{ $task->status }}</h6>
                                @if($task->status != 'completed')
                                <p> {!! $task->engineer_note!!}</p>
                                @endif
                            </div>
                            <div class="timeline-body">
                                <p>{{ $task->action }}</p>

                            </div>
                            <div class="timeline-footer d-flex align-items-center flex-wrap">
                                <p class="text-secondary">{{$task->user->name}} <br>
                                    {{$task->user->department->name}}
                                </p>
                                <span class="ms-auto"><i class="fe fe-calendar text-muted me-1"></i>{{ $task->created_at
                                    }}</span>

                            </div>
                            @if($task->status == 'Adding Report')
                            <a href="{{route('dashboard.reportDepartment',['main_task_id'=>$task->main_tasks_id,'department_id'=>$task->department_id])}}"
                                type="button" class="btn btn-success-gradient  button-icon "><i
                                    class="si si-notebook px-2" data-bs-toggle="tooltip" title=""
                                    data-bs-original-title="si-notebook" aria-label="si-notebook"></i>Report</a>
                            @endif
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Row -->

@endsection

@section('scripts')

<!-- Internal Select2 js-->
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

@endsection