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
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Setting files</h3>
            <a class="btn btn-outline-success" href="/file-relay-settings/create">Add files</a>
            <a class="btn btn-success" href="{{route('relaySetting.index')}}">Relay Settings Home</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="border-top-0  table table-bordered text-nowrap border-bottom">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">#</th>
                            <th class="border-bottom-0">Station</th>
                            <th class="border-bottom-0">User</th>
                            <th class="border-bottom-0">File name</th>
                            <th class="border-bottom-0">Date</th>
                            <th class="border-bottom-0">actions</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach($relaySettingFiles as $file)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$file->station->SSNAME}}</td>
                            <td>{{$file->user->name}}</td>
                            <td>
                                @php
                                $extension = pathinfo($file->filename, PATHINFO_EXTENSION);
                                @endphp

                                @if ($extension === 'pdf')
                                <img src="{{ asset('assets/img/files/pdf.png') }}" alt="PDF Image">
                                @elseif ($extension === 'xlsx' || $extension === 'xls')
                                <img src="{{ asset('assets/img/files/excel.png') }}" alt="Excel Image">
                                @elseif ($extension === 'docx' || $extension === 'doc')
                                <img src="{{ asset('assets/img/files/doc.png') }}" alt="Word Image">
                                @else
                                <img src="{{ asset('assets/img/files/defaullt_file.png') }}" alt="Default Image">
                                @endif
                                {{$file->filename}}
                            </td>
                            <td>{{$file->created_at}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="File Actions">
                                    {{-- <a href="" class="btn btn-primary">
                                        <i class="fas fa-eye"></i> View
                                    </a> --}}
                                    <a href="{{route('file.download',$file->id)}}" class="btn btn-success">
                                        <i class="fas fa-download"></i> Download
                                    </a>
                                    <a href="{{route('relaySetting.edit',$file->id)}}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    {{-- <button type="button" class="btn btn-info" id="history-button">
                                        <i class="fas fa-history"></i> History
                                    </button> --}}
                                    <form action="{{route('relaySetting.destroy',$file->id)}}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" id="swal-warning">
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
</div>
<!-- row closed -->

@endsection

@section('scripts')

<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('swal-warning').addEventListener('click', function (event) {
            event.preventDefault(); // Prevent the default form submission

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
                    document.getElementById('delete-form').submit();
                }
            });
        });
    });
</script>


@endsection