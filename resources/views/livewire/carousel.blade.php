@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Advanced ui</h4><span
								class="text-muted mt-1 tx-13 ms-2 mb-0">/ Carousel</span>
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

				<!-- row opened-->
				<div class="row row-sm carsl-body ">
					<div class="col-lg-6 col-md-6">
						<div class="card custom-card">
							<div class="card-body ht-100p">
								<div>
									<h6 class="card-title mb-1">Static Carousel</h6>
									<p class="text-muted card-sub-title">Here’s a carousel with slides only.</p>
								</div>
								<div class="">
									<div class="carousel slide" data-bs-ride="carousel" id="carouselExampleSlidesOnly">
										<div class="carousel-inner">
											<div class="carousel-item active">
												<img alt="img" class="d-block w-100" src="{{asset('assets/img/photos/8.jpg')}}">
											</div>
											<div class="carousel-item">
												<img alt="img" class="d-block w-100" src="{{asset('assets/img/photos/9.jpg')}}">
											</div>
											<div class="carousel-item">
												<img alt="img" class="d-block w-100" src="{{asset('assets/img/photos/10.jpg')}}">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="card custom-card">
							<div class="card-body ht-100p">
								<div>
									<h6 class="card-title mb-1">With Controls</h6>
									<p class="text-muted card-sub-title">Adding in the previous and next controls.</p>
								</div>
								<div>
									<div class="carousel slide" data-bs-ride="carousel" id="carouselExample2">
										<div class="carousel-inner">
											<div class="carousel-item active">
												<img alt="img" class="d-block w-100" src="{{asset('assets/img/photos/18.jpg')}}">
											</div>
											<div class="carousel-item">
												<img alt="img" class="d-block w-100" src="{{asset('assets/img/photos/12.jpg')}}">
											</div>
											<div class="carousel-item">
												<img alt="img" class="d-block w-100" src="{{asset('assets/img/photos/13.jpg')}}">
											</div>
										</div>
										<a class="carousel-control-prev" href="#carouselExample2" role="button" data-bs-slide="prev">
											<i class="fa fa-angle-left fs-30" aria-hidden="true"></i>
										</a>
										<a class="carousel-control-next" href="#carouselExample2" role="button" data-bs-slide="next">
											<i class="fa fa-angle-right fs-30" aria-hidden="true"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="card custom-card">
							<div class="card-body ht-100p">
								<div>
									<h6 class="card-title mb-1">With Indicator</h6>
									<p class="text-muted card-sub-title">You can also add the indicators to the carousel, alongside the controls, too align any where</p>
								</div>
								<div>
									<div class="carousel slide" data-bs-ride="carousel" id="carouselExample3">
										<ol class="carousel-indicators">
											<li class="active" data-bs-slide-to="0" data-bs-target="#carouselExample3"></li>
											<li data-bs-slide-to="1" data-bs-target="#carouselExample3"></li>
											<li data-bs-slide-to="2" data-bs-target="#carouselExample3"></li>
										</ol>
										<div class="carousel-inner">
											<div class="carousel-item active">
												<img alt="img" class="d-block w-100" src="{{asset('assets/img/photos/14.jpg')}}">
											</div>
											<div class="carousel-item">
												<img alt="img" class="d-block w-100" src="{{asset('assets/img/photos/15.jpg')}}">
											</div>
											<div class="carousel-item">
												<img alt="img" class="d-block w-100" src="{{asset('assets/img/photos/16.jpg')}}">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="card custom-card">
							<div class="card-body ht-100p">
								<div>
									<h6 class="card-title mb-1">With Caption</h6>
									<p class="text-muted card-sub-title">Add captions to your slides easily with the <code>.carousel-caption</code> element within any <code>.carousel-item.</code></p>
								</div>
								<div>
									<div class="carousel slide" data-bs-ride="carousel" id="carouselExample4">
										<ol class="carousel-indicators">
											<li class="active" data-bs-slide-to="0" data-bs-target="#carouselExample4"></li>
											<li data-bs-slide-to="1" data-bs-target="#carouselExample4"></li>
											<li data-bs-slide-to="2" data-bs-target="#carouselExample4"></li>
										</ol>
										<div class="carousel-inner bg-dark">
											<div class="carousel-item active">
												<img alt="img" class="d-block w-100 op-3" src="{{asset('assets/img/photos/17.jpg')}}">
												<div class="carousel-caption d-none d-md-block">
													<h5>First Slide</h5>
													<p class="tx-14">Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
												</div>
											</div>
											<div class="carousel-item">
												<img alt="img" class="d-block w-100 op-3" src="{{asset('assets/img/photos/18.jpg')}}">
												<div class="carousel-caption d-none d-md-block">
													<h5>Second Slide</h5>
													<p class="tx-14">Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
												</div>
											</div>
											<div class="carousel-item">
												<img alt="img" class="d-block w-100 op-3" src="{{asset('assets/img/photos/19.jpg')}}">
												<div class="carousel-caption d-none d-md-block">
													<h5>Third Slide</h5>
													<p class="tx-14">Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="card custom-card">
							<div class="card-body ht-100p">
								<div>
									<h6 class="card-title mb-1">Fade Animate Carousel</h6>
									<p class="text-muted card-sub-title">Add fade transition to your carousel to animate slides with a fade transition instead of a slide.</p>
								</div>
								<div>
									<div class="carousel slide carousel-fade" data-bs-ride="carousel" id="carouselExample5">
										<ol class="carousel-indicators">
											<li class="active" data-bs-slide-to="0" data-bs-target="#carouselExample5"></li>
											<li data-bs-slide-to="1" data-bs-target="#carouselExample5"></li>
											<li data-bs-slide-to="2" data-bs-target="#carouselExample5"></li>
										</ol>
										<div class="carousel-inner bg-dark">
											<div class="carousel-item active">
												<img alt="img" class="d-block w-100" src="{{asset('assets/img/photos/20.jpg')}}">
											</div>
											<div class="carousel-item">
												<img alt="img" class="d-block w-100" src="{{asset('assets/img/photos/1.jpg')}}">
											</div>
											<div class="carousel-item">
												<img alt="img" class="d-block w-100" src="{{asset('assets/img/photos/2.jpg')}}">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="card custom-card">
							<div class="card-body ht-100p">
								<div>
									<h6 class="card-title mb-1">Carousel With Thumbnails</h6>
									<p class="text-muted card-sub-title">The Carousel controls the Thumbnails easily design the images with thumbnails</p>
								</div>
								<div class="carousel-slider">
									<div id="carousel" class="carousel slide" data-bs-ride="carousel">
										<div class="carousel-inner">
											<div class="carousel-item active"><img src="{{asset('assets/img/photos/1.jpg')}}" alt="img"> </div>
											<div class="carousel-item"> <img src="{{asset('assets/img/photos/2.jpg')}}" alt="img"> </div>
											<div class="carousel-item"> <img src="{{asset('assets/img/photos/3.jpg')}}" alt="img"> </div>
											<div class="carousel-item"> <img src="{{asset('assets/img/photos/4.jpg')}}" alt="img"> </div>
											<div class="carousel-item"> <img src="{{asset('assets/img/photos/5.jpg')}}" alt="img"> </div>
											<div class="carousel-item"> <img src="{{asset('assets/img/photos/6.jpg')}}" alt="img"> </div>
											<div class="carousel-item"> <img src="{{asset('assets/img/photos/7.jpg')}}" alt="img"> </div>
											<div class="carousel-item"> <img src="{{asset('assets/img/photos/8.jpg')}}" alt="img"> </div>
										</div>
										<a class="carousel-control-prev" href="#carousel" role="button" data-bs-slide="prev">
											<i class="fa fa-angle-left fs-30" aria-hidden="true"></i>
										</a>
										<a class="carousel-control-next" href="#carousel" role="button" data-bs-slide="next">
											<i class="fa fa-angle-right fs-30" aria-hidden="true"></i>
										</a>
									</div>
									<div class="clearfix">
										<div id="thumbcarousel" class="carousel slide" data-bs-interval="false">
											<div class="carousel-inner">
												<div class="carousel-item active">
													<div data-bs-target="#carousel" data-bs-slide-to="0" class="thumb"><img src="{{asset('assets/img/photos/1.jpg')}}" alt="img"></div>
													<div data-bs-target="#carousel" data-bs-slide-to="1" class="thumb"><img src="{{asset('assets/img/photos/2.jpg')}}" alt="img"></div>
													<div data-bs-target="#carousel" data-bs-slide-to="2" class="thumb"><img src="{{asset('assets/img/photos/3.jpg')}}" alt="img"></div>
													<div data-bs-target="#carousel" data-bs-slide-to="3" class="thumb"><img src="{{asset('assets/img/photos/4.jpg')}}" alt="img"></div>
												</div>
												<div class="carousel-item">
													<div data-bs-target="#carousel" data-bs-slide-to="4" class="thumb"><img src="{{asset('assets/img/photos/5.jpg')}}" alt="img"></div>
													<div data-bs-target="#carousel" data-bs-slide-to="5" class="thumb"><img src="{{asset('assets/img/photos/6.jpg')}}" alt="img"></div>
													<div data-bs-target="#carousel" data-bs-slide-to="6" class="thumb"><img src="{{asset('assets/img/photos/7.jpg')}}" alt="img"></div>
													<div data-bs-target="#carousel" data-bs-slide-to="7" class="thumb"><img src="{{asset('assets/img/photos/8.jpg')}}" alt="img"></div>
												</div>
											</div>
											<a class="carousel-control-prev" href="#thumbcarousel" role="button" data-bs-slide="prev">
												<i class="fa fa-angle-left fs-20" aria-hidden="true"></i>
											</a>
											<a class="carousel-control-next" href="#thumbcarousel" role="button" data-bs-slide="next">
												<i class="fa fa-angle-right fs-20" aria-hidden="true"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-md-12">
						<div class="card custom-card">
							<div class="card-body ht-100p">
								<div>
									<h6 class="card-title mb-1">Multi Slider</h6>
									<p class="text-muted card-sub-title">Multislider is a jQuery powered slideshow that specializes in showing more than one slide at a time. There's no need to find messy CSS and JS work arounds for other single-slide solutions. Multislider allows the developer to focus fully on each individual slide as it's own component, and then displays as many slides as you decide in a manner that is fluid, consistent, and dymanic.</p>
								</div>
								<div id="basicSlider">
									<div class="MS-content">
										<div class="item">
											<a href="javascript:void(0);"> <img src="{{asset('assets/img/photos/1.jpg')}}" alt="" /> </a>
										</div>
										<div class="item">
											<a href="javascript:void(0);"> <img src="{{asset('assets/img/photos/2.jpg')}}" alt="" /> </a>
										</div>
										<div class="item">
											<a href="javascript:void(0);"> <img src="{{asset('assets/img/photos/3.jpg')}}" alt="" /> </a>
										</div>
										<div class="item">
											<a href="javascript:void(0);"> <img src="{{asset('assets/img/photos/4.jpg')}}" alt="" /> </a>
										</div>
										<div class="item">
											<a href="javascript:void(0);"> <img src="{{asset('assets/img/photos/5.jpg')}}" alt="" /> </a>
										</div>
										<div class="item">
											<a href="javascript:void(0);"> <img src="{{asset('assets/img/photos/6.jpg')}}" alt="" /> </a>
										</div>
										<div class="item">
											<a href="javascript:void(0);"> <img src="{{asset('assets/img/photos/7.jpg')}}" alt="" /> </a>
										</div>
										<div class="item">
											<a href="javascript:void(0);"> <img src="{{asset('assets/img/photos/8.jpg')}}" alt="" /> </a>
										</div>
										<div class="item">
											<a href="javascript:void(0);"> <img src="{{asset('assets/img/photos/9.jpg')}}" alt="" /> </a>
										</div>
										<div class="item">
											<a href="javascript:void(0);"> <img src="{{asset('assets/img/photos/10.jpg')}}" alt="" /> </a>
										</div>
										<div class="item">
											<a href="javascript:void(0);"> <img src="{{asset('assets/img/photos/11.jpg')}}" alt="" /> </a>
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

		<!-- Internal Select2 js-->
		<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

		<!--- Internal Accordion Js -->
		<script src="{{asset('assets/plugins/accordion/accordion.min.js')}}"></script>
		<script src="{{asset('assets/js/accordion.js')}}"></script>

		<!-- Internal Owl Carousel js-->
		<script src="{{asset('assets/plugins/owl-carousel/owl.carousel.js')}}"></script>

		<!---Internal  Multislider js-->
		<script src="{{asset('assets/plugins/multislider/multislider.js')}}"></script>
		<script src="{{asset('assets/js/carousel.js')}}"></script>
        
        @endsection

