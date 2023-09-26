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

</div>
<!-- breadcrumb -->

<!--Row-->
<div class="row row-sm">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">


        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Engineers List</h3>

                <a class="btn ripple btn-teal" data-bs-target="#select2modal" data-bs-toggle="modal" href="">Add
                    Engineer</a>
                <!-- Basic modal -->
                <div class="modal" id="select2modal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content modal-content-demo">
                            <div class="modal-header">
                                <h6 class="modal-title">Add Engineers</h6><button aria-label="Close" class="close"
                                    data-bs-dismiss="modal" type="button"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('addEngineer')}}" method="POST">
                                    @csrf
                                    <div>
                                        <h6>Add Engineer</h6>
                                        <!-- Select2 -->
                                        <!-- Select dropdown for engineers -->
                                        <select id="usersSelect"
                                            class="form-control select2-show-search select2-dropdown"
                                            onchange="setEngineerId()">
                                            <option label="Choose one">Choose one</option>
                                            @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>

                                        <!-- Hidden input field to store the selected engineer's ID -->
                                        <input type="text" id="userId" name="userId" value="">

                                    </div>

                                    <div class="form-group  m-0 border-bottom">
                                        <div class="form-label mb-4">Select Area</div>
                                        <div class="custom-controls-stacked ">
                                            <label class="custom-control form-checkbox custom-control-md">
                                                <input type="checkbox" class="custom-control-input" name="area[]"
                                                    value="1" wfd-id="id42">
                                                <span class="custom-control-label custom-control-label-md  tx-17">North
                                                    Area</span>
                                            </label>
                                            <label class="custom-control form-checkbox custom-control-md">
                                                <input type="checkbox" class="custom-control-input" name="area[]"
                                                    value="2" wfd-id="id43">
                                                <span class="custom-control-label custom-control-label-md  tx-17">South
                                                    Area
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3 ">
                                        <div class="row">
                                            <div class="col">
                                                <label class="custom-control form-checkbox custom-control-md">
                                                    <input type="checkbox" class="custom-control-input" name="shift[]"
                                                        value="0" wfd-id="id42">
                                                    <span
                                                        class="custom-control-label custom-control-label-md  tx-17">Day</span>
                                                </label>
                                            </div>
                                            <div class="col">
                                                <label class="custom-control form-checkbox custom-control-md">
                                                    <input type="checkbox" class="custom-control-input" name="shift[]"
                                                        value="1" wfd-id="id42">
                                                    <span
                                                        class="custom-control-label custom-control-label-md  tx-17">Night
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Select2 -->
                            </div>
                            <div class="modal-footer">
                                <button class="btn ripple btn-primary" type="submit">Save changes</button>
                                <button class="btn ripple btn-secondary" data-bs-dismiss="modal"
                                    type="button">Close</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
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
<script>
    function setEngineerId() {
    // Get the selected engineer ID
    const userId = document.getElementById('usersSelect').value;

    // Set the selected engineer ID to the hidden input field
    document.getElementById('userId').value = userId;
}

</script>
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
<script>
    // Get the selected engineer ID
    const userId = document.getElementById('usersSelect').value;
  
    // Set the selected engineer ID to the input text
    document.getElementById('userId').value = userId;
</script>
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
<!-- Internal Select2 js-->
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

<!-- Internal Modal js-->
<script src="{{asset('assets/js/modal.js')}}"></script>

@endsection