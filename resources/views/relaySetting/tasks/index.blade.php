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
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">Responsive DataTable</h3>
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="border-top-0  table table-bordered text-nowrap border-bottom">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">#</th>
                            <th class="border-bottom-0">Title</th>
                            <th class="border-bottom-0">Description</th>
                            <th class="border-bottom-0">Status</th>
                            <th class="border-bottom-0">Files</th>
                            <th class="border-bottom-0">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$task->title}}</td>
                            <td>{{$task->description}}</td>
                            <td>
                                @if($task->status)
                                {{-- Completed --}}

                                <span class="badge badge-pill bg-success me-1"><i class="fas fa-check"></i>
                                    Completed</span>
                                @else
                                {{-- Uncompleted --}}
                                <span class="badge badge-pill bg-danger me-1"><i class="fas fa-times"></i>
                                    Uncompleted</span>
                                @endif

                            </td>
                            <td>
                                <a href="{{ route('relaySetting.getTaskFiles', ['id' => $task->id]) }}"
                                    class="btn btn-dark">Files</a>
                            </td>
                            <td>
                                <form id="toggleForm_{{$task->id}}"
                                    action="{{ route('realySetting.toggleCompletion', ['id' => $task->id]) }}"
                                    method="POST">
                                    @csrf
                                    <button type="button" class="btn btn-sm btn-info"
                                        onclick="confirmToggle({{$task->id}}, {{$task->status}})">
                                        <i class="fas fa-exchange-alt"></i>
                                        @if($task->status)
                                        Start Again
                                        @else
                                        I Did the Task
                                        @endif
                                    </button>


                                </form>
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
<!-- Add these lines to your HTML file's <head> section -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- Update the JavaScript for confirmation with SweetAlert -->
<!-- Update the JavaScript for confirmation with SweetAlert -->
<script>
    function confirmToggle(id, status) {
        const isCompleted = status === 1;
        const actionText = isCompleted ? 'uncompleted' : 'completed';

        Swal.fire({
            title: 'Confirm Task Status Update',
            text: `Are you sure you want to mark this task as ${actionText}?`,
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: `<i class="fas fa-check"></i> Yes, mark as ${actionText}!`
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('toggleForm_' + id).submit();
            }
        });
    }
</script>


<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{asset('assets/js/table-data.js')}}"></script>
@endsection