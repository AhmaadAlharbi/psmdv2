@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Add a new Task</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                {{Auth::user()->department->name}}</span>
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
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card border border-primary">
            <div class="card-body">
                <div>
                    <div class="row m-5">
                        <div class="col-lg-6">
                            <img src="{{URL::asset('assets/img/add-task.jpg')}}" alt="">

                        </div>
                        <div class="col-lg-6">
                            @livewire('add-task')
                        </div>

                    </div>
                </div>


                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h5 class="modal-title" id="exampleModalLabel">جاري إرسال الإيميل</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5 class="text-center mt-2 text-warning">Loading...Please wait</h5>
                                <div class="loader">

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- row closed -->

@endsection

@section('scripts')

<!--Internal  Perfect-scrollbar js -->
<script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

<!-- Internal Treeview js -->
<script src="{{asset('assets/plugins/treeview/treeview.js')}}"></script>

<!-- Internal Dtree Treeview js -->
<script src="{{asset('assets/plugins/dtree/dtree.js')}}"></script>
<script src="{{asset('assets/plugins/dtree/dtree1.js')}}"></script>
<!-- Sweet-alert js  -->
<!--Internal  Sweet-Alert js-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@endsection