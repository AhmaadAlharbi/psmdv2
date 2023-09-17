@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Mail</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Read-Mail</span>
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

				<!-- row opened -->
				<div class="row row-sm">
					<!-- Col -->
					<div class="col-lg-4 col-xl-3 col-md-12 col-sm-12">
						<div class="card mg-b-20">
							<div class="main-content-left main-content-left-mail card-body">
								<a class="btn btn-primary btn-compose" href="" id="btnCompose">Compose</a>
								<div class="main-mail-menu">
									<nav class="nav main-nav-column mg-b-20">
										<a class="nav-link" href="{{url('mail')}}"><i class="bx bxs-inbox"></i> Inbox <span>18</span></a>
										<a class="nav-link" href="{{url('mail-compose')}}"><i class="bx bx-star"></i> Starred <span>8</span></a>
										<a class="nav-link" href="{{url('mail-settings')}}"><i class="bx bx-alarm-snooze"></i> Snoozed <span>6</span></a>
										<a class="nav-link" href="{{url('mail')}}"><i class="bx bx-bookmarks"></i> Important <span>15</span></a>
										<a class="nav-link" href="{{url('mail-compose')}}"><i class="bx bx-send"></i> Sent Mail <span>24</span></a>
										<a class="nav-link" href="{{url('mail')}}"><i class="bx bx-edit"></i> Drafts <span>2</span></a>
										<a class="nav-link" href="{{url('mail-settings')}}"><i class="bx bx-message-error"></i> Spam <span>32</span></a>
										<a class="nav-link" href="{{url('chat')}}"><i class="bx bx-message-square-detail"></i> Chats <span>14</span></a>
										<a class="nav-link" href="{{url('mail')}}"><i class="bx bx-folder-open"></i> All Mail <span>652</span></a>
										<a class="nav-link" href="{{url('contacts')}}"><i class="bx bx-book-content"></i> Contacts <span>547</span></a>
										<a class="nav-link" href="{{url('edit-table')}}"><i class="bx bx-trash"></i> Trash <span>365</span></a>
									</nav>
									<label class="main-content-label main-content-label-sm">Settings</label>
									<nav class="nav main-nav-column">
										<a class="nav-link active" href="{{url('mail-settings')}}">Email Settings</a>
										<a class="nav-link" href="{{url('check-out')}}">Account Information</a>
									</nav>
								</div><!-- main-mail-menu -->
							</div>
						</div>
					</div>
					<!-- /Col -->
					<div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Velit a labore <span class="badge bg-primary">inbox</span></h4>
							</div>
							<div class="card-body">
								<div class="email-media">
									<div class="mt-0 d-sm-flex">
										<img class="me-2 rounded-circle avatar-xl" src="{{asset('assets/img/faces/6.jpg')}}" alt="avatar">
										<div class="media-body">
											<div class="float-end d-none d-md-flex fs-15">
												<span class="me-3">Sep 13 , 2019 12:45 pm</span>
												<small class="me-3"><i class="bx bx-star tx-18" data-bs-toggle="tooltip" title="" data-bs-original-title="Rated"></i></small>
												<small class="me-3"><i class="bx bx-reply tx-18" data-bs-toggle="tooltip" title="" data-bs-original-title="Reply"></i></small>
												<div class="me-3">
													<a href="javascript:void(0);" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-horizontal  tx-18" data-bs-toggle="tooltip" title="" data-bs-original-title="View more"></i></a>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="javascript:void(0);">Reply</a>
														<a class="dropdown-item" href="javascript:void(0);">Report Spam</a>
														<a class="dropdown-item" href="javascript:void(0);">Delete</a>
														<a class="dropdown-item" href="javascript:void(0);">Show Original</a>
														<a class="dropdown-item" href="javascript:void(0);">Print</a>
														<a class="dropdown-item" href="javascript:void(0);">Filter</a>
													</div>
												</div>
											</div>
											<div class="media-title  fw-bold mt-3">Alica Nestle <span class="text-muted">( alicnestle@gmail.com )</span></div>
											<p class="mb-0">to Adam Cotter ( adamcotter@gmail.com ) </p>
											<small class="me-2 d-md-none">Dec 13 , 2018 12:45 pm</small>
											<small class="me-2 d-md-none"><i class="fe fe-star text-muted" data-bs-toggle="tooltip" title="" data-bs-original-title="Rated"></i></small>
											<small class="me-2 d-md-none"><i class="fa fa-reply text-muted" data-bs-toggle="tooltip" title="" data-bs-original-title="Reply"></i></small>
										</div>
									</div>
								</div>
								<div class="eamil-body mt-5">
									<h6>Hi Sir/Madam</h6>
									<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
									<p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.</p>
									<p> Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it?</p>
									<p class="mb-0">Thanking you Sir/Madam</p>
									<hr>
									<div class="email-attch">
										<div class="float-end">
											<a href="javascript:void(0);"><i class="bx bxs-download tx-18" data-bs-toggle="tooltip" title="" data-bs-toggle="Download"></i></a>
										</div>
										<p>3 Attachments<a href="{{url('mail')}}"><"> View All Images</a></p>
										<div class="emai-img">
											<div class="d-sm-flex">
												<div class=" m-2">
													<a href="javascript:void(0);"><img class="wd-150 mb-2 rounded-5" src="{{asset('assets/img/photos/1.jpg')}}" alt="placeholder image"></a>
													<h6 class="mb-3 mb-lg-0">1.jpg <small class="text-muted">12kb</small></h6>
												</div>
												<div class="m-2">
													<a href="javascript:void(0);"><img class="wd-150 mb-2 rounded-5" src="{{asset('assets/img/photos/2.jpg')}}" alt="placeholder image"></a>
													<h6 class="mb-3 mb-lg-0">2.jpg <small class="text-muted">18kb</small></h6>
												</div>
												<div class="m-2">
													<a href="javascript:void(0);"><img class="wd-150 mb-2 rounded-5" src="{{asset('assets/img/photos/3.jpg')}}" alt="placeholder image"></a>
													<h6>3.jpg <small class="text-muted">21kb</small></h6>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<a class="btn btn-primary mt-1 mb-1" href="javascript:void(0);"><i class="fa fa-reply"></i> Reply</a>
								<a class="btn btn-info mt-1 mb-1" href="javascript:void(0);"><i class="fa fa-share"></i> Forward</a>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->

            @endsection

        @section('scripts')

		<!--Internal Sparkline js -->
		<script src="{{asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

		<!-- Internal Select2.min js -->
		<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
		<script src="{{asset('assets/js/select2.js')}}"></script>
        
        @endsection

