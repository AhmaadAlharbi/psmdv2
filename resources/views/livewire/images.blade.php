@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Elements</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Images</span>
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
				<div class="card mg-b-20" id="image1">
					<div class="card-body">
						<div class="main-content-label mg-b-5">
							Responsive Image
						</div>
						<p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
						<div class="text-wrap">
							<div class="example">
								<div><img alt="Responsive image" class="img-fluid" src="{{asset('assets/img/photos/1.jpg')}}"></div>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->

				<!-- row -->
				<div class="card mg-b-20" id="image2">
					<div class="card-body">
						<div class="main-content-label mg-b-5">
							Image Thumbnail
						</div>
						<p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
						<div class="text-wrap">
							<div class="example">
								<img alt="Responsive image" class="img-thumbnail wd-100p wd-sm-200" src="{{asset('assets/img/photos/1.jpg')}}">
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->

				<!-- row -->
				<div class="card mg-b-20" id="image3">
						<div class="card-body">
							<div class="main-content-label mg-b-5">
								Aligning Images
							</div>
							<p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
							<div class="text-wrap">
								<div class="example">
									<div class="clearfix">
										<img alt="" class="rounded float-sm-start wd-100p wd-sm-200" src="{{asset('assets/img/photos/1.jpg')}}">
										<img alt="" class="rounded float-sm-end wd-100p wd-sm-200 mg-t-10 mg-sm-t-0" src="{{asset('assets/img/photos/1.jpg')}}">
									</div>
								</div>
							</div>
					</div>
				</div>
				<!-- /row -->

				<!-- row -->
				<div class="card" id="image4">
					<div class="card-body">
						<div class="main-content-label mg-b-5">
							Background Image
						</div>
						<p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
						<div class="text-wrap">
							<div class="example">
								<figure class="pos-relative mg-b-0 wd-sm-80p wd-md-50p">
									<img alt="Responsive image" class="img-fit-cover" src="{{asset('assets/img/photos/1.jpg')}}">
									<figcaption class="pos-absolute a-0 pd-25 bg-black-5 tx-white-8 custom-cls-img">
										<h6 class="tx-14 tx-sm-16 tx-white tx-semibold mg-b-15 mg-sm-b-20">What Does Royalty-Free Mean?</h6>
										<p class="mg-b-0">Royalty free means you just need to pay for rights to use the item once per end product. You don't need to pay additional or ongoing fees for each person who sees or uses it.</p>
									</figcaption>
								</figure>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>

            @endsection

        @section('scripts')

		<!--Internal  Clipboard js-->
		<script src="{{asset('assets/plugins/clipboard/clipboard.min.js')}}"></script>
		<script src="{{asset('assets/plugins/clipboard/clipboard.js')}}"></script>

		<!-- Internal Prism js-->
		<script src="{{asset('assets/plugins/prism/prism.js')}}"></script>
        
        @endsection

