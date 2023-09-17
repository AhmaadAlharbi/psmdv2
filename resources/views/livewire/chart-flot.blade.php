@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Charts</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Flot-chart</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pe-1 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon me-2 btn-b"><i class="mdi mdi-filter-variant"></i></button>
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
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuDate" x-placement="bottom-end">
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
				<div class="row row-sm">
					<div class="col-md-6">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Line Chart
								</div>
								<p class="mg-b-20">Basic Charts Of Valex template.</p>
								<div class="ht-200 ht-sm-300" id="flotLine1"></div>
							</div>
						</div>
					</div><!-- col-6 -->
					<div class="col-md-6">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Line Chart
								</div>
								<p class="mg-b-20">Basic Charts Of Valex template.</p>
								<div class="ht-200 ht-sm-300" id="flotLine2"></div>
							</div>
						</div>
					</div><!-- col-6 -->
				</div>
				<!-- /row -->

				<!-- row -->
				<div class="row row-sm">
					<div class="col-md-6">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Area Chart
								</div>
								<p class="mg-b-20">Basic Charts Of Valex template.</p>
								<div class="ht-200 ht-sm-300" id="flotArea1"></div>
							</div>
						</div>
					</div><!-- col-6 -->
					<div class="col-md-6 ">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Area Chart
								</div>
								<p class="mg-b-20">Basic Charts Of Valex template.</p>
								<div class="ht-200 ht-sm-300" id="flotArea2"></div>
							</div>
						</div>
					</div><!-- col-6 -->
				</div>
				<!-- /row -->

				<!-- row -->
				<div class="row row-sm">
					<div class="col-md-6">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Bar Chart
								</div>
								<p class="mg-b-20">Basic Charts Of Valex template.</p>
								<div class="ht-200 ht-sm-300" id="flotBar1"></div>
							</div>
						</div>
					</div><!-- col-6 -->
					<div class="col-md-6">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Bar Chart
								</div>
								<p class="mg-b-20">Basic Charts Of Valex template.</p>
								<div class="ht-200 ht-sm-300" id="flotBar2"></div>
							</div>
						</div>
					</div><!-- col-6 -->
				</div>
				<!-- /row -->

				<!-- row -->
				<div class="row row-sm">
					<div class="col-md-6">
						<div class="card mg-b-20 mg-md-b-0">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Pie Chart
								</div>
								<p class="mg-b-20">Basic Charts Of Valex template.</p>
								<div class="ht-200 ht-sm-300" id="flotPie1"></div>
							</div>
						</div>
					</div><!-- col-6 -->
					<div class="col-md-6">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Pie Chart
								</div>
								<p class="mg-b-20">Basic Charts Of Valex template.</p>
								<div class="ht-200 ht-sm-300" id="flotPie2"></div>
							</div>
						</div>
					</div><!-- col-6 -->
				</div>
				<!-- row closed -->

            @endsection

        @section('scripts')

		<!-- Internal Flot js -->
		<script src="{{asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
		<script src="{{asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
		<script src="{{asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>

		<!-- Internal Chart flot js -->
		<script src="{{asset('assets/js/chart.flot.js')}}"></script>
        
        @endsection

