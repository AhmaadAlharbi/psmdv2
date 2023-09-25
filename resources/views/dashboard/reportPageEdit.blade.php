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
                                            $section_task->main_task->problem }} </p>
                                    </div><!-- invoice-notes -->
                                </td>
                            </tr>
                            <tr>
                                <td class="valign-middle" colspan="2">
                                    <div class="invoice-notes">
                                        <label class="main-content-label tx-16">Action Take
                                        </label>
                                        <form method="POST"
                                            action="{{ route('dashboard.updateReport', ['main_task_id' => $section_task->main_tasks_id]) }}">
                                            @csrf
                                            @method('PATCH')
                                            <textarea class="content5"
                                                name="action_take"> {!! $section_task->action_take !!}</textarea>
                                            <button
                                                class="btn float-end mt-3 ms-2 d-none-print {{ $section_task->approved == '0' ? 'btn-success' : 'btn-info' }}">
                                                <i class="fa fa-check-circle"></i> Update
                                            </button>
                                        </form>


                                    </div><!-- invoice-notes -->
                                </td>
                            </tr>



                        </tbody>
                    </table>
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




            </div>
        </div>
    </div>
</div>

<!-- row closed -->

@endsection

@section('scripts')
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