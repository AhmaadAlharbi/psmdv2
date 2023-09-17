@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Advanced ui</h4><span
								class="text-muted mt-1 tx-13 ms-2 mb-0">/ Rating</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pe-1 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon me-2 btn-b"><i
									class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pe-1 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon me-2"><i
									class="mdi mdi-star"></i></button>
						</div>
						<div class="pe-1 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon me-2"><i
									class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
									id="dropdownMenuDate" data-bs-toggle="dropdown" aria-haspopup="true"
									aria-expanded="false">
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
				<div class="row row-cards">
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<div class="card-title">
									Star Rating
								</div>
							</div>
							<div class="card-body">
								<div class="rating-stars block" id="rating-1" data-stars="2">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<div class="card-title">
									Heart Rating
								</div>
							</div>
							<div class="card-body">
								<div class="rating-stars block" id="rating-2" data-stars="2">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<div class="card-title">
									Multi Star Rating
								</div>
							</div>
							<div class="card-body">
								<div class="rating-stars block" id="rating-3" data-stars="2">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<div class="card-title">
									Multi Heart Rating
								</div>
							</div>
							<div class="card-body">
								<div class="rating-stars block" id="rating-6" data-stars="2">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<div class="card-title">
									Multi circle Rating
								</div>
							</div>
							<div class="card-body">
								<div class="rating-stars block" id="rating-4" data-stars="2">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<div class="card-title">
									Thumbs-up Rating
								</div>
							</div>
							<div class="card-body">
								<div class="rating-stars block" id="rating-5" data-stars="2">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row row-cards">
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<div class="card-title">
									Basic Star Rating
								</div>
							</div>
							<div class="card-body">
								<div class="rating-stars block my-rating">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<div class="card-title">
									Rounded star Rating
								</div>
							</div>
							<div class="card-body">
								<div class="rating-stars block my-rating-4" data-stars="2">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<div class="card-title">
										gradients Rating
								</div>
							</div>
							<div class="card-body">
								<div class="rating-stars block my-rating-5" data-stars="2">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<div class="card-title">
									Execute callback when rating
								</div>
							</div>
							<div class="card-body">
								<div class="rating-stars block my-rating-6"   data-stars="2">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<div class="card-title">
									read only mode
								</div>
							</div>
							<div class="card-body">
								<div class="rating-stars block my-rating-7"  data-stars="2">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<div class="card-title">
									Use fullstars
								</div>
							</div>
							<div class="card-body">
								<div class="rating-stars block my-rating-8" data-stars="2">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<div class="card-title">
									On hover event
								</div>
							</div>
							<div class="card-body">
								<div class="rating-stars block my-rating-9" data-stars="2">
								</div>
								<span class="live-rating"></span>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<div class="card-title">
									rating level colors
								</div>
							</div>
							<div class="card-body">
								<div class="rating-stars block my-rating-10" data-stars="2">
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->

            @endsection

        @section('scripts')

		<!-- Internal Select2 js-->
		<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

		<!-- Star Rating Js-->
		<script src="{{asset('assets/plugins/rating/jquery-rate-picker.js')}}"></script>
		<script src="{{asset('assets/plugins/rating/rating-picker.js')}}"></script>

		<!-- Star Rating-1 Js-->
		<script src="{{asset('assets/plugins/ratings-2/jquery.star-rating.js')}}"></script>
		<script src="{{asset('assets/plugins/ratings-2/star-rating.js')}}"></script>
	
        @endsection

