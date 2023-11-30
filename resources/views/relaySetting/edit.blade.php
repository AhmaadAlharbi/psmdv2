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
        <div class="py-2">
            <form action="{{ route('relaySetting.update', ['id' => $setting->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label for="station_id">Station:</label>
                <!-- Add your station dropdown or input field here -->
                <div>
                    <select class="select-form my-2" name="station_id" id="">
                        <option value="{{$setting->station_id}}"> {{ $setting->station->SSNAME }}</option>
                        @foreach($stations as $station)
                        <option value="{{$station->id}}"> {{ $station->SSNAME }}</option>
                        @endforeach
                    </select>
                </div>
                <label for="new_file" class="text-muted">Upload a New File to Replace the Current File : <span
                        class="text-success fw-bold">
                        (
                        {{$setting->filename}})</span></label>
                <input type="file" name="new_file" class="dropify" data-height="100" />
                <!-- Add other input fields as needed -->
                <button type="submit" class="btn btn-primary btn-lg mt-3" type="submit">Update File</button>
                <a href="{{route('station_settings_file',$setting->station_id)}}" class="btn btn-secondary btn-lg mt-3"
                    type="submit">Back to
                    {{$setting->station->SSNAME}} Page</a>
            </form>
        </div>

    </div>


</div>
<!-- row closed -->

@endsection

@section('scripts')


<!--Internal Fileuploads js-->
<script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
@endsection