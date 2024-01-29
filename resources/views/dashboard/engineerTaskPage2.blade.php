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
            @if(now() >= \Carbon\Carbon::parse($tasks->due_date . ' ' . $tasks->due_time))

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
                                        <div>
                                            <label class="main-content-label tx-16">Work Type <span
                                                    class="badge bg-danger me-1"></span></label>
                                            <p class="tx-20 fw-bold text-secondary">{{$tasks->main_task->work_type}}
                                            </p>
                                        </div>
                                        <div class="mt-3">
                                            <label class="main-content-label tx-16">Nature of Fault <span
                                                    class="badge bg-danger me-1"></span></label>
                                            <p class="tx-20 fw-bold text-secondary">{{$tasks->main_task->problem}}
                                            </p>
                                        </div>
                                        @if($tasks->main_task->notes)
                                        <div class="mt-3">
                                            <label class="main-content-label tx-16">Notes <span
                                                    class="badge bg-danger me-1"></span></label>
                                            <p class="tx-20 fw-bold text-secondary">{{$tasks->main_task->notes}}</p>
                                        </div>
                                        @endif
                                        <!-- You can add more sections if needed -->
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

                                        <div class="alert alert-info" role="alert">
                                            <strong>Note:</strong> The icons serve as indicators for the task
                                            status.
                                            <br>
                                            <i class="fas fa-check-circle text-success"></i> Completed: This icon
                                            signifies that the task has been successfully finished.
                                            <br>
                                            <i class="fas fa-hourglass-half text-warning"></i> Pending: This icon
                                            represents a task that is currently in progress and awaits completion.
                                        </div>



                                        <div class="form-group">
                                            <label for="taskStatus">Task Status</label>
                                            <div class="custom-controls-stacked mt-3">
                                                <div class="custom-control custom-radio mb-2">
                                                    <input type="radio" id="completed" name="action_take_status"
                                                        value="completed" class="custom-control-input" checked>
                                                    <label class="custom-control-label completed-label" for="completed">
                                                        <i class="fas fa-check-circle text-success"></i> Completed
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio mb-2">
                                                    <input type="radio" id="responsibility" name="action_take_status"
                                                        value="Responsibility of another entity"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="responsibility">
                                                        <i class="fas fa-check-circle text-success"></i></i>
                                                        Responsibility of another entity
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio mb-2">
                                                    <input type="radio" id="warranty" name="action_take_status"
                                                        value="Under warranty" class="custom-control-input">
                                                    <label class="custom-control-label" for="warranty">
                                                        <i class="fas fa-check-circle text-success"></i> Under
                                                        warranty
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio mb-2">
                                                    <input type="radio" id="spareParts" name="action_take_status"
                                                        value="Spare parts not available" class="custom-control-input">
                                                    <label class="custom-control-label" for="spareParts">
                                                        <i class="fas fa-hourglass-half text-warning"></i> Spare
                                                        parts
                                                        not available
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio mb-2">
                                                    <input type="radio" id="awaitingRepairs" name="action_take_status"
                                                        value="Awaiting repairs" class="custom-control-input">
                                                    <label class="custom-control-label" for="awaitingRepairs">
                                                        <i class="fas fa-hourglass-half text-warning"></i> Awaiting
                                                        repairs
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio mb-2">
                                                    <input type="radio" id="transferTask" name="action_take_status"
                                                        value="Transfer the task to another engineer"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="transferTask">
                                                        <i class="fas fa-hourglass-half text-warning"></i>
                                                        Transfer the task to another engineer
                                                    </label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="actionTake">Action Take</label>
                                            <textarea class="form-control content5" name="action_take"></textarea>
                                            @error('action_take')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="attachmentFile">Attachment Files</label>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-4">
                                                    <input type="file" name="pic[]" class="dropify" data-height="70" />
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <input type="file" name="pic[]" class="dropify" data-height="70" />
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <input type="file" name="pic[]" class="dropify" data-height="70" />
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-info">Submit Report</button>
                                    </form>
                                </div>





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
            @else
            <!-- Display a message indicating that the due date and time have passed -->
            <div class="alert alert-primary alert-dismissible fade show text-center" role="alert">
                <i class="fas fa-hourglass-half fa-5x mb-3"></i>
                <p class="mb-1 fs-md-5 fs-5">
                    <strong>Note:</strong> You are unable to complete this task until its scheduled due date and time,
                    which is set for {{$tasks->due_date}} - {{$tasks->due_time}}.
                </p>
                <p id="countdown-message" class="fw-bold  fs-6 text-dark">
                    <!-- Countdown message will be displayed here -->
                </p>
            </div>
            @endif
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

<script>
    // Get the due date and time
var dueDateTime = new Date("{{$tasks->due_date}} {{$tasks->due_time}}").getTime();

// Update the countdown every 1 second
var countdown = setInterval(function() {
    // Get the current date and time
    var now = new Date().getTime();

    // Calculate the time remaining
    var timeRemaining = dueDateTime - now;

    // Check if the due date and time have passed
    if (timeRemaining < 0) {
        // Display a message and clear the countdown
        clearInterval(countdown);
        document.getElementById("countdown-message").innerHTML = "The due date and time for this task has arrived. You can now complete the task. The page will refresh shortly...";
        
        // Refresh the page after displaying the message
        setTimeout(function() {
            location.reload();
        }, 3000); // Adjust the delay time (in milliseconds) as needed
    } else {
        // Convert time remaining to days, hours, minutes, and seconds
        var days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
        var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

        // Display the countdown message
        var countdownMessage = "Time remaining until you can complete this task: ";
        countdownMessage += days + "d " + hours + "h " + minutes + "m " + seconds + "s";

        document.getElementById("countdown-message").innerHTML = countdownMessage;
    }
}, 1000);

</script>

@endsection