@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Elements</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Scrollspy</span>
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

				<!-- ROW-1 OPEN -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="card-title">
									<h3 class="card-title">Basic Navbar Scrollspy</h3>
								</div>
							</div>
							<div class="card-body pt-0">
								<nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
									<a class="navbar-brand" href="javascript:void(0)">Navbar</a>
									<ul class="nav nav-pills">
										<li class="nav-item">
											<a class="nav-link active" href="#scrollspyHeading1">First</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#scrollspyHeading2">Second</a>
										</li>
										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0)" role="button" aria-expanded="false">Dropdown</a>
											<ul class="dropdown-menu dropdown-menu-end">
												<li><a class="dropdown-item" href="#scrollspyHeading3">Third</a></li>
												<li><a class="dropdown-item" href="#scrollspyHeading4">Fourth</a></li>
												<li>
													<hr class="dropdown-divider">
												</li>
												<li><a class="dropdown-item" href="#scrollspyHeading5">Fifth</a></li>
											</ul>
										</li>
									</ul>
								</nav>
								<div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
									<div id="scrollspyHeading1">
										<h4 class="fs-16 fw-semibold">First heading</h4>
										<p class="fs-14">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of
											letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
									</div>
									<div id="scrollspyHeading2">
										<h4 class="fs-16 fw-semibold">Second heading</h4>
										<p class="fs-14">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of
											letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
									</div>
									<div id="scrollspyHeading3">
										<h4 class="fs-16 fw-semibold">Third heading</h4>
										<p class="fs-14">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of
											letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
									</div>
									<div id="scrollspyHeading4">
										<h4 class="fs-16 fw-semibold">Fourth heading</h4>
										<p class="fs-14">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of
											letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
									</div>
									<div id="scrollspyHeading5">
										<h4 class="fs-16 fw-semibold">Fifth heading</h4>
										<p class="fs-14">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of
											letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- ROW-2 OPEN -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="card-title">
									<h3 class="card-title">Nested nav Scrollspy</h3>
								</div>
							</div>
							<div class="card-body pt-0">
								<div class="row g-0">
									<div class="col-lg-4 col-md-12 p-0">
										<nav id="navbar-example3" class="navbar navbar-light bg-light flex-column align-items-stretch p-3 br-ts-5 br-bs-5">
											<a class="navbar-brand" href="javascript:void(0)">Navbar</a>
											<nav class="nav nav-pills flex-column">
												<a class="nav-link active" href="#item-1">Item 1</a>
												<nav class="nav nav-pills flex-column">
													<a class="nav-link ms-3 my-1" href="#item-1-1">Item 1-1</a>
													<a class="nav-link ms-3 my-1" href="#item-1-2">Item 1-2</a>
												</nav>
												<a class="nav-link" href="#item-2">Item 2</a>
												<a class="nav-link" href="#item-3">Item 3</a>
												<nav class="nav nav-pills flex-column">
													<a class="nav-link ms-3 my-1" href="#item-3-1">Item 3-1</a>
													<a class="nav-link ms-3 my-1" href="#item-3-2">Item 3-2</a>
												</nav>
											</nav>
										</nav>
									</div>
									<div class="col-lg-8 col-md-12 p-0">
										<div data-bs-spy="scroll" data-bs-target="#navbar-example3" class="scrollspy-example-2" data-bs-offset="0" tabindex="0">
											<div id="item-1">
												<h4 class="fs-16 fw-semibold">Item 1</h4>
												<p class="fs-14">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution
													of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
											</div>
											<div id="item-1-1">
												<h4 class="fs-16 fw-semibold">Item 1-1</h4>
												<p class="fs-14">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution
													of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
											</div>
											<div id="item-1-2">
												<h4 class="fs-16 fw-semibold">item 1-2</h4>
												<p class="fs-14">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution
													of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
											</div>
											<div id="item-2">
												<h4 class="fs-16 fw-semibold">Item 2</h4>
												<p class="fs-14">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution
													of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
											</div>
											<div id="item-3">
												<h4 class="fs-16 fw-semibold">Item 3</h4>
												<p class="fs-14">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution
													of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
											</div>
											<div id="item-3-1">
												<h4 class="fs-16 fw-semibold">Item 3-1</h4>
												<p class="fs-14">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution
													of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
											</div>
											<div id="item-3-2">
												<h4 class="fs-16 fw-semibold">Item 3-2</h4>
												<p class="fs-14">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution
													of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- ROW-2 END -->

            @endsection

        @section('scripts')


        
        @endsection

