@extends('layouts.app')

@section('styles')
<style>
    .mew-logo {
        width: 250px;
    }

    @media print {
        .btn-group {
            display: none;
        }

        body * {
            font-size: 20px !important;
        }

        .task-action-container * {

            font-size: 20px !important;
            font-style: italic !important;
        }
    }
</style>
@endsection

@section('content')


<!-- row -->
<div class="row mt-4" id="printable-content">
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class=" main-content-body-invoice">
        <div class="card card-invoice">
            <div class="card-body">
                <div class="invoice-header">
                    <h1 class="invoice-title"> <img class="mew-logo rounded "
                            src="https://www.mew.gov.kw/images/mew_ar.svg" alt="mew logo"></h1>

                    <div class="billed-from">
                        <h1 class="invoice-title">Primary Substation Maintenance Department</h1>

                        <h6 class="mt-2">{{$section_task->department->name}}</h6>
                        <p>Trouble Shooting Report<br>
                            Ref.No: {{ $section_task->main_task->refNum }}
                        </p>
                    </div><!-- billed-from -->
                </div><!-- invoice-header -->
                <div class="row mg-t-20">
                    <div class="col-md ">
                        <label class="tx-gray-600">Task Details</label>
                        <div class="">
                            <h1 class="fw-bold">{{ $section_task->main_task->station->SSNAME }}</h1>
                            <p class="font-italic tx-15"> @isset($section_task->main_alarm_id)
                                {{$section_task->main_task->main_alarm->name}}
                                @endisset<br>
                                Equip : {{ $section_task->main_task->equip_number }}<br>
                            </p>
                        </div>
                    </div>
                    <div class="col-md">
                        <label class="tx-gray-600">Station Information</label>
                        <p class="invoice-info-row"><span>Company Make</span> <span>{{
                                $section_task->main_task->station->COMPANY_MAKE
                                }}</span></p>
                        <p class="invoice-info-row"><span>Contract No</span> <span>{{
                                $section_task->main_task->station->Contract_No
                                }}</span></p>
                        <p class="invoice-info-row"><span>Commisioning Date</span> <span>{{
                                $section_task->main_task->station->COMMISIONING_DATE }}</span></p>
                        <p class="invoice-info-row"><span>Previous Maintenance</span> <span> {{
                                $section_task->main_task->station->pm }}</span></p>
                    </div>
                    <div class="invoice-notes border task-action-container">
                        <div>
                            <label class="main-content-label tx-16 mt-3">Work Type <span
                                    class="badge bg-danger me-1"></span></label>
                            <p class="tx-20  ">{{$section_task->main_task->work_type}}</p>
                        </div>
                        <label class="main-content-label tx-16 mt-3">Nature of Fault <span
                                class="badge bg-danger me-1"></span></label>
                        <p class="tx-20 text-secondary">{{
                            $section_task->main_task->problem }} </p>
                    </div>

                    <div class="invoice-notes border">
                        <label class="main-content-label tx-16 mt-3">Action Take
                        </label>


                        <div class="task-action-container">
                            @if (isset($section_task->action_take))

                            {!! $section_task->action_take !!}


                            @endif
                            @if($section_task->eng_id === Auth::user()->id)

                            <a href="{{ route('dashboard.requestToUpdateReport', $section_task->id) }}"
                                class="btn btn-outline-primary d-print-none">
                                <i class="fas fa-pen"></i> Update Report
                            </a>

                            @endif
                        </div>
                    </div><!-- invoice-notes -->
                    <div class="invoice-notes mt-5 "
                        style="display: flex;flex-direction:column;  align-items:flex-end;">
                        <label class="main-content-label tx-16 mt-2">Engineer
                        </label>
                        <p class="tx-20 text-dark">
                            {{
                            $section_task->engineer->name }} <br>

                        </p>
                        <p class="tx-20 text-dark font-italic">
                            {{
                            $section_task->engineer->email }} <br>

                        </p>


                    </div><!-- invoice-notes -->
                </div>
                <div class="card d-print-none" id="tabs-style4">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            Shared Reports & Attachments
                        </div>
                        <p class="mg-b-20">Explore related reports and attachments from other departments.</p>

                        <div class="text-wrap">
                            <div class="example">
                                <div class="d-md-flex">
                                    <div class="">
                                        <div class="panel panel-primary tabs-style-4">
                                            <div class="tab-menu-heading">
                                                <div class="tabs-menu ">
                                                    <!-- Tabs -->
                                                    <ul class="nav panel-tabs me-3">
                                                        <li class=""><a href="#tab21" class="active"
                                                                data-bs-toggle="tab"><i class="fas fa-file-alt"></i>
                                                                Reports({{$shared_reports_count}})</a></li>
                                                        <li><a href="#tab22" data-bs-toggle="tab"><i
                                                                    class="fas fa-paperclip"></i>
                                                                Attachments({{$files_count}})</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tabs-style-4 ">
                                        <div class="panel-body tabs-menu-body">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab21">
                                                    <div class="table-responsive border d-print-none mt-4">
                                                        @if(count($sections_tasks) > 0 )
                                                        <table class="table mg-b-0 text-md-nowrap w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Department</th>
                                                                    <th>Engineer</th>
                                                                    <th>Date</th>
                                                                    <th>Report</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php $i=1 @endphp
                                                                @foreach($sections_tasks as $task)
                                                                @if($task->department_id !== 1)
                                                                <tr>
                                                                    <th scope="row">{{$i++}}</th>
                                                                    <td>{{$task->department->name}}</td>
                                                                    <td>{{$task->engineer->name}}</td>
                                                                    <td>{{$task->created_at}}</td>
                                                                    <td>
                                                                        <a class="btn btn-outline-info"
                                                                            href="{{ route('dashboard.reportPage', ['id' => $task->id])}}">
                                                                            Report
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                @endif
                                                                @endforeach

                                                            </tbody>
                                                        </table>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="tab22">
                                                    {{-- attachments table --}}
                                                    <div
                                                        class=" d-flex flex-column align-items-start justify-content-start d-print-none">
                                                        <table class="table table-striped mg-b-0 text-md-nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">م</th>
                                                                    <th scope="col">Department</th>
                                                                    <th scope="col">File</th>
                                                                    <th scope="col"> Sent by</th>
                                                                    <th scope="col">View</th>
                                                                    <th scope="col">Download</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i = 0; ?>
                                                                @foreach($files as $file )
                                                                <tr>
                                                                    <td>{{ ++$i }}</td>
                                                                    <td>{{ $file->department->name }}</td>
                                                                    <td>{{ $file->file }}</td>
                                                                    <td>

                                                                        {{ $file->user->name }}

                                                                    </td>
                                                                    <td>


                                                                        <a class="btn btn-info"
                                                                            href="{{ route('view.file', ['main_task_id' => $file->main_tasks_id, 'file' => $file->file]) }}"
                                                                            target="_blank">
                                                                            <i class="fas fa-eye"></i> View
                                                                        </a>



                                                                    </td>
                                                                    <td>
                                                                        <a class="btn btn-outline-primary"
                                                                            href="{{ asset('storage/attachments/' . $file->main_tasks_id . '/' . $file->file) }}"
                                                                            download="{{ $file->file }}">
                                                                            <i class="fas fa-download"></i> Download
                                                                        </a>

                                                                    </td>
                                                                    <td>
                                                                        <a class="btn btn-danger"
                                                                            href="{{ route('delete.file', ['main_task_id' => $file->main_tasks_id, 'file' => $file->file,'id'=>$file->id]) }}"
                                                                            onclick="return confirm('Are you sure you want to delete this file?');">
                                                                            <i class="fas fa-trash"></i> Delete
                                                                        </a>
                                                                    </td>

                                                                    @endforeach

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /div -->
                </div>

                <div aria-label="Basic example" class="btn-group" role="group">
                    {{-- <a href="{{ route('dashboard.editTask', $section_task->main_tasks_id) }}"
                        class="btn btn-danger-gradient float-end mt-3 ms-2 pd-sm-x-25 pd-x-15">
                        <i class="fas fa-exchange-alt"></i>
                        Convert Task
                    </a> --}}
                    <a class="btn btn-danger-gradient float-end mt-3 ms-2 pd-sm-x-25 pd-x-15"
                        data-bs-target="#modaldemo1" data-bs-toggle="modal" href="">
                        Update Department
                    </a>

                    @if ($section_task->department_id ===
                    Auth::user()->department_id && Auth::user()->role_id ==
                    "2" && Auth::user()->department_id !== 1)
                    <form method="POST" action="{{route('dashboard.approveReports',$section_task->id)}}">
                        @csrf
                        <button
                            class="btn float-end mt-3 ms-2  pd-sm-x-25 pd-x-15 {{$section_task->approved == '0' ? 'btn-success' : 'btn-info'}}">
                            <i class="fa fa-check-circle"></i> {{
                            $section_task->approved == '0' ? 'Approve Report'
                            :
                            'Cancel Approval' }}
                        </button>
                    </form>
                    <a href="{{ route('taskNote.create', ['department_task_id' => $task->main_tasks_id]) }}"
                        class="btn btn-outline-dark float-end mt-3 ms-2 pd-sm-x-25 pd-x-15">Task Notes</a>

                    @endif
                    <button class="btn btn-dark float-end mt-3 ms-2 pd-sm-x-25 pd-x-15"
                        onclick="printContent('printable-content');">
                        <i class="mdi mdi-printer me-1"></i>Print
                    </button>
                </div>



            </div>
        </div>
    </div>
</div>
<div class="modal" id="modaldemo1">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Update this task</h6><button aria-label="Close" class="close"
                    data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{route('dashboard.convertTask',$section_task->main_tasks_id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="departmentSelect">Select Department</label>
                        <input type="hidden" name="main_task" value="{{$section_task->main_tasks_id}}">
                        <select id="departmentSelect" name="departmentSelect" class="form-select">
                            <option value="{{ Auth::user()->department_id }}">{{ Auth::user()->department->name }}
                            </option>
                            @foreach($departments as $department)
                            @if($department->id !== Auth::user()->department_id)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="notes">Notes</label>
                        <textarea id="notes" name="notes" class="form-control"></textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-primary" type="submit">Save changes</button>
                <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- row closed -->

@endsection

@section('scripts')
<script>
    function printContent(elementId) {
    var content = document.getElementById(elementId);
    var originalContents = document.body.innerHTML;

    // Temporarily replace the document content with the content to be printed
    document.body.innerHTML = content.innerHTML;

    // Print the content
    window.print();

    // Restore the original document content
    document.body.innerHTML = originalContents;
}

</script>


@endsection