@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

               	<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Advanced ui</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Collapse</span>
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
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card custom-card">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Basic Example</h6>
									<p class="text-muted card-sub-title">Click the buttons below to show and hide another element via class changes</p>
								</div>
								<div>
									<a aria-controls="collapseExample" aria-expanded="false" class="btn ripple btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button">Toggle Content</a>
									<div class="collapse" id="collapseExample">
										<div class="mt-4">
											Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-md-12">
						<div class="card custom-card">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Multiple Targets</h6>
									<p class="text-muted card-sub-title">A button or link can show and hide multiple elements by referencing them with a jquery selector in its href or data-bs-target attribute.</p>
								</div>
								<div>
									<div class="btn-list">
										<a aria-controls="multiCollapseExample1" aria-expanded="false" class="btn ripple btn-primary mb-3 mb-xl-0" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button">Toggle First Content</a>
										<a aria-controls="multiCollapseExample2" aria-expanded="false" class="btn ripple btn-secondary mb-3 mb-xl-0" href="#multiCollapseExample2" data-bs-toggle="collapse" role="button">Toggle Second Content</a>
										<a aria-controls="multiCollapseExample1 multiCollapseExample2" aria-expanded="false" class="btn ripple btn-success mb-3 mb-xl-0" href=".multi-collapse" data-bs-toggle="collapse" role="button">Toggle Both Contents</a>
									</div>
									<div class="row row-sm">
										<div class="col">
											<div class="collapse multi-collapse" id="multiCollapseExample1">
												<div class="mt-4">
													Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
												</div>
											</div>
										</div>
										<div class="col">
											<div class="collapse multi-collapse" id="multiCollapseExample2">
												<div class="mt-4">
													Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->

            @endsection

        @section('scripts')

		<!-- Internal Owl Carousel js-->
		<script src="{{asset('assets/plugins/owl-carousel/owl.carousel.js')}}"></script>

		<!---Internal  Multislider js-->
		<script src="{{asset('assets/plugins/multislider/multislider.js')}}"></script>
		<script src="{{asset('assets/js/carousel.js')}}"></script>
        
        @endsection

