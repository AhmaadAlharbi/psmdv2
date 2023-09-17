@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Elements</h4><span
								class="text-muted mt-1 tx-13 ms-2 mb-0">/ Navigation</span>
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
						<div class="card custom-card" id="basic">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Basic Navigation</h6>
									<p class="text-muted card-sub-title">Below is an example of a basic navigation</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<div class="p-3 bg-light text-dark border">
											<nav class="nav main-nav flex-column flex-md-row">
												<a class="nav-link active" href="javascript:void(0);">Home</a>
												<a class="nav-link" href="javascript:void(0);">About</a>
												<a class="nav-link" href="javascript:void(0);">Pages</a>
												<a class="nav-link" href="javascript:void(0);">Custom</a>
											</nav>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card custom-card" id="vertical">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Vertical Navigation</h6>
									<p class="text-muted card-sub-title">Below is an example of a basic navigation in a
										vertical mode</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<div class="p-3 bg-light text-dark border">
											<nav class="nav main-nav-column">
												<a class="nav-link active" href="javascript:void(0);">Home</a>
												<a class="nav-link" href="javascript:void(0);">About</a>
												<a class="nav-link" href="javascript:void(0);">Pages</a>
												<a class="nav-link" href="javascript:void(0);">Custom</a>
											</nav>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card custom-card" id="pill">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Pills Navigation</h6>
									<p class="text-muted card-sub-title">Below is an example of a pill navigation</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<div class="p-3 bg-light text-dark border">
											<nav class="nav nav-pills flex-column flex-md-row">
												<a class="nav-link active" href="javascript:void(0);">Home</a>
												<a class="nav-link" href="javascript:void(0);">About</a>
												<a class="nav-link" href="javascript:void(0);">Pages</a>
												<a class="nav-link" href="javascript:void(0);">Custom</a>
											</nav>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card custom-card" id="verticallpill">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Vertical Pills Navigation</h6>
									<p class="text-muted card-sub-title">Below is an example of a pill navigation in
										vertical mode</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<div class="p-3 bg-light text-dark border">
											<nav class="nav nav-pills flex-column">
												<a class="nav-link active" href="javascript:void(0);">Home</a>
												<a class="nav-link" href="javascript:void(0);">About</a>
												<a class="nav-link" href="javascript:void(0);">Pages</a>
												<a class="nav-link" href="javascript:void(0);">Custom</a>
											</nav>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card custom-card" id="hori">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Horizontal Alignment</h6>
									<p class="text-muted card-sub-title">A navigation with center and right in which
										left is the default.</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<div class="p-3 bg-light text-dark mb-3">
											<nav class="nav main-nav flex-column flex-md-row justify-content-center">
												<a class="nav-link active" href="javascript:void(0);">Home</a>
												<a class="nav-link" href="javascript:void(0);">About</a>
												<a class="nav-link" href="javascript:void(0);">Pages</a>
												<a class="nav-link" href="javascript:void(0);">Custom</a>
											</nav>
										</div>
										<div class="p-3 bg-light text-dark border">
											<nav class="nav main-nav flex-column flex-md-row justify-content-end">
												<a class="nav-link active" href="javascript:void(0);">Home</a>
												<a class="nav-link" href="javascript:void(0);">About</a>
												<a class="nav-link" href="javascript:void(0);">Pages</a>
												<a class="nav-link" href="javascript:void(0);">Custom</a>
											</nav>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card custom-card" id="colored">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Colored Nav Variations</h6>
									<p class="text-muted card-sub-title">A navigation with colored nav that wrapped the
										navigation.</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<div class="p-3 bg-primary mb-3">
											<nav
												class="nav main-nav main-nav-colored-bg main-nav-dark flex-column flex-md-row">
												<a class="nav-link active" href="javascript:void(0);">Home</a>
												<a class="nav-link" href="javascript:void(0);">About</a>
												<a class="nav-link" href="javascript:void(0);">Pages</a>
												<a class="nav-link" href="javascript:void(0);">Custom</a>
											</nav>
										</div>
										<div class="p-3 bg-secondary">
											<nav
												class="nav main-nav main-nav-colored-bg main-nav-dark flex-column flex-md-row">
												<a class="nav-link active" href="javascript:void(0);">Home</a>
												<a class="nav-link" href="javascript:void(0);">About</a>
												<a class="nav-link" href="javascript:void(0);">Pages</a>
												<a class="nav-link" href="javascript:void(0);">Custom</a>
											</nav>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card custom-card" id="underline">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Underline Navigation</h6>
									<p class="text-muted card-sub-title">Below is a type of navigation that have a line
										at the bottom of active link.</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<div class="p-3 bg-light text-dark border">
											<nav class="nav main-nav-line flex-column flex-md-row">
												<a class="nav-link active" data-bs-toggle="tab" href="javascript:void(0);">Home</a>
												<a class="nav-link" data-bs-toggle="tab" href="javascript:void(0);">About</a>
												<a class="nav-link" data-bs-toggle="tab" href="javascript:void(0);">Pages</a>
												<a class="nav-link" data-bs-toggle="tab" href="javascript:void(0);">Custom</a>
											</nav>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card custom-card" id="tab">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Simple Tab Navigation</h6>
									<p class="text-muted card-sub-title">Below is a tab navigation that have only few
										links.</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<div class="border">
											<div class="bg-gray-100 nav-bg">
												<nav class="nav nav-tabs">
													<a class="nav-link active mb-1 mb-sm-0" data-bs-toggle="tab"
														href="#tabCont1">Home</a>
													<a class="nav-link mb-1 mb-sm-0" data-bs-toggle="tab" href="#tabCont2">About</a>
													<a class="nav-link mb-1 mb-sm-0" data-bs-toggle="tab"
														href="#tabCont3">Contact</a>
												</nav>
											</div>
											<div class="card-body tab-content">
												<div class="tab-pane active show" id="tabCont1">
													Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil
													impedit quo minus id quod maxime placeat facere possimus, omnis
													voluptas assumenda est, omnis dolor repellendus.
												</div>
												<div class="tab-pane" id="tabCont2">
													At vero eos et accusamus et iusto odio dignissimos ducimus qui
													blanditiis praesentium voluptatum deleniti atque corrupti quos
													dolores et quas molestias excepturi sint occaecati cupiditate non
													provident, similique sunt in culpa qui officia deserunt mollitia
													animi, id est laborum et dolorum fuga.
												</div>
												<div class="tab-pane" id="tabCont3">
													Itaque earum rerum hic tenetur a sapiente delectus, ut aut
													reiciendis voluptatibus maiores alias consequatur aut perferendis
													doloribus asperiores repellat.
												</div>
											</div>
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

		<!--Internal  Clipboard js-->
		<script src="{{asset('assets/plugins/clipboard/clipboard.min.js')}}"></script>
		<script src="{{asset('assets/plugins/clipboard/clipboard.js')}}"></script>

		<!-- Internal Prism js-->
		<script src="{{asset('assets/plugins/prism/prism.js')}}"></script>
        
        @endsection

