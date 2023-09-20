@extends('layouts.app')
@section('styles')
<style>
    .mew-logo {
        width: 250px;
    }

    .kuwait {
        visibility: hidden;
    }




    #table0 th,
    #table1 th,
    #table2 th {
        font-size: 20px;
    }

    .print-title {
        background: #e6e6e8 !important;
    }

    td {
        font-size: 20px;
    }

    @media print {
        #print_Button {
            display: none;
        }

        body {
            -webkit-print-color-adjust: exact !important;
        }


        #table1 th,
        #table2 th .print-title {
            background: #e6e6e8 !important;
        }

        #table1 td,
        #table2 td {
            font-size: 19px;
        }
    }
</style>
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
<div class="row" id="print">

    <div class="col-md-12 col-xl-12 ">
        <div class=" main-content-body-invoice border border-dark">
            <div class="card card-invoice">
                <div class="card-body">

                    <div class="container">
                        <div class="d-block p-3  print-title text-dark">
                            <div class="row">
                                <div class="col">
                                    <img class="mew-logo rounded " src="https://www.mew.gov.kw/images/logo@2x.png"
                                        alt="mew logo">
                                </div>
                                <div class="col">
                                    <p class="text-center">Primary substation maintenance department</p>
                                    <h2 class="text-center"> Trouble shooting Report</h2>
                                    <h5 class="text-center"><ins>Ref.No: {{ $section_task->main_task->refNum }}</ins>
                                        {{-- <h4 class="text-center mt-3">{{ $section_task->sectionID->section_name }}
                                            Section
                                        </h4> --}}
                                    </h5>
                                </div>
                            </div>
                        </div>
                        {{-- --}}
                        <div class="table-responsive text-left">
                            <div class=" row ssname-table  ">
                                <div class=" d-print-none col-sm-12 col-print-12  col-lg-6  ">
                                    <h1
                                        class="d-none
                                        d-sm-flex justify-content-center align-items-center text-center rounded-lg mt-2 display-1 py-5 h-100 bg-white text-dark border border-dark">
                                        {{ $section_task->main_task->station->SSNAME }}
                                    </h1>
                                    <h1 style="font-size:44px;"
                                        class="d-block 
                             justify-content-center align-items-center text-center mt-2  p-5 h-100 bg-wihte text-dark border border-dark rounded-lg d-sm-none">
                                        {{ $section_task->main_task->station->SSNAME }}
                                    </h1>

                                </div>
                                {{-- this div show only on print --}}
                                <div class="d-none d-print-block  col-sm-4  ">
                                    <h1
                                        class="d-flex justify-content-center align-items-center text-center mt-2 p-5 h-100 bg-white text-dark border border-dark rounded-lg">
                                        {{ $section_task->main_task->station->SSNAME }}
                                    </h1>

                                </div>
                                <div
                                    class="d-print-none d-none d-sm-block col-sm-12  col-lg-6 col-print-12  table-responsive-sm">
                                    <table class="table mt-2 p-5 border border-dark h-100 text-center" id="table1"
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
                                                <td class="bg-light">{{ $section_task->main_task->station->COMPANY_MAKE
                                                    }}</td>
                                                <td class="bg-light">{{ $section_task->main_task->station->Contract_No
                                                    }}</td>

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
                                                <td class="bg-light">{{
                                                    $section_task->main_task->station->COMMISIONING_DATE }}</td>
                                                @php
                                                $todayDate = date('Y-m-d');
                                                @endphp
                                                {{-- @if (isset($section_task->main_task->station->pm) && $todayDate <
                                                    $section_task->main_task->station->pm) --}}
                                                    <td class=" bg-light text-dark">
                                                        {{ $section_task->main_task->station->pm }}
                                                    </td>
                                                    {{-- @else
                                                    <td class="bg-danger text-white">
                                                        {{ $section_task->main_task->station->pm }}
                                                    </td>
                                                    @endif --}}

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- this div show only on print --}}
                                <div class="d-none d-print-block    col-sm-8  table-responsive-sm">
                                    <table class="table mt-2 p-5 border border-dark h-100 text-center" id="table1"
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
                                                <td>{{ $section_task->main_task->station->COMPANY_MAKE }}</td>
                                                <td>{{ $section_task->main_task->station->Contract_No }}</td>

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
                                                <td>{{ $section_task->main_task->station->COMMISIONING_DATE }}</td>
                                                @php
                                                $todayDate = date('Y-m-d');
                                                @endphp
                                                @if (isset($section_task->main_task->station->pm) && $todayDate <
                                                    $section_task->main_task->station->pm)
                                                    <td class="bg-success">
                                                        {{ $section_task->main_task->station->pm }}
                                                    </td>
                                                    @else
                                                    <td class="bg-danger">
                                                        {{ $section_task->main_task->station->pm }}
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
                                                <td>{{ $section_task->main_task->station->COMPANY_MAKE }}</td>

                                            </tr>
                                        </tbody>
                                        <thead class="thead-light">
                                            <th scope="col">Contract.No</th>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $section_task->main_task->station->Contract_No }}</td>

                                            </tr>
                                        </tbody>
                                        <thead class="thead-light">
                                            <th scope="col">COMMISIONING DATE</th>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $section_task->main_task->station->COMMISIONING_DATE }}</td>

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
                                                @if (isset($main_task->station->pm) && $todayDate < $main_task->
                                                    station->pm)
                                                    <td class="bg-success text-white">
                                                        {{ $section_task->main_task->station->pm }}
                                                    </td>
                                                    @else
                                                    <td class="bg-danger text-white">
                                                        {{ $section_task->main_task->station->pm }}
                                                    </td>
                                                    @endif

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div
                                class="d-block p-3 mb-2 bg-white text-dark d-flex flex-column align-items-end justify-content-end">
                                <h2><ins>:Equip/Unit Affected</ins></h2>
                                <h4>{{ $section_task->main_task->equip_number }}
                                </h4>
                                <h2><ins>Main Alarm</ins></h2>
                                @isset($section_task->main_task->main_alarm_id) <h4>
                                    {{$section_task->main_task->main_alarm->name}}
                                </h4>@endisset
                            </div>
                            <div class=" border border-dark  mb-4   ">
                                <h3
                                    class=" bg-warning-gradient py-3 text-white px-4  d-flex flex-column align-items-end justify-content-end">
                                    Alarm Date
                                    {{ \Carbon\Carbon::parse($section_task->created_at)->format('Y-m-d') }}
                                </h3>
                                <h2 class="px-4 d-flex flex-column align-items-end justify-content-end">Nature of Fault
                                </h2>
                                <h4 class="px-4 text-left d-flex flex-column align-items-end justify-content-end ">{{
                                    $section_task->main_task->problem }}</h4>
                            </div>
                            <div class="  border border-dark mb-2 ">
                                <h3
                                    class="bg-success-gradient py-3 text-white px-4  d-flex flex-column align-items-end justify-content-end">
                                    Report Date
                                    {{\Carbon\Carbon::parse($section_task->created_at)->format('Y-m-d') }}
                                </h3>
                                <h2 class="px-4 d-flex flex-column align-items-end justify-content-end">Action Take</h2>
                                @if (isset($section_task->action_take))
                                <h4
                                    class=" px-4 w-auto h-25 text-left d-flex flex-column align-items-end justify-content-end">
                                    {{ $section_task->action_take }}</h4>
                                @else
                                <h4 class=" ml-4 w-auto h-25 d-flex flex-column align-items-end justify-content-end">{{
                                    $section_task->reasonOfUncompleted }}</h4>
                                <h5 class=" ml-4 w-auto h-25 d-flex flex-column align-items-end justify-content-end">{{
                                    $section_task->engineer_notes }}</h5>
                                @endif
                            </div>
                            <div
                                class="d-block p-3 mb-2 bg-white text-dark d-flex flex-column align-items-end justify-content-end">
                                <h2>Engineer</h2>
                            </div>
                            <h4 class="  px-4 d-flex flex-column align-items-end justify-content-end">{{
                                $section_task->engineer->name }}<br>

                            </h4>
                            <p class="px-4 lead d-flex flex-column align-items-end justify-content-end">{{
                                $section_task->engineer->email }}</p>
                        </div>
                    </div>


                    <hr class=" mg-b-40">

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


                    <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i
                            class="mdi mdi-printer ml-1"></i>طباعة</button>

                </div>

            </div>
        </div>
    </div><!-- COL-END -->
</div>
<!-- row closed -->

@endsection

@section('scripts')

<script type="text/javascript">
    function printDiv() {
        var printContents = document.getElementById('print').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }
</script>

@endsection