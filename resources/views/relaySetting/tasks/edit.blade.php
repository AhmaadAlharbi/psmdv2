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
<div class="row">
    <div class="container">
        <h1 class="mb-4">Assign Task</h1>

        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Task Title</label>
                <input type="text" class="form-control" id="title" value="{{$task->task->title}}" name="title" required
                    autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Task Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"
                    required>{{$task->task->description}}</textarea>
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" value="{{$task->task->user->name}}" id="currentUserName"
                    readonly>
                <div class="row">
                    <div class="col">
                        <input placeholder="select a name" type="text" id="user" name="user" list="users"
                            class="form-control" required autocomplete="off" style="display:none;">
                        <datalist id="users">
                            @foreach($users as $user)
                            <option value="{{ $user->name }}">
                                @endforeach
                        </datalist>
                    </div>
                    <div class="col-auto">
                        <button type="button" id="changeUserBtn" class="btn btn-primary">Change User</button>
                    </div>
                </div>



            </div>
            <div class="mb3">
                <input type="file" name="files[]">
            </div>

            <button type="submit" class="btn btn-primary">Assign Task</button>
        </form>
    </div>
</div>
<!-- row closed -->

@endsection

@section('scripts')

<script>
    document.getElementById('changeUserBtn').addEventListener('click', function() {
        // Toggle visibility of the input and datalist
        var currentUserNameInput = document.getElementById('currentUserName');
        var userInput = document.getElementById('user');

        if (currentUserNameInput.style.display === 'none') {
            currentUserNameInput.style.display = 'block';
            userInput.style.display = 'none';
        } else {
            currentUserNameInput.style.display = 'none';
            userInput.style.display = 'block';

            // Show datalist by triggering a click event on the input
            userInput.click();
        }
    });
</script>
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>

@endsection