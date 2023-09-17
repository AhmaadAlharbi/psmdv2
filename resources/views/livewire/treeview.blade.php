@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Apps</h4><span
								class="text-muted mt-1 tx-13 ms-2 mb-0">/ Treeview</span>
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
					<div class="col-md-12">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Basic Treeview
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in website apllication.</p>
								<div class="row">
									<!-- col -->
									<div class="col-lg-4">
										<ul id="treeview1">
											<li><a href="javascript:void(0);">TECH</a>
												<ul>
													<li>Company Maintenance</li>
													<li>Employees
														<ul>
															<li>Reports</li>
														</ul>
													</li>
													<li>Human Resources</li>
												</ul>
											</li>
											<li>XRP
												<ul>
													<li>Company Maintenance</li>
													<li>Employees
														<ul>
															<li>Reports</li>
														</ul>
													</li>
													<li>Human Resources</li>
												</ul>
											</li>
										</ul>
									</div>
									<!-- /col -->

									<!-- col -->
									<div class="col-lg-4 mt-4 mt-lg-0">
										<ul id="treeview2">
											<li><a href="javascript:void(0);">TECH</a>
												<ul>
													<li>Company Maintenance</li>
													<li>Employees
														<ul>
															<li>Reports</li>
														</ul>
													</li>
													<li>Human Resources</li>
												</ul>
											</li>
											<li>XRP
												<ul>
													<li>Company Maintenance</li>
													<li>Employees
														<ul>
															<li>Reports</li>
														</ul>
													</li>
													<li>Human Resources</li>
												</ul>
											</li>
										</ul>
									</div>
									<!-- /col -->

									<!-- col -->
									<div class="col-lg-4 mt-4 mt-lg-0">
										<ul id="treeview3">
											<li><a href="javascript:void(0);">TECH</a>
												<ul>
													<li>Company Maintenance</li>
													<li>Employees
														<ul>
															<li>Reports</li>
														</ul>
													</li>
													<li>Human Resources</li>
												</ul>
											</li>
											<li>XRP
												<ul>
													<li>Company Maintenance</li>
													<li>Employees
														<ul>
															<li>Reports</li>
														</ul>
													</li>
													<li>Human Resources</li>
												</ul>
											</li>
										</ul>
									</div>
									<!-- /col -->
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Tree View Styles
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in website apllication.</p>
								<div class="row">
									<!-- col -->
									<div class="col-lg-4">
										<ul id="tree1">
											<li><a href="javascript:void(0);">Treeview1</a>
												<ul>
													<li>Company Maintenance</li>
													<li>Employees
														<ul>
															<li>Reports
																<ul>
																	<li>Report1</li>
																	<li>Report2</li>
																	<li>Report3</li>
																</ul>
															</li>
															<li>Employee Maint.
																<ul>
																	<li>Reports
																		<ul>
																			<li>Report1</li>
																			<li>Report2</li>
																			<li>Report3</li>
																		</ul>
																	</li>
																	<li>Employee Maint.<ul>
																			<li>Reports
																				<ul>
																					<li>Report1</li>
																					<li>Report2</li>
																					<li>Report3</li>
																				</ul>
																			</li>
																			<li>Employee Maint.</li>
																		</ul>
																	</li>
																</ul>
															</li>
														</ul>
													</li>
													<li>Human Resources</li>
												</ul>
											</li>
											<li><a href="javascript:void(0);">Treeview2</a>
												<ul>
													<li>Company Maintenance</li>
													<li>Employees
														<ul>
															<li>Reports
																<ul>
																	<li>Report1</li>
																	<li>Report2</li>
																	<li>Report3</li>
																</ul>
															</li>
															<li>Employee Maint.
																<ul>
																	<li>Reports
																		<ul>
																			<li>Report1</li>
																			<li>Report2</li>
																			<li>Report3</li>
																		</ul>
																	</li>
																	<li>Employee Maint.<ul>
																			<li>Reports
																				<ul>
																					<li>Report1</li>
																					<li>Report2</li>
																					<li>Report3</li>
																				</ul>
																			</li>
																			<li>Employee Maint.</li>
																		</ul>
																	</li>
																</ul>
															</li>
														</ul>
													</li>
													<li>Human Resources</li>
												</ul>
											</li>
											<li><a href="javascript:void(0);">Treeview3</a>
												<ul>
													<li>Company Maintenance</li>
													<li>Employees
														<ul>
															<li>Reports
																<ul>
																	<li>Report1</li>
																	<li>Report2</li>
																	<li>Report3</li>
																</ul>
															</li>
															<li>Employee Maint.
																<ul>
																	<li>Reports
																		<ul>
																			<li>Report1</li>
																			<li>Report2</li>
																			<li>Report3</li>
																		</ul>
																	</li>
																	<li>Employee Maint.<ul>
																			<li>Reports
																				<ul>
																					<li>Report1</li>
																					<li>Report2</li>
																					<li>Report3</li>
																				</ul>
																			</li>
																			<li>Employee Maint.</li>
																		</ul>
																	</li>
																</ul>
															</li>
														</ul>
													</li>
													<li>Human Resources</li>
												</ul>
											</li>
											<li><a href="javascript:void(0);">Treeview4</a>
												<ul>
													<li>Company Maintenance</li>
													<li>Employees
														<ul>
															<li>Reports
																<ul>
																	<li>Report1</li>
																	<li>Report2</li>
																	<li>Report3</li>
																</ul>
															</li>
															<li>Employee Maint.
																<ul>
																	<li>Reports
																		<ul>
																			<li>Report1</li>
																			<li>Report2</li>
																			<li>Report3</li>
																		</ul>
																	</li>
																	<li>Employee Maint.<ul>
																			<li>Reports
																				<ul>
																					<li>Report1</li>
																					<li>Report2</li>
																					<li>Report3</li>
																				</ul>
																			</li>
																			<li>Employee Maint.</li>
																		</ul>
																	</li>
																</ul>
															</li>
														</ul>
													</li>
													<li>Human Resources</li>
												</ul>
											</li>
											<li><a href="javascript:void(0);">Treeview5</a>
												<ul>
													<li>Company Maintenance</li>
													<li>Employees
														<ul>
															<li>Reports
																<ul>
																	<li>Report1</li>
																	<li>Report2</li>
																	<li>Report3</li>
																</ul>
															</li>
															<li>Employee Maint.
																<ul>
																	<li>Reports
																		<ul>
																			<li>Report1</li>
																			<li>Report2</li>
																			<li>Report3</li>
																		</ul>
																	</li>
																	<li>Employee Maint.<ul>
																			<li>Reports
																				<ul>
																					<li>Report1</li>
																					<li>Report2</li>
																					<li>Report3</li>
																				</ul>
																			</li>
																			<li>Employee Maint.</li>
																		</ul>
																	</li>
																</ul>
															</li>
														</ul>
													</li>
													<li>Human Resources</li>
												</ul>
											</li>
											<li><a href="javascript:void(0);">Treeview6</a>
												<ul>
													<li>Company Maintenance</li>
													<li>Employees
														<ul>
															<li>Reports
																<ul>
																	<li>Report1</li>
																	<li>Report2</li>
																	<li>Report3</li>
																</ul>
															</li>
															<li>Employee Maint.
																<ul>
																	<li>Reports
																		<ul>
																			<li>Report1</li>
																			<li>Report2</li>
																			<li>Report3</li>
																		</ul>
																	</li>
																	<li>Employee Maint.<ul>
																			<li>Reports
																				<ul>
																					<li>Report1</li>
																					<li>Report2</li>
																					<li>Report3</li>
																				</ul>
																			</li>
																			<li>Employee Maint.</li>
																		</ul>
																	</li>
																</ul>
															</li>
														</ul>
													</li>
													<li>Human Resources</li>
												</ul>
											</li>
										</ul>
									</div>
									<!-- /col -->

									<!-- col -->
									<div class="col-lg-4 mt-4 mt-lg-0">
										<ul id="tree2">
											<li><a href="javascript:void(0);">Treeview1</a>
												<ul>
													<li>Company Maintenance</li>
													<li>Employees
														<ul>
															<li>Reports
																<ul>
																	<li>Report1</li>
																	<li>Report2</li>
																	<li>Report3</li>
																</ul>
															</li>
															<li>Employee Maint.
																<ul>
																	<li>Reports
																		<ul>
																			<li>Report1</li>
																			<li>Report2</li>
																			<li>Report3</li>
																		</ul>
																	</li>
																	<li>Employee Maint.<ul>
																			<li>Reports
																				<ul>
																					<li>Report1</li>
																					<li>Report2</li>
																					<li>Report3</li>
																				</ul>
																			</li>
																			<li>Employee Maint.</li>
																		</ul>
																	</li>
																</ul>
															</li>
														</ul>
													</li>
													<li>Human Resources</li>
												</ul>
											</li>
											<li><a href="javascript:void(0);">Treeview2</a>
												<ul>
													<li>Company Maintenance</li>
													<li>Employees
														<ul>
															<li>Reports
																<ul>
																	<li>Report1</li>
																	<li>Report2</li>
																	<li>Report3</li>
																</ul>
															</li>
															<li>Employee Maint.
																<ul>
																	<li>Reports
																		<ul>
																			<li>Report1</li>
																			<li>Report2</li>
																			<li>Report3</li>
																		</ul>
																	</li>
																	<li>Employee Maint.<ul>
																			<li>Reports
																				<ul>
																					<li>Report1</li>
																					<li>Report2</li>
																					<li>Report3</li>
																				</ul>
																			</li>
																			<li>Employee Maint.</li>
																		</ul>
																	</li>
																</ul>
															</li>
														</ul>
													</li>
													<li>Human Resources</li>
												</ul>
											</li>
											<li><a href="javascript:void(0);">Treeview3</a>
												<ul>
													<li>Company Maintenance</li>
													<li>Employees
														<ul>
															<li>Reports
																<ul>
																	<li>Report1</li>
																	<li>Report2</li>
																	<li>Report3</li>
																</ul>
															</li>
															<li>Employee Maint.
																<ul>
																	<li>Reports
																		<ul>
																			<li>Report1</li>
																			<li>Report2</li>
																			<li>Report3</li>
																		</ul>
																	</li>
																	<li>Employee Maint.<ul>
																			<li>Reports
																				<ul>
																					<li>Report1</li>
																					<li>Report2</li>
																					<li>Report3</li>
																				</ul>
																			</li>
																			<li>Employee Maint.</li>
																		</ul>
																	</li>
																</ul>
															</li>
														</ul>
													</li>
													<li>Human Resources</li>
												</ul>
											</li>
											<li><a href="javascript:void(0);">Treeview4</a>
												<ul>
													<li>Company Maintenance</li>
													<li>Employees
														<ul>
															<li>Reports
																<ul>
																	<li>Report1</li>
																	<li>Report2</li>
																	<li>Report3</li>
																</ul>
															</li>
															<li>Employee Maint.
																<ul>
																	<li>Reports
																		<ul>
																			<li>Report1</li>
																			<li>Report2</li>
																			<li>Report3</li>
																		</ul>
																	</li>
																	<li>Employee Maint.<ul>
																			<li>Reports
																				<ul>
																					<li>Report1</li>
																					<li>Report2</li>
																					<li>Report3</li>
																				</ul>
																			</li>
																			<li>Employee Maint.</li>
																		</ul>
																	</li>
																</ul>
															</li>
														</ul>
													</li>
													<li>Human Resources</li>
												</ul>
											</li>
											<li><a href="javascript:void(0);">Treeview5</a>
												<ul>
													<li>Company Maintenance</li>
													<li>Employees
														<ul>
															<li>Reports
																<ul>
																	<li>Report1</li>
																	<li>Report2</li>
																	<li>Report3</li>
																</ul>
															</li>
															<li>Employee Maint.
																<ul>
																	<li>Reports
																		<ul>
																			<li>Report1</li>
																			<li>Report2</li>
																			<li>Report3</li>
																		</ul>
																	</li>
																	<li>Employee Maint.<ul>
																			<li>Reports
																				<ul>
																					<li>Report1</li>
																					<li>Report2</li>
																					<li>Report3</li>
																				</ul>
																			</li>
																			<li>Employee Maint.</li>
																		</ul>
																	</li>
																</ul>
															</li>
														</ul>
													</li>
													<li>Human Resources</li>
												</ul>
											</li>
											<li><a href="javascript:void(0);">Treeview6</a>
												<ul>
													<li>Company Maintenance</li>
													<li>Employees
														<ul>
															<li>Reports
																<ul>
																	<li>Report1</li>
																	<li>Report2</li>
																	<li>Report3</li>
																</ul>
															</li>
															<li>Employee Maint.
																<ul>
																	<li>Reports
																		<ul>
																			<li>Report1</li>
																			<li>Report2</li>
																			<li>Report3</li>
																		</ul>
																	</li>
																	<li>Employee Maint.<ul>
																			<li>Reports
																				<ul>
																					<li>Report1</li>
																					<li>Report2</li>
																					<li>Report3</li>
																				</ul>
																			</li>
																			<li>Employee Maint.</li>
																		</ul>
																	</li>
																</ul>
															</li>
														</ul>
													</li>
													<li>Human Resources</li>
												</ul>
											</li>
										</ul>
									</div>
									<!-- /col -->

									<!-- col -->
									<div class="col-lg-4 mt-4 mt-lg-0">
										<ul id="tree3">
											<li><a href="javascript:void(0);">Treeview1</a>
												<ul>
													<li>Company Maintenance</li>
													<li>Employees
														<ul>
															<li>Reports
																<ul>
																	<li>Report1</li>
																	<li>Report2</li>
																	<li>Report3</li>
																</ul>
															</li>
															<li>Employee Maint.
																<ul>
																	<li>Reports
																		<ul>
																			<li>Report1</li>
																			<li>Report2</li>
																			<li>Report3</li>
																		</ul>
																	</li>
																	<li>Employee Maint.<ul>
																			<li>Reports
																				<ul>
																					<li>Report1</li>
																					<li>Report2</li>
																					<li>Report3</li>
																				</ul>
																			</li>
																			<li>Employee Maint.</li>
																		</ul>
																	</li>
																</ul>
															</li>
														</ul>
													</li>
													<li>Human Resources</li>
												</ul>
											</li>
											<li><a href="javascript:void(0);">Treeview2</a>
												<ul>
													<li>Company Maintenance</li>
													<li>Employees
														<ul>
															<li>Reports
																<ul>
																	<li>Report1</li>
																	<li>Report2</li>
																	<li>Report3</li>
																</ul>
															</li>
															<li>Employee Maint.
																<ul>
																	<li>Reports
																		<ul>
																			<li>Report1</li>
																			<li>Report2</li>
																			<li>Report3</li>
																		</ul>
																	</li>
																	<li>Employee Maint.<ul>
																			<li>Reports
																				<ul>
																					<li>Report1</li>
																					<li>Report2</li>
																					<li>Report3</li>
																				</ul>
																			</li>
																			<li>Employee Maint.</li>
																		</ul>
																	</li>
																</ul>
															</li>
														</ul>
													</li>
													<li>Human Resources</li>
												</ul>
											</li>
											<li><a href="javascript:void(0);">Treeview3</a>
												<ul>
													<li>Company Maintenance</li>
													<li>Employees
														<ul>
															<li>Reports
																<ul>
																	<li>Report1</li>
																	<li>Report2</li>
																	<li>Report3</li>
																</ul>
															</li>
															<li>Employee Maint.
																<ul>
																	<li>Reports
																		<ul>
																			<li>Report1</li>
																			<li>Report2</li>
																			<li>Report3</li>
																		</ul>
																	</li>
																	<li>Employee Maint.<ul>
																			<li>Reports
																				<ul>
																					<li>Report1</li>
																					<li>Report2</li>
																					<li>Report3</li>
																				</ul>
																			</li>
																			<li>Employee Maint.</li>
																		</ul>
																	</li>
																</ul>
															</li>
														</ul>
													</li>
													<li>Human Resources</li>
												</ul>
											</li>
											<li><a href="javascript:void(0);">Treeview4</a>
												<ul>
													<li>Company Maintenance</li>
													<li>Employees
														<ul>
															<li>Reports
																<ul>
																	<li>Report1</li>
																	<li>Report2</li>
																	<li>Report3</li>
																</ul>
															</li>
															<li>Employee Maint.
																<ul>
																	<li>Reports
																		<ul>
																			<li>Report1</li>
																			<li>Report2</li>
																			<li>Report3</li>
																		</ul>
																	</li>
																	<li>Employee Maint.<ul>
																			<li>Reports
																				<ul>
																					<li>Report1</li>
																					<li>Report2</li>
																					<li>Report3</li>
																				</ul>
																			</li>
																			<li>Employee Maint.</li>
																		</ul>
																	</li>
																</ul>
															</li>
														</ul>
													</li>
													<li>Human Resources</li>
												</ul>
											</li>
											<li><a href="javascript:void(0);">Treeview5</a>
												<ul>
													<li>Company Maintenance</li>
													<li>Employees
														<ul>
															<li>Reports
																<ul>
																	<li>Report1</li>
																	<li>Report2</li>
																	<li>Report3</li>
																</ul>
															</li>
															<li>Employee Maint.
																<ul>
																	<li>Reports
																		<ul>
																			<li>Report1</li>
																			<li>Report2</li>
																			<li>Report3</li>
																		</ul>
																	</li>
																	<li>Employee Maint.
																		<ul>
																			<li>Reports
																				<ul>
																					<li>Report1</li>
																					<li>Report2</li>
																					<li>Report3</li>
																				</ul>
																			</li>
																			<li>Employee Maint.</li>
																		</ul>
																	</li>
																</ul>
															</li>
														</ul>
													</li>
													<li>Human Resources</li>
												</ul>
											</li>
											<li><a href="javascript:void(0);">Treeview6</a>
												<ul>
													<li>Company Maintenance</li>
													<li>Employees
														<ul>
															<li>Reports
																<ul>
																	<li>Report1</li>
																	<li>Report2</li>
																	<li>Report3</li>
																</ul>
															</li>
															<li>Employee Maint.
																<ul>
																	<li>Reports
																		<ul>
																			<li>Report1</li>
																			<li>Report2</li>
																			<li>Report3</li>
																		</ul>
																	</li>
																	<li>Employee Maint.<ul>
																			<li>Reports
																				<ul>
																					<li>Report1</li>
																					<li>Report2</li>
																					<li>Report3</li>
																				</ul>
																			</li>
																			<li>Employee Maint.</li>
																		</ul>
																	</li>
																</ul>
															</li>
														</ul>
													</li>
													<li>Human Resources</li>
												</ul>
											</li>
										</ul>
									</div>
									<!-- /col -->
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row -->

				<!-- ROW OPEN -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Animated Directory Styles
								</div>
								<p class="mg-b-20 card-sub-title fs-12 text-muted">It is Very Easy to Customize and it uses in website apllication.</p>
								<div class="row">
									<!-- col -->
									<div class="col-lg-4 mt-4 mt-lg-0">
										<div class="dTree">
											<ul>
												<li><a href="javascript:void(0)">Site</a></li>
												<li><a href="javascript:void(0)">About the Web Site</a></li>
												<li><a href="javascript:void(0)">Contact Us</a></li>
												<li class="pb-0"><a href="javascript:void(0)">Cars</a>
													<ul>
														<li><a href="javascript:void(0)">Add New Brand</a></li>
														<li><a href="javascript:void(0)">List All Brand</a></li>
														<li><a href="javascript:void(0)">Mercedes - Benz</a>
															<ul>
																<li><a href="javascript:void(0)">About the Mercedes - Benz</a></li>
																<li><a href="javascript:void(0)">History</a></li>
																<li><a href="javascript:void(0)">Series</a>
																	<ul>
																		<li><a href="javascript:void(0)">A Series</a>
																			<ul>
																				<li><a href="javascript:void(0)">A 140</a></li>
																				<li><a href="javascript:void(0)">A 150</a></li>
																				<li><a href="javascript:void(0)">A 180 CDI</a></li>
																				<li><a href="javascript:void(0)">A 200 CDI</a></li>
																			</ul>
																		</li>
																		<li><a href="javascript:void(0)">B Series</a>
																			<ul>
																				<li><a href="javascript:void(0)">B 140</a></li>
																				<li><a href="javascript:void(0)">B 150</a></li>
																				<li><a href="javascript:void(0)">B 180 CDI</a></li>
																				<li><a href="javascript:void(0)">B Special Series</a>
																					<ul>
																						<li><a href="javascript:void(0)">B Extreme</a></li>
																						<li><a href="javascript:void(0)">B Jumper</a></li>
																						<li><a href="javascript:void(0)">B Raiden</a></li>
																						<li><a href="javascript:void(0)">B Subzero</a></li>
																					</ul>
																				</li>
																			</ul>
																		</li>
																		<li><a href="javascript:void(0)">Concept Cars</a></li>
																		<li><a href="javascript:void(0)">Best Prototypes</a></li>
																		<li><a href="javascript:void(0)">List all other categories</a></li>
																	</ul>
																</li>
																<li><a href="javascript:void(0)">Custom Series</a></li>
																<li><a href="javascript:void(0)">A+ Series for children</a></li>
																<li><a href="javascript:void(0)">B+ Series for women</a></li>
															</ul>
														</li>
														<li><a href="javascript:void(0)">Chevrolet</a></li>
														<li><a href="javascript:void(0)">Saab Custom models</a></li>
														<li><a href="javascript:void(0)">Fiat</a>
															<ul>
																<li><a href="javascript:void(0)">Kartal SLX</a></li>
																<li><a href="javascript:void(0)">Dogan 1.6 Turbo</a></li>
																<li><a href="javascript:void(0)">Sahin</a></li>
																<li><a href="javascript:void(0)">Dogan Gorunumlu Sahin</a>
																	<ul>
																		<li><a href="javascript:void(0)">1.3 Motor</a></li>
																		<li><a href="javascript:void(0)">1.6 Motor</a></li>
																		<li><a href="javascript:void(0)">1.8 Motor</a></li>
																		<li><a href="javascript:void(0)">2.0 Motor</a></li>
																	</ul>
																</li>
																<li><a href="javascript:void(0)">Serce</a></li>
																<li><a href="javascript:void(0)">Murat 131</a></li>
															</ul>
														</li>
													</ul>
												</li>
												<li><a href="javascript:void(0)">Electronic Models</a></li>
												<li><a href="javascript:void(0)">Real Estate</a></li>
												<li><a href="javascript:void(0)">Bruce Lee</a></li>
												<li><a href="javascript:void(0)">Graphics</a></li>
												<li><a href="javascript:void(0)">Smart Phones</a>
													<ul>
														<li><a href="javascript:void(0)">Apple</a></li>
														<li><a href="javascript:void(0)">Samsung</a></li>
														<li><a href="javascript:void(0)">LG</a></li>
														<li><a href="javascript:void(0)">Sony</a></li>
														<li><a href="javascript:void(0)">HTC</a></li>
														<li><a href="javascript:void(0)">Samsung</a></li>
														<li><a href="javascript:void(0)">Samsung</a></li>
														<li><a href="javascript:void(0)">Other Models</a>
															<ul>
																<li><a href="javascript:void(0)">First other model</a></li>
																<li><a href="javascript:void(0)">Second other model</a></li>
															</ul>
														</li>
														<li><a href="javascript:void(0)">Add New Model</a></li>
													</ul>
												</li>
											</ul>
										</div>
									</div>
									<!-- /col -->
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- ROW CLOSED -->

            @endsection

        @section('scripts')

		<!--Internal  Perfect-scrollbar js -->
		<script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

		<!-- Internal Treeview js -->
		<script src="{{asset('assets/plugins/treeview/treeview.js')}}"></script>

		<!-- Internal Dtree Treeview js -->
		<script src="{{asset('assets/plugins/dtree/dtree.js')}}"></script>
		<script src="{{asset('assets/plugins/dtree/dtree1.js')}}"></script>
        
        @endsection

