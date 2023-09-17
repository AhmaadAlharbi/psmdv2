@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Advanced ui</h4><span
								class="text-muted mt-1 tx-13 ms-2 mb-0">/ Search</span>
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
					<div class="col-sm-12 col-md-12">
						<div class="card custom-card">
							<div class="card-body pb-0">
								<div class="input-group mb-2">
									<input type="text" class="form-control rounded-3 br-te-0 br-be-0" placeholder="Searching.....">
									<span class="input-group-text bg-transparent p-0 rounded-3 br-ts-0 br-bs-0 overflow-hidden">
										<button class="btn ripple btn-primary" type="button">Search</button>
									</span>
								</div>
							</div>
							<div class="card-body ps-0 pe-0 bd-t-0 pt-0">
								<div class="main-content-body-profile mb-3">
									<nav class="nav main-nav-line">
										<a class="nav-link active" data-bs-toggle="tab" href="#tab1">All</a>
										<a class="nav-link" data-bs-toggle="tab" href="#tab2">Images</a>
										<a class="nav-link" data-bs-toggle="tab" href="#tab3">Books</a>
										<a class="nav-link" data-bs-toggle="tab" href="#tab4">News</a>
										<a class="nav-link" data-bs-toggle="tab" href="#tab5">Videos</a>
									</nav>
								</div>
								<p class="text-muted mb-0 ps-3">About 12,546,90000 results (0.56 Seconds)</p>
							</div>
						</div>
						<div class="card custom-card">
							<div class="card-body">
								<div class="mb-2">
									<a href="javascript:void(0);" class="h5 card-title">Search the new animations</a>
								</div>
								<h6 class="tx-13">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
									dolore eu fugiat nulla pariatur eu fugiat nulla pariatur</h6>
								<p class="mb-0 text-muted">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
									odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi
									nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
									consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut
									labore et dolore magnam aliquam quaerat voluptatem.</p>
							</div>
						</div>
						<div class="card custom-card">
							<div class="card-body">
								<div class="mb-2">
									<a href="javascript:void(0);" class="h5 card-title">Free Boostrap admin templates</a>
								</div>
								<h6 class="tx-13">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
									dolore eu fugiat nulla pariatur eu fugiat nulla pariatur</h6>
								<p class="mb-0 text-muted">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
									odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi
									nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
									consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut
									labore et dolore magnam aliquam quaerat voluptatem.</p>
							</div>
						</div>
						<div class="card custom-card">
							<div class="card-body">
								<div class="mb-2">
									<a href="javascript:void(0);" class="h5 card-title">20+ download the free templates</a>
								</div>
								<h6 class="tx-13">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
									dolore eu fugiat nulla pariatur eu fugiat nulla pariatur</h6>
								<p class="mb-0 text-muted">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
									odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi
									nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
									consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut
									labore et dolore magnam aliquam quaerat voluptatem.</p>
							</div>
						</div>
						<div class="card custom-card">
							<div class="card-body">
								<div class="mb-2">
									<a href="javascript:void(0);" class="h5 card-title">Customizable admin templates</a>
								</div>
								<h6 class="tx-13">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
									dolore eu fugiat nulla pariatur eu fugiat nulla pariatur</h6>
								<p class="mb-0 text-muted">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
									odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi
									nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
									consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut
									labore et dolore magnam aliquam quaerat voluptatem.</p>
							</div>
						</div>
						<div class="card custom-card">
							<div class="card-body">
								<div class="mb-2">
									<a href="javascript:void(0);" class="h5 card-title">HTML Admin templates</a>
								</div>
								<h6 class="tx-13">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
									dolore eu fugiat nulla pariatur eu fugiat nulla pariatur</h6>
								<p class="mb-0 text-muted">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
									odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi
									nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
									consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut
									labore et dolore magnam aliquam quaerat voluptatem.</p>
							</div>
						</div>
						<div class="card custom-card">
							<div class="card-body">
								<div class="mb-2">
									<a href="javascript:void(0);" class="h5 card-title">Best free admin templates</a>
								</div>
								<h6 class="tx-13">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
									dolore eu fugiat nulla pariatur eu fugiat nulla pariatur</h6>
								<p class="mb-0 text-muted">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
									odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi
									nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
									consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut
									labore et dolore magnam aliquam quaerat voluptatem.</p>
							</div>
						</div>
						<div class="text-center search">
							<ul class="pagination">
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
				<!-- row closed -->

            @endsection

        @section('scripts')

		<!-- Internal Select2 js-->
		<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
        
        @endsection

