@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Gallery</span>
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

				<!-- Gallery -->
				<div class="demo-gallery">
					<ul id="lightgallery" class="list-unstyled row row-sm">
						<li class="col-sm-6 col-lg-4" data-responsive="{{asset('assets/img/photos/1.jpg')}}" data-src="{{asset('assets/img/photos/1.jpg')}}" data-sub-html="<h4>Gallery Image 1</h4>" >
							<a href="">
								<img class="img-responsive" src="{{asset('assets/img/photos/1.jpg')}}" alt="Thumb-1">
							</a>
						</li>
						<li class="col-sm-6 col-lg-4" data-responsive="{{asset('assets/img/photos/2.jpg')}}" data-src="{{asset('assets/img/photos/2.jpg')}}" data-sub-html="<h4>Gallery Image 2</h4>" >
							<a href="">
								<img class="img-responsive" src="{{asset('assets/img/photos/2.jpg')}}" alt="Thumb-1">
							</a>
						</li>
						<li class="col-sm-6 col-lg-4" data-responsive="{{asset('assets/img/photos/3.jpg')}}" data-src="{{asset('assets/img/photos/3.jpg')}}" data-sub-html="<h4>Gallery Image 3</h4>" >
							<a href="">
								<img class="img-responsive" src="{{asset('assets/img/photos/3.jpg')}}" alt="Thumb-1">
							</a>
						</li>
						<li class="col-sm-6 col-lg-4" data-responsive="{{asset('assets/img/photos/4.jpg')}}" data-src="{{asset('assets/img/photos/4.jpg')}}" data-sub-html="<h4>Gallery Image 4</h4>" >
							<a href="">
								<img class="img-responsive" src="{{asset('assets/img/photos/4.jpg')}}" alt="Thumb-1">
							</a>
						</li>
						<li class="col-sm-6 col-lg-4" data-responsive="{{asset('assets/img/photos/5.jpg')}}" data-src="{{asset('assets/img/photos/5.jpg')}}" data-sub-html="<h4>Gallery Image 5</h4>" >
							<a href="">
								<img class="img-responsive" src="{{asset('assets/img/photos/5.jpg')}}" alt="Thumb-1">
							</a>
						</li>
						<li class="col-sm-6 col-lg-4" data-responsive="{{asset('assets/img/photos/6.jpg')}}" data-src="{{asset('assets/img/photos/6.jpg')}}" data-sub-html="<h4>Gallery Image 6</h4>" >
							<a href="">
								<img class="img-responsive" src="{{asset('assets/img/photos/6.jpg')}}" alt="Thumb-1">
							</a>
						</li>
						<li class="col-sm-6 col-lg-4" data-responsive="{{asset('assets/img/photos/7.jpg')}}" data-src="{{asset('assets/img/photos/7.jpg')}}" data-sub-html="<h4>Gallery Image 7</h4>" >
							<a href="">
								<img class="img-responsive" src="{{asset('assets/img/photos/7.jpg')}}" alt="Thumb-1">
							</a>
						</li>
						<li class="col-sm-6 col-lg-4" data-responsive="{{asset('assets/img/photos/8.jpg')}}" data-src="{{asset('assets/img/photos/8.jpg')}}" data-sub-html="<h4>Gallery Image 8</h4>" >
							<a href="">
								<img class="img-responsive" src="{{asset('assets/img/photos/8.jpg')}}" alt="Thumb-1">
							</a>
						</li>
						<li class="col-sm-6 col-lg-4" data-responsive="{{asset('assets/img/photos/9.jpg')}}" data-src="{{asset('assets/img/photos/9.jpg')}}" data-sub-html="<h4>Gallery Image 9</h4>" >
							<a href="">
								<img class="img-responsive" src="{{asset('assets/img/photos/9.jpg')}}" alt="Thumb-1">
							</a>
						</li>
					</ul>
					<!-- /Gallery -->

					<!-- Pagination -->
					<div class="row mb-5">
						<div class="col-md-6 mt-1 d-none d-md-block">1 - 10 of 234 photos</div>
						<div class="col-md-6">
							<div class="float-end">
								<ul class="pagination search">
									<li class="page-item page-prev disabled">
										<a class="page-link" href="javascript:void(0);" tabindex="-1">Prev</a>
									</li>
									<li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
									<li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
									<li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
									<li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
									<li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
									<li class="page-item page-next">
										<a class="page-link" href="javascript:void(0);">Next</a>
									</li>
								</ul>
							</div>
						</div><!-- COL-END -->
					</div>
					<!-- Pagination -->
				</div>
				<!-- row closed -->

            @endsection

        @section('scripts')

        <!-- Internal Gallery js -->
        <script src="{{asset('assets/plugins/gallery/lightgallery-all.min.js')}}"></script>
		<script src="{{asset('assets/plugins/gallery/jquery.mousewheel.min.js')}}"></script>
        <script src="{{asset('assets/js/gallery.js')}}"></script>
        
        @endsection

