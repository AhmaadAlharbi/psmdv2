@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Utilities</h4><span
								class="text-muted mt-1 tx-13 ms-2 mb-0">/ Margin</span>
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
					<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
						<!--div-->
						<div class="card margin-card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Margin-top Values
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in website apllication.</p>
								<div class="d-flex">
									<div class="wd-150 ht-80 bg-gray-400 me-3"></div>
									<div
										class="d-flex align-items-center justify-content-center wd-150 ht-80 bg-gray-400 mg-t-20 me-3">
										.mg-t-20
									</div>
									<div
										class="d-flex align-items-center justify-content-center wd-150 ht-80 bg-gray-400 mg-t-40 me-3">
										.mg-t-40
									</div>
								</div>
								<div class="table-responsive mt-3">
									<table class="table main-table-reference text-nowrap mg-t-10 mb-0">
										<tbody>
											<tr>
												<td class="bg-gray-100 wd-20p"><b>Classes</b></td>
												<td><code>.mg-t-[value]</code></td>
											</tr>
											<tr>
												<td class="bg-gray-100 wd-20p"><b>Values</b></td>
												<td>1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 | 9 | 10</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="card margin-card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Margin-left Values
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in website apllication.</p>
								<div class="d-flex">
									<div class="wd-150 ht-80 bg-gray-400"></div>
									<div
										class="d-flex align-items-center justify-content-center wd-150 ht-80 bg-gray-400 mg-l-20">
										.mg-l-20
									</div>
									<div
										class="d-flex align-items-center justify-content-center wd-150 ht-80 bg-gray-400 mg-l-40">
										.mg-l-40
									</div>
								</div>
								<div class="table-responsive mt-3">
									<table class="table main-table-reference text-nowrap mg-t-10 mb-0">
										<tbody>
											<tr>
												<td class="bg-gray-100 wd-20p"><b>Classes</b></td>
												<td><code>.mg-l-[value]</code></td>
											</tr>
											<tr>
												<td class="bg-gray-100 wd-20p"><b>Values</b></td>
												<td>1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 | 9 | 10</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="card margin-card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Margin-right Values
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in website apllication.</p>
								<div class="d-flex">
									<div
										class="wd-150 d-flex align-items-center justify-content-center ht-80 bg-gray-400 mg-r-10">
										.mg-r-20</div>
									<div
										class="d-flex align-items-center justify-content-center wd-150 ht-80 bg-gray-400 mg-r-40">
										.mg-r-40
									</div>
									<div
										class="d-flex align-items-center justify-content-center wd-150 ht-80 bg-gray-400 mg-r-20">
										.mg-r-20
									</div>
								</div>
								<div class="table-responsive mt-3">
									<table class="table main-table-reference text-nowrap mg-t-10 mb-0">
										<tbody>
											<tr>
												<td class="bg-gray-100 wd-20p"><b>Classes</b></td>
												<td><code>.mg-r-[value]</code></td>
											</tr>
											<tr>
												<td class="bg-gray-100 wd-20p"><b>Values</b></td>
												<td>1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 | 9 | 10</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="card margin-card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Margin-bottom Values
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in website apllication.</p>
								<div class="table-responsive">
									<div class="d-flex">
										<div class="wd-150 ht-80 bg-gray-400 me-3"></div>
										<div
											class="d-flex align-items-center justify-content-center wd-150 ht-80 bg-gray-400 mg-b-20 me-3">
											.mg-b-20
										</div>
										<div
											class="d-flex align-items-center justify-content-center wd-150 ht-80 bg-gray-400 mg-b-40 me-3">
											.mg-b-40
										</div>
									</div>
									<table class="table main-table-reference text-nowrap mg-t-10 mb-0">
										<tbody>
											<tr>
												<td class="bg-gray-100 wd-20p"><b>Classes</b></td>
												<td><code>.mg-b-[value]</code></td>
											</tr>
											<tr>
												<td class="bg-gray-100 wd-20p"><b>Values</b></td>
												<td>1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 | 9 | 10</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->

					<!--div-->
					<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
						<div class="card margin-card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Media Query Margin
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in website apllication.</p>
								<div class="table-responsive">
									<table class="table main-table-reference text-nowrap mg-t-0 mb-0">
										<thead>
											<tr>
												<th class="wd-30p">Class</th>
												<th class="wd-70p">Value</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><code>.mg-[breakpoint]-t-[value]<br>
													.mg-[breakpoint]-r-[value]<br>
													.mg-[breakpoint]-b-[value]<br>
													.mg-[breakpoint]-l-[value]</code></td>
												<td>
													<p class="mg-b-5">breakpoint: xs | sm | md | lg | xl</p>
													<p class="mg-b-0">value: the margin value (refer to code above)</p>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->

					<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
						<div class="card margin-card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Auto Margin
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in website apllication.</p>
								<div class="table-responsive">
									<table class="table main-table-reference  text-nowrap mg-t-0 mb-0">
										<thead>
											<tr>
												<th class="wd-30p">Class</th>
												<th class="wd-70p">Value</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><code>.mg-t-auto</code></td>
												<td>Set a top margin to auto</td>
											</tr>
											<tr>
												<td><code>.mg-r-auto</code></td>
												<td>Set a right margin to auto</td>
											</tr>
											<tr>
												<td><code>.mg-b-auto</code></td>
												<td>Set a bottom margin to auto</td>
											</tr>
											<tr>
												<td><code>.mg-l-auto</code></td>
												<td>Set a left margin to auto</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->
				</div>
				<!-- /row -->

            @endsection

        @section('scripts')


        
        @endsection

