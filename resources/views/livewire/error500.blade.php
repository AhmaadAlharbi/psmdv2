@extends('layouts.custom-app')

        @section('styles')

        @endsection

		@section('body')

		<body class="ltr main-body bg-primary-transparent error-page1 error-2">

		@endsection
		
            @section('content')

			<!-- Main-error-wrapper -->
			<div class="main-error-wrapper  page-h ">
				<img src="{{asset('assets/img/media/500.png')}}" class="error-page" alt="error">
				<h2>Oopps. The page you were looking for doesn't exist.</h2>
				<h6>You may have mistyped the address or the page may have moved.</h6><a class="btn btn-outline-danger" href="{{url('index')}}">Back to Home</a>
			</div>
			<!-- /Main-error-wrapper -->


            @endsection

        @section('scripts')


        
        @endsection

