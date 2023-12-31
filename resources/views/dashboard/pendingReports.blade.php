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
        </div>
        <div class="card-body">
            <div class="table-responsive">
                {{-- North Area--}}
                <div class="mb-4">
                    <h4 class="fw-bold text-primary mb-0">North Area</h4>
                    <hr class="my-2">
                </div>

                <table id="example3" class="table border-top-0  table-bordered text-nowrap border-bottom"
                    id="responsive-datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Task ID</th>
                            <th scope="col">Station</th>
                            <th scope="col">Engineer</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Department</th>
                            <th scope="col">Report</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($northTasks as $task)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <th scope="row">{{$task->main_task->id}}</th>
                            <td>{{$task->main_task->station->SSNAME}}</td>
                            <td>{{$task->engineer->name}}</td>
                            <td>{{$task->main_task->created_at}}</td>
                            <td>{{$task->department->name}}</td>
                            <td>
                                <a class="btn ripple btn-info btn-b" data-bs-target="#modaldemo{{$task->main_task->id}}"
                                    data-bs-toggle="modal" href="#">Review</a>
                                {{-- modal --}}
                                <div class="modal fade" id="modaldemo{{$task->main_task->id}}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header  text-white">
                                                <h5 class="modal-title">Task ID: {{$task->main_task->id}}</h5>
                                                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"
                                                    type="button"></button>
                                            </div>
                                            <div class="modal-body">
                                                @foreach($task->main_task->section_tasks->reverse() as $sectionTask)
                                                @if(!$sectionTask->approved && $sectionTask->department_id ==
                                                Auth::user()->department_id)
                                                <div class="card mt-3">
                                                    <div class="card-body border">
                                                        <div class="bg-info text-white p-2 mb-3">
                                                            Department: <strong>{{ $sectionTask->department->name
                                                                }}</strong>
                                                        </div>
                                                        <p class="mb-3"><strong>Engineer:</strong> {{
                                                            $sectionTask->engineer->name }}</p>
                                                        <p class="mb-3"><strong>status:</strong> {{
                                                            $sectionTask->status }}</p>
                                                        <p class="mb-3"><strong>Action Take:</strong> {!!
                                                            $sectionTask->action_take !!}</p>
                                                        <p class="mb-3"><strong>Created at:</strong> {{
                                                            $sectionTask->created_at }}</p>
                                                        <div class="d-flex">
                                                            @if($sectionTask->eng_id === Auth::user()->id)
                                                            <a href="{{ route('dashboard.requestToUpdateReport', $sectionTask->id) }}"
                                                                class="btn btn-warning mx-2">
                                                                <i class="fas fa-pencil-alt"></i> Update Report
                                                            </a>
                                                            @endif

                                                            @if($sectionTask->department_id ==
                                                            Auth::user()->department_id)
                                                            <form method="POST"
                                                                action="{{ route('dashboard.approveReports', $sectionTask->id) }}">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-{{ $sectionTask->approved == '0' ? 'success' : 'info' }}">
                                                                    <i class="fa fa-check-circle"></i>
                                                                    {{ $sectionTask->approved == '0' ? 'Approve Report'
                                                                    : 'Cancel Approval' }}
                                                                </button>
                                                            </form>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                            {{-- <div class="modal-footer">
                                                <button class="btn btn-primary">Save Changes</button>
                                                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>



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

            <table id="example3" class="table border-top-0  table-bordered text-nowrap border-bottom"
                id="responsive-datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Task ID</th>
                        <th scope="col">Station</th>
                        <th scope="col">Engineer</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Department</th>
                        <th scope="col">Report</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($southTasks as $task)
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <th scope="row">{{$task->main_task->id}}</th>
                        <td>{{$task->main_task->station->SSNAME}}</td>
                        <td>{{$task->engineer->name}}</td>
                        <td>{{$task->main_task->created_at}}</td>
                        <td>{{$task->department->name}}</td>
                        <td>
                            <a class="btn ripple btn-info btn-b" data-bs-target="#modaldemo{{$task->main_task->id}}"
                                data-bs-toggle="modal" href="#">Review</a>
                            {{-- modal --}}
                            <div class="modal fade" id="modaldemo{{$task->main_task->id}}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header  text-white">
                                            <h5 class="modal-title">Task ID: {{$task->main_task->id}}</h5>
                                            <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"
                                                type="button"></button>
                                        </div>
                                        <div class="modal-body">
                                            @foreach($task->main_task->section_tasks->reverse() as $sectionTask)
                                            @if(!$sectionTask->approved && $sectionTask->department_id ==
                                            Auth::user()->department_id)
                                            <div class="card mt-3">
                                                <div class="card-body border">
                                                    <div class="bg-info text-white p-2 mb-3">
                                                        Department: <strong>{{ $sectionTask->department->name
                                                            }}</strong>
                                                    </div>
                                                    <p class="mb-3"><strong>Engineer:</strong> {{
                                                        $sectionTask->engineer->name }}</p>
                                                    <p class="mb-3 bg-light p-2"><strong>Status:</strong> {{
                                                        $sectionTask->status }}</p>
                                                    <p class="mb-3"><strong>Action Take:</strong> {!!
                                                        $sectionTask->action_take !!}</p>
                                                    <p class="mb-3"><strong>Created at:</strong> {{
                                                        $sectionTask->created_at }}</p>
                                                    <div class="d-flex">
                                                        @if($sectionTask->eng_id === Auth::user()->id)
                                                        <a href="{{ route('dashboard.requestToUpdateReport', $sectionTask->id) }}"
                                                            class="btn btn-warning mx-2">
                                                            <i class="fas fa-pencil-alt"></i> Update Report
                                                        </a>
                                                        @endif

                                                        @if($sectionTask->department_id ==
                                                        Auth::user()->department_id)
                                                        <form method="POST"
                                                            action="{{ route('dashboard.approveReports', $sectionTask->id) }}">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-{{ $sectionTask->approved == '0' ? 'success' : 'info' }}">
                                                                <i class="fa fa-check-circle"></i>
                                                                {{ $sectionTask->approved == '0' ? 'Approve Report'
                                                                : 'Cancel Approval' }}
                                                            </button>
                                                        </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                        {{-- <div class="modal-footer">
                                            <button class="btn btn-primary">Save Changes</button>
                                            <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>



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