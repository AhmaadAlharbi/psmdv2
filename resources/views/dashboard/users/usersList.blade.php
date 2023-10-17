@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">جدول الموظفين </h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
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

<!--Row-->
<div class="row row-sm">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">


        <div class="card">
            <div class="card-header">
                <h3 class="card-title">جدول الموظفين</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table border-top-0 table-bordered text-nowrap border-bottom"
                        id="responsive-datatable">
                        <thead>
                            <tr>
                                <th class="wd-lg-8p"><span>#</span></th>
                                <th class="wd-lg-20p"><span>الاسم</span></th>
                                <th class="wd-lg-20p"><span>القسم</span></th>
                                <th class="wd-lg-20p"><span>Status</span></th>
                                <th class="wd-lg-20p">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=0
                            @endphp
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    {{++$i}}
                                </td>
                                <td> <a
                                        href="{{route('dashboard.engineerProfile',['eng_id'=>$user->id])}}">{{$user->name}}</a>
                                </td>
                                <td>
                                    {{$user->department->name}}
                                </td>

                                <td class="text-center">
                                    <span class="label text-success d-flex ">
                                        <div class="dot-label bg-success mx-3"></div><span class="mt-1">active</span>
                                    </span>
                                </td>

                                <td>
                                    <div class="btn-group ms-2  mt-2 mb-2">
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true"
                                                class="btn ripple btn-primary" data-bs-toggle="dropdown"
                                                type="button"><i class="fe fe-settings"></i><i
                                                    class="fas fa-caret-down ms-1"></i></button>
                                            <div class="dropdown-menu tx-13">

                                                <a href="{{route('engineer.edit',['id'=>$user->id])}}"
                                                    class="dropdown-item">Update User</a>
                                                <a class="dropdown-item"
                                                    href="{{route('user.update',['id'=>$user->id])}}">Assign to
                                                    Engineers</a>
                                                <a class="dropdown-item"
                                                    href="{{route('setAdmin',['id'=>$user->id])}}">Assign to
                                                    Admins</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Delete User</a>

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
    </div><!-- COL END -->
</div>
<!-- row closed  -->

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

@endsection