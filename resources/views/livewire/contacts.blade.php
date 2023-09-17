@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Apps</h4><span
								class="text-muted mt-1 tx-13 ms-2 mb-0">/ Contacts</span>
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
					<div class="col-sm-12 col-lg-5 col-xl-4">
						<div class="card custom-card">
							<div class="">
								<div class="main-content-contacts pt-0">
									<div class="main-content-left main-content-left-contacts">
										<nav class="nav main-nav-line main-nav-line-chat  ps-3">
											<a class="nav-link active" data-bs-toggle="tab" href="">All Contacts</a>
											<a class="nav-link" data-bs-toggle="tab" href="">Favorites</a>
										</nav>
										<div class="main-contacts-list" id="mainContactList">
											<div class="main-contact-label">
												A
											</div>
											<div class="main-contact-item selected">
												<div class="main-img-user online"><img alt="avatar"
														src="{{asset('assets/img/faces/2.jpg')}}"></div>
												<div class="main-contact-body">
													<h6>Abigail Johnson</h6><span class="phone">+1-234-567-890</span>
												</div>
												<a class="main-contact-star" href="#">
													<i class="fe fe-star text-warning me-1"></i>
													<i class="fe fe-edit-2 me-1"></i>
													<i class="fe fe-more-vertical"></i>
												</a>
											</div>
											<div class="main-contact-item">
												<div class="main-img-user"><img alt="avatar"
														src="{{asset('assets/img/faces/3.jpg')}}"></div>
												<div class="main-contact-body">
													<h6>Archie Cantones</h6><span>archie@tones.com</span>
												</div>
												<a class="main-contact-star" href="#">
													<i class="fe fe-star me-1"></i>
													<i class="fe fe-edit-2 me-1"></i>
													<i class="fe fe-more-vertical"></i>
												</a>
											</div>
											<div class="main-contact-item">
												<div class="main-avatar online">
													A
												</div>
												<div class="main-contact-body">
													<h6>Allan Rey Palban</h6><span>allanr@palban.com</span>
												</div>
												<a class="main-contact-star" href="#">
													<i class="fe fe-star me-1"></i>
													<i class="fe fe-edit-2 me-1"></i>
													<i class="fe fe-more-vertical"></i>
												</a>
											</div>
											<div class="main-contact-item">
												<div class="main-avatar bg-secondary">
													A
												</div>
												<div class="main-contact-body">
													<h6>Aileen Mante</h6><span>+1-234-567-890</span>
												</div>
												<a class="main-contact-star" href="#">
													<i class="fe fe-star me-1"></i>
													<i class="fe fe-edit-2 me-1"></i>
													<i class="fe fe-more-vertical"></i>
												</a>
											</div>
											<div class="main-contact-label">
												B
											</div>
											<div class="main-contact-item">
												<div class="main-img-user"><img alt="avatar"
														src="{{asset('assets/img/faces/4.jpg')}}"></div>
												<div class="main-contact-body">
													<h6>Brandon Dilao</h6><span>+1-234-567-890</span>
												</div>
												<a class="main-contact-star" href="#">
													<i class="fe fe-star me-1"></i>
													<i class="fe fe-edit-2 me-1"></i>
													<i class="fe fe-more-vertical"></i>
												</a>
											</div>
											<div class="main-contact-item">
												<div class="main-img-user online"><img alt="avatar"
														src="{{asset('assets/img/faces/5.jpg')}}"></div>
												<div class="main-contact-body">
													<h6>Britney Labares</h6><span>+1-234-567-890</span>
												</div>
												<a class="main-contact-star" href="#">
													<i class="fe fe-star me-1"></i>
													<i class="fe fe-edit-2 me-1"></i>
													<i class="fe fe-more-vertical"></i>
												</a>
											</div>
											<div class="main-contact-item">
												<div class="main-avatar bg-danger">
													B
												</div>
												<div class="main-contact-body">
													<h6>Brateyley Cruz</h6><span>+1-234-567-890</span>
												</div>
												<a class="main-contact-star" href="#">
													<i class="fe fe-star me-1"></i>
													<i class="fe fe-edit-2 me-1"></i>
													<i class="fe fe-more-vertical"></i>
												</a>
											</div>
											<div class="main-contact-label">
												C
											</div>
											<div class="main-contact-item">
												<div class="main-img-user"><img alt="avatar"
														src="{{asset('assets/img/faces/6.jpg')}}"></div>
												<div class="main-contact-body">
													<h6>Camille Audrey</h6><span>+1-234-567-890</span>
												</div>
												<a class="main-contact-star" href="#">
													<i class="fe fe-star me-1"></i>
													<i class="fe fe-edit-2 me-1"></i>
													<i class="fe fe-more-vertical"></i>
												</a>
											</div>
											<div class="main-contact-item">
												<div class="main-img-user online"><img alt="avatar"
														src="{{asset('assets/img/faces/7.jpg')}}"></div>
												<div class="main-contact-body">
													<h6>Christian Lerio</h6><span>+1-234-567-890</span>
												</div>
												<a class="main-contact-star" href="#">
													<i class="fe fe-star me-1"></i>
													<i class="fe fe-edit-2 me-1"></i>
													<i class="fe fe-more-vertical"></i>
												</a>
											</div>
											<div class="main-contact-item">
												<div class="main-img-user online"><img alt="avatar"
														src="{{asset('assets/img/faces/8.jpg')}}"></div>
												<div class="main-contact-body">
													<h6>Christopher Segovia</h6><span>+1-234-567-890</span>
												</div>
												<a class="main-contact-star" href="#">
													<i class="fe fe-star me-1"></i>
													<i class="fe fe-edit-2 me-1"></i>
													<i class="fe fe-more-vertical"></i>
												</a>
											</div>
											<div class="main-contact-label">
												D
											</div>
											<div class="main-contact-item">
												<div class="main-img-user online"><img alt="avatar"
														src="{{asset('assets/img/faces/9.jpg')}}"></div>
												<div class="main-contact-body">
													<h6>Darius Clayton</h6><span>+1-234-567-890</span>
												</div>
												<a class="main-contact-star" href="#">
													<i class="fe fe-star me-1"></i>
													<i class="fe fe-edit-2 me-1"></i>
													<i class="fe fe-more-vertical"></i>
												</a>
											</div>
											<div class="main-contact-item">
												<div class="main-img-user"><img alt="avatar"
														src="{{asset('assets/img/faces/10.jpg')}}"></div>
												<div class="main-contact-body">
													<h6>Dyanne Aceron</h6><span>+1-234-567-890</span>
												</div>
												<a class="main-contact-star" href="#">
													<i class="fe fe-star me-1"></i>
													<i class="fe fe-edit-2 me-1"></i>
													<i class="fe fe-more-vertical"></i>
												</a>
											</div>
											<div class="main-contact-item">
												<div class="main-img-user online"><img alt="avatar"
														src="{{asset('assets/img/faces/11.jpg')}}"></div>
												<div class="main-contact-body">
													<h6>Divina Gracia</h6><span>+1-234-567-890</span>
												</div>
												<a class="main-contact-star" href="#">
													<i class="fe fe-star me-1"></i>
													<i class="fe fe-edit-2 me-1"></i>
													<i class="fe fe-more-vertical"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-lg-7 col-xl-8">
						<div class="">
							<a class="main-header-arrow" href="" id="ChatBodyHide"><i
									class="icon ion-md-arrow-back"></i></a>
							<div class="main-content-body main-content-body-contacts card custom-card">
								<div class="main-contact-info-header pt-3">
									<div class="media">
										<div class="main-img-user">
											<img alt="avatar" src="{{asset('assets/img/faces/6.jpg')}}"> <a href=""><i
													class="fe fe-camera"></i></a>
										</div>
										<div class="media-body">
											<h5>Petey Cruiser</h5>
											<p>Web Designer</p>
											<nav class="contact-info">
												<a href="javascript:void(0);" class="contact-icon border tx-inverse"
													data-bs-toggle="tooltip" title="Call"><i
														class="fe fe-phone"></i></a>
												<a href="javascript:void(0);" class="contact-icon border tx-inverse"
													data-bs-toggle="tooltip" title="Video"><i
														class="fe fe-video"></i></a>
												<a href="javascript:void(0);" class="contact-icon border tx-inverse"
													data-bs-toggle="tooltip" title="message"><i
														class="fe fe-message-square"></i></a>
												<a href="javascript:void(0);" class="contact-icon border tx-inverse"
													data-bs-toggle="tooltip" title="Add to Group"><i
														class="fe fe-user-plus"></i></a>
												<a href="javascript:void(0);" class="contact-icon border tx-inverse"
													data-bs-toggle="tooltip" title="Block"><i
														class="fe fe-slash"></i></a>
											</nav>
										</div>
									</div>
									<div class="main-contact-action btn-list pt-3">
										<a href="javascript:void(0);" class="btn ripple btn-primary text-white btn-icon"
											data-bs-placement="top" data-bs-toggle="tooltip" title="Edit Profile"><i
												class="fe fe-edit"></i></a>
										<a href="javascript:void(0);" class="btn ripple btn-secondary text-white btn-icon"
											data-bs-placement="top" data-bs-toggle="tooltip" title="Delete Profile"><i
												class="fe fe-trash-2"></i></a>
									</div>
								</div>
								<div class="main-contact-info-body p-4">
									<div>
										<h6>Biography</h6>
										<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
											doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
											veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim
											ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
											consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
										<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
											doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
											veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim
											ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
											consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
									</div>
									<div class="media-list pb-0">
										<div class="media">
											<div class="media-body">
												<div>
													<label>Work</label> <span class="tx-medium">+1 (234) 567 8901</span>
												</div>
												<div>
													<label>Personal</label> <span class="tx-medium">+1 (498) 021
														0090</span>
												</div>
											</div>
										</div>
										<div class="media">
											<div class="media-body">
												<div>
													<label>Gmail Account</label> <span
														class="tx-medium">sonia.taylor@gmail.com</span>
												</div>
												<div>
													<label>Other Account</label> <span
														class="tx-medium">me@bootstrapdash.me</span>
												</div>
											</div>
										</div>
										<div class="media">
											<div class="media-body">
												<div>
													<label>Current Address</label> <span class="tx-medium">012 Dashboard
														Apartments, San Francisco, California 13245</span>
												</div>
											</div>
										</div>
										<div class="media mb-0">
											<div class="media-body">
												<div>
													<label>Call History</label> <span class="tx-medium">Duration of last
														call: 2m 32sec</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div>
							<div class="card custom-card">
								<div class="card-header">Recent Contacts</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-12 col-lg-12 col-xl-6 col-xxl-4">
											<div class="border d-flex p-2 rounded-5 mb-2">
												<div class="recent-contacts me-3">
													<div class="main-img-user avatar-md">
														<img alt="avatar" class="rounded-circle"
															src="{{asset('assets/img/faces/5.jpg')}}">
													</div>
												</div>
												<div>
													<h6 class="mt-1 mb-1">Abigali kelly</h6>
													<p class="mb-0 text-muted">Front end</p>
												</div>
												<div class="my-auto ms-auto">
													<nav class="contact-info d-flex">
														<a href="javascript:void(0);"
															class="contact-icon border tx-inverse rounded-pill"
															data-bs-toggle="tooltip" title=""
															data-bs-original-title="Call" aria-label="Call"><i
																class="fe fe-phone tx-12"></i></a>
														<a href="javascript:void(0);"
															class="contact-icon border tx-inverse rounded-pill"
															data-bs-toggle="tooltip" title=""
															data-bs-original-title="Video" aria-label="Video"><i
																class="fe fe-video tx-12"></i></a>
													</nav>
												</div>
											</div>
										</div>
										<div class="col-md-12 col-lg-12 col-xl-6 col-xxl-4">
											<div class="border d-flex p-2 rounded-5 mb-2">
												<div class="recent-contacts me-3">
													<div class="main-img-user avatar-md">
														<img alt="avatar" class="rounded-circle"
															src="{{asset('assets/img/faces/2.jpg')}}">
													</div>
												</div>
												<div>
													<h6 class="mt-1 mb-1">Brenda Crux</h6>
													<p class="mb-0 text-muted">Angular</p>
												</div>
												<div class="my-auto ms-auto">
													<nav class="contact-info d-flex">
														<a href="javascript:void(0);"
															class="contact-icon border tx-inverse rounded-pill"
															data-bs-toggle="tooltip" title=""
															data-bs-original-title="Call" aria-label="Call"><i
																class="fe fe-phone tx-12"></i></a>
														<a href="javascript:void(0);"
															class="contact-icon border tx-inverse rounded-pill"
															data-bs-toggle="tooltip" title=""
															data-bs-original-title="Video" aria-label="Video"><i
																class="fe fe-video tx-12"></i></a>
													</nav>
												</div>
											</div>
										</div>
										<div class="col-md-12 col-lg-12 col-xl-6 col-xxl-4">
											<div class="border d-flex p-2 rounded-5 mb-2">
												<div class="recent-contacts me-3">
													<div class="main-img-user avatar-md">
														<img alt="avatar" class="rounded-circle"
															src="{{asset('assets/img/faces/8.jpg')}}">
													</div>
												</div>
												<div>
													<h6 class="mt-1 mb-1">Rach Michelle</h6>
													<p class="mb-0 text-muted">Php</p>
												</div>
												<div class="my-auto ms-auto">
													<nav class="contact-info d-flex">
														<a href="javascript:void(0);"
															class="contact-icon border tx-inverse rounded-pill"
															data-bs-toggle="tooltip" title=""
															data-bs-original-title="Call" aria-label="Call"><i
																class="fe fe-phone tx-12"></i></a>
														<a href="javascript:void(0);"
															class="contact-icon border tx-inverse rounded-pill"
															data-bs-toggle="tooltip" title=""
															data-bs-original-title="Video" aria-label="Video"><i
																class="fe fe-video tx-12"></i></a>
													</nav>
												</div>
											</div>
										</div>
										<div class="col-md-12 col-lg-12 col-xl-6 col-xxl-4">
											<div class="border d-flex p-2 rounded-5 mb-2">
												<div class="recent-contacts me-3">
													<div class="main-img-user avatar-md">
														<img alt="avatar" class="rounded-circle"
															src="{{asset('assets/img/faces/9.jpg')}}">
													</div>
												</div>
												<div>
													<h6 class="mt-1 mb-1">Matt Harder</h6>
													<p class="mb-0 text-muted">Codeignitor</p>
												</div>
												<div class="my-auto ms-auto">
													<nav class="contact-info d-flex">
														<a href="javascript:void(0);"
															class="contact-icon border tx-inverse rounded-pill"
															data-bs-toggle="tooltip" title=""
															data-bs-original-title="Call" aria-label="Call"><i
																class="fe fe-phone tx-12"></i></a>
														<a href="javascript:void(0);"
															class="contact-icon border tx-inverse rounded-pill"
															data-bs-toggle="tooltip" title=""
															data-bs-original-title="Video" aria-label="Video"><i
																class="fe fe-video tx-12"></i></a>
													</nav>
												</div>
											</div>
										</div>
										<div class="col-md-12 col-lg-12 col-xl-6 col-xxl-4">
											<div class="border d-flex p-2 rounded-5 mb-2">
												<div class="recent-contacts me-3">
													<div class="main-img-user avatar-md">
														<img alt="avatar" class="rounded-circle"
															src="{{asset('assets/img/faces/1.jpg')}}">
													</div>
												</div>
												<div>
													<h6 class="mt-1 mb-1">Micheal Phelps</h6>
													<p class="mb-0 text-muted">Web Testing</p>
												</div>
												<div class="my-auto ms-auto">
													<nav class="contact-info d-flex">
														<a href="javascript:void(0);"
															class="contact-icon border tx-inverse rounded-pill"
															data-bs-toggle="tooltip" title=""
															data-bs-original-title="Call" aria-label="Call"><i
																class="fe fe-phone tx-12"></i></a>
														<a href="javascript:void(0);"
															class="contact-icon border tx-inverse rounded-pill"
															data-bs-toggle="tooltip" title=""
															data-bs-original-title="Video" aria-label="Video"><i
																class="fe fe-video tx-12"></i></a>
													</nav>
												</div>
											</div>
										</div>
										<div class="col-md-12 col-lg-12 col-xl-6 col-xxl-4">
											<div class="border d-flex p-2 rounded-5 mb-2">
												<div class="recent-contacts me-3">
													<div class="main-img-user avatar-md">
														<img alt="avatar" class="rounded-circle"
															src="{{asset('assets/img/faces/7.jpg')}}">
													</div>
												</div>
												<div>
													<h6 class="mt-1 mb-1">Azenda Hills</h6>
													<p class="mb-0 text-muted">Django</p>
												</div>
												<div class="my-auto ms-auto d-md-flex">
													<nav class="contact-info d-flex">
														<a href="javascript:void(0);"
															class="contact-icon border tx-inverse rounded-pill"
															data-bs-toggle="tooltip" title=""
															data-bs-original-title="Call" aria-label="Call"><i
																class="fe fe-phone tx-12"></i></a>
														<a href="javascript:void(0);"
															class="contact-icon border tx-inverse rounded-pill"
															data-bs-toggle="tooltip" title=""
															data-bs-original-title="Video" aria-label="Video"><i
																class="fe fe-video tx-12"></i></a>
													</nav>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Row -->

            @endsection

        @section('scripts')

		<!--Internal  Contact js -->
		<script src="{{asset('assets/js/contact.js')}}"></script>
        
        @endsection

