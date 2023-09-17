@extends('layouts.switcher')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span
								class="text-muted mt-1 tx-13 ms-2 mb-0">/ Switcher-1</span>
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
				<div class="container p-0 p-sm-5">
					<div class="row">
						<div class="col-lg-3 col-md-12 col-sm-12"></div>
						<div class="col-lg-6 col-md-12 col-sm-12 ">
							<!-- Switcher -->
							<div class="switcher-wrapper">
								<div class="card">
									<div class="card-body p-0">
										<div class="form_holder sidebar-right1">
											<div class="row">
												<div class="predefined_styles text-start">
													<div class="swichermainleft text-center">
														<div class="p-4 d-grid gap-2">
															<a href="../../index.html"
																class="btn ripple btn-primary mt-0">View Demo</a>
															<a href="https://themeforest.net/item/valex-bootstrap-admin-dashboard-html-template/26645744"
																class="btn ripple btn-info">Buy Now</a>
															<a href="https://themeforest.net/user/spruko/portfolio"
																class="btn ripple btn-danger">Our Portfolio</a>
														</div>
													</div>
													<div class="swichermainleft">
														<h5 class="py-3 bd-y mb-0">LTR AND RTL VERSIONS</h5>
														<div class="skin-body p-2 m-0">
															<div class="switch_section">
																<div class="switch-toggle d-flex mt-2">
																	<span class="me-auto">LTR</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch25" id="myonoffswitch54"
																			class="onoffswitch2-checkbox" checked>
																		<label for="myonoffswitch54"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
																<div class="switch-toggle d-flex mt-2">
																	<span class="me-auto">RTL</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch25" id="myonoffswitch55"
																			class="onoffswitch2-checkbox">
																		<label for="myonoffswitch55"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
															</div>
														</div>
													</div>
													<div class="swichermainleft">
														<h5 class="py-3 bd-y mb-0">Navigation Style</h5>
														<div class="skin-body  p-2 m-0">
															<div class="switch_section">
																<div class="switch-toggle d-flex">
																	<span class="me-auto">Vertical Menu</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch15" id="myonoffswitch34"
																			class="onoffswitch2-checkbox" checked>
																		<label for="myonoffswitch34"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
																<div class="switch-toggle d-flex mt-2">
																	<span class="me-auto">Horizantal Click Menu</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch15" id="myonoffswitch35"
																			class="onoffswitch2-checkbox">
																		<label for="myonoffswitch35"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
																<div class="switch-toggle d-flex mt-2">
																	<span class="me-auto">Horizantal Hover Menu</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch15" id="myonoffswitch111"
																			class="onoffswitch2-checkbox">
																		<label for="myonoffswitch111"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
															</div>
														</div>
													</div>
													<div class="swichermainleft">
														<h5 class="py-3 bd-y mb-0">Light Theme Style</h5>
														<div class="skin-body p-2 m-0">
															<div class="switch_section">
																<div class="switch-toggle d-flex">
																	<span class="me-auto">Light Theme</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch1" id="myonoffswitch1"
																			class="onoffswitch2-checkbox" checked>
																		<label for="myonoffswitch1"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
																<div class="switch-toggle d-flex">
																	<span class="me-auto">Light Primary</span>
																	<div class="">
																		<input
																			class="wd-25 ht-25 input-color-picker color-primary-light"
																			value="#0162e8" id="colorID"
																			type="color"
																			data-id="bg-color" data-id1="bg-hover"
																			data-id2="bg-border"
																			data-id7="transparentcolor"
																			name="lightPrimary">
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="swichermainleft">
														<h5 class="py-3 bd-y mb-0">Dark Theme Style</h5>
														<div class="skin-body p-2 m-0">
															<div class="switch_section">
																<div class="switch-toggle d-flex mt-2">
																	<span class="me-auto">Dark Theme</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch1" id="myonoffswitch2"
																			class="onoffswitch2-checkbox">
																		<label for="myonoffswitch2"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
																<div class="switch-toggle d-flex mt-2">
																	<span class="me-auto">Dark Primary</span>
																	<div class="">
																		<input
																			class="wd-25 ht-25 input-dark-color-picker color-primary-dark"
																			value="#0162e8" id="darkPrimaryColorID"
																			type="color"
																			data-id="bg-color" data-id1="bg-hover"
																			data-id2="bg-border" data-id3="primary"
																			data-id8="transparentcolor"
																			name="darkPrimary">
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="swichermainleft">
														<h5 class="py-3 bd-y mb-0">Transparent Style</h5>
														<div class="skin-body p-2 m-0">
															<div class="switch_section">
																<div class="switch-toggle d-flex mt-2 mb-3">
																	<span class="me-auto">Transparent Theme</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch1"
																			id="myonoffswitchTransparent"
																			class="onoffswitch2-checkbox">
																		<label for="myonoffswitchTransparent"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
																<div class="switch-toggle d-flex">
																	<span class="me-auto">Transparent Primary</span>
																	<div class="">
																		<input
																			class="wd-30 ht-30 input-transparent-color-picker color-primary-transparent"
																			value="#0162e8"
																			id="transparentPrimaryColorID"
																			type="color" data-id="bg-color"
																			data-id1="bg-hover" data-id2="bg-border"
																			data-id3="primary" data-id4="primary"
																			data-id9="transparentcolor"
																			name="tranparentPrimary">
																	</div>
																</div>
																<div class="switch-toggle d-flex mt-2">
																	<span class="me-auto">Transparent Background</span>
																	<div class="">
																		<input
																			class="wd-30 ht-30 input-transparent-color-picker color-bg-transparent"
																			value="#0162e8" id="transparentBgColorID"
																			type="color"
																			data-id5="body" data-id6="theme"
																			data-id9="transparentcolor"
																			name="transparentBackground">
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="swichermainleft">
														<h5 class="py-3 bd-y mb-0">Transparent Bg-Image Style</h5>
														<div class="skin-body p-2 m-0">
															<div class="switch_section">
																<div class="switch-toggle d-flex">
																	<span class="me-auto">BG-Image Primary</span>
																	<div class="">
																		<input
																			class="wd-30 ht-30 input-transparent-color-picker color-primary-transparent"
																			value="#0162e8"
																			id="transparentBgImgPrimaryColorID"
																			type="color" data-id="bg-color"
																			data-id1="bg-hover" data-id2="bg-border"
																			data-id3="primary" data-id4="primary"
																			data-id9="transparentcolor"
																			name="tranparentPrimary">
																	</div>
																</div>
																<div class="switch-toggle">
																	<a class="bg-img1 bg-img" href="javascript:void(0);"><img src="{{asset('assets/img/media/bg-img1.jpg')}}" id="bgimage1" alt="switch-img"></a>
																	<a class="bg-img2 bg-img" href="javascript:void(0);"><img src="{{asset('assets/img/media/bg-img2.jpg')}}" id="bgimage2" alt="switch-img"></a>
																	<a class="bg-img3 bg-img" href="javascript:void(0);"><img src="{{asset('assets/img/media/bg-img3.jpg')}}" id="bgimage3" alt="switch-img"></a>
																	<a class="bg-img4 bg-img" href="javascript:void(0);"><img src="{{asset('assets/img/media/bg-img4.jpg')}}" id="bgimage4" alt="switch-img"></a>
																</div>
															</div>
														</div>
													</div>
													<div class="swichermainleft horizontal-styles">
														<h5 class="py-3 bd-y mb-0">Leftmenu Styles</h5>
														<div class="skin-body p-2 m-0">
															<div class="switch_section">
																<div class="switch-toggle d-flex">
																	<span class="me-auto">Default Horizontal</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch2" id="myonoffswitch03"
																			class="onoffswitch2-checkbox" checked>
																		<label for="myonoffswitch03"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
																<div class="switch-toggle d-flex mt-2">
																	<span class="me-auto">Horizontal Centerlogo</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch2" id="myonoffswitch04"
																			class="onoffswitch2-checkbox">
																		<label for="myonoffswitch04"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
															</div>
														</div>
													</div>
													<div class="swichermainleft leftmenu-styles">
														<h5 class="py-3 bd-y mb-0">Leftmenu Styles</h5>
														<div class="skin-body p-2 m-0">
															<div class="switch_section">
																<div class="switch-toggle d-flex">
																	<span class="me-auto">Light Menu</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch2" id="myonoffswitch3"
																			class="onoffswitch2-checkbox" checked>
																		<label for="myonoffswitch3"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
																<div class="switch-toggle d-flex mt-2">
																	<span class="me-auto">Color Menu</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch2" id="myonoffswitch4"
																			class="onoffswitch2-checkbox">
																		<label for="myonoffswitch4"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
																<div class="switch-toggle d-flex mt-2">
																	<span class="me-auto">Dark Menu</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch2" id="myonoffswitch5"
																			class="onoffswitch2-checkbox">
																		<label for="myonoffswitch5"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
																<div class="switch-toggle d-flex mt-2">
																	<span class="me-auto">Gradient Menu</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch2" id="myonoffswitch25"
																			class="onoffswitch2-checkbox">
																		<label for="myonoffswitch25"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
															</div>
														</div>
													</div>
													<div class="swichermainleft header-styles">
														<h5 class="py-3 bd-y mb-0">Header Styles</h5>
														<div class="skin-body p-2 m-0">
															<div class="switch_section">
																<div class="switch-toggle d-flex">
																	<span class="me-auto">Light Header</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch3" id="myonoffswitch6"
																			class="onoffswitch2-checkbox" checked>
																		<label for="myonoffswitch6"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
																<div class="switch-toggle d-flex mt-2">
																	<span class="me-auto">Color Header</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch3" id="myonoffswitch7"
																			class="onoffswitch2-checkbox">
																		<label for="myonoffswitch7"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
																<div class="switch-toggle d-flex mt-2">
																	<span class="me-auto">Dark Header</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch3" id="myonoffswitch8"
																			class="onoffswitch2-checkbox">
																		<label for="myonoffswitch8"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
																<div class="switch-toggle d-flex mt-2">
																	<span class="me-auto">Gradient Header</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch3" id="myonoffswitch26"
																			class="onoffswitch2-checkbox">
																		<label for="myonoffswitch26"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
															</div>
														</div>
													</div>
													<div class="swichermainleft">
														<h5 class="py-3 bd-y mb-0">Skin Modes</h5>
														<div class="switch_section">
															<div class="switch-toggle d-flex">
																<span class="me-auto">Default Body</span>
																<div class="onoffswitch2"><input type="radio"
																		name="onoffswitchBody" id="myonoffswitch07"
																		class="onoffswitch2-checkbox" checked="">
																	<label for="myonoffswitch07"
																		class="onoffswitch2-label"></label>
																</div>
															</div>
															<div class="switch-toggle d-flex">
																<span class="me-auto">Body Style1</span>
																<div class="onoffswitch2"><input type="radio"
																		name="onoffswitchBody" id="myonoffswitch06"
																		class="onoffswitch2-checkbox">
																	<label for="myonoffswitch06"
																		class="onoffswitch2-label"></label>
																</div>
															</div>
														</div>
													</div>
													<div class="swichermainleft vertical-images">
														<h5 class="py-3 bd-y mb-0">Leftmenu Bg-Image</h5>
														<div class="skin-body p-2 m-0 light-pattern">
															<button type="button" id="leftmenuimage1"
																class="bg1 wscolorcode1 blackborder"></button>
															<button type="button" id="leftmenuimage2"
																class="bg2 wscolorcode1 blackborder"></button>
															<button type="button" id="leftmenuimage3"
																class="bg3 wscolorcode1 blackborder"></button>
															<button type="button" id="leftmenuimage4"
																class="bg4 wscolorcode1 blackborder"></button>
															<button type="button" id="leftmenuimage5"
																class="bg5 wscolorcode1 blackborder"></button>
														</div>
													</div>
													<div class="swichermainleft">
														<h5 class="py-3 bd-y mb-0">Layout Width Styles</h5>
														<div class="skin-body p-2 m-0">
															<div class="switch_section">
																<div class="switch-toggle d-flex">
																	<span class="me-auto">Full Width</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch4" id="myonoffswitch9"
																			class="onoffswitch2-checkbox" checked>
																		<label for="myonoffswitch9"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
																<div class="switch-toggle d-flex mt-2">
																	<span class="me-auto">Boxed</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch4" id="myonoffswitch10"
																			class="onoffswitch2-checkbox">
																		<label for="myonoffswitch10"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
															</div>
														</div>
													</div>
													<div class="swichermainleft">
														<h5 class="py-3 bd-y mb-0">Layout Positions</h5>
														<div class="skin-body p-2 m-0">
															<div class="switch_section">
																<div class="switch-toggle d-flex">
																	<span class="me-auto">Fixed</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch5" id="myonoffswitch11"
																			class="onoffswitch2-checkbox" checked>
																		<label for="myonoffswitch11"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
																<div class="switch-toggle d-flex mt-2">
																	<span class="me-auto">Scrollable</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch5" id="myonoffswitch12"
																			class="onoffswitch2-checkbox">
																		<label for="myonoffswitch12"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
															</div>
														</div>
													</div>
													<div class="swichermainleft vertical-switcher">
														<h5 class="py-3 bd-y mb-0">Sidemenu layout Styles</h5>
														<div class="skin-body p-2 m-0">
															<div class="switch_section">
																<div class="switch-toggle d-flex">
																	<span class="me-auto">Default Menu</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch6" id="myonoffswitch13"
																			class="onoffswitch2-checkbox default-menu"
																			checked>
																		<label for="myonoffswitch13"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
																<div class="switch-toggle d-flex mt-2">
																	<span class="me-auto">Closed Menu</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch6" id="myonoffswitch30"
																			class="onoffswitch2-checkbox default-menu">
																		<label for="myonoffswitch30"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
																<div class="switch-toggle d-flex mt-2">
																	<span class="me-auto">Icon with Text</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch6" id="myonoffswitch14"
																			class="onoffswitch2-checkbox">
																		<label for="myonoffswitch14"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
																<div class="switch-toggle d-flex mt-2">
																	<span class="me-auto">Icon Overlay</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch6" id="myonoffswitch15"
																			class="onoffswitch2-checkbox">
																		<label for="myonoffswitch15"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
																<div class="switch-toggle d-flex mt-2">
																	<span class="me-auto">Hover Submenu</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch6" id="myonoffswitch32"
																			class="onoffswitch2-checkbox">
																		<label for="myonoffswitch32"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
																<div class="switch-toggle d-flex mt-2">
																	<span class="me-auto">Hover Submenu style 1</span>
																	<p class="onoffswitch2 my-0"><input type="radio"
																			name="onoffswitch6" id="myonoffswitch33"
																			class="onoffswitch2-checkbox">
																		<label for="myonoffswitch33"
																			class="onoffswitch2-label"></label>
																	</p>
																</div>
															</div>
														</div>
													</div>
													<div class="swichermainleft">
														<h5 class="py-3 bd-y mb-0">Reset All Styles</h5>
														<div class="skin-body p-2 m-0">
															<div class="switch_section my-4">
																<button class="btn btn-danger btn-block" id="resetAll"
												                type="button">Reset All
																</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Switcher -->
						</div>
						<div class="col-lg-3 col-md-12 col-sm-12"></div>
					</div>
				</div>
				<!-- row closed -->

            @endsection

        @section('scripts')


        
        @endsection

