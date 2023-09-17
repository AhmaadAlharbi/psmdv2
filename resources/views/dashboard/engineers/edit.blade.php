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
            <h4 class="card-title mb-1">تعديل جدول المهندس </h4>
        </div>
        <div class="card-body pt-0">
            <form class="form-horizontal" action="{{route('engineer.update',['id'=>$engineer->id])}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="inputName" placeholder="Name"
                        value="{{$engineer->user->name}}" disabled>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email"
                        value="{{$engineer->user->email}}" disabled>
                </div>
                <div class="form-group">
                    <select name="area" class="form-control">
                        {{-- <option value="{{$engineer->area }}">{{$engineer->area == 0 ? 'المنطقة الشمالية' : 'المنطقة
                            الجنوبية'}}</option>
                        <option value="{{$engineer->area}}">{{$engineer->area == 1 ? 'المنطقة الجنوبية' : 'المنطقة
                            الشمالية'}}</option> --}}
                        @if($engineer->area == 1)
                        <option value="1">المنطقة الشمالية</option>
                        <option value="2">المنطقة الجنوبية</option>

                        @else
                        <option value="2">المنطقة الجنوبية</option>
                        <option value="1">المنطقة الشمالية</option>

                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <select name="shift" class="form-control">
                        {{-- <option value="{{$engineer->area }}">{{$engineer->area == 0 ? 'المنطقة الشمالية' : 'المنطقة
                            الجنوبية'}}</option>
                        <option value="{{$engineer->area}}">{{$engineer->area == 1 ? 'المنطقة الجنوبية' : 'المنطقة
                            الشمالية'}}</option> --}}
                        @if($engineer->shift == 0)
                        <option value="0">صباحاً</option>
                        <option value="1">مساءً</option>

                        @else
                        <option value="0">صباحاً</option>
                        <option value="1">مساءً</option>

                        @endif
                    </select>
                </div>

                <div class="form-group mb-0 mt-3 justify-content-end">
                    <div>
                        <button type="submit" class="btn btn-primary">تعديل</button>
                        <a href="{{route('dashboard.engineersList')}}" class="btn btn-secondary ms-4">العودة</a>
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