@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Elements</h4><span
								class="text-muted mt-1 tx-13 ms-2 mb-0">/ Toast</span>
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

				<!-- Row -->
				<div class="row">
					<div class="col-xl-12 col-lg-12">
						<div class="card custom-card" id="basic">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Basic Example</h6>
									<p class="text-muted card-sub-title">Toasts are as flexible as you need and have
										very little required markup. At a minimum, we require a single element to
										contain your “toasted” content and strongly encourage a dismiss button.</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<div class="demo-static-toast">
											<div aria-atomic="true" aria-live="assertive" class="toast fade show w-100-res" data-bs-autohide="false"
												role="alert">
												<div class="toast-header">
													<h6 class="tx-14 mg-b-0 mg-r-auto">Notification</h6><small
														class="text-muted">11 mins ago</small>
													<button aria-label="Close" class="ms-2 mb-1 close tx-normal"
														data-bs-dismiss="toast" type="button">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="toast-body">
													Hello, world! This is a toast message.
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card custom-card" id="tarns">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Translucent</h6>
									<p class="text-muted card-sub-title">Toasts are slightly translucent, too, so they
										blend over whatever they might appear over.</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<div class="demo-static-toast">
											<div aria-atomic="true" aria-live="assertive" class="toast fade show w-100-res" data-bs-autohide="false"
												role="alert">
												<div class="toast-header">
													<h6 class="tx-14 mg-b-0 mg-r-auto">Notification</h6><small
														class="text-muted">11 mins ago</small>
													<button aria-label="Close" class="ms-2 mb-1 close tx-normal"
														data-bs-dismiss="toast" type="button">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="toast-body">
													Hello, world! This is a toast message.
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card custom-card" id="stacking">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Stacking</h6>
									<p class="text-muted card-sub-title">When you have multiple toasts, we default to
										vertiaclly stacking them in a readable manner.</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<div class="demo-static-toast">
											<div aria-atomic="true" aria-live="assertive" class="toast fade show w-100-res" data-bs-autohide="false"
												role="alert">
												<div class="toast-header">
													<h6 class="tx-14 mg-b-0 mg-r-auto">Notification</h6><small
														class="text-muted">Just now</small>
													<button aria-label="Close" class="ms-2 mb-1 close"
														data-bs-dismiss="toast" type="button">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="toast-body">
													See? Just like this.
												</div>
											</div>
											<div aria-atomic="true" aria-live="assertive" class="toast fade show w-100-res" data-bs-autohide="false"
												role="alert">
												<div class="toast-header">
													<h6 class="tx-14 mg-b-0 mg-r-auto">Notification</h6><small
														class="text-muted">11 mins ago</small> <button
														aria-label="Close" class="ms-2 mb-1 close tx-normal"
														data-bs-dismiss="toast" type="button"><span
															aria-hidden="true">&times;</span></button>
												</div>
												<div class="toast-body">
													Hello, world! This is a toast message.
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card custom-card" id="place">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Placement</h6>
									<p class="text-muted card-sub-title">Place toasts with custom CSS as you need them.
										The top right is often used for notifications, as is the top middle.</p>
								</div>
								<div class="text-wrap mb-3">
									<div class="example">
										<div class="ht-150 pos-relative mb-3">
											<div class="demo-static-toast pos-absolute t-10">
												<div aria-atomic="true" aria-live="assertive" class="toast fade show w-100-res" data-bs-autohide="false"
													role="alert">
													<div class="toast-header">
														<h6 class="tx-14 mg-b-0 mg-r-auto">Notification</h6><small
															class="text-muted">11 mins ago</small> <button
															aria-label="Close" class="ms-2 mb-1 close tx-normal"
															data-bs-dismiss="toast" type="button"><span
																aria-hidden="true">&times;</span></button>
													</div>
													<div class="toast-body">
														Hello, world! This is a toast message.
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="text-wrap mb-3">
									<div class="example">
										<div class="demo-static-toast d-flex justify-content-center align-items-center">
											<div aria-atomic="true" aria-live="assertive" class="toast fade show w-100-res" data-bs-autohide="false"
												role="alert">
												<div class="toast-header">
													<h6 class="tx-14 mg-b-0 mg-r-auto">Notification</h6><small
														class="text-muted">11 mins ago</small> <button
														aria-label="Close" class="ms-2 mb-1 close tx-normal"
														data-bs-dismiss="toast" type="button"><span
															aria-hidden="true">&times;</span></button>
												</div>
												<div class="toast-body">
													Hello, world! This is a toast message.
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="text-wrap">
									<div class="example">
										<div class="ht-150 pos-relative">
											<div class="demo-static-toast pos-absolute b-10 r-10">
												<div aria-atomic="true" aria-live="assertive" class="toast fade show w-100-res" data-bs-autohide="false"
													role="alert">
													<div class="toast-header">
														<h6 class="tx-14 mg-b-0 mg-r-auto">Notification</h6><small
															class="text-muted">11 mins ago</small> <button
															aria-label="Close" class="ms-2 mb-1 close tx-normal"
															data-bs-dismiss="toast" type="button"><span
																aria-hidden="true">&times;</span></button>
													</div>
													<div class="toast-body">
														Hello, world! This is a toast message.
													</div>
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

				<!-- row -->
				<div class="row">
					<div class="col-xl-12">
						<div class="card custom-card" id="tarns">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Color Toasts</h6>
									<p class="text-muted card-sub-title">Toasts are slightly translucent, too, so they blend over whatever they might appear over.</p>
								</div>
								<div class="text-wrap">
									<div class="example d-flex">
										<div class="row">
											<div class="col-xl-12">
												<div class="row">
													<div class="col-xl-6 col-md-12">
														<div class="demo-static-toast mb-2 mt-2">
															<div aria-atomic="true" aria-live="assertive" class="toast fade show" role="alert" data-bs-autohide="false">
																<div class="toast-header bg-primary text-white p-2"><i class="fe fe-home me-2"></i>
																	<h6 class="tx-14 mg-b-0 mg-r-auto">Notification</h6><small class="me-3">11 mins ago</small>
																	<button aria-label="Close" class="ms-2 mb-1 close tx-normal" data-bs-dismiss="toast" type="button">
																		<span aria-hidden="true">×</span>
																	</button>
																</div>
																<div class="toast-body p-3">
																	Hello, world! This is a toast message.
																</div>
															</div>
														</div>
													</div>
													<div class="col-xl-6 col-md-12">
														<div class="demo-static-toast mt-2 mb-2">
															<div aria-atomic="true" aria-live="assertive" class="toast fade show" role="alert" data-bs-autohide="false">
																<div class="toast-header bg-secondary text-white p-2"><i class="fe fe-compass me-2"></i>
																	<h6 class="tx-14 mg-b-0 mg-r-auto">Notification</h6><small class="me-3">11 mins ago</small>
																	<button aria-label="Close" class="ms-2 mb-1 close tx-normal" data-bs-dismiss="toast" type="button">
																		<span aria-hidden="true">×</span>
																	</button>
																</div>
																<div class="toast-body p-3">
																	Hello, world! This is a toast message.
																</div>
															</div>
														</div>
													</div>
													<div class="col-xl-6 col-md-12">
														<div class="demo-static-toast mt-2 mb-2">
															<div aria-atomic="true" aria-live="assertive" class="toast fade show" role="alert" data-bs-autohide="false">
																<div class="toast-header bg-success text-white p-2"><i class="fe fe-check-circle me-2"></i>
																	<h6 class="tx-14 mg-b-0 mg-r-auto">Notification</h6><small class="me-3">11 mins ago</small>
																	<button aria-label="Close" class="ms-2 mb-1 close tx-normal" data-bs-dismiss="toast" type="button">
																		<span aria-hidden="true">×</span>
																	</button>
																</div>
																<div class="toast-body p-3">
																	Hello, world! This is a toast message.
																</div>
															</div>
														</div>
													</div>
													<div class="col-xl-6 col-md-12">
														<div class="demo-static-toast mt-2 mb-2">
															<div aria-atomic="true" aria-live="assertive" class="toast fade show" role="alert" data-bs-autohide="false">
																<div class="toast-header bg-info text-white p-2"><i class="fe fe-info me-2"></i>
																	<h6 class="tx-14 mg-b-0 mg-r-auto">Notification</h6><small class="me-3">11 mins ago</small>
																	<button aria-label="Close" class="ms-2 mb-1 close tx-normal" data-bs-dismiss="toast" type="button">
																		<span aria-hidden="true">×</span>
																	</button>
																</div>
																<div class="toast-body p-3">
																	Hello, world! This is a toast message.
																</div>
															</div>
														</div>
													</div>
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

		<!-- Internal Input tags js-->
		<script src="{{asset('assets/plugins/inputtags/inputtags.js')}}"></script>
        
        @endsection

