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


                                        <div class="input-group">
                                            <input list="users" oninput="setEngineerId(this.value)" class="form-control"
                                                id="userSelect" name="users" type="search" autocomplete="off" />

                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    onclick="clearInputField()">
                                                    <i class="fas fa-times"></i>
                                                    <!-- Font Awesome "times" icon for clear -->
                                                </button>
                                            </div>
                                        </div>
                                        <datalist id="users">
                                            <option label="Choose one"></option>
                                            @foreach($users as $user)
                                            <option value="{{$user->name}}"></option>
                                            @endforeach
                                        </datalist>

                                        <!-- Hidden input field to store the selected engineer's ID -->
                                        <input type="hidden" id="userId" name="userId" value="">


                                    </div>

                                    <div class="form-group  m-0 border-bottom">
                                        <div class="form-label mb-4">Select Area</div>
                                        <div class="custom-controls-stacked ">
                                            @foreach($areas as $area)
                                            <label class="custom-control form-checkbox custom-control-md">
                                                <input type="checkbox" class="custom-control-input" name="area[]"
                                                    value="{{$area->id}}" wfd-id="id42">
                                                <span
                                                    class="custom-control-label custom-control-label-md tx-17">{{$area->area}}</span>
                                            </label>
                                            @endforeach


                                        </div>
                                    </div>
                                    <div class="form-group mt-3 ">
                                        <div class="row">
                                            <div class="form-label mb-4">Select Shift</div>

                                            <div class="col">
                                                @foreach($shifts as $shift)
                                                <label class="custom-control form-checkbox custom-control-md">
                                                    <input type="checkbox" class="custom-control-input" name="shift[]"
                                                        value="{{$shift->id}}" wfd-id="id42">
                                                    <span
                                                        class="custom-control-label custom-control-label-md  tx-17">{{$shift->shift}}</span>
                                                </label>
                                                @endforeach

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

                <div id="basic-alert">
                    <div>

                        <div class="text-wrap">
                            <div class="example">
                                <div class="panel panel-primary tabs-style-1">
                                    <div class=" tab-menu-heading">
                                        <div class="tabs-menu1">
                                            <!-- Tabs -->
                                            <ul class="nav panel-tabs main-nav-line">
                                                <li class="nav-item"><a href="#tab1" class="nav-link active"
                                                        data-bs-toggle="tab">All Engineer</a></li>
                                                <li class="nav-item"><a href="#tab2" class="nav-link"
                                                        data-bs-toggle="tab">North Engineers</a></li>
                                                <li class="nav-item"><a href="#tab3" class="nav-link"
                                                        data-bs-toggle="tab">South Engineers</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab1">
                                                <div class="table-responsive">
                                                    <table
                                                        class="table border-top-0 table-bordered text-nowrap border-bottom"
                                                        id="responsive-datatable">
                                                        <thead>
                                                            <tr>
                                                                <th class="wd-lg-20p"><span>#</span></th>
                                                                <th class="wd-lg-20p"><span>Name</span></th>
                                                                <th class="wd-lg-20p"><span>Department</span></th>
                                                                {{-- <th class="wd-lg-20p"><span>Status</span></th> --}}
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
                                                                        href="{{route('dashboard.engineerProfile',['eng_id'=>$engineer->user_id])}}">{{$engineer->user->arabic_name}}</a>
                                                                </td>

                                                                {{-- <td class="text-center">
                                                                    <span class="label text-success d-flex ">
                                                                        <div class="dot-label bg-success mx-3"></div>
                                                                        <span class="mt-1">active</span>
                                                                    </span>
                                                                </td> --}}
                                                                <td>{{$engineer->user->department->name}}</td>
                                                                <td>

                                                                    <div class="btn-group">
                                                                        <button type="button"
                                                                            class="btn btn-{{ $engineer->user->role->title == 'Admin' ? 'warning' : 'outline-warning' }} btn-sm dropdown-toggle"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i
                                                                                class="fa {{ $engineer->user->role->title == 'Admin' ? 'fa-user-times' : 'fa-user-plus' }}"></i>
                                                                            Actions
                                                                        </button>
                                                                        <ul class="dropdown-menu">
                                                                            <li>
                                                                                <a href="{{ route('user.update', ['id' => $engineer->user->id]) }}"
                                                                                    class="dropdown-item">
                                                                                    <i
                                                                                        class="fa {{ $engineer->user->role->title == 'Admin' ? 'fa-user-times' : 'fa-user-plus' }}"></i>
                                                                                    {{ $engineer->user->role->title ==
                                                                                    'Admin' ? 'Revoke Admin' : 'Make
                                                                                    Admin' }}
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="{{ route('engineer.edit', ['id' => $engineer->id]) }}"
                                                                                    class="dropdown-item">
                                                                                    <i class="las la-pen"></i> Edit
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="{{ route('engineerList.toggle', ['id' => $engineer->user->id]) }}"
                                                                                    class="dropdown-item">
                                                                                    <i class="las la-trash"></i> Delete
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>



                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            {{--!! north Engineers--}}
                                            <div class="tab-pane" id="tab2">
                                                <div class="table-responsive">
                                                    <table
                                                        class="table border-top-0 table-bordered text-nowrap border-bottom"
                                                        id="north-tasks">
                                                        <thead>
                                                            <tr>
                                                                <th class="wd-lg-20p"><span>#</span></th>
                                                                <th class="wd-lg-20p"><span>Name</span></th>
                                                                <th class="wd-lg-20p"><span>Department</span></th>
                                                                {{-- <th class="wd-lg-20p"><span>Status</span></th> --}}
                                                                <th class="wd-lg-20p">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                            $i=0
                                                            @endphp
                                                            @foreach($northEngineers as $engineer)
                                                            <tr>
                                                                <td>
                                                                    {{++$i}}
                                                                </td>
                                                                <td> <a
                                                                        href="{{route('dashboard.engineerProfile',['eng_id'=>$engineer->user_id])}}">{{$engineer->user->arabic_name}}</a>
                                                                </td>

                                                                {{-- <td class="text-center">
                                                                    <span class="label text-success d-flex ">
                                                                        <div class="dot-label bg-success mx-3"></div>
                                                                        <span class="mt-1">active</span>
                                                                    </span>
                                                                </td> --}}
                                                                <td>{{$engineer->user->department->name}}</td>
                                                                <td>

                                                                    <div class="btn-group">
                                                                        <button type="button"
                                                                            class="btn btn-{{ $engineer->user->role->title == 'Admin' ? 'warning' : 'outline-warning' }} btn-sm dropdown-toggle"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i
                                                                                class="fa {{ $engineer->user->role->title == 'Admin' ? 'fa-user-times' : 'fa-user-plus' }}"></i>
                                                                            Actions
                                                                        </button>
                                                                        <ul class="dropdown-menu">
                                                                            <li>
                                                                                <a href="{{ route('user.update', ['id' => $engineer->user->id]) }}"
                                                                                    class="dropdown-item">
                                                                                    <i
                                                                                        class="fa {{ $engineer->user->role->title == 'Admin' ? 'fa-user-times' : 'fa-user-plus' }}"></i>
                                                                                    {{ $engineer->user->role->title ==
                                                                                    'Admin' ? 'Revoke Admin' : 'Make
                                                                                    Admin' }}
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="{{ route('engineer.edit', ['id' => $engineer->id]) }}"
                                                                                    class="dropdown-item">
                                                                                    <i class="las la-pen"></i> Edit
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="{{ route('engineerList.toggle', ['id' => $engineer->user->id]) }}"
                                                                                    class="dropdown-item">
                                                                                    <i class="las la-trash"></i> Delete
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>



                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            {{--!! south Engineers --}}
                                            <div class="tab-pane" id="tab3">
                                                <div class="table-responsive">
                                                    <table
                                                        class="table border-top-0 table-bordered text-nowrap border-bottom"
                                                        id="south-tasks">
                                                        <thead>
                                                            <tr>
                                                                <th class="wd-lg-20p"><span>#</span></th>
                                                                <th class="wd-lg-20p"><span>Name</span></th>
                                                                <th class="wd-lg-20p"><span>Department</span></th>
                                                                {{-- <th class="wd-lg-20p"><span>Status</span></th> --}}
                                                                <th class="wd-lg-20p">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                            $i=0
                                                            @endphp
                                                            @foreach($southEngineers as $engineer)
                                                            <tr>
                                                                <td>
                                                                    {{++$i}}
                                                                </td>
                                                                <td> <a
                                                                        href="{{route('dashboard.engineerProfile',['eng_id'=>$engineer->user_id])}}">{{$engineer->user->arabic_name}}</a>
                                                                </td>

                                                                {{-- <td class="text-center">
                                                                    <span class="label text-success d-flex ">
                                                                        <div class="dot-label bg-success mx-3"></div>
                                                                        <span class="mt-1">active</span>
                                                                    </span>
                                                                </td> --}}
                                                                <td>{{$engineer->user->department->name}}</td>
                                                                <td>

                                                                    <div class="btn-group">
                                                                        <button type="button"
                                                                            class="btn btn-{{ $engineer->user->role->title == 'Admin' ? 'warning' : 'outline-warning' }} btn-sm dropdown-toggle"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i
                                                                                class="fa {{ $engineer->user->role->title == 'Admin' ? 'fa-user-times' : 'fa-user-plus' }}"></i>
                                                                            Actions
                                                                        </button>
                                                                        <ul class="dropdown-menu">
                                                                            <li>
                                                                                <a href="{{ route('user.update', ['id' => $engineer->user->id]) }}"
                                                                                    class="dropdown-item">
                                                                                    <i
                                                                                        class="fa {{ $engineer->user->role->title == 'Admin' ? 'fa-user-times' : 'fa-user-plus' }}"></i>
                                                                                    {{ $engineer->user->role->title ==
                                                                                    'Admin' ? 'Revoke Admin' : 'Make
                                                                                    Admin' }}
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="{{ route('engineer.edit', ['id' => $engineer->id]) }}"
                                                                                    class="dropdown-item">
                                                                                    <i class="las la-pen"></i> Edit
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="{{ route('engineerList.toggle', ['id' => $engineer->user->id]) }}"
                                                                                    class="dropdown-item">
                                                                                    <i class="las la-trash"></i> Delete
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>



                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- COL END -->
</div>
<!-- row closed  -->

@endsection

@section('scripts')

<script>
    function setEngineerId(selectedUserName) {
        // Get the selected user's ID based on the selected user name
        const usersList = document.getElementById('users');
        const selectedOption = Array.from(usersList.options).find(option => option.value === selectedUserName);

        // Update the hidden input with the selected user's ID
        if (selectedOption) {
            const userId = selectedOption.getAttribute('data-user-id');
            document.getElementById('userId').value = userId;
        } else {
            document.getElementById('userId').value = ''; // Clear the ID if no option is selected
        }
    }
</script>
<script>
    function clearInputField() {
        document.getElementById('userSelect').value = '';
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
    const userMapping = {
        @foreach($users as $user)
            '{{$user->name}}': '{{$user->id}}',
        @endforeach
    };

    function setEngineerId(selectedUserName) {
        const userId = userMapping[selectedUserName] || '';
        document.getElementById('userId').value = userId;
    }
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