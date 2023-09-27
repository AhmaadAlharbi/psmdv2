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
    <div class="card  box-shadow-0">
        <div class="card-header">
            <h2 class="card-title mb-1">Edit Engineer</h2>
        </div>
        <div class="card-body pt-0">
            <form class="form-horizontal" action="{{route('engineer.update',['id'=>$engineer->id])}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">

                    <p>{{$engineer->user->name}}</p>
                </div>

                <div class="form-group m-0 border-bottom">
                    <div class="form-label mb-4">Select Area</div>
                    <div class="custom-controls-stacked">
                        @foreach($areas as $area)
                        <label class="custom-control form-checkbox custom-control-md">
                            <input type="checkbox" class="custom-control-input" name="area[]" value="{{$area->id}}" {{
                                in_array($area->id, $engineer->areas->pluck('id')->toArray()) ? 'checked' : '' }}>
                            <span class="custom-control-label custom-control-label-md tx-17">{{$area->area}}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <div class="form-group mt-3">
                    <div class="form-label mb-4">Select Shift</div>

                    <div class="row">
                        <div class="col">
                            @foreach($shifts as $shift)
                            <label class="custom-control form-checkbox custom-control-md">
                                <input type="checkbox" class="custom-control-input" name="shift[]"
                                    value="{{$shift->id}}" {{ in_array($shift->id,
                                $engineer->shifts->pluck('id')->toArray()) ? 'checked' : '' }}>
                                <span
                                    class="custom-control-label custom-control-label-md tx-17">{{$shift->shift}}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group mb-0 mt-3 justify-content-end">
                    <div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{route('dashboard.engineersList')}}" class="btn btn-secondary ms-4">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- row closed -->

@endsection

@section('scripts')



@endsection