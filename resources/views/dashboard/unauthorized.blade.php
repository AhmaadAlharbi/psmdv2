@extends('layouts.app')
@section('content')
<div class="container-fluid bg-white py-5">
    <div class="row ">
        <div class="col-md-12 text-center mt-5">
            <img src="{{asset('assets/img/lock.jpg')}}" style="width:50%;" alt="logo">
            <p class="lead">لايمكنك المتابعة لأنك لا تمتلك صلاحية الدخول للصفحة</p>

            <p class="lead">You are not authorized to access this page.</p>
            @if(Auth::user()->role->title === 'Admin')
            <a href="{{route('dashboard.index')}}" class="btn btn-primary">Home Page</a>
            @else
            <a href="{{route('dashboard.userIndex')}}" class="btn btn-primary">Home Page</a>
            @endif
        </div>
    </div>
</div>
@endsection