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
        <a href="{{ route('relay.tasks.deleted-files.index',$task->id) }}" class="btn btn-secondary">
            <i class="fas fa-archive"></i> View Archived Files
        </a>
        <form action="{{route('relay.tasks.update',$task->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="form-label">Task Title</label>
                <input type="text" class="form-control" id="title" value="{{$task->title}}" name="title" required
                    autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Task Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"
                    required>{{$task->description}}</textarea>
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" value="{{$task->user->name}}" id="currentUserName" readonly>
                <div class="row">
                    <div class="col">
                        <input placeholder="select a name" type="text" id="user" name="user" list="users"
                            class="form-control" autocomplete="off" style="display:none;">

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

            <button type="submit" class="btn btn-primary btn-lg">Assign Task</button>
        </form>
        <div>
            <table class="table border-top-0 table-bordered text-nowrap border-bottom" id="basic-datatable">
                <thead>
                    <tr>
                        <th class="wd-15p border-bottom-0">#</th>
                        <th class="wd-15p border-bottom-0">file</th>
                        <th class="wd-20p border-bottom-0">date</th>
                        <th class="wd-15p border-bottom-0">by</th>
                        <th class="wd-10p border-bottom-0">Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($task_files as $file)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{$file->filename}}</td>
                        <td>{{$file->created_at}}</td>
                        <td>{{$file->user->name}}</td>
                        <td>

                            <div class="btn-group" role="group" aria-label="File Actions">
                                <a href="{{route('relay.task.file.download',$file->id)}}" class="btn btn-success">
                                    <i class="fas fa-download"></i> Download
                                </a>
                                <form id="delete-form-{{$file->id}}"
                                    action="{{ route('relay.task.destroy', $file->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger swal-warning"
                                        data-file-id="{{$file->id}}">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- row closed -->

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Iterate through all delete forms and attach Swal event listeners
        document.querySelectorAll('.swal-warning').forEach(function (button) {
            button.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent the default form submission
                var fileId = this.getAttribute('data-file-id');

                Swal.fire({
                    title: 'Confirm Deletion',
                    text: 'Are you sure you want to delete this file? This action cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If the user clicks "Yes, delete it!", submit the form
                        document.getElementById('delete-form-' + fileId).submit();
                    }
                });
            });
        });
    });
</script>
@endsection