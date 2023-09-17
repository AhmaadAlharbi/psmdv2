@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Filemanager</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ File List</span>
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
				<div class="row">
					<div class="col-lg-12 col-xl-12">
						<div class="row">
							<div class="col-6">
								<div class="tx-20 mb-4">
									Files List
								</div>
							</div>
							<div class="col-6 col-auto file-1">
								<div class="input-group mb-2">
									<input type="text" class="form-control rounded-3 br-te-0 br-be-0" placeholder="Search folder.....">
									<span class="input-group-text bg-transparent p-0 rounded-3 br-ts-0 br-bs-0 overflow-hidden">
										<button class="btn ripple btn-primary" type="button">Search</button>
									</span>
								</div>
							</div>
						</div>
							<div class="row">
								<div class="col-xl-3 col-md-4 col-sm-6">
									<div class="card p-0 ">
										<div class="d-flex align-items-center px-3 pt-3">
											<div class="float-end ms-auto">
												<a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
												<div class="dropdown-menu rounded-7">
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit me-2"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-share me-2"></i> Share</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash me-2"></i> Delete</a>
												</div>
											</div>
										</div>
										<div class="card-body pt-0 text-center">
											<div class="file-manger-icon">
												<a href="{{url('file-manager-details')}}">
													<img src="{{asset('assets/img/files/folder.png')}}" alt="img" class="rounded-7">
												</a>
											</div>
											<h6 class="mb-1 font-weight-semibold">videos</h6>
											<span class="text-muted">4.23gb</span>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-4 col-sm-6">
									<div class="card p-0 ">
										<div class="d-flex align-items-center px-3 pt-3">
											<div class="float-end ms-auto">
												<a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
												<div class="dropdown-menu rounded-7">
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit me-2"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-share me-2"></i> Share</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash me-2"></i> Delete</a>
												</div>
											</div>
										</div>
										<div class="card-body pt-0 text-center">
											<div class="file-manger-icon">
												<a href="{{url('file-manager-details')}}">
													<img src="{{asset('assets/img/files/folder.png')}}" alt="img" class="rounded-7">
												</a>
											</div>
											<h6 class="mb-1 font-weight-semibold">Images</h6>
											<span class="text-muted">1.23gb</span>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-4 col-sm-6">
									<div class="card p-0 ">
										<div class="d-flex align-items-center px-3 pt-3">
											<div class="float-end ms-auto">
												<a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
												<div class="dropdown-menu rounded-7">
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit me-2"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-share me-2"></i> Share</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash me-2"></i> Delete</a>
												</div>
											</div>
										</div>
										<div class="card-body pt-0 text-center">
											<div class="file-manger-icon">
												<a href="{{url('file-manager-details')}}">
													<img src="{{asset('assets/img/files/folder.png')}}" alt="img" class="rounded-7">
												</a>
											</div>
											<h6 class="mb-1 font-weight-semibold">Downloads</h6>
											<span class="text-muted">453kb</span>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-4 col-sm-6">
									<div class="card p-0 ">
										<div class="d-flex align-items-center px-3 pt-3">
											<div class="float-end ms-auto">
												<a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
												<div class="dropdown-menu rounded-7">
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit me-2"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-share me-2"></i> Share</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash me-2"></i> Delete</a>
												</div>
											</div>
										</div>
										<div class="card-body pt-0 text-center">
											<div class="file-manger-icon">
												<a href="{{url('file-manager-details')}}">
													<img src="{{asset('assets/img/files/file.png')}}" alt="img" class="rounded-7">
												</a>
											</div>
											<h6 class="mb-1 font-weight-semibold">document.pdf</h6>
											<span class="text-muted">23kb</span>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-4 col-sm-6">
									<div class="card p-0 ">
										<div class="d-flex align-items-center px-3 pt-3">
											<div class="float-end ms-auto">
												<a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
												<div class="dropdown-menu rounded-7">
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit me-2"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-share me-2"></i> Share</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash me-2"></i> Delete</a>
												</div>
											</div>
										</div>
										<div class="card-body pt-0 text-center">
											<div class="file-manger-icon">
												<a href="{{url('file-manager-details')}}">
													<img src="{{asset('assets/img/files/file.png')}}" alt="img" class="rounded-7">
												</a>
											</div>
											<h6 class="mb-1 font-weight-semibold">document.pdf</h6>
											<span class="text-muted">23kb</span>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-4 col-sm-6">
									<div class="card p-0 ">
										<div class="d-flex align-items-center px-3 pt-3">
											<div class="float-end ms-auto">
												<a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
												<div class="dropdown-menu rounded-7">
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit me-2"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-share me-2"></i> Share</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash me-2"></i> Delete</a>
												</div>
											</div>
										</div>
										<div class="card-body pt-0 text-center">
											<div class="file-manger-icon">
												<a href="{{url('file-manager-details')}}">
													<img src="{{asset('assets/img/files/word.png')}}" alt="img" class="rounded-7">
												</a>
											</div>
											<h6 class="mb-1 font-weight-semibold">Word document</h6>
											<span class="text-muted">23kb</span>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-4 col-sm-6">
									<div class="card p-0 ">
										<div class="d-flex align-items-center px-3 pt-3">
											<div class="float-end ms-auto">
												<a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
												<div class="dropdown-menu rounded-7">
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit me-2"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-share me-2"></i> Share</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash me-2"></i> Delete</a>
												</div>
											</div>
										</div>
										<div class="card-body pt-0 text-center">
											<div class="file-manger-icon">
												<a href="{{url('file-manager-details')}}">
													<img src="{{asset('assets/img/files/file.png')}}" alt="img" class="rounded-7">
												</a>
											</div>
											<h6 class="mb-1 font-weight-semibold">document.pdf</h6>
											<span class="text-muted">23kb</span>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-4 col-sm-6">
									<div class="card p-0 ">
										<div class="d-flex align-items-center px-3 pt-3">
											<div class="float-end ms-auto">
												<a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
												<div class="dropdown-menu rounded-7">
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit me-2"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-share me-2"></i> Share</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash me-2"></i> Delete</a>
												</div>
											</div>
										</div>
										<div class="card-body pt-0 text-center">
											<div class="file-manger-icon">
												<a href="{{url('file-manager-details')}}">
													<img src="{{asset('assets/img/files/file.png')}}" alt="img" class="rounded-7">
												</a>
											</div>
											<h6 class="mb-1 font-weight-semibold">document.pdf</h6>
											<span class="text-muted">23kb</span>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-4 col-sm-6">
									<div class="card p-0 ">
										<div class="d-flex align-items-center px-3 pt-3">
											<div class="float-end ms-auto">
												<a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
												<div class="dropdown-menu rounded-7">
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit me-2"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-share me-2"></i> Share</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash me-2"></i> Delete</a>
												</div>
											</div>
										</div>
										<div class="card-body pt-0 text-center">
											<div class="file-manger-icon">
												<a href="{{url('file-manager-details')}}">
													<img src="{{asset('assets/img/files/folder.png')}}" alt="img" class="rounded-7">
												</a>
											</div>
											<h6 class="mb-1 font-weight-semibold">Downloads</h6>
											<span class="text-muted">453kb</span>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-4 col-sm-6">
									<div class="card p-0 ">
										<div class="d-flex align-items-center px-3 pt-3">
											<div class="float-end ms-auto">
												<a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
												<div class="dropdown-menu rounded-7">
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit me-2"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-share me-2"></i> Share</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash me-2"></i> Delete</a>
												</div>
											</div>
										</div>
										<div class="card-body pt-0 text-center">
											<div class="file-manger-icon">
												<a href="{{url('file-manager-details')}}">
													<img src="{{asset('assets/img/files/file.png')}}" alt="img" class="rounded-7">
												</a>
											</div>
											<h6 class="mb-1 font-weight-semibold">document.pdf</h6>
											<span class="text-muted">23kb</span>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-4 col-sm-6">
									<div class="card p-0 ">
										<div class="d-flex align-items-center px-3 pt-3">
											<div class="float-end ms-auto">
												<a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
												<div class="dropdown-menu rounded-7">
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit me-2"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-share me-2"></i> Share</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash me-2"></i> Delete</a>
												</div>
											</div>
										</div>
										<div class="card-body pt-0 text-center">
											<div class="file-manger-icon">
												<a href="{{url('file-manager-details')}}">
													<img src="{{asset('assets/img/files/file.png')}}" alt="img" class="rounded-7">
												</a>
											</div>
											<h6 class="mb-1 font-weight-semibold">document.pdf</h6>
											<span class="text-muted">23kb</span>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-4 col-sm-6">
									<div class="card p-0 ">
										<div class="d-flex align-items-center px-3 pt-3">
											<div class="float-end ms-auto">
												<a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
												<div class="dropdown-menu rounded-7">
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit me-2"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-share me-2"></i> Share</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash me-2"></i> Delete</a>
												</div>
											</div>
										</div>
										<div class="card-body pt-0 text-center">
											<div class="file-manger-icon">
												<a href="{{url('file-manager-details')}}">
													<img src="{{asset('assets/img/files/folder.png')}}" alt="img" class="rounded-7">
												</a>
											</div>
											<h6 class="mb-1 font-weight-semibold">Downloads</h6>
											<span class="text-muted">453kb</span>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-4 col-sm-6">
									<div class="card p-0 ">
										<div class="d-flex align-items-center px-3 pt-3">
											<div class="float-end ms-auto">
												<a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
												<div class="dropdown-menu rounded-7">
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit me-2"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-share me-2"></i> Share</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash me-2"></i> Delete</a>
												</div>
											</div>
										</div>
										<div class="card-body pt-0 text-center">
											<div class="file-manger-icon1">
												<a href="{{url('file-manager-details')}}">
													<img src="{{asset('assets/img/files/doc.png')}}" alt="img" class="rounded-7">
												</a>
											</div>
											<h6 class="mb-1 font-weight-semibold mt-1">Document</h6>
											<span class="text-muted">23kb</span>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-4 col-sm-6">
									<div class="card p-0 ">
										<div class="d-flex align-items-center px-3 pt-3">
											<div class="float-end ms-auto">
												<a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
												<div class="dropdown-menu rounded-7">
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit me-2"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-share me-2"></i> Share</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash me-2"></i> Delete</a>
												</div>
											</div>
										</div>
										<div class="card-body pt-0 text-center">
											<div class="file-manger-icon">
												<a href="{{url('file-manager-details')}}">
													<img src="{{asset('assets/img/files/image.png')}}" alt="img" class="rounded-7">
												</a>
											</div>
											<h6 class="mb-1 font-weight-semibold mt-2">login image</h6>
											<span class="text-muted">23kb</span>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-4 col-sm-6">
									<div class="card p-0 ">
										<div class="d-flex align-items-center px-3 pt-3">
											<div class="float-end ms-auto">
												<a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
												<div class="dropdown-menu rounded-7">
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit me-2"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-share me-2"></i> Share</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash me-2"></i> Delete</a>
												</div>
											</div>
										</div>
										<div class="card-body pt-0 text-center">
											<div class="file-manger-icon">
												<a href="{{url('file-manager-details')}}">
													<img src="{{asset('assets/img/files/image.png')}}" alt="img" class="rounded-7">
												</a>
											</div>
											<h6 class="mb-1 font-weight-semibold mt-2">beach image</h6>
											<span class="text-muted">4.23gb</span>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-4 col-sm-6">
									<div class="card p-0 ">
										<div class="d-flex align-items-center px-3 pt-3">
											<div class="float-end ms-auto">
												<a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
												<div class="dropdown-menu rounded-7">
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit me-2"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-share me-2"></i> Share</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash me-2"></i> Delete</a>
												</div>
											</div>
										</div>
										<div class="card-body pt-0 text-center">
											<div class="file-manger-icon">
												<a href="{{url('file-manager-details')}}">
													<img src="{{asset('assets/img/files/image.png')}}" alt="img" class="rounded-7">
												</a>
											</div>
											<h6 class="mb-1 font-weight-semibold mt-2">sky image</h6>
											<span class="text-muted">1.23gb</span>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-4 col-sm-6">
									<div class="card p-0 ">
										<div class="d-flex align-items-center px-3 pt-3">
											<div class="float-end ms-auto">
												<a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
												<div class="dropdown-menu rounded-7">
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit me-2"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-share me-2"></i> Share</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash me-2"></i> Delete</a>
												</div>
											</div>
										</div>
										<div class="card-body pt-0 text-center">
											<div class="file-manger-icon">
												<a href="{{url('file-manager-details')}}">
													<img src="{{asset('assets/img/files/image.png')}}" alt="img" class="rounded-7">
												</a>
											</div>
											<h6 class="mb-1 font-weight-semibold mt-2">Sea</h6>
											<span class="text-muted">897mb</span>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-4 col-sm-6">
									<div class="card p-0 ">
										<div class="d-flex align-items-center px-3 pt-3">
											<div class="float-end ms-auto">
												<a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
												<div class="dropdown-menu rounded-7">
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit me-2"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-share me-2"></i> Share</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash me-2"></i> Delete</a>
												</div>
											</div>
										</div>
										<div class="card-body pt-0 text-center">
											<div class="file-manger-icon">
												<a href="{{url('file-manager-details')}}">
													<img src="{{asset('assets/img/files/image.png')}}" alt="img" class="rounded-7">
												</a>
											</div>
											<h6 class="mb-1 font-weight-semibold mt-2">Outdoor Image</h6>
											<span class="text-muted">23kb</span>
										</div>
									</div>
								</div>
						</div>
						<ul class="pagination float-end mb-4">
							<li class="page-item page-prev disabled">
								<a class="page-link" href="javascript:void(0);" tabindex="-1">Prev</a>
							</li>
							<li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
							<li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
							<li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
							<li class="page-item page-next">
								<a class="page-link" href="javascript:void(0);">Next</a>
							</li>
					</ul>
					</div>
				</div>
				<!-- End Row -->

            @endsection

        @section('scripts')


        
        @endsection

