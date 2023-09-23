@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Advanced ui</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                Timeline</span>
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

<!-- Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header custom-card-header">
                <h6 class="card-title mb-0">Vertical Timeline</h6>
            </div>
            <div class="card-body">
                <div class="vtimeline">
                    @foreach($tasksTracking as $key => $task)
                    <div
                        class="timeline-wrapper {{ $key % 2 === 0 ? 'timeline-wrapper-warning' : 'timeline-wrapper-info timeline-inverted' }} ">
                        <div class="timeline-badge {{ $key % 2 === 0 ? 'success' : 'info' }}">

                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h6 class="timeline-title">{{ $task->status }}</h6>
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
                        </div>
                    </div>
                    @endforeach
                    <a href="{{route('dashboard.reportPage',['id'=>$task->main_tasks_id])}}" type="button"
                        class="btn btn-success-gradient button-icon "><i class="si si-notebook px-2"
                            data-bs-toggle="tooltip" title="" data-bs-original-title="si-notebook"
                            aria-label="si-notebook"></i>Report</a>
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