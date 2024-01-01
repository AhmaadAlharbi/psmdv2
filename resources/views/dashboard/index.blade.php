@extends('layouts.app')

@section('styles')
<style>
    .task-action-container * {
        color: #646464 !important;
        font-size: 15px !important;
        font-style: italic !important;
    }

    .engineer-note {
        border: 1px solid #db3434;
        /* Border color: Blue */
        border-radius: 0.25rem;
        /* Rounded corners */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        /* Subtle shadow */
        padding: 10px;
        /* Padding for content */
        margin-top: 10px;
        /* Spacing from other elements */
        background-color: #ecf0f1;
        /* Background color: Light Grey */
        /* Custom background color */
    }

    .action_take {
        border: 1px solid #34db93;
        /* Border color: Blue */
        border-radius: 0.25rem;
        /* Rounded corners */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        /* Subtle shadow */
        padding: 10px;
        /* Padding for content */
        margin-top: 10px;
        /* Spacing from other elements */
        background-color: #ecf0f1;
        /* Background color: Light Grey */
        /* Custom background color */
    }

    /* Add these styles to your stylesheet or in a <style> tag in your HTML */
    .table-pending {
        background-color: #e87676;
        /* Light red for pending tasks */
    }

    .table-completed {
        background-color: #61b361;
        /* Light green for completed tasks */
    }
</style>
@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">


    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Dashboard</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                {{Auth::user()->department->name}}</span>
        </div>

    </div>
    <div class="btn-group dropdown">
        <button type="button" class="btn btn-primary">
            <i class="fas fa-cog"></i> Control Panel - Filter by Control
        </button>

        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuDate" x-placement="bottom-end">
            <a class="dropdown-item"
                href="{{ route('dashboard.indexControl', ['control' => 'JAHRA CONTROL CENTER']) }}">Al Jahra Control</a>
            <a class="dropdown-item"
                href="{{ route('dashboard.indexControl', ['control' => 'SHUAIBA CONTROL CENTER']) }}">Shuaiba
                Control</a>
            <a class="dropdown-item"
                href="{{ route('dashboard.indexControl', ['control' => 'JABRIYA CONTROL CENTER']) }}">Jabriya
                Control</a>
            <a class="dropdown-item"
                href="{{ route('dashboard.indexControl', ['control' => 'TOWN CONTROL CENTER']) }}">Town Control</a>
            <a class="dropdown-item"
                href="{{ route('dashboard.indexControl', ['control' => 'NATIONAL CONTROL CENTER']) }}">National
                Control</a>
        </div>
    </div>

</div>
<div class="row ">
    {{-- @if(session('success'))
    <div class="alert alert-success">
        <div class="card bd-0 mg-b-20 bg-success">
            <div class="card-body text-white">
                <div class="main-error-wrapper">
                    <i class="si si-check mg-b-20 tx-50"></i>
                    <h4 class="mg-b-0"> {{ session('success') }}</h4>
                </div>
            </div>
        </div>
    </div>
    @endif --}}


    @include('dashboard.indexComponent.labels')


</div>
<!-- breadcrumb -->

<!-- row -->

<div class="row">

    <div class="card mg-b-20" id="tabs-style2">

        @include('dashboard.indexComponent.statistics')
    </div>
    {{-- tasks have no engineers yet--}}
    @if (!$unAssignedTasks->isEmpty())
    @include('dashboard.indexComponent.unAssignedTasks')
    @endif

    {{--red table --}}
    @if (!$pendingTasks->isEmpty())
    {{-- large screen Table only --}}


    @include('dashboard.indexComponent.pendingTasks')

    @endif


    {{-- green table--}}
    @if (!$completedTasks->isEmpty())


    @include('dashboard.indexComponent.completedTasks')


    @endif
</div>





<!-- row closed -->

@endsection

@section('scripts')
<script src="{{asset('assets/js/index.js')}}"></script>
<!--Internal Counters -->
<script src="{{asset('assets/plugins/counters/waypoints.min.js')}}"></script>
<script src="{{asset('assets/plugins/counters/counterup.min.js')}}"></script>

<!--Internal Time Counter -->
<script src="{{asset('assets/plugins/counters/jquery.missofis-countdown.js')}}"></script>
<script src="{{asset('assets/plugins/counters/counter.js')}}"></script>

<!--Internal  Chart.bundle js -->
<script src="{{asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>

<!-- Internal Chartjs js -->
<script src="{{asset('assets/js/chart.chartjs.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

<!--Internal  Sweet-Alert js-->
<script src="{{asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/plugins/sweet-alert/jquery.sweet-alert.js')}}"></script>

<!-- Sweet-alert js  -->
<script src="{{asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/sweet-alert.js')}}"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('success') }}'
                });
            @endif
        });
</script>
@if(session('error'))
<script>
    $(document).ready(function() {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                html: '{!! session('error') !!}'
            });
        });
</script>
@endif







<script>
    // JavaScript code to create a pie chart using Chart.js
    var ctx = document.getElementById('chartPie').getContext('2d');
    var data = {
        labels: ['Completed Tasks', 'Remaining Tasks'],
        datasets: [{
            data: [{{ $completedTasksAllTime }}, {{ $totalTasksAllTime - $completedTasksAllTime }}],
            backgroundColor: ['#11d43d', '#ff1947']
        }]
    };
    var options = {
        responsive: true
    };
    var pieChart = new Chart(ctx, {
        type: 'pie',
        data: data,
        options: options
    });
</script>
<script>
    function deleteRecord(id) {
          Swal.fire({
            title: 'Are you sure about the deletion choice?',
            text: 'Please select your option below',
            icon: 'Warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete the task',
            cancelButtonText: 'Cancel',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
          }).then((result) => {
            if (result.isConfirmed) {
              document.getElementById('delete-form-' + id).submit();
            }
          });
        }
</script>
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