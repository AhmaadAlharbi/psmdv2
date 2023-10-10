@extends('layouts.custom-app')

@section('styles')

@endsection



@section('content')

<!-- Main-error-wrapper -->
<div class=" main-error-wrapper page-h bg-white">
    <img src="{{asset('assets/img/lock.jpg')}}" class="error-page" alt="error">
    <h2>Unauthorized Access</h2>
    <p class="lead">You do not have permission to access this page.</p><a class="btn btn-outline-danger"
        href="{{route('dashboard.userIndex')}}">Back to Home</a>
</div>
<!-- /Main-error-wrapper -->

@endsection

@section('scripts')



@endsection