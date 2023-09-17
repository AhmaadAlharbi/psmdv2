@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Maps</h4><span
								class="text-muted mt-1 tx-13 ms-2 mb-0">/ Vector maps</span>
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
				<div class="row row-sm">
					<div class="col-lg-6">
						<div class="card mg-b-20" id="map">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Vector Map: World
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.
								</p>
								<div class="ht-300" id="vmap"></div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="card mg-b-20" id="map1">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Vector Map: Canada
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.
								</p>
								<div class="ht-300" id="vmap3"></div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="card mg-b-20" id="map2">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Vector Map: USA
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.
								</p>
								<div class="ht-300" id="vmap2"></div>
							</div><!-- col-->
						</div>
					</div>
					<div class="col-lg-6">
						<div class="card mg-b-20" id="map6">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Vector Map: Germany
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.
								</p>
								<div class="ht-300" id="vmap7"></div>
							</div><!-- col-->
						</div>
					</div>
					<div class="col-lg-6">
						<div class="card mg-b-20" id="map7">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Vector Map: Russia
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.
								</p>
								<div class="ht-300" id="vmap8"></div>
							</div><!-- col-->
						</div>
					</div>
					<div class="col-lg-6">
						<div class="card" id="map8">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Vector Map: France
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.
								</p>
								<div class="ht-300" id="vmap9"></div>
							</div><!-- col-->
						</div>
					</div>
				</div>
				<!-- /row -->

            @endsection

        @section('scripts')

		<!--Internal  Vector-maps js -->
		<script src="{{asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
		<script src="{{asset('assets/plugins/jqvmap/maps/jquery.vmap.world.js')}}"></script>
		<script src="{{asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
		<script src="{{asset('assets/plugins/jqvmap/maps/jquery.vmap.canada.js')}}"></script>
		<script src="{{asset('assets/plugins/jqvmap/maps/jquery.vmap.algeria.js')}}"></script>
		<script src="{{asset('assets/plugins/jqvmap/maps/jquery.vmap.argentina.js')}}"></script>
		<script src="{{asset('assets/plugins/jqvmap/maps/jquery.vmap.europe.js')}}"></script>
		<script src="{{asset('assets/plugins/jqvmap/maps/jquery.vmap.germany.js')}}"></script>
		<script src="{{asset('assets/plugins/jqvmap/maps/jquery.vmap.russia.js')}}"></script>
		<script src="{{asset('assets/plugins/jqvmap/maps/jquery.vmap.france.js')}}"></script>
		<script src="{{asset('assets/js/vector-map.js')}}"></script>

		<!-- Internal Vector-sampledata js -->
		<script src="{{asset('assets/js/jquery.vmap.sampledata.js')}}"></script>
        
        @endsection

