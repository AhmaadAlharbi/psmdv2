@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Stations</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                List</span>
        </div>
    </div>

</div>
<!-- breadcrumb -->

<!-- row -->
<div class="row">
    <div class="card">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="dropdown mt-2">
            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn btn-primary"
                data-bs-toggle="dropdown" id="dropdownMenuButton4" type="button">Filter By Control <i
                    class="fas fa-caret-down ms-1"></i></button>
            <div class="dropdown-menu tx-13">
                <a class="dropdown-item" href="{{route('stations.index')}}">All Station</a>
                <a class="dropdown-item" href="{{route('station.indexControl','JAHRA CONTROL CENTER')}}">Al Jahra
                    Control</a>
                <a class="dropdown-item" href="{{route('station.indexControl','SHUAIBA CONTROL CENTER')}}">Shuaiba
                    Control</a>
                <a class="dropdown-item" href="{{route('station.indexControl','JABRIYA CONTROL CENTER')}}">Jabriya
                    Control</a>
                <a class="dropdown-item" href="{{route('station.indexControl','TOWN CONTROL CENTER')}}">Town Control</a>
                <a class="dropdown-item" href="{{route('station.indexControl','NATIONAL CONTROL CENTER')}}">National
                    Control</a>
            </div>
        </div>
        <div class="card-header">
            <h3 class="card-title">Stations List</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table border-top-0  table-bordered text-nowrap border-bottom" id="responsive-datatable">

                    <thead>
                        <tr>
                            <th class="wd-15p border-bottom-0">#</th>
                            <th class="wd-15p border-bottom-0">Name</th>
                            <th class="wd-20p border-bottom-0">Make</th>
                            <th class="wd-15p border-bottom-0">Voltage level</th>
                            <th class="wd-10p border-bottom-0">Contract.No</th>
                            <th class="wd-10p border-bottom-0">Commisioning Date</th>
                            <th class="wd-25p border-bottom-0">Control</th>
                            <th class="wd-25p border-bottom-0">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stations as $station)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$station->SSNAME}}</td>
                            <td>{{$station->COMPANY_MAKE}}</td>
                            <td>{{$station->Voltage_Level_KV}}</td>
                            <td>{{$station->Contract_No}}</td>
                            <td>{{$station->COMMISIONING_DATE}}</td>
                            <td>{{$station->control}}</td>
                            <td><a class="btn btn-warning" href="{{ route('stations.edit', $station) }}">Edit</a>
                                <a href="#" class="btn btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteConfirmationModal-{{ $station->id }}"> <i
                                        class="fa fa-trash"></i>
                            </td>
                        </tr>
                        <div class="modal fade" id="deleteConfirmationModal-{{ $station->id }}" tabindex="-1"
                            aria-labelledby="deleteConfirmationModalLabel-{{ $station->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteConfirmationModalLabel-{{ $station->id }}">
                                            Delete Confirmation </h5> <button type="button" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body"> Are you sure you want to delete this station? <form
                                            method="POST" action="{{ route('stations.destroy', $station) }}"
                                            class="d-inline">
                                            @csrf @method('DELETE')
                                            <input type="hidden" value="{{ $station->id }}" name="station_id">


                                    </div>
                                    <div class="modal-footer"> <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button> <button
                                            class="btn btn-outline-danger" id="deleteTask" data-id="{{ $station->id }}">
                                            <i class="fa fa-trash"></i> Delete </button> </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </tbody>
                </table>
                {{ $stations->links() }}


            </div>
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