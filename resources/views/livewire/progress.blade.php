@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Elements</h4><span
								class="text-muted mt-1 tx-13 ms-2 mb-0">/ Progress</span>
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
						<div class="card" id="progress">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">BASIC PROGRESS</h6>
									<p class="text-muted card-sub-title">A basic progress in all different colors.</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<div class="progress mg-b-20">
											<div class="progress-bar wd-25p" role="progressbar" aria-valuenow="25"
												aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<div class="progress mg-b-20">
											<div class="progress-bar bg-success wd-35p" role="progressbar"
												aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<div class="progress mg-b-20">
											<div class="progress-bar bg-warning wd-50p" role="progressbar"
												aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<div class="progress mg-b-20">
											<div class="progress-bar bg-danger wd-65p" role="progressbar"
												aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<div class="progress">
											<div class="progress-bar bg-indigo wd-75p" role="progressbar"
												aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="card" id="progress2">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">STRIPED PROGRESS</h6>
									<p class="text-muted card-sub-title">A basic progress in all different colors.</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<div class="progress mg-b-20">
											<div class="progress-bar progress-bar-striped wd-25p" role="progressbar"
												aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<div class="progress mg-b-20">
											<div class="progress-bar progress-bar-striped bg-success wd-35p"
												role="progressbar" aria-valuenow="35" aria-valuemin="0"
												aria-valuemax="100"></div>
										</div>
										<div class="progress mg-b-20">
											<div class="progress-bar progress-bar-striped bg-warning wd-50p"
												role="progressbar" aria-valuenow="50" aria-valuemin="0"
												aria-valuemax="100"></div>
										</div>
										<div class="progress mg-b-20">
											<div class="progress-bar progress-bar-striped bg-danger wd-65p"
												role="progressbar" aria-valuenow="65" aria-valuemin="0"
												aria-valuemax="100"></div>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-striped bg-info wd-75p"
												role="progressbar" aria-valuenow="75" aria-valuemin="0"
												aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="card" id="progress6">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">PROGRESSBAR STYLE</h6>
									<p class="text-muted card-sub-title">A basic progress in all different colors.</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<div class="progress progress-style ht-5 mb-4">
											<div class="progress-bar bg-primary wd-80p" role="progressbar"
												aria-valuenow="78" aria-valuemin="0" aria-valuemax="78"></div>
										</div>
										<div class="progress progress-style ht-5 mb-4">
											<div class="progress-bar bg-danger wd-70p" role="progressbar"
												aria-valuenow="78" aria-valuemin="0" aria-valuemax="78"></div>
										</div>
										<div class="progress progress-style ht-5 mb-4">
											<div class="progress-bar bg-success wd-60p" role="progressbar"
												aria-valuenow="78" aria-valuemin="0" aria-valuemax="78"></div>
										</div>
										<div class="progress progress-style ht-5 mb-4">
											<div class="progress-bar bg-warning wd-50p" role="progressbar"
												aria-valuenow="78" aria-valuemin="0" aria-valuemax="78"></div>
										</div>
										<div class="progress progress-style ht-5 mb-4">
											<div class="progress-bar bg-info wd-40p" role="progressbar"
												aria-valuenow="78" aria-valuemin="0" aria-valuemax="78"></div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="card" id="progress3">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Progress Sizes</h6>
									<p class="text-muted card-sub-title">A basic progress in different sizes.</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<span class="tx-uppercase tx-11 d-block mg-b-5">Size Super Extra Small</span>
										<div class="progress mg-b-10">
											<div class="progress-bar ht-2 wd-25p" role="progressbar" aria-valuenow="25"
												aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<div class="progress mg-b-10">
											<div class="progress-bar bg-success ht-2 wd-35p" role="progressbar"
												aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<div class="progress">
											<div class="progress-bar bg-danger ht-2 wd-50p" role="progressbar"
												aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<span class="tx-uppercase tx-11 d-block mg-t-20 mg-b-5">Size Extra Small</span>
										<div class="progress mg-b-10">
											<div class="progress-bar progress-bar-xs wd-25p" role="progressbar"
												aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<div class="progress mg-b-10">
											<div class="progress-bar bg-success progress-bar-xs wd-35p"
												role="progressbar" aria-valuenow="35" aria-valuemin="0"
												aria-valuemax="100"></div>
										</div>
										<div class="progress">
											<div class="progress-bar bg-danger progress-bar-xs wd-50p"
												role="progressbar" aria-valuenow="50" aria-valuemin="0"
												aria-valuemax="100"></div>
										</div>

										<span class="tx-uppercase tx-11 d-block mg-t-20 mg-b-5">Size Small</span>
										<div class="progress mg-b-10">
											<div class="progress-bar progress-bar-sm wd-25p" role="progressbar"
												aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<div class="progress mg-b-10">
											<div class="progress-bar bg-success progress-bar-sm wd-35p"
												role="progressbar" aria-valuenow="35" aria-valuemin="0"
												aria-valuemax="100"></div>
										</div>
										<div class="progress">
											<div class="progress-bar bg-danger progress-bar-sm wd-50p"
												role="progressbar" aria-valuenow="50" aria-valuemin="0"
												aria-valuemax="100"></div>
										</div>

										<span class="tx-uppercase tx-11 d-block mg-t-20 mg-b-5">Size Normal</span>
										<div class="progress mg-b-10">
											<div class="progress-bar wd-25p" role="progressbar" aria-valuenow="25"
												aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<div class="progress mg-b-10">
											<div class="progress-bar bg-success wd-35p" role="progressbar"
												aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<div class="progress">
											<div class="progress-bar bg-danger wd-50p" role="progressbar"
												aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										</div>

										<span class="tx-uppercase tx-11 d-block mg-t-20 mg-b-5">Size Large</span>
										<div class="progress mg-b-10">
											<div class="progress-bar progress-bar-lg wd-25p" role="progressbar"
												aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<div class="progress mg-b-10">
											<div class="progress-bar bg-success progress-bar-lg wd-35p"
												role="progressbar" aria-valuenow="35" aria-valuemin="0"
												aria-valuemax="100"></div>
										</div>
										<div class="progress">
											<div class="progress-bar bg-danger progress-bar-lg wd-50p"
												role="progressbar" aria-valuenow="50" aria-valuemin="0"
												aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="card" id="progress04">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">PROGRESS LABEL</h6>
									<p class="text-muted card-sub-title">A basic progress in different sizes.</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<div class="progress mg-b-10">
											<div class="progress-bar progress-bar-lg wd-50p" role="progressbar"
												aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
										</div>
										<div class="progress mg-b-10">
											<div class="progress-bar progress-bar-lg bg-success wd-60p"
												role="progressbar" aria-valuenow="60" aria-valuemin="0"
												aria-valuemax="100">60%</div>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-lg bg-danger wd-95p"
												role="progressbar" aria-valuenow="95" aria-valuemin="0"
												aria-valuemax="100">95%</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->

            @endsection

        @section('scripts')


        
        @endsection

