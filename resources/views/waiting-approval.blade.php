@extends('layouts.app')
@section('content')
<div class="container-fluid bg-white py-5">
    <div class="row ">
        <div class="col-md-12 text-center mt-5">
            <img src="{{asset('assets/img/lock.jpg')}}" style="width:50%;" alt="logo">
            <h3>Waiting for Approval</h3>


            <p class="lead">Please wait until the head department approves your account.</p>
            @if(Auth::user()->role->title === 'Admin')
            <a href="{{route('dashboard.index')}}" class="btn btn-primary">Home Page</a>
            @else
            <a href="{{route('dashboard.userIndex')}}" class="btn btn-primary">Home Page</a>
            @endif
        </div>
    </div>
</div>
@endsection