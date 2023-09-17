@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Advanced ui</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                Userlist</span>
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

<!--Row-->
<div class="row row-sm">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">


        <div class="card">
            <div class="card-header">
                <h3 class="card-title">جدول المهندسين</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table border-top-0 table-bordered text-nowrap border-bottom"
                        id="responsive-datatable">
                        <thead>
                            <tr>
                                <th class="wd-lg-8p"><span>#</span></th>
                                <th class="wd-lg-20p"><span>الاسم</span></th>
                                <th class="wd-lg-20p"><span>المنطقة</span></th>
                                <th class="wd-lg-20p"><span>الفترة</span></th>
                                <th class="wd-lg-20p"><span>Status</span></th>
                                <th class="wd-lg-20p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=0
                            @endphp
                            @foreach($engineers as $engineer)
                            <tr>
                                <td>
                                    {{++$i}}
                                </td>
                                <td> <a
                                        href="{{route('dashboard.engineerProfile',['eng_id'=>$engineer->user_id])}}">{{$engineer->user->name}}</a>
                                </td>
                                <td>
                                    {{$engineer->area == 1 ? ' المنطقة الشمالية' : 'المنطقة الجنوبية'}}
                                </td>
                                <td>
                                    {{$engineer->shift == 0 ? ' صباحاً ' : 'مساءً'}}

                                </td>
                                <td class="text-center">
                                    <span class="label text-success d-flex ">
                                        <div class="dot-label bg-success mx-3"></div><span class="mt-1">active</span>
                                    </span>
                                </td>

                                <td>

                                    <a href="{{route('engineer.edit',['id'=>$engineer->id])}} "
                                        class="btn btn-sm btn-info btn-b" data-bs-toggle="tooltip" title=""
                                        data-bs-original-title="edit">
                                        <i class="las la-pen"></i>
                                    </a>
                                    @if($engineer->user->role->title == 'Admin')

                                    <a href="{{route('user.update',['id'=>$engineer->user->id])}} "
                                        class="btn btn-sm btn-warning " data-bs-toggle="tooltip" title=""
                                        data-bs-original-title="delete admin">
                                        <i class="fa fa-user-times"></i>

                                    </a>
                                    @else
                                    <a href="{{route('user.update',['id'=>$engineer->user->id])}} "
                                        class="btn btn-sm btn-outline-warning " data-bs-toggle="tooltip" title=""
                                        data-bs-original-title="set admin">
                                        <i class="fa fa-user-plus"></i>

                                    </a>

                                    @endif

                                    <a href="{{route('engineerList.toggle',['id'=>$engineer->user->id])}}"
                                        class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title=""
                                        data-bs-original-title="delete">
                                        <i class="las la-trash"></i>

                                    </a>

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