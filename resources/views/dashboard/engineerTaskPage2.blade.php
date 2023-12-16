@extends('layouts.app')

@section('styles')
<style>
    .mew-logo {
        width: 250px;
    }

    @media print {
        .print-button-container {
            display: none;
        }
    }
</style>
@endsection

@section('content')


<!-- row -->
<div class="row mt-4" id="printable-content">
    <div class=" main-content-body-invoice">
        <div class="card card-invoice">
            <div class="card-body">
                <div class="invoice-header">
                    <h1 class="invoice-title"> <img class="mew-logo rounded "
                            src="https://www.mew.gov.kw/images/mew_ar.svg" alt="mew logo"></h1>

                    <div class="billed-from">
                        <h1 class="invoice-title">Primary Substation Maintenance Department</h1>

                        <h6 class="mt-2">{{$tasks->department->name}}</h6>
                        <p>Trouble Shooting Report<br>
                            Ref.No:{{ $tasks->main_task->refNum }}
                        </p>
                    </div><!-- billed-from -->
                </div><!-- invoice-header -->
                <div class="row mg-t-20">
                    <div class="col-md ">
                        <label class="tx-gray-600">Task Details</label>
                        <div class="">


                            <h1 class="fw-bold">{{ $tasks->main_task->station->SSNAME }}</h1>


                            <p class="font-italic tx-15"> @isset($tasks->main_task->main_alarm_id)
                                {{$tasks->main_task->main_alarm->name}}
                                @endisset<br>
                                Equip : {{ $tasks->main_task->equip_number }}<br>
                            </p>
                        </div>
                    </div>
                    <div class="col-md">
                        <label class="tx-gray-600">Station Information</label>
                        @if($tasks->main_task->station->FULLNAME)
                        <p class="invoice-info-row"><span> Full name </span> <span>{{
                                $tasks->main_task->station->FULLNAME }}</span></p>
                        @endif
                        <p class="invoice-info-row"><span>Company Make</span> <span>{{
                                $tasks->main_task->station->COMPANY_MAKE
                                }}</span></p>
                        <p class="invoice-info-row"><span>Contract No</span> <span>{{
                                $tasks->main_task->station->Contract_No
                                }}</span></p>
                        <p class="invoice-info-row"><span>Commisioning Date</span> <span>{{
                                $tasks->main_task->station->COMMISIONING_DATE }}</span></p>
                        <p class="invoice-info-row"><span>Previous Maintenance</span> <span> {{
                                $tasks->main_task->station->pm }}</span></p>
                    </div>
                </div>
                <div class="table-responsive mg-t-40">
                    <table class="table table-invoice border text-md-nowrap mb-0">
                        <thead>

                        </thead>
                        <tbody>
                            <tr>
                                <td class="valign-middle" colspan="2">
                                    <div class="invoice-notes">
                                        <label class="main-content-label tx-16">Nature of Fault <span
                                                class="badge bg-danger me-1"></span></label>
                                        <p class="tx-20 text-secondary">{{
                                            $tasks->main_task->problem }} </p>
                                        @if( $tasks->main_task->notes)
                                        <label class="main-content-label tx-16">Notes <span
                                                class="badge bg-danger me-1"></span></label>
                                        <p class="tx-20 text-secondary">{{
                                            $tasks->main_task->notes }} </p>
                                        @endif
                                    </div><!-- invoice-notes -->
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header border-bottom-0">
                                    <h2 class="card-title">Action Take</h2>
                                    @if($reportShared->isNotEmpty())
                                    <div class="mt-3">
                                        <h5>Actions Taken by Other Departments:</h5>
                                        <ul class="list-group">
                                            <ul class="list-group">
                                                @foreach($reportShared as $report)
                                                <li class="list-group-item">
                                                    <div class="mb-2">
                                                        <strong>{{ $report->department->name }}:</strong>
                                                        <br>
                                                        <span>{!! $report->action_take !!}</span>
                                                    </div>
                                                    <div class="text-muted">
                                                        <span class="fw-bold">Engineer:</span> {{
                                                        $report->engineer->name }}<br>
                                                        <span class="fw-bold">Created at:</span> {{
                                                        $report->created_at->format('F j, Y h:i A') }}
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>

                                        </ul>
                                    </div>
                                    @endif


                                </div>

                                <div class="card-body">

                                    <form
                                        action="{{ route('dashboard.submitEngineerReport', ['id' => $tasks->main_tasks_id]) }}"
                                        enctype="multipart/form-data" method="post" autocomplete="off">
                                        @csrf
                                        <div class="form-label">Task status</div>
                                        <div class="custom-controls-stacked mt-3">
                                            {{-- <label class="custom-control form-radio custom-control-md">
                                                <input type="radio" class="custom-control-input"
                                                    name="action_take_status" value="task_progress" checked>
                                                <span
                                                    class="custom-control-label custom-control-label-md tx-17 text-info">First
                                                    draft
                                                </span>

                                                <small class="text-secondary mt-2">
                                                    Note: If you do not provide a progress update within 24 hours from
                                                    receiving the task, it will be marked as a late reply.
                                                </small>
                                            </label> --}}

                                            <label class="custom-control form-radio custom-control-md">
                                                <input type="radio" class="custom-control-input"
                                                    name="action_take_status" value="completed" checked>
                                                <span
                                                    class="custom-control-label custom-control-label-md tx-17 text-success">Completed</span>
                                            </label>
                                            <label class="custom-control form-radio custom-control-md">
                                                <input type="radio" class="custom-control-input"
                                                    name="action_take_status" value="Responsibility of another entity">
                                                <span
                                                    class="custom-control-label custom-control-label-md tx-17 text-success">Responsibility
                                                    of another entity</span>
                                            </label>
                                            <label class="custom-control form-radio custom-control-md">
                                                <input type="radio" class="custom-control-input"
                                                    name="action_take_status" value="Under warranty">
                                                <span
                                                    class="custom-control-label custom-control-label-md tx-17 text-success">Under
                                                    warranty</span>
                                            </label>
                                            <label class="custom-control form-radio custom-control-md">
                                                <input type="radio" class="custom-control-input"
                                                    name="action_take_status" value="Spare parts not available">
                                                <span
                                                    class="custom-control-label custom-control-label-md tx-17 text-danger">Spare
                                                    parts not available</span>
                                            </label>
                                            <label class="custom-control form-radio custom-control-md">
                                                <input type="radio" class="custom-control-input"
                                                    name="action_take_status" value="Awaiting repairs">
                                                <span
                                                    class="custom-control-label custom-control-label-md tx-17 text-danger">Awaiting
                                                    repairs</span>
                                            </label>
                                            <label class="custom-control form-radio custom-control-md">
                                                <input type="radio" class="custom-control-input"
                                                    name="action_take_status"
                                                    value="Transferring the task to another engineer">
                                                <span
                                                    class="custom-control-label custom-control-label-md tx-17 text-danger">Transferring
                                                    the task to another engineer.</span>
                                            </label>
                                        </div>
                                        <textarea class="content5" name="action_take"></textarea>


                                        @error('action_take')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div id="attachmentFile"
                                            class="e d-flex flex-column align-items-start justify-content-start">
                                            <div class="col-sm-12 col-md-12">
                                                <input type="file" name="pic[]" class="dropify"
                                                    accept=".pdf,.jpg, .png, image/jpeg, image/png" data-height="70" />
                                            </div><br>
                                            <div class="col-sm-12 col-md-12">
                                                <input type="file" name="pic[]" class="dropify"
                                                    accept=".pdf,.jpg, .png, image/jpeg, image/png" data-height="70" />
                                            </div><br>
                                            <div class="col-sm-12 col-md-12">
                                                <input type="file" name="pic[]" class="dropify"
                                                    accept=".pdf,.jpg, .png, image/jpeg, image/png" data-height="70" />
                                            </div><br>
                                        </div>
                                        <button type="submit" class="btn btn-info">Submit Report</button>
                                </div>
                                </form>


                            </div>
                        </div>
                    </div>
                    <div class="invoice-notes mt-5 "
                        style="display: flex;flex-direction:column;  align-items:flex-end;">
                        <label class="main-content-label tx-16 mt-2">Engineer
                        </label>
                        <p class="tx-20 text-dark">
                            {{
                            $tasks->engineer->name }} <br>

                        </p>
                        <p class="tx-20 text-dark font-italic">
                            {{
                            $tasks->engineer->email }} <br>

                        </p>
                    </div><!-- invoice-notes -->
                </div>

            </div>
            {{-- attachments table --}}
            <div class=" d-flex flex-column align-items-start justify-content-start d-print-none">
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

<!-- row closed -->

@endsection

@section('scripts')

<!--Internal  Sweet-Alert js-->
<script src="{{asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/plugins/sweet-alert/jquery.sweet-alert.js')}}"></script>

<!-- Sweet-alert js  -->
<script src="{{asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/sweet-alert.js')}}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector('form').addEventListener('submit', function(event) {
            var actionTakeValue = document.querySelector('textarea[name="action_take"]').value.trim();

            // Your custom validation logic
            if (actionTakeValue.toLowerCase() === '<div><br></div>') {
                // Show SweetAlert error message
                swal({
                    title: 'Invalid Value',
                    text: 'Action take feild can not be empty',
                    type: 'error',
                });

                event.preventDefault(); // Prevent form submission
            }
        });
    });
</script>




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
<!-- INTERNAL WYSIWYG Editor JS -->
<script src="{{asset('assets/plugins/wysiwyag/jquery.richtext.js')}}"></script>
<script src="{{asset('assets/plugins/wysiwyag/wysiwyag.js')}}"></script>
<!--Internal Fileuploads js-->
<script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>

<!--Internal Fancy uploader js-->
<script src="{{asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
<script src="{{asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
@endsection