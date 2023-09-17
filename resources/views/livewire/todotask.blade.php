@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span
								class="text-muted mt-1 tx-13 ms-2 mb-0">/ Todo-task</span>
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
					<div class="col-xl-8 col-xxl-9 col-md-12">
						<div class="row row-sm">
							<!-- col -->
							<div class="col-lg-12">
								<div class="card mg-b-20">
									<div class="card-body d-flex p-3">
										<div class="main-content-label mb-0 mg-t-8">User Today Tasks</div>
										<div class="ms-auto"><a class="d-block tx-20" data-bs-placement="top"
												data-bs-toggle="tooltip" title="Add New User" href="javascript:void(0);"><i
													class="si si-plus text-muted"></i></a></div>
									</div>
								</div>
							</div>
							<!-- /col -->

							<!-- col -->
							<div class="col-xxl-4 col-md-6">
								<div class="card mg-b-20">
									<div class="card-body p-0">
										<div class="todo-widget-header d-flex pb-2 pd-20">
											<div class="drop-down-profile" data-bs-toggle="dropdown"><img alt=""
													class="rounded-circle avatar avatar-md "
													src="{{asset('assets/img/faces/1.jpg')}}"><span
													class="assigned-task bg-purple">9</span></div>
											<div class="dropdown-menu tx-13">
												<div class="main-header-profile">
													<div class="tx-16 h5 mg-b-0">Petey Cruiser</div>
													<span class="text-muted">Web Designer</span>
												</div>
												<a class="dropdown-item" href="javascript:void(0);">View Total Tasks</a>
												<a class="dropdown-item" href="javascript:void(0);">Completed Tasks</a>
												<a class="dropdown-item" href="javascript:void(0);">Settings</a>
											</div>
											<div class="ms-auto">
												<div class="">
													<a href="javascript:void(0);" data-bs-placement="top" data-bs-toggle="tooltip"
														title="archive" class="p-2 text-muted"><i
															class="fas fa-envelope-open-text"></i></a>
													<a href="javascript:void(0);" data-bs-placement="top" data-bs-toggle="tooltip"
														title="Move to spam" class="p-2 text-muted"><i
															class="fas fa-exclamation-circle"></i></a>
													<a class="p-2 text-muted" data-bs-toggle="dropdown"><i
															class="fas fa-ellipsis-v"></i></a>
													<div class="dropdown-menu tx-13 dropleft">
														<a class="dropdown-item" href="javascript:void(0);">Mark As Unread</a>
														<a class="dropdown-item" href="javascript:void(0);">Mark As Important</a>
														<a class="dropdown-item" href="javascript:void(0);">Add to Tasks</a>
														<a class="dropdown-item" href="javascript:void(0);">Add Star</a>
														<a class="dropdown-item" href="javascript:void(0);">Move to</a>
														<a class="dropdown-item" href="javascript:void(0);">Mute</a>
														<a class="dropdown-item" href="javascript:void(0);">Move to Trash</a>
													</div>
												</div>
											</div>
										</div>
										<div class="p-4">
											<span class="tx-12 text-muted">10.54am</span><span
												class="badge bg-primary-transparent text-primary ms-auto float-end">New
												task</span>
											<h5 class="tx-14 mb-0 mg-t-5 text-capitalize">Work Assigned by Clients ,try
												to get new work</h5>
										</div>
										<div class="p-4 border-top">
											<span class="tx-12 text-muted">10.54am</span><span
												class="badge bg-danger-transparent text-danger ms-auto float-end">Pending
												task</span>
											<h5 class="tx-14 mb-0 mg-t-5 text-capitalize">Sed ut perspiciatis unde omnis
												iste natus</h5>
										</div>
									</div>
									<div class="card-footer ">
										<a class="btn btn-primary disabled" href="javascript:void(0);" title="Assign Task">Assign</a>
										<a class="btn btn-outline-primary ms-auto float-end" href="javascript:void(0);"
											data-bs-placement="top" data-bs-toggle="tooltip" title="View Task">View
											All</a>
									</div>
								</div>
							</div>
							<!-- /col -->

							<!-- col -->
							<div class="col-xxl-4 col-md-6">
								<div class="card mg-b-20">
									<div class="card-body p-0">
										<div class="todo-widget-header d-flex pb-2 pd-20">
											<div class="drop-down-profile" data-bs-toggle="dropdown"><img alt=""
													class="rounded-circle avatar avatar-md "
													src="{{asset('assets/img/faces/12.jpg')}}"><span
													class="assigned-task bg-info">2</span></div>
											<div class="dropdown-menu tx-13">
												<div class="main-header-profile">
													<div class="tx-16 h5 mg-b-0">Petey Cruiser</div>
													<span class="text-muted">Web Designer</span>
												</div>
												<a class="dropdown-item" href="javascript:void(0);">View Total Tasks</a>
												<a class="dropdown-item" href="javascript:void(0);">Completed Tasks</a>
												<a class="dropdown-item" href="javascript:void(0);">Settings</a>
											</div>
											<div class="ms-auto">
												<div class="">
													<a href="javascript:void(0);" data-bs-placement="top" data-bs-toggle="tooltip"
														title="archive" class="p-2 text-muted"><i
															class="fas fa-envelope-open-text"></i></a>
													<a href="javascript:void(0);" data-bs-placement="top" data-bs-toggle="tooltip"
														title="Move to spam" class="p-2 text-muted"><i
															class="fas fa-exclamation-circle"></i></a>
													<a class="p-2 text-muted" data-bs-toggle="dropdown"><i
															class="fas fa-ellipsis-v"></i></a>
													<div class="dropdown-menu tx-13">
														<a class="dropdown-item" href="javascript:void(0);">Mark As Unread</a>
														<a class="dropdown-item" href="javascript:void(0);">Mark As Important</a>
														<a class="dropdown-item" href="javascript:void(0);">Add to Tasks</a>
														<a class="dropdown-item" href="javascript:void(0);">Add Star</a>
														<a class="dropdown-item" href="javascript:void(0);">Move to</a>
														<a class="dropdown-item" href="javascript:void(0);">Mute</a>
														<a class="dropdown-item" href="javascript:void(0);">Move to Trash</a>
													</div>
												</div>
											</div>
										</div>
										<div class="p-4">
											<span class="tx-12 text-muted">10.54am</span><span
												class="badge bg-primary-transparent text-primary ms-auto float-end">New
												task</span>
											<h5 class="tx-14 mb-0 mg-t-5 text-capitalize">voluptatem accusantium dolo
												laudantium</h5>
										</div>
										<div class="p-4 border-top">
											<span class="tx-12 text-muted">10.54am</span><span
												class="badge bg-danger-transparent text-danger ms-auto float-end">Pending
												task</span>
											<h5 class="tx-14 mb-0 mg-t-5 text-capitalize">inventore veritatis et quasi
												architecto</h5>
										</div>
									</div>
									<div class="card-footer ">
										<a class="btn btn-primary" href="javascript:void(0);" data-bs-placement="top"
											data-bs-toggle="tooltip" title="Assign Task">Assign</a>
										<a class="btn btn-outline-primary ms-auto float-end" href="javascript:void(0);"
											data-bs-placement="top" data-bs-toggle="tooltip" title="View Task">View
											All</a>
									</div>
								</div>
							</div>
							<!-- /col -->

							<!-- col -->
							<div class="col-xxl-4 col-md-6">
								<div class="card mg-b-20">
									<div class="card-body p-0">
										<div class="todo-widget-header d-flex pb-2 pd-20">
											<div class="drop-down-profile" data-bs-toggle="dropdown"><img alt=""
													class="rounded-circle avatar avatar-md "
													src="{{asset('assets/img/faces/9.jpg')}}"><span
													class="assigned-task bg-danger">6</span></div>
											<div class="dropdown-menu tx-13">
												<div class="main-header-profile">
													<div class="tx-16 h5 mg-b-0">Petey Cruiser</div>
													<span class="text-muted">Web Designer</span>
												</div>
												<a class="dropdown-item" href="javascript:void(0);">View Total Tasks</a>
												<a class="dropdown-item" href="javascript:void(0);">Completed Tasks</a>
												<a class="dropdown-item" href="javascript:void(0);">Settings</a>
											</div>
											<div class="ms-auto">
												<div class="">
													<a href="javascript:void(0);" data-bs-placement="top" data-bs-toggle="tooltip"
														title="archive" class="p-2 text-muted"><i
															class="fas fa-envelope-open-text"></i></a>
													<a href="javascript:void(0);" data-bs-placement="top" data-bs-toggle="tooltip"
														title="Move to spam" class="p-2 text-muted"><i
															class="fas fa-exclamation-circle"></i></a>
													<a class="p-2 text-muted" data-bs-toggle="dropdown"><i
															class="fas fa-ellipsis-v"></i></a>
													<div class="dropdown-menu tx-13">
														<a class="dropdown-item" href="javascript:void(0);">Mark As Unread</a>
														<a class="dropdown-item" href="javascript:void(0);">Mark As Important</a>
														<a class="dropdown-item" href="javascript:void(0);">Add to Tasks</a>
														<a class="dropdown-item" href="javascript:void(0);">Add Star</a>
														<a class="dropdown-item" href="javascript:void(0);">Move to</a>
														<a class="dropdown-item" href="javascript:void(0);">Mute</a>
														<a class="dropdown-item" href="javascript:void(0);">Move to Trash</a>
													</div>
												</div>
											</div>
										</div>
										<div class="p-4">
											<span class="tx-12 text-muted">10.54am</span><span
												class="badge bg-primary-transparent text-primary ms-auto float-end">New
												task</span>
											<h5 class="tx-14 mb-0 mg-t-5 text-capitalize">Nemo enim ipsam voluptatem
												quia voluptas</h5>
										</div>
										<div class="p-4 border-top">
											<span class="tx-12 text-muted">10.54am</span><span
												class="badge bg-danger-transparent text-danger ms-auto float-end">Pending
												task</span>
											<h5 class="tx-14 mb-0 mg-t-5 text-capitalize">vero eos et accusamus et iusto
												odio dignissimos</h5>
										</div>
									</div>
									<div class="card-footer ">
										<a class="btn btn-primary" href="javascript:void(0);" data-bs-placement="top"
											data-bs-toggle="tooltip" title="Assign Task">Assign</a>
										<a class="btn btn-outline-primary ms-auto float-end" href="javascript:void(0);"
											data-bs-placement="top" data-bs-toggle="tooltip" title="View Task">View
											All</a>
									</div>
								</div>
							</div>
							<!-- /col -->

							<!-- col -->
							<div class="col-xxl-4 col-md-6">
								<div class="card mg-b-20 mg-lg-b-0">
									<div class="card-body p-0">
										<div class="todo-widget-header d-flex pb-2 pd-20">
											<div class="drop-down-profile" data-bs-toggle="dropdown"><img alt=""
													class="rounded-circle avatar avatar-md "
													src="{{asset('assets/img/faces/4.jpg')}}"><span
													class="assigned-task bg-info">9</span></div>
											<div class="dropdown-menu tx-13">
												<div class="main-header-profile">
													<div class="tx-16 h5 mg-b-0">Petey Cruiser</div>
													<span class="text-muted">Web Designer</span>
												</div>
												<a class="dropdown-item" href="javascript:void(0);">View Total Tasks</a>
												<a class="dropdown-item" href="javascript:void(0);">Completed Tasks</a>
												<a class="dropdown-item" href="javascript:void(0);">Settings</a>
											</div>
											<div class="ms-auto">
												<div class="">
													<a href="javascript:void(0);" data-bs-placement="top" data-bs-toggle="tooltip"
														title="archive" class="p-2 text-muted"><i
															class="fas fa-envelope-open-text"></i></a>
													<a href="javascript:void(0);" data-bs-placement="top" data-bs-toggle="tooltip"
														title="Move to spam" class="p-2 text-muted"><i
															class="fas fa-exclamation-circle"></i></a>
													<a class="p-2 text-muted" data-bs-toggle="dropdown"><i
															class="fas fa-ellipsis-v"></i></a>
													<div class="dropdown-menu tx-13">
														<a class="dropdown-item" href="javascript:void(0);">Mark As Unread</a>
														<a class="dropdown-item" href="javascript:void(0);">Mark As Important</a>
														<a class="dropdown-item" href="javascript:void(0);">Add to Tasks</a>
														<a class="dropdown-item" href="javascript:void(0);">Add Star</a>
														<a class="dropdown-item" href="javascript:void(0);">Move to</a>
														<a class="dropdown-item" href="javascript:void(0);">Mute</a>
														<a class="dropdown-item" href="javascript:void(0);">Move to Trash</a>
													</div>
												</div>
											</div>
										</div>
										<div class="p-4">
											<span class="tx-12 text-muted">10.54am</span><span
												class="badge bg-primary-transparent text-primary ms-auto float-end">New
												task</span>
											<h5 class="tx-14 mb-0 mg-t-5 text-capitalize">Ut enim ad minima veniam
												nostrum exercitationem</h5>
										</div>
										<div class="p-4 border-top">
											<span class="tx-12 text-muted">10.54am</span><span
												class="badge bg-danger-transparent text-danger ms-auto float-end">Pending
												task</span>
											<h5 class="tx-14 mb-0 mg-t-5 text-capitalize">Quis autem vel eum iure
												reprehenderit qui</h5>
										</div>
									</div>
									<div class="card-footer ">
										<a class="btn btn-primary disabled" href="javascript:void(0);" data-bs-placement="top"
											data-bs-toggle="tooltip" title="Assign Task">Assign</a>
										<a class="btn btn-outline-primary ms-auto float-end" href="javascript:void(0);"
											data-bs-placement="top" data-bs-toggle="tooltip" title="View Task">View
											All</a>
									</div>
								</div>
							</div>
							<!-- /col -->

							<!-- col -->
							<div class="col-xxl-4 col-md-6">
								<div class="card mg-b-20 mg-lg-b-0">
									<div class="card-body p-0">
										<div class="todo-widget-header d-flex pb-2 pd-20">
											<div class=" drop-down-profile" data-bs-toggle="dropdown"><img alt=""
													class="rounded-circle avatar avatar-md"
													src="{{asset('assets/img/faces/15.jpg')}}"><span
													class="assigned-task bg-primary">7</span></div>
											<div class="dropdown-menu tx-13">
												<div class="main-header-profile">
													<div class="tx-16 h5 mg-b-0">Petey Cruiser</div>
													<span class="text-muted">Web Designer</span>
												</div>
												<a class="dropdown-item" href="javascript:void(0);">View Total Tasks</a>
												<a class="dropdown-item" href="javascript:void(0);">Completed Tasks</a>
												<a class="dropdown-item" href="javascript:void(0);">Settings</a>
											</div>
											<div class="ms-auto">
												<div class="">
													<a href="javascript:void(0);" data-bs-placement="top" data-bs-toggle="tooltip"
														title="archive" class="p-2 text-muted"><i
															class="fas fa-envelope-open-text"></i></a>
													<a href="javascript:void(0);" data-bs-placement="top" data-bs-toggle="tooltip"
														title="Move to spam" class="p-2 text-muted"><i
															class="fas fa-exclamation-circle"></i></a>
													<a class="p-2 text-muted" data-bs-toggle="dropdown"><i
															class="fas fa-ellipsis-v"></i></a>
													<div class="dropdown-menu tx-13">
														<a class="dropdown-item" href="javascript:void(0);">Mark As Unread</a>
														<a class="dropdown-item" href="javascript:void(0);">Mark As Important</a>
														<a class="dropdown-item" href="javascript:void(0);">Add to Tasks</a>
														<a class="dropdown-item" href="javascript:void(0);">Add Star</a>
														<a class="dropdown-item" href="javascript:void(0);">Move to</a>
														<a class="dropdown-item" href="javascript:void(0);">Mute</a>
														<a class="dropdown-item" href="javascript:void(0);">Move to Trash</a>
													</div>
												</div>
											</div>
										</div>
										<div class="p-4">
											<span class="tx-12 text-muted">10.54am</span><span
												class="badge bg-primary-transparent text-primary ms-auto float-end">New
												task</span>
											<h5 class="tx-14 mb-0 mg-t-5 text-capitalize">I must explain to you how all
												this mistaken</h5>
										</div>
										<div class="p-4 border-top">
											<span class="tx-12 text-muted">10.54am</span><span
												class="badge bg-danger-transparent text-danger ms-auto float-end">Pending
												task</span>
											<h5 class="tx-14 mb-0 mg-t-5 text-capitalize">I will give you a complete
												account of the system</h5>
										</div>
									</div>
									<div class="card-footer ">
										<a class="btn btn-primary" href="javascript:void(0);" data-bs-placement="top"
											data-bs-toggle="tooltip" title="Assign Task">Assign</a>
										<a class="btn btn-outline-primary ms-auto float-end" href="javascript:void(0);"
											data-bs-placement="top" data-bs-toggle="tooltip" title="View Task">View
											All</a>
									</div>
								</div>
							</div>
							<!-- /col -->

							<!-- col -->
							<div class="col-xxl-4 col-md-6">
								<div class="card mg-b-20 ">
									<div class="card-body p-0">
										<div class="todo-widget-header d-flex pb-2 pd-20">
											<div class="drop-down-profile" data-bs-toggle="dropdown"><img alt=""
													class="rounded-circle avatar avatar-md "
													src="{{asset('assets/img/faces/5.jpg')}}"><span
													class="assigned-task bg-info">4</span></div>
											<div class="dropdown-menu tx-13">
												<div class="main-header-profile">
													<div class="tx-16 h5 mg-b-0">Petey Cruiser</div>
													<span class="text-muted">Web Designer</span>
												</div>
												<a class="dropdown-item" href="javascript:void(0);">View Total Tasks</a>
												<a class="dropdown-item" href="javascript:void(0);">Completed Tasks</a>
												<a class="dropdown-item" href="javascript:void(0);">Settings</a>
											</div>
											<div class="ms-auto">
												<div class="">
													<a href="javascript:void(0);" data-bs-placement="top" data-bs-toggle="tooltip"
														title="archive" class="p-2 text-muted"><i
															class="fas fa-envelope-open-text"></i></a>
													<a href="javascript:void(0);" data-bs-placement="top" data-bs-toggle="tooltip"
														title="Move to spam" class="p-2 text-muted"><i
															class="fas fa-exclamation-circle"></i></a>
													<a class="p-2 text-muted" data-bs-toggle="dropdown"><i
															class="fas fa-ellipsis-v"></i></a>
													<div class="dropdown-menu tx-13">
														<a class="dropdown-item" href="javascript:void(0);">Mark As Unread</a>
														<a class="dropdown-item" href="javascript:void(0);">Mark As Important</a>
														<a class="dropdown-item" href="javascript:void(0);">Add to Tasks</a>
														<a class="dropdown-item" href="javascript:void(0);">Add Star</a>
														<a class="dropdown-item" href="javascript:void(0);">Move to</a>
														<a class="dropdown-item" href="javascript:void(0);">Mute</a>
														<a class="dropdown-item" href="javascript:void(0);">Move to Trash</a>
													</div>
												</div>
											</div>
										</div>
										<div class="p-4">
											<span class="tx-12 text-muted">10.54am</span><span
												class="badge bg-primary-transparent text-primary ms-auto float-end">New
												task</span>
											<h5 class="tx-14 mb-0 mg-t-5 text-capitalize">Rationally encounter quences
												extremely painful</h5>
										</div>
										<div class="p-4 border-top">
											<span class="tx-12 text-muted">10.54am</span><span
												class="badge bg-danger-transparent text-danger ms-auto float-end">Pending
												task</span>
											<h5 class="tx-14 mb-0 mg-t-5 text-capitalize">Which of us ever undertakes
												laborious physical</h5>
										</div>
									</div>
									<div class="card-footer ">
										<a class="btn btn-primary" href="javascript:void(0);" data-bs-placement="top"
											data-bs-toggle="tooltip" title="Assign Task">Assign</a>
										<a class="btn btn-outline-primary ms-auto float-end" href="javascript:void(0);"
											data-bs-placement="top" data-bs-toggle="tooltip" title="View Task">View
											All</a>
									</div>
								</div>
							</div>
							<!-- /col -->
						</div>
					</div>
					<!-- /col -->

					<!-- col -->
					<div class="col-lg-12 col-xl-4 col-xxl-3">
						<div class="card card--events mg-b-20">
							<div class="card-body">
								<div class="pd-20">
									<div class="main-content-label">Tasks</div>
									<p class="mg-b-0">It is Very Easy to Customize and it uses in website apllication.
									</p>
								</div>
								<div class="list-group to-do-tasks">
									<a class="list-group-item" href="javascript:void(0);">
										<div class="event-indicator bg-info"></div>
										<h6 class="mg-t-5">Today Tasks</h6>
									</a>
									<a class="list-group-item" href="javascript:void(0);">
										<div class="event-indicator bg-primary"></div>
										<h6 class="mg-t-5">Yesterday Tasks</h6>
									</a>
									<a class="list-group-item" href="javascript:void(0);">
										<div class="event-indicator bg-success"></div>
										<h6 class="mg-t-5">Weakly Tasks</h6>
									</a>
									<a class="list-group-item" href="javascript:void(0);">
										<div class="event-indicator bg-danger"></div>
										<h6 class="mg-t-5">Mothly Tasks</h6>
									</a>
									<a class="list-group-item" href="javascript:void(0);">
										<div class="event-indicator bg-warning"></div>
										<h6 class="mg-t-5">User Tasks</h6>
									</a>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-body p-0">
								<div class="pd-t-20 pd-x-20">
									<div class="main-content-label">Recent Tasks</div>
									<p class="mg-b-20">It is Very Easy to Customize and it uses in website apllication.
									</p>
								</div>
								<div class="d-flex p-3 border-top">
									<label class="ckbox"><input checked="" type="checkbox"><span>Do something
											more</span></label>
									<span class="ms-auto">
										<i class="si si-pencil text-primary me-2" data-bs-toggle="tooltip" title=""
											data-bs-placement="top" data-bs-original-title="Edit"></i>
										<i class="si si-trash text-danger me-2" data-bs-toggle="tooltip" title=""
											data-bs-placement="top" data-bs-original-title="Delete"></i>
									</span>
								</div>
								<div class="d-flex p-3 border-top">
									<label class="ckbox"><input checked="" type="checkbox"><span>Update More
											Files</span></label>
									<span class="ms-auto">
										<i class="si si-pencil text-primary me-2" data-bs-toggle="tooltip" title=""
											data-bs-placement="top" data-bs-original-title="Edit"></i>
										<i class="si si-trash text-danger me-2" data-bs-toggle="tooltip" title=""
											data-bs-placement="top" data-bs-original-title="Delete"></i>
									</span>
								</div>
								<div class="d-flex p-3 border-top">
									<label class="ckbox"><input type="checkbox"><span>Complete Projects</span></label>
									<span class="ms-auto">
										<i class="si si-pencil text-primary me-2" data-bs-toggle="tooltip" title=""
											data-bs-placement="top" data-bs-original-title="Edit"></i>
										<i class="si si-trash text-danger me-2" data-bs-toggle="tooltip" title=""
											data-bs-placement="top" data-bs-original-title="Delete"></i>
									</span>
								</div>
								<div class="d-flex p-3 border-top">
									<label class="ckbox"><input type="checkbox"><span>Finish Something</span></label>
									<span class="ms-auto">
										<i class="si si-pencil text-primary me-2" data-bs-toggle="tooltip" title=""
											data-bs-placement="top" data-bs-original-title="Edit"></i>
										<i class="si si-trash text-danger me-2" data-bs-toggle="tooltip" title=""
											data-bs-placement="top" data-bs-original-title="Delete"></i>
									</span>
								</div>
								<div class="d-flex p-3 border-top">
									<label class="ckbox"><input checked="" type="checkbox"><span>System
											Updated</span></label>
									<span class="ms-auto">
										<i class="si si-pencil text-primary me-2" data-bs-toggle="tooltip" title=""
											data-bs-placement="top" data-bs-original-title="Edit"></i>
										<i class="si si-trash text-danger me-2" data-bs-toggle="tooltip" title=""
											data-bs-placement="top" data-bs-original-title="Delete"></i>
									</span>
								</div>
								<div class="d-flex p-3 border-top">
									<label class="ckbox"><input type="checkbox"><span>Change Settings</span></label>
									<span class="ms-auto">
										<i class="si si-pencil text-primary me-2" data-bs-toggle="tooltip" title=""
											data-bs-placement="top" data-bs-original-title="Edit"></i>
										<i class="si si-trash text-danger me-2" data-bs-toggle="tooltip" title=""
											data-bs-placement="top" data-bs-original-title="Delete"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->

            @endsection

        @section('scripts')


        
        @endsection

