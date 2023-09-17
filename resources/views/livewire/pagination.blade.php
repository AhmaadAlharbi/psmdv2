@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Elements</h4><span
								class="text-muted mt-1 tx-13 ms-2 mb-0">/ Pagination</span>
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
				<div class="row">
					<div class="col-xl-12 col-lg-12">
						<div class="card">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">BASIC PAGINATION</h6>
									<p class="text-muted card-sub-title">Below are basic pagination navigation.</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<ul class="pagination mb-0">
											<li class="page-item"><a class="page-link" href="javascript:void(0);"><i
														class="icon ion-ios-arrow-back"></i></a></li>
											<li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
											<li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
											<li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
											<li class="page-item"><a class="page-link" href="javascript:void(0);"><i
														class="icon ion-ios-arrow-forward"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="card custom-card">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">PAGINATION FOR DARK BACKGROUND</h6>
									<p class="text-muted card-sub-title">Below are basic pagination navigation for dark
										background.</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<div class="pd-20 bg-gray-800">
											<ul class="pagination pagination-dark mb-0 mg-b-0">
												<li class="page-item"><a class="page-link" href="javascript:void(0);"><i
															class="icon ion-ios-arrow-back"></i></a></li>
												<li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
												<li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
												<li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
												<li class="page-item"><a class="page-link" href="javascript:void(0);"><i
															class="icon ion-ios-arrow-forward"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="card custom-card">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">COLOR VARIANT PAGINATION</h6>
									<p class="text-muted card-sub-title">Below are the available colored pagination
										variants..</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<div class="row row-sm">
											<div class="col-sm-6 col-lg-4">
												<ul class="pagination pagination-primary mg-sm-b-0">
													<li class="page-item"><a class="page-link" href="javascript:void(0);"><i
																class="icon ion-ios-arrow-back"></i></a></li>
													<li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a>
													</li>
													<li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
													<li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
													<li class="page-item"><a class="page-link" href="javascript:void(0);"><i
																class="icon ion-ios-arrow-forward"></i></a></li>
												</ul>
											</div><!-- col-4 -->
											<div class="col-sm-6 col-lg-4 mg-sm-t-0">
												<ul class="pagination pagination-success mb-0">
													<li class="page-item"><a class="page-link" href="javascript:void(0);"><i
																class="icon ion-ios-arrow-back"></i></a></li>
													<li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a>
													</li>
													<li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
													<li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
													<li class="page-item"><a class="page-link" href="javascript:void(0);"><i
																class="icon ion-ios-arrow-forward"></i></a></li>
												</ul>
											</div><!-- col-4 -->
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="card custom-card">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">CIRCLED PAGINATION</h6>
									<p class="text-muted card-sub-title">Below are basic pagination navigation in
										circle.</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<ul class="pagination pagination-circled mb-0">
											<li class="page-item"><a class="page-link" href="javascript:void(0);"><i
														class="icon ion-ios-arrow-back"></i></a></li>
											<li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
											<li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
											<li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
											<li class="page-item"><a class="page-link" href="javascript:void(0);"><i
														class="icon ion-ios-arrow-forward"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->

            @endsection

        @section('scripts')

		<!-- Moment js -->
		<script src="{{asset('assets/plugins/moment/moment.js')}}"></script>

		<!--Internal  Clipboard js-->
		<script src="{{asset('assets/plugins/clipboard/clipboard.min.js')}}"></script>
		<script src="{{asset('assets/plugins/clipboard/clipboard.js')}}"></script>

		<!-- Internal Prism js-->
		<script src="{{asset('assets/plugins/prism/prism.js')}}"></script>
        
        @endsection

