@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

					<!-- breadcrumb -->
					<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Ecommerce</h4><span
								class="text-muted mt-1 tx-13 ms-2 mb-0">/ Product-details</span>
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
						<div class="col-xl-12">
							<div class="card">
								<div class="card-body h-100">
									<div class="row row-sm ">
										<div class=" col-xl-5 col-lg-12 col-md-12">
											<div class="preview-pic tab-content">
												<div class="tab-pane active" id="pic-1"><img
														src="{{asset('assets/img/ecommerce/shirt-5.png')}}" alt="image" /></div>
												<div class="tab-pane" id="pic-2"><img
														src="{{asset('assets/img/ecommerce/shirt-2')}}.png" alt="image" /></div>
												<div class="tab-pane" id="pic-3"><img
														src="{{asset('assets/img/ecommerce/shirt-3')}}.png" alt="image" /></div>
												<div class="tab-pane" id="pic-4"><img
														src="{{asset('assets/img/ecommerce/shirt-4')}}.png" alt="image" /></div>
												<div class="tab-pane" id="pic-5"><img
														src="{{asset('assets/img/ecommerce/shirt-1')}}.png" alt="image" /></div>
											</div>
											<ul class="preview-thumbnail nav nav-tabs">
												<li class="active"><a data-bs-target="#pic-1" data-bs-toggle="tab"><img
															src="{{asset('assets/img/ecommerce/shirt-5')}}.png" alt="image" /></a>
												</li>
												<li><a data-bs-target="#pic-2" data-bs-toggle="tab"><img
															src="{{asset('assets/img/ecommerce/shirt-2')}}.png" alt="image" /></a>
												</li>
												<li><a data-bs-target="#pic-3" data-bs-toggle="tab"><img
															src="{{asset('assets/img/ecommerce/shirt-3')}}.png" alt="image" /></a>
												</li>
												<li><a data-bs-target="#pic-4" data-bs-toggle="tab"><img
															src="{{asset('assets/img/ecommerce/shirt-4')}}.png" alt="image" /></a>
												</li>
												<li><a data-bs-target="#pic-5" data-bs-toggle="tab"><img
															src="{{asset('assets/img/ecommerce/shirt-1')}}.png" alt="image" /></a>
												</li>
											</ul>
										</div>
										<div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
											<h4 class="product-title mb-1">RED TSHIRT</h4>
											<p class="text-muted tx-13 mb-1">Men red & Grey Checked Casual Shirt</p>
											<div class="rating mb-1">
												<div class="stars">
													<span class="fa fa-star checked"></span>
													<span class="fa fa-star checked"></span>
													<span class="fa fa-star checked"></span>
													<span class="fa fa-star text-muted"></span>
													<span class="fa fa-star text-muted"></span>
												</div>
												<span class="review-no">41 reviews</span>
											</div>
											<h6 class="price">current price: <span class="h3 ms-2">$180</span></h6>
											<p class="product-description">Suspendisse quos? Tempus cras iure temporibus? Eu
												laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim
												sociosqu delectus posuere.</p>
											<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87
													votes)</strong></p>
											<div class="sizes d-sm-flex">sizes:
												<span class="size d-flex" data-bs-toggle="tooltip" title="small"><label
														class="rdiobox mb-0"><input checked="" name="rdio" type="radio">
														<span class="fw-bold">s</span></label></span>
												<span class="size d-flex" data-bs-toggle="tooltip" title="medium"><label
														class="rdiobox mb-0"><input name="rdio" type="radio">
														<span>m</span></label></span>
												<span class="size d-flex" data-bs-toggle="tooltip" title="large"><label
														class="rdiobox mb-0"><input name="rdio" type="radio">
														<span>l</span></label></span>
												<span class="size d-flex" data-bs-toggle="tooltip"
													title="extra-large"><label class="rdiobox mb-0"><input name="rdio"
															type="radio"> <span>xl</span></label></span>
											</div>
											<div class="d-flex  mt-2">
												<div class="mt-2 product-title">Quantity:</div>
												<div class="d-flex ms-2">
													<ul class=" mb-0 qunatity-list">
														<li>
															<div class="form-group">
																<select name="quantity" id="select-countries17"
																	class="form-control nice-select wd-100">
																	<option value="1" selected="">1</option>
																	<option value="2">2</option>
																	<option value="3">3</option>
																	<option value="4">4</option>
																</select>
															</div>
														</li>
													</ul>
												</div>
											</div>
											<div class="colors d-flex mt-2">
												<span class="mt-2">colors:</span>
												<div class="row gutters-xs ms-4">
													<div class="me-2 w-auto ps-0 pe-0">
														<label class="colorinput">
															<input name="color" type="radio" value="azure"
																class="colorinput-input" checked="">
															<span class="colorinput-color bg-danger"></span>
														</label>
													</div>
													<div class="me-2 w-auto ps-0 pe-0">
														<label class="colorinput">
															<input name="color" type="radio" value="indigo"
																class="colorinput-input">
															<span class="colorinput-color bg-secondary"></span>
														</label>
													</div>
													<div class="me-2 w-auto ps-0 pe-0">
														<label class="colorinput">
															<input name="color" type="radio" value="purple"
																class="colorinput-input">
															<span class="colorinput-color bg-dark"></span>
														</label>
													</div>
													<div class="me-2 w-auto ps-0 pe-0">
														<label class="colorinput">
															<input name="color" type="radio" value="pink"
																class="colorinput-input">
															<span class="colorinput-color bg-pink"></span>
														</label>
													</div>
												</div>
											</div>
											<div class="action">
												<a href="{{url('wish-list')}}"><button class="add-to-cart btn btn-danger"  type="button">ADD TO
												WISHLIST</button></a>
												<a href="{{url('product-cart')}}"><button class="add-to-cart btn btn-success" type="button">ADD TO
												CART</button></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /row -->

					<!-- row -->
					<div class="row related-products-ltr-l">
						<div class="col-lg-3">
							<div class="card item-card">
								<div class="card-body pb-0 h-100">
									<div class="text-center">
										<img src="{{asset('assets/img/ecommerce/01.jpg')}}" alt="img" class="img-fluid w-100 rounded-7">
									</div>
									<div class="card-body relative product-des">
										<div class="cardtitle">
											<span>Items</span>
											<a>Sport shoes</a>
										</div>
										<div class="cardprice">
											<span class="type--strikethrough">$999</span>
											<span>$799</span>
										</div>
									</div>
								</div>
								<div class="text-center border-top py-3 px-2 ">
									<a href="{{url('products')}}" class="btn btn-primary"> View More</a>
									<a href="{{url('product-cart')}}" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Add to cart</a>
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="card item-card">
								<div class="card-body pb-0 h-100">
									<div class="text-center">
										<img src="{{asset('assets/img/ecommerce/04.jpg')}}" alt="img" class="img-fluid w-100 rounded-7">
									</div>
									<div class="card-body relative product-des">
										<div class="cardtitle">
											<span>Fashion</span>
											<a>Mens Shoes</a>
										</div>
										<div class="cardprice">
											<span class="type--strikethrough">$999</span>
											<span>$799</span>
										</div>
									</div>
								</div>
								<div class="text-center border-top py-3 px-2 ">
									<a href="{{url('products')}}" class="btn btn-primary"> View More</a>
									<a href="{{url('product-cart')}}" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Add to cart</a>
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="card item-card">
								<div class="card-body pb-0 h-100">
									<div class="text-center">
										<img src="{{asset('assets/img/ecommerce/07.jpg')}}" alt="img" class="img-fluid w-100 rounded-7">
									</div>
									<div class="card-body relative product-des">
										<div class="cardtitle">
											<span>Accessories</span>
											<a>Metal Watch</a>
										</div>
										<div class="cardprice">
											<span class="type--strikethrough">$999</span>
											<span>$799</span>
										</div>
									</div>
								</div>
								<div class="text-center border-top py-3 px-2 ">
									<a href="{{url('products')}}" class="btn btn-primary"> View More</a>
									<a href="{{url('product-cart')}}" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Add to cart</a>
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="card item-card">
								<div class="card-body pb-0 h-100">
									<div class="text-center">
										<img src="{{asset('assets/img/ecommerce/08.jpg')}}" alt="img" class="img-fluid w-100 rounded-7">
									</div>
									<div class="card-body relative product-des">
										<div class="cardtitle">
											<span>Accessories</span>
											<a>Metal Watch</a>
										</div>
										<div class="cardprice">
											<span class="type--strikethrough">$999</span>
											<span>$799</span>
										</div>
									</div>
								</div>
								<div class="text-center border-top py-3 px-2 ">
									<a href="{{url('products')}}" class="btn btn-primary"> View More</a>
									<a href="{{url('product-cart')}}" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Add to cart</a>
								</div>
							</div>
						</div>
					</div>
					<!-- /row -->

					<!-- row -->
					<div class="row row-sm">
						<div class="col-md-12 col-xl-4 col-xs-12 col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="feature2">
										<i
											class="mdi mdi-airplane-takeoff bg-purple ht-50 wd-50 text-center brround text-white"></i>
									</div>
									<h5 class="mb-2 tx-16">Free Shipping</h5>
									<span class="fs-14 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
										sed do eiusmod tempor incididunt ut labore et dolore magna aliqua domenus
										orioneu.</span>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xl-4 col-xs-12 col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="feature2">
										<i class="mdi mdi-headset bg-pink  ht-50 wd-50 text-center brround text-white"></i>
									</div>
									<h5 class="mb-2 tx-16">Customer Support</h5>
									<span class="fs-14 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
										sed do eiusmod tempor incididunt ut labore et dolore magna aliqua domenus
										orioneu.</span>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xl-4 col-xs-12 col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="feature2">
										<i class="mdi mdi-refresh bg-teal ht-50 wd-50 text-center brround text-white"></i>
									</div>
									<div class="icon-return"></div>
									<h5 class="mb-2  tx-16">30 days money back</h5>
									<span class="fs-14 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
										sed do eiusmod tempor incididunt ut labore et dolore magna aliqua domenus
										orioneu.</span>
								</div>
							</div>
						</div>
					</div>
					<!-- row closed -->

            @endsection

        @section('scripts')

            <!-- Internal Select2.min js -->
            <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
            <script src="{{asset('assets/js/select2.js')}}"></script>

            <!--Internal  Nice-select js-->
            <script src="{{asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
            <script src="{{asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
        
        @endsection

