@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Ecommerce</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Wishlist</span>
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
					<div class="col-lg-12 col-xl-12">
						<div class="row">
							<div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 alert wishlist-card">
								<div class="card item-card ">
									<div class="card-body pb-0">
										<div class="text-center zoom">
											<a href="{{url('products')}}"><img class="w-100 rounded-5" src="{{asset('assets/img/ecommerce/01.jpg')}}"  alt="img" ></a>
										</div>
										<div class="card-body px-0 pb-3">
											<div class="row">
												<div class="col-9">
													<div class="cardtitle">
														<div>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star-half text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star-o text-warning fs-16"></i></a>
															<a href="javascript:void(0);"> (23)</a>
														</div>
														<a class="shop-title fs-18">Wodden Flower Vase</a>
													</div>
												</div>
												<div class="col-3">
													<div class="cardprice-2">
														<span class="type--strikethrough number-font">$2498</span>
														<span class="number-font">$1967</span>
													</div>
												</div>
												<div>
													<p class="shop-description fs-13 text-muted mt-2 mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor ipsum quia saepe esse.</p>
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer text-center">
										<div class="text-center px-2">
											<a href="{{url('product-cart')}}" class="btn btn-md btn-primary mb-2 ms-2 w-45"><i class="fe fe-shopping-cart me-2"></i>Add to Cart</a>
											<a href="" class="btn btn-md btn-light mb-2 ms-2 w-45" data-bs-dismiss="alert" aria-label="Close">
												<span class="me-2 fs-14">Remove</span>
												<svg xmlns="http://www.w3.org/2000/svg" height="16px" viewBox="0 0 24 24" width="16px" fill="#495057"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg>
											</a>
										</div>
										</div>
								</div>
							</div>
							<div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 alert wishlist-card">
								<div class="card item-card">
									<div class="card-body pb-0">
										<div class="text-center zoom">
											<a href="{{url('products')}}"><img class="w-100 rounded-5" src="{{asset('assets/img/ecommerce/02.jpg')}}"  alt="img" ></a>
										</div>
										<div class="card-body px-0 pb-3">
											<div class="row">
												<div class="col-9">
													<div class="cardtitle">
														<div>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star-half text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star-o text-warning fs-16"></i></a>
															<a href="javascript:void(0);"> (64)</a>
														</div>
														<a class="shop-title fs-18">simple Black Chair</a>
													</div>
												</div>
												<div class="col-3">
													<div class="cardprice-2">
														<span class="type--strikethrough number-font">$2999</span>
														<span class="number-font">$1999</span>
													</div>
												</div>
												<div>
													<p class="shop-description fs-13 text-muted mt-2 mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor ipsum quia saepe esse.</p>
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer text-center">
										<div class="text-center px-2">
											<a href="{{url('product-cart')}}" class="btn btn-md btn-primary mb-2 ms-2 w-45"><i class="fe fe-shopping-cart me-2"></i>Add to Cart</a>
											<a href="" class="btn btn-md btn-light mb-2 ms-2 w-45" data-bs-dismiss="alert" aria-label="Close">
												<span class="me-2 fs-14">Remove</span>
												<svg xmlns="http://www.w3.org/2000/svg" height="16px" viewBox="0 0 24 24" width="16px" fill="#495057"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg>
											</a>
										</div>
										</div>
								</div>
							</div>
							<div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 alert wishlist-card">
								<div class="card item-card">
									<div class="card-body pb-0">
										<div class="text-center zoom">
											<a href="{{url('products')}}"><img class="w-100 rounded-5" src="{{asset('assets/img/ecommerce/03.jpg')}}"  alt="img" ></a>
										</div>
										<div class="card-body px-0 pb-3">
											<div class="row">
												<div class="col-9">
													<div class="cardtitle">
														<div>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star-half text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star-o text-warning fs-16"></i></a>
															<a href="javascript:void(0);"> (41)</a>
														</div>
														<a class="shop-title fs-18">Mens Formal Red Shoes </a>
													</div>
												</div>
												<div class="col-3">
													<div class="cardprice-2">
														<span class="type--strikethrough number-font">$1499</span>
														<span class="number-font">$999</span>
													</div>
												</div>
												<div>
													<p class="shop-description fs-13 mt-2 text-muted mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor ipsum quia saepe esse.</p>
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer text-center">
										<div class="text-center px-2">
											<a href="{{url('product-cart')}}" class="btn btn-md btn-primary mb-2 ms-2 w-45"><i class="fe fe-shopping-cart me-2"></i>Add to Cart</a>
											<a href="" class="btn btn-md btn-light mb-2 ms-2 w-45" data-bs-dismiss="alert" aria-label="Close">
												<span class="me-2 fs-14">Remove</span>
												<svg xmlns="http://www.w3.org/2000/svg" height="16px" viewBox="0 0 24 24" width="16px" fill="#495057"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg>
											</a>
										</div>
										</div>
								</div>
							</div>
							<div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 alert wishlist-card">
								<div class="card item-card">
									<div class="card-body pb-0">
										<div class="text-center zoom">
											<a href="{{url('products')}}"><img class="w-100 rounded-5" src="{{asset('assets/img/ecommerce/04.jpg')}}"  alt="img" ></a>
										</div>
										<div class="card-body px-0 pb-3">
											<div class="row">
												<div class="col-9">
													<div class="cardtitle">
														<div>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star-half text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star-o text-warning fs-16"></i></a>
															<a href="javascript:void(0);"> (232)</a>
														</div>
														<a class="shop-title fs-18">Black Classic Headphones</a>
													</div>
												</div>
												<div class="col-3">
													<div class="cardprice-2">
														<span class="type--strikethrough number-font">$4998</span>
														<span class="number-font">$2925</span>
													</div>
												</div>
												<div>
													<p class="shop-description fs-13 mt-2 text-muted mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor ipsum quia saepe esse.</p>
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer text-center">
										<div class="text-center px-2">
											<a href="{{url('product-cart')}}" class="btn btn-md btn-primary mb-2 ms-2 w-45"><i class="fe fe-shopping-cart me-2"></i>Add to Cart</a>
											<a href="" class="btn btn-md btn-light mb-2 ms-2 w-45" data-bs-dismiss="alert" aria-label="Close">
												<span class="me-2 fs-14">Remove</span>
												<svg xmlns="http://www.w3.org/2000/svg" height="16px" viewBox="0 0 24 24" width="16px" fill="#495057"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg>
											</a>
										</div>
										</div>
								</div>
							</div>
							<div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 alert wishlist-card">
								<div class="card item-card">
									<div class="card-body pb-0">
										<div class="text-center zoom">
											<a href="{{url('products')}}"><img class="w-100 rounded-5" src="{{asset('assets/img/ecommerce/05.jpg')}}"  alt="img" ></a>
										</div>
										<div class="card-body px-0 pb-3">
											<div class="row">
												<div class="col-9">
													<div class="cardtitle">
														<div>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star-half text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star-o text-warning fs-16"></i></a>
															<a href="javascript:void(0);"> (143)</a>
														</div>
														<a class="shop-title fs-18">Lence Camera Lens</a>
													</div>
												</div>
												<div class="col-3">
													<div class="cardprice-2">
														<span class="type--strikethrough number-font">$2998</span>
														<span class="number-font">$1998</span>
													</div>
												</div>
												<div>
													<p class="shop-description fs-13 mt-2 text-muted mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor ipsum quia saepe esse.</p>
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer text-center">
										<div class="text-center px-2">
											<a href="{{url('product-cart')}}" class="btn btn-md btn-primary mb-2 ms-2 w-45"><i class="fe fe-shopping-cart me-2"></i>Add to Cart</a>
											<a href="" class="btn btn-md btn-light mb-2 ms-2 w-45" data-bs-dismiss="alert" aria-label="Close">
												<span class="me-2 fs-14">Remove</span>
												<svg xmlns="http://www.w3.org/2000/svg" height="16px" viewBox="0 0 24 24" width="16px" fill="#495057"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg>
											</a>
										</div>
										</div>
								</div>
							</div>
							<div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 alert wishlist-card">
								<div class="card item-card">
									<div class="card-body pb-0">
										<div class="text-center zoom">
										<a href="{{url('products')}}"><img class="w-100 rounded-5" src="{{asset('assets/img/ecommerce/06.jpg')}}"  alt="img" ></a>
										</div>
										<div class="card-body px-0 pb-3">
											<div class="row">
												<div class="col-9">
													<div class="cardtitle">
														<div>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star-half text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star-o text-warning fs-16"></i></a>
															<a href="javascript:void(0);"> (29)</a>
														</div>
														<a class="shop-title fs-18">Energy School Bag</a>
													</div>
												</div>
												<div class="col-3">
													<div class="cardprice-2">
														<span class="type--strikethrough number-font">$2999</span>
														<span class="number-font">$2499</span>
													</div>
												</div>
												<div>
													<p class="shop-description fs-13 text-muted mt-2 mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor ipsum quia saepe esse.</p>
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer text-center">
										<div class="text-center px-2">
											<a href="{{url('product-cart')}}" class="btn btn-md btn-primary mb-2 ms-2 w-45"><i class="fe fe-shopping-cart me-2"></i>Add to Cart</a>
											<a href="" class="btn btn-md btn-light mb-2 ms-2 w-45" data-bs-dismiss="alert" aria-label="Close">
												<span class="me-2 fs-14">Remove</span>
												<svg xmlns="http://www.w3.org/2000/svg" height="16px" viewBox="0 0 24 24" width="16px" fill="#495057"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg>
											</a>
										</div>
										</div>
								</div>
							</div>
							<div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 alert wishlist-card">
								<div class="card item-card">
									<div class="card-body pb-0">
										<div class="text-center zoom">
											<a href="{{url('products')}}"><img class="w-100 rounded-5" src="{{asset('assets/img/ecommerce/09.jpg')}}"  alt="img" ></a>
										</div>
										<div class="card-body px-0 pb-3">
											<div class="row">
												<div class="col-9">
													<div class="cardtitle">
														<div>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star-half text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star-o text-warning fs-16"></i></a>
															<a href="javascript:void(0);"> (20)</a>
														</div>
														<a class="shop-title fs-18">Lence Camera</a>
													</div>
												</div>
												<div class="col-3">
													<div class="cardprice-2">
														<span class="type--strikethrough number-font">$3498</span>
														<span class="number-font">$2999</span>
													</div>
												</div>
												<div>
													<p class="shop-description fs-13 mt-2 text-muted mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor ipsum quia saepe esse.</p>
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer text-center">
										<div class="text-center px-2">
											<a href="{{url('product-cart')}}" class="btn btn-md btn-primary mb-2 ms-2 w-45"><i class="fe fe-shopping-cart me-2"></i>Add to Cart</a>
											<a href="" class="btn btn-md btn-light mb-2 ms-2 w-45" data-bs-dismiss="alert" aria-label="Close">
												<span class="me-2 fs-14">Remove</span>
												<svg xmlns="http://www.w3.org/2000/svg" height="16px" viewBox="0 0 24 24" width="16px" fill="#495057"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg>
											</a>
										</div>
										</div>
								</div>
							</div>
							<div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 alert wishlist-card">
								<div class="card item-card">
									<div class="card-body pb-0">
										<div class="text-center zoom">
											<a href="{{url('products')}}"><img class="w-100 rounded-5" src="{{asset('assets/img/ecommerce/08.jpg')}}"  alt="img" ></a>
										</div>
										<div class="card-body px-0 pb-3">
											<div class="row">
												<div class="col-9">
													<div class="cardtitle">
														<div>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star-half text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star-o text-warning fs-16"></i></a>
															<a href="javascript:void(0);"> (283)</a>
														</div>
														<a class="shop-title fs-18">Mens Digital Watch</a>
													</div>
												</div>
												<div class="col-3">
													<div class="cardprice-2">
														<span class="type--strikethrough number-font">$2498</span>
														<span class="number-font">$1967</span>
													</div>
												</div>
												<div>
													<p class="shop-description fs-13 text-muted mt-2 mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor ipsum quia saepe esse.</p>
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer text-center">
										<div class="text-center px-2">
											<a href="{{url('product-cart')}}" class="btn btn-md btn-primary mb-2 ms-2 w-45"><i class="fe fe-shopping-cart me-2"></i>Add to Cart</a>
											<a href="" class="btn btn-md btn-light mb-2 ms-2 w-45" data-bs-dismiss="alert" aria-label="Close">
												<span class="me-2 fs-14">Remove</span>
												<svg xmlns="http://www.w3.org/2000/svg" height="16px" viewBox="0 0 24 24" width="16px" fill="#495057"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg>
											</a>
										</div>
										</div>
								</div>
							</div>
							<div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 alert wishlist-card">
								<div class="card item-card">
									<div class="card-body pb-0">
										<div class="text-center zoom">
											<a href="{{url('products')}}"><img class="w-100 rounded-5" src="{{asset('assets/img/ecommerce/07.jpg')}}"  alt="img" ></a>
										</div>
										<div class="card-body px-0 pb-3">
											<div class="row">
												<div class="col-9">
													<div class="cardtitle">
														<div>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star-half text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star-o text-warning fs-16"></i></a>
															<a href="javascript:void(0);"> (14)</a>
														</div>
														<a class="shop-title fs-18">lence Laptop</a>
													</div>
												</div>
												<div class="col-3">
													<div class="cardprice-2">
														<span class="type--strikethrough number-font">$1499</span>
														<span class="number-font">$1299</span>
													</div>
												</div>
												<div>
													<p class="shop-description fs-13 mt-2 text-muted mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor ipsum quia saepe esse.</p>
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer text-center">
										<div class="text-center px-2">
											<a href="{{url('product-cart')}}" class="btn btn-md btn-primary mb-2 ms-2 w-45"><i class="fe fe-shopping-cart me-2"></i>Add to Cart</a>
											<a href="" class="btn btn-md btn-light mb-2 ms-2 w-45" data-bs-dismiss="alert" aria-label="Close">
												<span class="me-2 fs-14">Remove</span>
												<svg xmlns="http://www.w3.org/2000/svg" height="16px" viewBox="0 0 24 24" width="16px" fill="#495057"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg>
											</a>
										</div>
										</div>
								</div>
							</div>
							<div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 alert wishlist-card">
								<div class="card item-card">
									<div class="card-body pb-0">
										<div class="text-center zoom">
											<a href="{{url('products')}}"><img class="w-100 rounded-5" src="{{asset('assets/img/ecommerce/11.jpg')}}"  alt="img" ></a>
										</div>
										<div class="card-body px-0 pb-3">
											<div class="row">
												<div class="col-9">
													<div class="cardtitle">
														<div>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star-half text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star-o text-warning fs-16"></i></a>
															<a href="javascript:void(0);"> (143)</a>
														</div>
														<a class="shop-title fs-18">womens Party Wear Hand Bag</a>
													</div>
												</div>
												<div class="col-3">
													<div class="cardprice-2">
														<span class="type--strikethrough number-font">$2998</span>
														<span class="number-font">$1998</span>
													</div>
												</div>
												<div>
													<p class="shop-description fs-13 mt-2 text-muted mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor ipsum quia saepe esse.</p>
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer text-center">
										<div class="text-center px-2">
											<a href="{{url('product-cart')}}" class="btn btn-md btn-primary mb-2 ms-2 w-45"><i class="fe fe-shopping-cart me-2"></i>Add to Cart</a>
											<a href="" class="btn btn-md btn-light mb-2 ms-2 w-45" data-bs-dismiss="alert" aria-label="Close">
												<span class="me-2 fs-14">Remove</span>
												<svg xmlns="http://www.w3.org/2000/svg" height="16px" viewBox="0 0 24 24" width="16px" fill="#495057"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg>
											</a>
										</div>
										</div>
								</div>
							</div>
							<div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 alert wishlist-card">
								<div class="card item-card">
									<div class="card-body pb-0">
										<div class="text-center zoom">
											<a href="{{url('products')}}"><img class="w-100 rounded-5" src="{{asset('assets/img/ecommerce/5.jpg')}}"  alt="img" ></a>
										</div>
										<div class="card-body px-0 pb-3">
											<div class="row">
												<div class="col-9">
													<div class="cardtitle">
														<div>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star-half text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star-o text-warning fs-16"></i></a>
															<a href="javascript:void(0);"> (29)</a>
														</div>
														<a class="shop-title fs-18">simple white Stool</a>
													</div>
												</div>
												<div class="col-3">
													<div class="cardprice-2">
														<span class="type--strikethrough number-font">$2999</span>
														<span class="number-font">$2499</span>
													</div>
												</div>
												<div>
													<p class="shop-description mt-2 fs-13 text-muted mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor ipsum quia saepe esse.</p>
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer text-center">
										<div class="text-center px-2">
											<a href="{{url('product-cart')}}" class="btn btn-md btn-primary mb-2 ms-2 w-45"><i class="fe fe-shopping-cart me-2"></i>Add to Cart</a>
											<a href="" class="btn btn-md btn-light mb-2 ms-2 w-45" data-bs-dismiss="alert" aria-label="Close">
												<span class="me-2 fs-14">Remove</span>
												<svg xmlns="http://www.w3.org/2000/svg" height="16px" viewBox="0 0 24 24" width="16px" fill="#495057"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg>
											</a>
										</div>
										</div>
								</div>
							</div>
							<div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 alert wishlist-card">
								<div class="card item-card">
									<div class="card-body pb-0">
										<div class="text-center zoom">
											<a href="{{url('products')}}"><img class="w-100 rounded-5" src="{{asset('assets/img/ecommerce/2.jpg')}}"  alt="img" ></a>
										</div>
										<div class="card-body px-0 pb-3">
											<div class="row">
												<div class="col-9">
													<div class="cardtitle">
														<div>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star-half text-warning fs-16"></i></a>
															<a href="javascript:void(0);"><i class="fa fa-star-o text-warning fs-16"></i></a>
															<a href="javascript:void(0);"> (20)</a>
														</div>
														<a class="shop-title fs-18">White Ear buds</a>
													</div>
												</div>
												<div class="col-3">
													<div class="cardprice-2">
														<span class="type--strikethrough number-font">$3998</span>
														<span class="number-font">$2999</span>
													</div>
												</div>
												<div>
													<p class="shop-description fs-13 mt-2 text-muted mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor ipsum quia saepe esse.</p>
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer text-center">
										<div class="text-center px-2">
											<a href="{{url('product-cart')}}" class="btn btn-md btn-primary mb-2 ms-2 w-45"><i class="fe fe-shopping-cart me-2"></i>Add to Cart</a>
											<a href="" class="btn btn-md btn-light mb-2 ms-2 w-45" data-bs-dismiss="alert" aria-label="Close">
												<span class="me-2 fs-14">Remove</span>
												<svg xmlns="http://www.w3.org/2000/svg" height="16px" viewBox="0 0 24 24" width="16px" fill="#495057"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg>
											</a>
										</div>
										</div>
								</div>
							</div>
						</div>
						<div class="d-flex justify-content-end">
							<ul class="pagination mb-5">
								<li class="disabled page-item">
									<a class="page-link" href="javascript:void(0);">‹</a>
								</li>
								<li class="active page-item">
									<a class="page-link" href="javascript:void(0);">1</a>
								</li>
								<li class="page-item">
									<a class="page-link" href="javascript:void(0);">2</a>
								</li>
								<li class="page-item">
									<a class="page-link" href="javascript:void(0);">3</a>
								</li>
								<li class="page-item">
									<a class="page-link" href="javascript:void(0);">4</a>
								</li>
								<li class="page-item">
									<a class="page-link" href="javascript:void(0);">5</a>
								</li>
								<li class="page-item">
									<a class="page-link" href="javascript:void(0);">›</a>
								</li>
						</ul>
						</div>
					</div>
				</div>
				<!-- COL-END -->

            @endsection

        @section('scripts')


        
        @endsection

