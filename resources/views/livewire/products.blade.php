@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Ecommerce</h4><span
								class="text-muted mt-1 tx-13 ms-2 mb-0">/ Products</span>
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
					<div class="col-xl-3 col-lg-5 col-md-12 mb-3 mb-md-0">
						<div class="card">
							<div class="card-header border-bottom py-3 mb-0 fw-bold text-uppercase">Category</div>
							<div class="card-body pb-0">
								<div class="form-group">
									<label class="form-label">Mens</label>
									<select name="beast" id="select-beast"
										class="form-control  nice-select  form-select">
										<option value="0">--Select--</option>
										<option value="1">Foot wear</option>
										<option value="2">Top wear</option>
										<option value="3">Bootom wear</option>
										<option value="4">Men's Groming</option>
										<option value="5">Accessories</option>
									</select>
								</div>
								<div class="form-group mt-2">
									<label class="form-label">Women</label>
									<select name="beast" id="select-beast1"
										class="form-control  nice-select  form-select">
										<option value="0">--Select--</option>
										<option value="1">Western wear</option>
										<option value="2">Foot wear</option>
										<option value="3">Top wear</option>
										<option value="4">Bootom wear</option>
										<option value="5">Beuty Groming</option>
										<option value="6">Accessories</option>
										<option value="7">jewellery</option>
									</select>
								</div>
								<div class="form-group mt-2">
									<label class="form-label">Baby & Kids</label>
									<select name="beast" id="select-beast2"
										class="form-control  nice-select  form-select">
										<option value="0">--Select--</option>
										<option value="1">Boys clothing</option>
										<option value="2">girls Clothing</option>
										<option value="3">Toys</option>
										<option value="4">Baby Care</option>
										<option value="5">Kids footwear</option>
									</select>
								</div>
								<div class="form-group mt-2">
									<label class="form-label">Electronics</label>
									<select name="beast" id="select-beast3"
										class="form-control  nice-select  form-select">
										<option value="0">--Select--</option>
										<option value="1">Mobiles</option>
										<option value="2">Laptops</option>
										<option value="3">Gaming & Accessories</option>
										<option value="4">Health care Appliances</option>
									</select>
								</div>
								<div class="form-group mt-2">
									<label class="form-label">Sport,Books & More </label>
									<select name="beast" id="select-beast4"
										class="form-control  nice-select  form-select">
										<option value="0">--Select--</option>
										<option value="1">Stationery</option>
										<option value="2">Books</option>
										<option value="3">Gaming</option>
										<option value="4">Music</option>
										<option value="5">Exercise & fitness</option>
									</select>
								</div>
							</div>
							<div
								class="card-header border-bottom border-top py-3 mb-0 fw-bold text-uppercase rounded-0">
								Filter</div>
							<div class="card-body">
								<form role="form product-form">
									<div class="form-group">
										<label>Brand</label>
										<select class="form-control nice-select">
											<option>Wallmart</option>
											<option>Catseye</option>
											<option>Moonsoon</option>
											<option>Textmart</option>
										</select>
									</div>
									<div class="form-group">
										<label>Type</label>
										<select class="form-control nice-select">
											<option>Small</option>
											<option>Medium</option>
											<option>Large</option>
											<option>Extra Large</option>
										</select>
									</div>
								</form>
							</div>
							<div
								class="card-header border-bottom border-top py-3 mb-0 fw-bold text-uppercase rounded-0">
								Rating</div>
							<div class="py-2 px-3">
								<label class="p-1 mt-2 d-flex align-items-center">
									<span class="check-box mb-0">
										<span class="ckbox"><input checked="" type="checkbox"><span></span></span>
									</span>
									<span class="ms-3 tx-16 my-auto">
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
									</span>
								</label>
								<label class="p-1 mt-2 d-flex align-items-center">
									<span class="check-box mb-0">
										<span class="ckbox"><input checked="" type="checkbox"><span></span></span>
									</span>
									<span class="ms-3 tx-16 my-auto">
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
									</span>
								</label>
								<label class="p-1 mt-2 d-flex align-items-center">
									<span class="check-box mb-0">
										<span class="ckbox"><input checked="" type="checkbox"><span></span></span>
									</span>
									<span class="ms-3 tx-16 my-auto">
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
									</span>
								</label>
								<label class="p-1 mt-2 d-flex align-items-center">
									<span class="checkbox mb-0">
										<span class="check-box">
											<span class="ckbox"><input type="checkbox"><span></span></span>
										</span>
									</span>
									<span class="ms-3 tx-16 my-auto">
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
									</span>
								</label>
								<label class="p-1 mt-2 d-flex align-items-center">
									<span class="checkbox mb-0">
										<span class="check-box">
											<span class="ckbox"><input type="checkbox"><span></span></span>
										</span>
									</span>
									<span class="ms-3 tx-16 my-auto">
										<i class="ion ion-md-star  text-warning"></i>
									</span>
								</label>
								<button class="btn btn-primary-gradient mt-2 mb-2 pb-2" type="submit">Filter</button>
							</div>
						</div>
					</div>
					<div class="col-xl-9 col-lg-7 col-md-12">
						<div class="card">
							<div class="card-body p-2">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search ...">
									<span class="input-group-text p-0">
										<button class="btn btn-primary" type="button">Search</button>
									</span>
								</div>
							</div>
						</div>
						<div class="row row-sm">
							<div class="col-md-6 col-lg-12 col-xl-4  col-sm-6">
								<div class="card">
									<div class="card-body h-100">
										<div class="pro-img-box">
												<div class="d-flex product-sale">
													<div class="badge bg-pink">New</div>
													<a href="{{url('wish-list')}}"><i class="mdi mdi-heart-outline ms-auto wishlist"></i></a>
												</div>
												<a href="{{url('product-details')}}"><img class="w-100" src="{{asset('assets/img/ecommerce/01.jpg')}}"
													alt="product-image">
												</a>
												<a href="{{url('product-cart')}}" class="adtocart"> <i class="las la-shopping-cart "></i>
												</a>
											</div>
										<div class="text-center pt-3">
											<h3 class="h6 mb-2 mt-4 fw-bold text-uppercase">FLOWER POT</h3>
											<span class="tx-15 ms-auto">
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star-half text-warning"></i>
												<i class="ion ion-md-star-outline text-warning"></i>
											</span>
											<h4 class="h5 mb-0 mt-2 text-center fw-bold text-danger">$26 <span
													class="text-secondary fw-normal tx-13 ms-1 prev-price">$59</span>
											</h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-12 col-xl-4  col-sm-6">
								<div class="card">
									<div class="card-body h-100">
										<div class="pro-img-box">
											<div class="d-flex product-sale">
												<a href="{{url('wish-list')}}"><i class="mdi mdi-heart text-danger ms-auto wishlist"></i></a>
											</div>
											<a href="{{url('product-details')}}"><img class="w-100" src="{{asset('assets/img/ecommerce/02.jpg')}}"
												alt="product-image"></a>
											<a href="{{url('product-cart')}}" class="adtocart"> <i class="las la-shopping-cart "></i>
											</a>
										</div>
										<div class="text-center pt-3">
											<h3 class="h6 mb-2 mt-4 fw-bold text-uppercase">Chair</h3>
											<span class="tx-15 ms-auto">
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star-half text-warning"></i>
												<i class="ion ion-md-star-outline text-warning"></i>
											</span>
											<h4 class="h5 mb-0 mt-2 text-center fw-bold text-danger">$35 <span
													class="text-secondary fw-normal tx-13 ms-1 prev-price">$79</span>
											</h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-12 col-xl-4  col-sm-6">
								<div class="card">
									<div class="card-body h-100">
										<div class="pro-img-box">
											<div class="d-flex product-sale">
												<div class="badge bg-success">New</div>
												<a href="{{url('wish-list')}}"><i class="mdi mdi-heart-outline ms-auto wishlist"></i></a>
											</div>
											<a href="{{url('product-details')}}"><img class="w-100" src="{{asset('assets/img/ecommerce/03.jpg')}}"
												alt="product-image"></a>
											<a href="{{url('product-cart')}}" class="adtocart"> <i class="las la-shopping-cart "></i>
											</a>
										</div>
										<div class="text-center pt-3">
											<h3 class="h6 mb-2 mt-4 fw-bold text-uppercase">Hiking Boots</h3>
											<span class="tx-15 ms-auto">
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star-half text-warning"></i>
												<i class="ion ion-md-star-outline text-warning"></i>
											</span>
											<h4 class="h5 mb-0 mt-2 text-center fw-bold text-danger">$25 <span
													class="text-secondary fw-normal tx-13 ms-1 prev-price">$59</span>
											</h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-12 col-xl-4  col-sm-6">
								<div class="card">
									<div class="card-body h-100">
										<div class="pro-img-box">
											<div class="d-flex product-sale">
												<div class="badge bg-success">New</div>
												<a href="{{url('wish-list')}}"><i class="mdi mdi-heart-outline ms-auto wishlist"></i></a>
											</div>
											<a href="{{url('product-details')}}"><img class="w-100" src="{{asset('assets/img/ecommerce/06.jpg')}}"
												alt="product-image"></a>
											<a href="{{url('product-cart')}}" class="adtocart"> <i class="las la-shopping-cart "></i>
											</a>
										</div>
										<div class="text-center pt-3">
											<h3 class="h6 mb-2 mt-4 fw-bold text-uppercase">college bag</h3>
											<span class="tx-15 ms-auto">
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star-half text-warning"></i>
												<i class="ion ion-md-star-outline text-warning"></i>
											</span>
											<h4 class="h5 mb-0 mt-2 text-center fw-bold text-danger">$35 <span
													class="text-secondary fw-normal tx-13 ms-1 prev-price">$69</span>
											</h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-12 col-xl-4  col-sm-6">
								<div class="card">
									<div class="card-body h-100">
										<div class="pro-img-box">
											<div class="d-flex product-sale">
												<a href="{{url('wish-list')}}"><i class="mdi mdi-heart ms-auto wishlist text-danger"></i></a>
											</div>
											<a href="{{url('product-details')}}"><img class="w-100" src="{{asset('assets/img/ecommerce/04.jpg')}}"
												alt="product-image"></a>
											<a href="javascript:void(0);" class="adtocart"> <i class="las la-shopping-cart"></i>
											</a>
										</div>
										<div class="text-center pt-3">
											<h3 class="h6 mb-2 mt-4 fw-bold text-uppercase">Headphones</h3>
											<span class="tx-15 ms-auto">
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star-half text-warning"></i>
												<i class="ion ion-md-star-outline text-warning"></i>
											</span>
											<h4 class="h5 mb-0 mt-2 text-center fw-bold text-danger">$46 <span
													class="text-secondary fw-normal tx-13 ms-1 prev-price">$89</span>
											</h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-12 col-xl-4  col-sm-6">
								<div class="card">
									<div class="card-body h-100">
										<div class="pro-img-box">
											<div class="d-flex product-sale">
												<a href="{{url('wish-list')}}"><i class="mdi mdi-heart-outline ms-auto wishlist"></i></a>
											</div>
											<a href="{{url('product-details')}}"><img class="w-100" src="{{asset('assets/img/ecommerce/05.jpg')}}"
												alt="product-image"></a>
											<a href="{{url('product-cart')}}" class="adtocart"> <i class="las la-shopping-cart "></i>
											</a>
										</div>
										<div class="text-center pt-3">
											<h3 class="h6 mb-2 mt-4 fw-bold text-uppercase">Camera lens</h3>
											<span class="tx-15 ms-auto">
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star-half text-warning"></i>
												<i class="ion ion-md-star-outline text-warning"></i>
											</span>
											<h4 class="h5 mb-0 mt-2 text-center fw-bold text-danger">$159 <span
													class="text-secondary fw-normal tx-13 ms-1 prev-price">$299</span>
											</h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-12 col-xl-4  col-sm-6">
								<div class="card">
									<div class="card-body h-100">
										<div class="pro-img-box">
											<div class="d-flex product-sale">
												<div class="badge bg-purple">New</div>
												<a href="{{url('wish-list')}}"><i class="mdi mdi-heart ms-auto wishlist text-danger"></i></a>
											</div>
											<a href="{{url('product-details')}}"><img class="w-100" src="{{asset('assets/img/ecommerce/09.jpg')}}"
												alt="product-image"></a>
											<a href="{{url('product-cart')}}" class="adtocart"> <i class="las la-shopping-cart "></i>
											</a>
										</div>
										<div class="text-center pt-3">
											<h3 class="h6 mb-2 mt-4 fw-bold text-uppercase">Camera</h3>
											<span class="tx-15 ms-auto">
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star-half text-warning"></i>
												<i class="ion ion-md-star-outline text-warning"></i>
											</span>
											<h4 class="h5 mb-0 mt-2 text-center fw-bold text-danger">$129 <span
													class="text-secondary fw-normal tx-13 ms-1 prev-price">$189</span>
											</h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-12 col-xl-4  col-sm-6">
								<div class="card">
									<div class="card-body h-100">
										<div class="pro-img-box">
											<div class="d-flex product-sale">
												<a href="{{url('wish-list')}}"><i class="mdi mdi-heart-outline ms-auto wishlist"></i></a>
											</div>
											<a href="{{url('product-details')}}"><img class="w-100" src="{{asset('assets/img/ecommerce/11.jpg')}}"
												alt="product-image"></a>
											<a href="{{url('product-cart')}}" class="adtocart"> <i class="las la-shopping-cart "></i>
											</a>
										</div>
										<div class="text-center pt-3">
											<h3 class="h6 mb-2 mt-4 fw-bold text-uppercase">Handbag</h3>
											<span class="tx-15 ms-auto">
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star-half text-warning"></i>
												<i class="ion ion-md-star-outline text-warning"></i>
											</span>
											<h4 class="h5 mb-0 mt-2 text-center fw-bold text-danger">$19 <span
													class="text-secondary fw-normal tx-13 ms-1 prev-price">$39</span>
											</h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-12 col-xl-4  col-sm-6">
								<div class="card">
									<div class="card-body h-100">
										<div class="pro-img-box">
											<div class="d-flex product-sale">
												<div class="badge bg-info">New</div>
												<a href="{{url('wish-list')}}"><i class="mdi mdi-heart ms-auto wishlist text-danger"></i></a>
											</div>
											<a href="{{url('product-details')}}"><img class="w-100" src="{{asset('assets/img/ecommerce/07.jpg')}}"
												alt="product-image"></a>
											<a href="{{url('product-cart')}}" class="adtocart"> <i class="las la-shopping-cart "></i>
											</a>
										</div>
										<div class="text-center pt-3">
											<h3 class="h6 mb-2 mt-4 fw-bold text-uppercase">Laptop</h3>
											<span class="tx-15 ms-auto">
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star-half text-warning"></i>
												<i class="ion ion-md-star-outline text-warning"></i>
											</span>
											<h4 class="h5 mb-0 mt-2 text-center fw-bold text-danger">$89 <span
													class="text-secondary fw-normal tx-13 ms-1 prev-price">$120</span>
											</h4>
										</div>
									</div>
								</div>
							</div>
							<ul class="pagination product-pagination ms-auto float-end">
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
					</div>
				</div>
				<!-- row closed -->

            @endsection

        @section('scripts')

		<!-- Internal Nice-select js-->
		<script src="{{asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
		<script src="{{asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
        
        @endsection

