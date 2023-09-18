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
    </div>
</div>
<!-- breadcrumb -->
<!-- row -->
<div class="test row row-sm " id="print">
    <div class="col-md-12 col-xl-12 ">
        <div class=" main-content-body-invoice border border-dark">
            <div class="card card-invoice">
                <div class="card-body">
                    <div class="invoice-header">

                        <div class="billed-from">

                        </div><!-- billed-from -->

                        <div class="billed-from  ">
                            <img class="mew-logo rounded " src="https://www.mew.gov.kw/images/logo@2x.png"
                                alt="mew logo">
                        </div><!-- billed-from -->

                    </div><!-- invoice-header -->


                    <div class="container">
                        <div class="d-block p-3  print-title text-dark">
                            <p class="text-center">Primary substation maintenance department</p>

                            <h2 class="text-center "> Trouble shooting Report</h2>
                            <h5 class="text-center m-1"><ins>Ref.No: {{ $tasks->main_task->refNum }}</ins></h5>

                        </div>

                        {{-- --}}
                        <div class="mt-3">
                            <h3 class=" text-center  py-4 px-3 bg-secondary text-light">
                                {{ $tasks->main_task->station->fullName }}<br>{{ $tasks->main_task->station->control }}
                                -
                                {{ $tasks->main_task->voltage_level }}
                            </h3>

                        </div>
                        <div dir="ltr">
                            <div class=" row ssname-table  ">
                                <div class=" d-print-none col-sm-12 col-print-12  col-lg-4  ">

                                    <h1
                                        class="d-none d-sm-flex justify-content-center align-items-center text-center mt-2 display-4 p-5 h-100 bg-dark text-white">
                                        {{ $tasks->main_task->station->SSNAME }}
                                    </h1>
                                    <h1 style="font-size:44px;"
                                        class="d-block 
                             justify-content-center align-items-center text-center mt-2  p-5 h-100 bg-dark text-white d-sm-none">
                                        {{ $tasks->main_task->station->SSNAME }}
                                    </h1>
                                </div>

                                <div
                                    class="d-none d-sm-block d-print-none col-sm-12  col-lg-8  col-print-12  table-responsive-sm">
                                    <table class=" table mt-2 p-5 border border-dark h-100 text-center" id="table1"
                                        class="ltr-table ">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Company Make</th>
                                                <th scope="col">Contract.No</th>

                                            </tr>
                                            <tr></tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>{{ $tasks->main_task->station->COMPANY_MAKE }}</td>
                                                <td>{{ $tasks->main_task->station->Contract_No }}</td>

                                            </tr>
                                        </tbody>
                                        <tr>
                                            <thead class="thead-light">
                                                <th scope="col">COMMISIONING DATE</th>
                                                <th scope="col">Previous maintenance</th>
                                            </thead>
                                        </tr>
                                        <tbody>
                                            <tr>
                                                <td>{{ $tasks->main_task->station->COMMISIONING_DATE }}</td>
                                                @php
                                                $todayDate = date('Y-m-d');
                                                @endphp
                                                @if (isset($tasks->main_task->station->pm) && $todayDate < $tasks->
                                                    main_task->station->pm)
                                                    <td class="bgsuccess- text-white">
                                                        {{ $tasks->station->pm }}
                                                    </td>
                                                    @else
                                                    <td class="bg-danger text-white">
                                                        {{ $tasks->main_task->station->pm }}
                                                    </td>
                                                    @endif

                                            </tr>
                                        </tbody>

                                    </table>

                                </div>
                                {{-- mobile screen table --}}
                                <div class="d-block d-sm-none col-sm-12">
                                    <table class=" table mt-2 p-5 border border-dark h-100 text-center" id="table1"
                                        class="ltr-table ">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Company Make</th>

                                            </tr>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $tasks->main_task->station->COMPANY_MAKE }}</td>

                                            </tr>
                                        </tbody>
                                        <thead class="thead-light">
                                            <th scope="col">Contract.No</th>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $tasks->main_task->station->Contract_No }}</td>

                                            </tr>
                                        </tbody>
                                        <thead class="thead-light">
                                            <th scope="col">COMMISIONING DATE</th>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $tasks->main_task->station->COMMISIONING_DATE }}</td>

                                            </tr>
                                        </tbody>
                                        <thead class="thead-light">
                                            <th scope="col">PREVIOUS MAINTENANCE
                                            </th>

                                        <tbody>
                                            <tr>
                                                @php
                                                $todayDate = date('Y-m-d');
                                                @endphp
                                                @if (isset($tasks->main_task->station->pm) && $todayDate < $tasks->
                                                    main_task->station->pm)
                                                    <td class="bg-success text-white">
                                                        {{ $tasks->main_task->station->pm }}
                                                    </td>
                                                    @else
                                                    <td class="bg-danger text-white">
                                                        {{ $tasks->main_task->station->pm }}
                                                    </td>
                                                    @endif

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div
                                class="d-block p-3 mb-2 mt-3 bg-white text-dark   d-flex flex-column align-items-start justify-content-start ">
                                <h2>Main alarm</h2>
                                <h4>@isset($tasks->main_task->main_alarm){{$tasks->main_task->main_alarm->name}}@endisset
                                </h4>
                                <h2>Unit</h2>
                                <h4>{{ $tasks->main_task->equip_number }}
                                </h4>
                                <h2 class="px-2 d-flex flex-column align-items-start justify-content-start">
                                    Notes</h2>
                                <h4 class="px-2 d-flex flex-column align-items-start justify-content-start ">{{
                                    $tasks->main_task->notes }}</h4>
                            </div>



                            <div class="d-block border border-dark  mb-2  text-dark ">
                                <h3
                                    class=" bg-warning-gradient py-2 text-white pl-4 d-flex flex-column align-items-start justify-content-start px-2">
                                    Alarm Date <br>
                                    {{-- $tasks->created_at() --}}
                                </h3>
                                <h2 class="px-2 d-flex flex-column align-items-start justify-content-start">Nature of
                                    Fault</h2>
                                <h4 class="px-2 d-flex flex-column align-items-start justify-content-start ">{{
                                    $tasks->main_task->problem }}</h4>

                            </div>

                            <button type="button" class="btn d-flex align-items-end justify-content-end btn-lg btn-dark"
                                data-toggle="modal" data-target="#exampleModal">
                                Can not complete the task
                            </button>
                            <form action="{{route('dashboard.submitEngineerReport',['id'=>$tasks->main_tasks_id])}}"
                                enctype="multipart/form-data" method="post" autocomplete="off">
                                @csrf
                                <div class="d-flex flex-column align-items-start justify-content-start my-2  text-dark">
                                    <h2>Action Take</h2>

                                    <textarea name="action_take" placeholder="Write Your Report here"
                                        style=" font-size:20px;" rows="5" cols="100"
                                        class="form-control d-flex flex-column align-items-start justify-content-start"></textarea>

                                </div>
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
                                {{-- attachments table --}}
                                <div class=" d-flex flex-column align-items-start justify-content-start">
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
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('storage/attachments/' . $file->main_tasks_id . '/' . $file->file) }}"
                                                        target="_blank">view</a>

                                                </td>
                                                <td>
                                                    <a class="btn btn-outline-primary"
                                                        href="{{ asset('storage/attachments/' . $file->main_tasks_id . '/' . $file->file) }}"
                                                        download="{{ $file->file }}">Download</a>
                                                </td>
                                                @endforeach

                                        </tbody>
                                    </table>
                                </div>


                                <button class="btn btn-lg btn-success-gradient btn-block">Submit</button>
                            </form>


                            {{-- <div class="d-block p-3 mb-2 bg-white text-dark">
                                <h2>Engineer</h2>
                            </div>
                            <h4 class="  ml-4 ">{{ $tasks->users->name }}<br>

                            </h4>
                            <p class="ml-4 lead">{{ $tasks->users->email }}</p>--}}
                        </div>

                    </div>
                    <hr class=" mg-b-40">


                </div>

            </div>
        </div>
    </div><!-- COL-END -->

    <!-- Container closed -->
</div>
<!-- row closed -->

@endsection

@section('scripts')

<!-- Internal Select2 js-->
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

<!--Internal Fileuploads js-->
<script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>

<!--Internal Fancy uploader js-->
<script src="{{asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
<script src="{{asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>

<!--Internal  Form-elements js-->
<script src="{{asset('assets/js/advanced-form-elements.js')}}"></script>
<script src="{{asset('assets/js/select2.js')}}"></script>

<!--Internal Sumoselect js-->
<script src="{{asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>

<!-- Internal TelephoneInput js-->
<script src="{{asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
<script src="{{asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>

@endsection