@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Advanced ui</h4><span
								class="text-muted mt-1 tx-13 ms-2 mb-0">/ Userlist</span>
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

				<!--Row-->
				<div class="row row-sm">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">USERS TABLE</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								<p class="tx-12 tx-gray-500 mb-2">Example of Valex Simple Table. <a href="">Learn
										more</a></p>
							</div>
							<div class="card-body">
								<div class="table-responsive border-top userlist-table">
									<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
										<thead>
											<tr>
												<th class="wd-lg-8p"><span>User</span></th>
												<th class="wd-lg-20p"><span></span></th>
												<th class="wd-lg-20p"><span>Created</span></th>
												<th class="wd-lg-20p"><span>Status</span></th>
												<th class="wd-lg-20p"><span>Email</span></th>
												<th class="wd-lg-20p">Action</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<img alt="avatar" class="rounded-circle avatar-md me-2"
														src="{{asset('assets/img/faces/1.jpg')}}">
												</td>
												<td>Megan Peters</td>
												<td>
													08/06/2021
												</td>
												<td class="text-center">
													<span class="label text-muted d-flex">
														<div class="dot-label bg-gray-300 me-1"></div>inactive
													</span>
												</td>
												<td>
													<a href="javascript:void(0);">mila@kunis.com</a>
												</td>
												<td>
													<a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="" data-bs-original-title="search">
														<i class="las la-search"></i>
													</a>
													<a href="javascript:void(0);" class="btn btn-sm btn-info btn-b" data-bs-toggle="tooltip" title="" data-bs-original-title="edit">
														<i class="las la-pen"></i>
													</a>
													<a href="javascript:void(0);" class="btn btn-sm btn-danger"  data-bs-toggle="tooltip" title="" data-bs-original-title="delete">
														<i class="las la-trash"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<img alt="avatar" class="rounded-circle avatar-md me-2"
														src="{{asset('assets/img/faces/2.jpg')}}">
												</td>
												<td>George Clooney</td>
												<td>
													12/06/2021
												</td>
												<td class="text-center">
													<span class="label text-success d-flex">
														<div class="dot-label bg-success me-1"></div>active
													</span>
												</td>
												<td>
													<a href="javascript:void(0);">marlon@brando.com</a>
												</td>
												<td>
													<a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="" data-bs-original-title="search">
														<i class="las la-search"></i>
													</a>
													<a href="javascript:void(0);" class="btn btn-sm btn-info btn-b" data-bs-toggle="tooltip" title="" data-bs-original-title="edit">
														<i class="las la-pen"></i>
													</a>
													<a href="javascript:void(0);" class="btn btn-sm btn-danger"  data-bs-toggle="tooltip" title="" data-bs-original-title="delete">
														<i class="las la-trash"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<img alt="avatar" class="rounded-circle avatar-md me-2"
														src="{{asset('assets/img/faces/13.jpg')}}">
												</td>
												<td>Ryan Gossling</td>
												<td>
													14/06/2021
												</td>
												<td class="text-center">
													<span class="label text-danger d-flex">
														<div class="dot-label bg-danger me-1"></div> banned
													</span>
												</td>
												<td>
													<a href="javascript:void(0);">jack@nicholson</a>
												</td>
												<td>
													<a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="" data-bs-original-title="search">
														<i class="las la-search"></i>
													</a>
													<a href="javascript:void(0);" class="btn btn-sm btn-info btn-b" data-bs-toggle="tooltip" title="" data-bs-original-title="edit">
														<i class="las la-pen"></i>
													</a>
													<a href="javascript:void(0);" class="btn btn-sm btn-danger"  data-bs-toggle="tooltip" title="" data-bs-original-title="delete">
														<i class="las la-trash"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<img alt="avatar" class="rounded-circle avatar-md me-2"
														src="{{asset('assets/img/faces/1.jpg')}}">
												</td>
												<td> Emma Watson</td>
												<td>
													16/06/2021
												</td>
												<td class="text-center">
													<span class="label text-warning d-flex">
														<div class="dot-label bg-warning me-1"></div>pending
													</span>
												</td>
												<td>
													<a href="javascript:void(0);">jack@nicholsonm</a>
												</td>
												<td>
													<a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="" data-bs-original-title="search">
														<i class="las la-search"></i>
													</a>
													<a href="javascript:void(0);" class="btn btn-sm btn-info btn-b" data-bs-toggle="tooltip" title="" data-bs-original-title="edit">
														<i class="las la-pen"></i>
													</a>
													<a href="javascript:void(0);" class="btn btn-sm btn-danger"  data-bs-toggle="tooltip" title="" data-bs-original-title="delete">
														<i class="las la-trash"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<img alt="avatar" class="rounded-circle avatar-md me-2"
														src="{{asset('assets/img/faces/12.jpg')}}">
												</td>
												<td>Mila Kunis</td>
												<td>
													18/06/2021
												</td>
												<td class="text-center">
													<span class="label text-muted d-flex">
														<div class="dot-label bg-gray-300 me-1"></div>inactive
													</span>
												</td>
												<td>
													<a href="javascript:void(0);">mila@kunis.com</a>
												</td>
												<td>
													<a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="" data-bs-original-title="search">
														<i class="las la-search"></i>
													</a>
													<a href="javascript:void(0);" class="btn btn-sm btn-info btn-b" data-bs-toggle="tooltip" title="" data-bs-original-title="edit">
														<i class="las la-pen"></i>
													</a>
													<a href="javascript:void(0);" class="btn btn-sm btn-danger"  data-bs-toggle="tooltip" title="" data-bs-original-title="delete">
														<i class="las la-trash"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<img alt="avatar" class="rounded-circle avatar-md me-2"
														src="{{asset('assets/img/faces/4.jpg')}}">
												</td>
												<td>Phil Watson</td>
												<td>
													23/06/2021
												</td>
												<td class="text-center">
													<span class="label text-success d-flex">
														<div class="dot-label bg-success me-1"></div>active
													</span>
												</td>
												<td>
													<a href="javascript:void(0);">phil@watson.com</a>
												</td>
												<td>
													<a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="" data-bs-original-title="search">
														<i class="las la-search"></i>
													</a>
													<a href="javascript:void(0);" class="btn btn-sm btn-info btn-b" data-bs-toggle="tooltip" title="" data-bs-original-title="edit">
														<i class="las la-pen"></i>
													</a>
													<a href="javascript:void(0);" class="btn btn-sm btn-danger"  data-bs-toggle="tooltip" title="" data-bs-original-title="delete">
														<i class="las la-trash"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<img alt="avatar" class="rounded-circle avatar-md me-2"
														src="{{asset('assets/img/faces/5.jpg')}}">
												</td>
												<td>Sonia Robertson</td>
												<td>
													25/06/2021
												</td>
												<td class="text-center">
													<span class="label text-success d-flex">
														<div class="dot-label bg-success me-1"></div>active
													</span>
												</td>
												<td>
													<a href="javascript:void(0);">robertson@sonia.com</a>
												</td>
												<td>
													<a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="" data-bs-original-title="search">
														<i class="las la-search"></i>
													</a>
													<a href="javascript:void(0);" class="btn btn-sm btn-info btn-b" data-bs-toggle="tooltip" title="" data-bs-original-title="edit">
														<i class="las la-pen"></i>
													</a>
													<a href="javascript:void(0);" class="btn btn-sm btn-danger"  data-bs-toggle="tooltip" title="" data-bs-original-title="delete">
														<i class="las la-trash"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<img alt="avatar" class="rounded-circle avatar-md me-2"
														src="{{asset('assets/img/faces/7.jpg')}}">
												</td>
												<td>Adam Hamilton</td>
												<td>
													31/06/2021
												</td>
												<td class="text-center">
													<span class="label text-danger d-flex">
														<div class="dot-label bg-danger me-1"></div>banned
													</span>
												</td>
												<td>
													<a href="javascript:void(0);">mila@kunis.com</a>
												</td>
												<td>
													<a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="" data-bs-original-title="search">
														<i class="las la-search"></i>
													</a>
													<a href="javascript:void(0);" class="btn btn-sm btn-info btn-b" data-bs-toggle="tooltip" title="" data-bs-original-title="edit">
														<i class="las la-pen"></i>
													</a>
													<a href="javascript:void(0);" class="btn btn-sm btn-danger"  data-bs-toggle="tooltip" title="" data-bs-original-title="delete">
														<i class="las la-trash"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<img alt="avatar" class="rounded-circle avatar-md me-2"
														src="{{asset('assets/img/faces/9.jpg')}}">
												</td>
												<td>Leah Morgan</td>
												<td>
													02/07/2021
												</td>
												<td class="text-center">
													<span class="label text-warning d-flex">
														<div class="dot-label bg-warning me-1"></div>pending
													</span>
												</td>
												<td>
													<a href="javascript:void(0);">morganleah@.com</a>
												</td>
												<td>
													<a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="" data-bs-original-title="search">
														<i class="las la-search"></i>
													</a>
													<a href="javascript:void(0);" class="btn btn-sm btn-info btn-b" data-bs-toggle="tooltip" title="" data-bs-original-title="edit">
														<i class="las la-pen"></i>
													</a>
													<a href="javascript:void(0);" class="btn btn-sm btn-danger"  data-bs-toggle="tooltip" title="" data-bs-original-title="delete">
														<i class="las la-trash"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<img alt="avatar" class="rounded-circle avatar-md me-2"
														src="{{asset('assets/img/faces/11.jpg')}}">
												</td>
												<td>Amelia McDonald</td>
												<td>
													08/07/2021
												</td>
												<td class="text-center">
													<span class="label text-success d-flex">
														<div class="dot-label bg-success me-1"></div>active
													</span>
												</td>
												<td>
													<a href="javascript:void(0);">amelia23@kunis.com</a>
												</td>
												<td>
													<a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="" data-bs-original-title="search">
														<i class="las la-search"></i>
													</a>
													<a href="javascript:void(0);" class="btn btn-sm btn-info btn-b" data-bs-toggle="tooltip" title="" data-bs-original-title="edit">
														<i class="las la-pen"></i>
													</a>
													<a href="javascript:void(0);" class="btn btn-sm btn-danger"  data-bs-toggle="tooltip" title="" data-bs-original-title="delete">
														<i class="las la-trash"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<img alt="avatar" class="rounded-circle avatar-md me-2"
														src="{{asset('assets/img/faces/17.jpg')}}">
												</td>
												<td>Paul Molive</td>
												<td>
													12/07/2021
												</td>
												<td class="text-center">
													<span class="label text-success d-flex">
														<div class="dot-label bg-success me-1"></div>active
													</span>
												</td>
												<td>
													<a href="javascript:void(0);">paul45@kunis.com</a>
												</td>
												<td>
													<a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="" data-bs-original-title="search">
														<i class="las la-search"></i>
													</a>
													<a href="javascript:void(0);" class="btn btn-sm btn-info btn-b" data-bs-toggle="tooltip" title="" data-bs-original-title="edit">
														<i class="las la-pen"></i>
													</a>
													<a href="javascript:void(0);" class="btn btn-sm btn-danger"  data-bs-toggle="tooltip" title="" data-bs-original-title="delete">
														<i class="las la-trash"></i>
													</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<ul class="pagination mt-4 mb-0 float-end flex-wrap">
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
					</div><!-- COL END -->
				</div>
				<!-- row closed  -->

            @endsection

        @section('scripts')


        
        @endsection

