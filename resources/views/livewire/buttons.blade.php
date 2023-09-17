@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Elements</h4><span
								class="text-muted mt-1 tx-13 ms-2 mb-0">/ Buttons</span>
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
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card" id="button1">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Default Buttons
								</div>
								<p class="mg-b-20">Predefined button styles, each serving its own semantic purpose..</p>
								<div class="text-wrap">
									<div class="example">
										<div class="row row-xs wd-xl-80p">
											<div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">
												<button class="btn btn-primary btn-block">Primary</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">
												<button class="btn btn-secondary btn-block">Secondary</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
												<button class="btn btn-success btn-block">Success</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
												<button class="btn btn-warning btn-block">Warning</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10">
												<button class="btn btn-danger btn-block">Danger</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10">
												<button class="btn btn-info btn-block">Info</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10">
												<button class="btn btn-light btn-block">Light</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10">
												<button class="btn btn-dark btn-block">Dark</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-md-12">
						<div class="card" id="button1">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Disabled Buttons
								</div>
								<p class="mg-b-20">Predefined button styles, each serving its own semantic purpose..</p>
								<div class="text-wrap">
									<div class="example">
										<div class="row row-xs wd-xl-80p">
											<div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">
												<button class="btn btn-primary btn-block disabled">Primary</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">
												<button class="btn btn-secondary btn-block disabled">Secondary</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
												<button class="btn btn-success btn-block disabled">Success</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
												<button class="btn btn-warning btn-block disabled">Warning</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10">
												<button class="btn btn-danger btn-block disabled">Danger</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10">
												<button class="btn btn-info btn-block disabled">Info</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10">
												<button class="btn btn-light btn-block disabled">Light</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10">
												<button class="btn btn-dark btn-block disabled">Dark</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-12 col-md-12">
						<div class="card" id="button33">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Gradient Buttons
								</div>
								<p class="mg-b-20">Predefined button styles, each serving its own semantic purpose..</p>
								<div class="text-wrap">
									<div class="example">
										<div class="row row-xs wd-xl-80p">
											<div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">
												<button class="btn btn-primary-gradient btn-block">Primary</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">
												<button class="btn btn-secondary-gradient btn-block">Secondary</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
												<button class="btn btn-success-gradient btn-block">Success</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
												<button class="btn btn-warning-gradient btn-block">Warning</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10">
												<button class="btn btn-danger-gradient btn-block">Danger</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10">
												<button class="btn btn-info-gradient btn-block">Info</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10">
												<button class="btn btn-light-gradient btn-block text-body">Light</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10">
												<button class="btn btn-dark-gradient btn-block">Dark</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-12 col-md-12">
						<div class="card" id="button2">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Outline Buttons
								</div>
								<p class="mg-b-20">Predefined button styles, each serving its own semantic purpose..</p>
								<div class="text-wrap">
									<div class="example">
										<div class="row row-xs wd-xl-80p">
											<div class="col-sm-6 col-md-3 mb-2">
												<button class="btn btn-outline-primary btn-block">Primary</button>
											</div>
											<div class="col-sm-6 col-md-3 mb-2">
												<button class="btn btn-outline-secondary btn-block">Secondary</button>
											</div>
											<div class="col-sm-6 col-md-3 mb-2">
												<button class="btn btn-outline-success btn-block">Success</button>
											</div>
											<div class="col-sm-6 col-md-3 mb-2">
												<button class="btn btn-outline-warning btn-block">Warning</button>
											</div>
											<div class="col-sm-6 col-md-3 mb-2">
												<button class="btn btn-outline-danger btn-block">Danger</button>
											</div>
											<div class="col-sm-6 col-md-3 mb-2">
												<button class="btn btn-outline-info btn-block">Info</button>
											</div>
											<div class="col-sm-6 col-md-3 mb-2">
												<button class="btn btn-outline-light btn-block">Light</button>
											</div>
											<div class="col-sm-6 col-md-3 mb-2">
												<button class="btn btn-outline-dark btn-block">Dark</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-12 col-md-12">
						<div class="card" id="button3">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									ROUNDED BUTTONS
								</div>
								<p class="mg-b-20">Predefined button styles, each serving its own semantic purpose..</p>
								<div class="text-wrap">
									<div class="example">
										<div class="row row-xs wd-xl-80p">
											<div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">
												<button class="btn btn-primary btn-rounded btn-block">Primary</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">
												<button
													class="btn btn-secondary btn-rounded btn-block">Secondary</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
												<button class="btn btn-success btn-rounded btn-block">Success</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
												<button class="btn btn-warning btn-rounded btn-block">Warning</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10">
												<button class="btn btn-danger btn-rounded btn-block">Danger</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10">
												<button class="btn btn-info btn-rounded btn-block">Info</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10">
												<button class="btn btn-light btn-rounded btn-block">Light</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10">
												<button class="btn btn-dark btn-rounded btn-block">Dark</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-12 col-md-12">
						<div class="card" id="button2">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Rounded Outline Buttons
								</div>
								<p class="mg-b-20">Predefined button styles, each serving its own semantic purpose..</p>
								<div class="text-wrap">
									<div class="example">
										<div class="row row-xs wd-xl-80p">
											<div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">
												<button
													class="btn btn-outline-primary  btn-rounded btn-block">Primary</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">
												<button
													class="btn btn-outline-secondary btn-rounded  btn-block">Secondary</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
												<button
													class="btn btn-outline-success btn-rounded  btn-block">Success</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
												<button
													class="btn btn-outline-warning btn-rounded  btn-block">Warning</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10">
												<button
													class="btn btn-outline-danger btn-rounded  btn-block">Danger</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10">
												<button
													class="btn btn-outline-info btn-rounded  btn-block">Info</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10">
												<button
													class="btn btn-outline-light btn-rounded  btn-block">Light</button>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10">
												<button
													class="btn btn-outline-dark btn-rounded  btn-block">Dark</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<h3 class="card-title  mg-b-10">Button with loading animation</h3>
								<p class="mg-b-20">A basic button with added loaders...</p>
								<div class="text-wrap">
									<div class="example">
										<div class="row row-xs wd-xl-80p btn-list btn-animation">
											<button type="button" class="btn btn-secondary btn-spiner ms-2 mb-1"><span
													class="loading">loading...</span></button>
											<button type="button" class="btn btn-success btn-spiner ms-2 mb-1"><span
													class="loading">loading...</span></button>
											<button type="button" class="btn btn-warning btn-spiner ms-2 mb-1"><span
													class="loading">loading...</span></button>
											<button type="button" class="btn btn-primary btn-loaders ms-2 mb-1"><span
													class="loading">loading...</span></button>
											<button type="button" class="btn btn-danger btn-loaders ms-2 mb-1"><span
													class="loading">loading...</span></button>
											<button type="button" class="btn btn-info btn-loaders ms-2 mb-1"><span
													class="loading">loading...</span></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-6 col-md-12 col-xl-6">
						<div class="card">
							<div class="card-body">
								<h3 class="card-title  mg-b-10">BUTTON WITH ICONS</h3>
								<p class="mg-b-20">A basic button with added icons...</p>
								<div class="text-wrap">
									<div class="example">
										<div class="row row-xs wd-xl-80p btn-list">
											<button type="button" class="btn btn-dark button-icon mb-1"><i
													class="fe fe-upload"></i></button>
											<button type="button" class="btn btn-warning mx-2 button-icon mb-1"><i
													class="fe fe-heart me-2"></i>I like</button>
											<button type="button" class="btn btn-outline-success button-icon mb-1"><i
													class="fe fe-check"></i></button>
											<button type="button" class="btn btn-outline-primary mx-2 button-icon mb-1"><i
													class="fe fe-plus me-2"></i>More</button>
											<button type="button" class="btn btn-secondary button-icon mb-1"><i
													class="fe fe-link"></i></button>
											<button type="button" class="btn btn-info mx-2 button-icon mb-1"><i
													class="fe fe-message-circle me-2"></i>Comment</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-12 col-xl-6">
						<div class="card" id="button5">
							<div class="card-body">
								<h3 class="card-title  mg-b-10">ICON BUTTONS</h3>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in your website
									apllication....</p>
								<div class="text-wrap">
									<div class="example">
										<div class="btn-icon-list btn-list">
											<button type="button" class="btn btn-icon btn-primary"><i
													class="fe fe-activity"></i></button>
											<button type="button" class="btn btn-icon  btn-dark"><i
													class="fe fe-github"></i></button>
											<button type="button" class="btn btn-icon  btn-success"><i
													class="fe fe-bell"></i></button>
											<button type="button" class="btn btn-icon  btn-warning"><i
													class="fe fe-star"></i></button>
											<button type="button" class="btn btn-icon  btn-danger"><i
													class="fe fe-trash"></i></button>
											<button type="button" class="btn btn-icon  btn-purple"><i
													class="fe fe-bar-chart"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-xl-6">
						<div class="card">
							<div class="card-body">
								<h3 class="card-title  mg-b-10">Button size</h3>
								<p class="mg-b-20">A basic button with sizes</p>
								<div class="">
									<div class="example">
										<div class="btn-list">
											<div class="row">
												<div class="col-md-4 mb-2">
													<button type="button" class="btn btn-warning btn-sm mb-1">Small
														button</button>
												</div>
												<div class="col-md-4 mb-2">
													<button type="button" class="btn btn-info mb-1">Medium
														button</button>
												</div>
												<div class="col-md-4 mb-2">
													<button type="button" class="btn btn-success btn-lg mb-1">Large
														button</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- COL END -->
					<div class="col-md-12 col-xl-6">
						<div class="card" id="button6">
							<div class="card-body">
								<h3 class="card-title  mg-b-10">Button Widths</h3>
								<p class="mg-b-20">A basic button with Width sizes</p>
								<div class="text-wrap">
									<div class="example">
										<div class="btn-list">
											<button type="button" class="btn btn-primary btn-w-xs mb-1">XS</button>
											<button type="button" class="btn btn-teal btn-w-sm mb-1">SM</button>
											<button type="button" class="btn btn-danger btn-w-sm mb-1">MD</button>
											<button type="button" class="btn btn-success btn-w-lg mb-1">LG</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-12 col-md-12 col-xl-12">
						<div class="card">
							<div class="card-body">
								<h3 class="card-title  mg-b-10">Button size</h3>
								<p class="mg-b-20">A basic button block sizes</p>
								<div class="">
									<div class="example">
										<div class="btn-list">
											<button type="button" class="btn btn-primary btn-lg btn-block">Block level
												button</button>
											<button type="button" class="btn btn-secondary btn-md btn-block">Block level
												button</button>
											<button type="button" class="btn btn-info btn-sm btn-block">Block level
												button</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- COL END -->
					<div class="col-md-12 col-xl-6">
						<div class="card">
							<div class="card-body">
								<h3 class="card-title  mg-b-10">Checkbox button groups</h3>
								<div class="">
									<div class="example">
										<div class="group-btn checkboxbtns">
											<div class="row">
												<div class="btn-group" role="group" aria-label="Basic ">
													<input type="checkbox" class="btn-check" id="btncheck1">
													<label class="btn btn-outline-primary" for="btncheck1">Checkbox
														1</label>

													<input type="checkbox" class="btn-check" id="btncheck2">
													<label class="btn btn-outline-primary rounded-0" for="btncheck2">Checkbox
														2</label>

													<input type="checkbox" class="btn-check" id="btncheck3">
													<label class="btn btn-outline-primary" for="btncheck3">Checkbox
														3</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- COL END -->
					<div class="col-md-12 col-xl-6">
						<div class="card">
							<div class="card-body">
								<h3 class="card-title  mg-b-10">Radio button groups</h3>
								<div class="">
									<div class="example">
										<div class="group-btn radiobtns">
											<div class="row">
												<div class="btn-group" role="group"
													aria-label="Basic radio toggle button group">
													<input type="radio" class="btn-check" name="btnradio"
														id="btnradio21" checked>
													<label class="btn btn-outline-primary" for="btnradio21">Radio
														1</label>

													<input type="radio" class="btn-check" name="btnradio"
														id="btnradio22">
													<label class="btn btn-outline-primary rounded-0" for="btnradio22">Radio
														2</label>

													<input type="radio" class="btn-check" name="btnradio"
														id="btnradio33">
													<label class="btn btn-outline-primary" for="btnradio33">Radio
														3</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- COL END -->
					<div class="col-lg-12 col-md-12 col-xl-12">
						<div class="card">
							<div class="card-body">
								<h3 class="card-title  mg-b-10">Button Toolbar</h3>
								<div class="">
									<div class="example">
										<div class="btn-list">
											<div class="btn-toolbar" role="toolbar"
												aria-label="Toolbar with button groups">
												<div class="btn-group mx-2 mt-2 mb-2" role="group"
													aria-label="First group">
													<button type="button" class="btn btn-primary">1</button>
													<button type="button" class="btn btn-primary">2</button>
													<button type="button" class="btn btn-primary">3</button>
													<button type="button" class="btn btn-primary">4</button>
												</div>
												<div class="btn-group mx-2 mt-2 mb-2" role="group"
													aria-label="Second group">
													<button type="button" class="btn btn-primary">5</button>
													<button type="button" class="btn btn-primary">6</button>
													<button type="button" class="btn btn-primary">7</button>
												</div>
												<div class="btn-group mx-2 mt-2 mb-2" role="group" aria-label="Third group">
													<button type="button" class="btn btn-primary">8</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- COL END -->
					<div class="col-lg-12 col-md-12 col-xl-12">
						<div class="card">
							<div class="card-body">
								<h3 class="card-title  mg-b-10">Toggle buttons</h3>
								<div class="">
									<div class="example">
										<div class="">
											<div class="row">
												<div class="btn-list">
													<button type="button" class="btn btn-primary mb-1"
														data-bs-toggle="button">Toggle button</button>
													<button type="button" class="btn btn-primary active  mb-1"
														data-bs-toggle="button" aria-pressed="true">Active toggle
														button</button>
													<button type="button" class="btn btn-primary  mb-1" disabled
														data-bs-toggle="button">Disabled toggle button</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- COL END -->
					<div class="col-lg-12 col-md-12 col-xl-12">
						<div class="card" id="button61">
							<div class="card-body">
								<h3 class="card-title  mg-b-10">DROPDOWN BUTTONS</h3>
								<p class="mg-b-20">A button variant for using only icons.</p>
								<div class="text-wrap">
									<div class="example">
										<div class="row row-xs wd-xl-80p">
											<div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">
												<button data-bs-toggle="dropdown"
													class="btn btn-secondary btn-block">Dropdown <i
														class="icon ion-ios-arrow-down tx-11 mg-l-3"></i></button>
												<div class="dropdown-menu">
													<a href="" class="dropdown-item">Profile</a>
													<a href="" class="dropdown-item">Activity Logs</a>
													<a href="" class="dropdown-item">Account Settings</a>
													<a href="" class="dropdown-item">Logout</a>
												</div><!-- dropdown-menu -->
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">
												<button data-bs-toggle="dropdown"
													class="btn btn-primary btn-block">Dropdown <i
														class="icon ion-ios-arrow-down tx-11 mg-l-3"></i></button>
												<div class="dropdown-menu">
													<a href="" class="dropdown-item">Profile</a>
													<a href="" class="dropdown-item">Activity Logs</a>
													<a href="" class="dropdown-item">Account Settings</a>
													<a href="" class="dropdown-item">Logout</a>
												</div><!-- dropdown-menu -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-12 col-md-12 col-xl-12">
						<div class="card" id="button7">
							<div class="card-body">
								<h3 class="card-title  mg-b-10">Button Groups</h3>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in your website
									apllication..</p>
								<div class="text-wrap">
									<div class="example ">
										<div class="row row-sm">
											<div class="col-lg-6 mg-t-20 mg-lg-t-0">
												<div aria-label="Basic example" class="btn-group" role="group">
												<button class="btn btn-secondary pd-sm-x-25 pd-x-15 active"
													type="button">Left</button> <button
													class="btn btn-secondary pd-sm-x-25 pd-x-15 " type="button">Center</button>
												<button class="btn btn-secondary pd-sm-x-25 pd-x-15 "
													type="button">Right</button>
												</div>
											</div><!-- col-4 -->
											<div class="col-lg-3 mg-t-20 mg-lg-t-0">
												<div aria-label="Basic example" class="btn-group" role="group">
													<button class="btn btn-primary btn-icon active" type="button"><i
															class="typcn typcn-media-play-outline"></i></button> <button
														class="btn btn-primary btn-icon" type="button"><i
															class="typcn typcn-media-pause-outline"></i></button>
													<button class="btn btn-primary btn-icon" type="button"><i
															class="typcn typcn-media-stop-outline"></i></button>
												</div>
											</div><!-- col-2 -->
											<div class="col-lg-3 mg-t-20 mg-lg-t-0">
												<div aria-label="Basic example" class="btn-group" role="group">
													<button class="btn btn-secondary btn-icon active" type="button"><i
															class="typcn typcn-media-play-outline"></i></button> <button
														class="btn btn-secondary btn-icon" type="button"><i
															class="typcn typcn-media-pause-outline"></i></button>
													<button class="btn btn-secondary btn-icon" type="button"><i
															class="typcn typcn-media-stop-outline"></i></button>
												</div>
											</div><!-- col-4 -->
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


        
        @endsection

