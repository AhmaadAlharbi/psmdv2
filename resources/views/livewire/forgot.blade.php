@extends('layouts.custom-app')

@section('styles')

@endsection

@section('body')

<body class="ltr main-body error-page1 error-3">

	@endsection

	@section('content')

	<div class="main-container container-fluid">
		<div class="row no-gutter">
			<!-- The image half -->
			<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
				<div class="row wd-100p mx-auto text-center">
					<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
						<img src="{{asset('assets/img/forgotPassword.svg')}}"
							class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
					</div>
				</div>
			</div>
			<!-- The content half -->
			<div class="col-md-6 col-lg-6 col-xl-5 bg-white py-4">
				<div class="login d-flex align-items-center py-2">
					<!-- Demo content-->
					<div class="container p-0">
						<div class="row">
							<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
								<div class="mb-5 d-flex">
									<h1 class="main-logo1 ms-1 me-0 my-auto tx-28"> Transsmison Electrical Networks</h1>
								</div>
								<div class="main-card-signin d-md-flex">
									<div class="wd-100p">
										<div class="main-signin-header">
											<x-auth-session-status class="text-success" :status="session('status')" />

											<h2>Forgot Password!</h2>
											<h4>Please Enter Your Email</h4>
											<form method="POST" action="{{ route('password.email') }}">
												@csrf
												<div class="form-group">
													<!-- Email Address -->
													<div>
														<x-input-label for="email" :value="__('Email')" />
														<x-text-input id="email" class="form-control" type="email"
															name="email" :value="old('email')" required autofocus />
														<x-input-error :messages="$errors->get('email')" class="mt-2"
															class="text-danger" />
													</div>
												</div>
												<button class="btn btn-main-primary btn-block">Send</button>
											</form>
										</div>
										<div class="main-signup-footer mg-t-20">
											<p>Forget it, <a href="/"> Send me back</a> to the sign in
												screen.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- End -->
				</div>
			</div><!-- End -->
		</div>
	</div>

	@endsection

	@section('scripts')

	<!--- JQuery sparkline js --->
	<script src="{{asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

	@endsection