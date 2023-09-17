@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Elements</h4><span
								class="text-muted mt-1 tx-13 ms-2 mb-0">/ Tabs</span>
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
				
				<!-- row opened -->
				<div class="row row-sm">
					<div class="col-lg-12 col-md-12">
						<div class="card" id="basic-alert">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Basic Style Tabs</h6>
									<p class="text-muted card-sub-title">It is Very Easy to Customize and it uses in
										your website apllication.</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<div class="panel panel-primary tabs-style-1">
											<div class=" tab-menu-heading">
												<div class="tabs-menu1">
													<!-- Tabs -->
													<ul class="nav panel-tabs main-nav-line">
														<li class="nav-item"><a href="#tab1" class="nav-link active"
																data-bs-toggle="tab">Tab 01</a></li>
														<li class="nav-item"><a href="#tab2" class="nav-link"
																data-bs-toggle="tab">Tab 02</a></li>
														<li class="nav-item"><a href="#tab3" class="nav-link"
																data-bs-toggle="tab">Tab 03</a></li>
													</ul>
												</div>
											</div>
											<div
												class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
												<div class="tab-content">
													<div class="tab-pane active" id="tab1">
														At vero eos et accusamus et iusto odio dignissimos ducimus qui
														blanditiis praesentium voluptatum deleniti atque corrupti quos
														dolores et quas molestias excepturi sint occaecati cupiditate
														non provident, similique sunt in culpa qui officia deserunt
														mollitia animi, id est laborum et dolorum fuga. Et harum quidem
														rerum facilis est et expedita distinctio. Nam libero tempore,
														cum soluta nobis est eligendi optio cumque nihil impedit quo
														minus id quod maxime placeat facere possimus, omnis voluptas
														assumenda est, omnis dolor repellendus.
													</div>
													<div class="tab-pane" id="tab2">
														<p>dignissimos ducimus qui blanditiis praesentium voluptatum
															deleniti atque corrupti quos dolores et quas molestias
															excepturi sint occaecati cupiditate non provident, similique
															sunt in culpa qui officia deserunt mollitia animi, id est
															laborum et dolorum fuga.</p>
														<p>Et harum quidem rerum facilis est et expedita distinctio. Nam
															libero tempore, cum soluta nobis est eligendi optio cumque
															nihil impedit quo minus id quod maxime</p>
														<p class="mb-0">placeat facere possimus, omnis voluptas
															assumenda est, omnis dolor repellendus.</p>
													</div>
													<div class="tab-pane" id="tab3">
														<p>praesentium voluptatum deleniti atque corrupti quos dolores
															et quas molestias excepturi sint occaecati cupiditate non
															provident,</p>
														<p class="mb-0">similique sunt in culpa qui officia deserunt
															mollitia animi, id est laborum et dolorum fuga. Et harum
															quidem rerum facilis est et expedita distinctio. Nam libero
															tempore, cum soluta nobis est eligendi optio cumque nihil
															impedit quo minus id quod maxime placeat facere possimus,
															omnis voluptas assumenda est, omnis dolor repellendus.</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-12">
						<!-- div -->
						<div class="card mg-b-20" id="tabs-style2">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Basic Style2 Tabs
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.
								</p>
								<div class="text-wrap">
									<div class="example">
										<div class="panel panel-primary tabs-style-2">
											<div class=" tab-menu-heading">
												<div class="tabs-menu1">
													<!-- Tabs -->
													<ul class="nav panel-tabs main-nav-line">
														<li><a href="#tab4" class="nav-link active"
																data-bs-toggle="tab">Tab 01</a></li>
														<li><a href="#tab5" class="nav-link" data-bs-toggle="tab">Tab
																02</a></li>
														<li><a href="#tab6" class="nav-link" data-bs-toggle="tab">Tab
																03</a></li>
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body main-content-body-right border">
												<div class="tab-content">
													<div class="tab-pane active" id="tab4">
														At vero eos et accusamus et iusto odio dignissimos ducimus qui
														blanditiis praesentium voluptatum deleniti atque corrupti quos
														dolores et quas molestias excepturi sint occaecati cupiditate
														non provident, similique sunt in culpa qui officia deserunt
														mollitia animi, id est laborum et dolorum fuga. Et harum quidem
														rerum facilis est et expedita distinctio. Nam libero tempore,
														cum soluta nobis est eligendi optio cumque nihil impedit quo
														minus id quod maxime placeat facere possimus, omnis voluptas
														assumenda est, omnis dolor repellendus.
													</div>
													<div class="tab-pane" id="tab5">
														<p>dignissimos ducimus qui blanditiis praesentium voluptatum
															deleniti atque corrupti quos dolores et quas molestias
															excepturi sint occaecati cupiditate non provident, similique
															sunt in culpa qui officia deserunt mollitia animi, id est
															laborum et dolorum fuga.</p>
														<p>Et harum quidem rerum facilis est et expedita distinctio. Nam
															libero tempore, cum soluta nobis est eligendi optio cumque
															nihil impedit quo minus id quod maxime</p>
														<p class="mb-0">placeat facere possimus, omnis voluptas
															assumenda est, omnis dolor repellendus.</p>
													</div>
													<div class="tab-pane" id="tab6">
														<p>praesentium voluptatum deleniti atque corrupti quos dolores
															et quas molestias excepturi sint occaecati cupiditate non
															provident,</p>
														<p class="mb-0">similique sunt in culpa qui officia deserunt
															mollitia animi, id est laborum et dolorum fuga. Et harum
															quidem rerum facilis est et expedita distinctio. Nam libero
															tempore, cum soluta nobis est eligendi optio cumque nihil
															impedit quo minus id quod maxime placeat facere possimus,
															omnis voluptas assumenda est, omnis dolor repellendus.</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /div -->

					<div class="col-xl-12">
						<!-- div -->
						<div class="card mg-b-20" id="tabs-style3">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Basic Style3 Tabs
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.
								</p>
								<div class="text-wrap">
									<div class="example">
										<div class="panel panel-primary tabs-style-3">
											<div class="tab-menu-heading">
												<div class="tabs-menu ">
													<!-- Tabs -->
													<ul class="nav panel-tabs">
														<li class=""><a href="#tab11" class="active"
																data-bs-toggle="tab"><i class="fa fa-laptop"></i> Tab
																Style 01</a></li>
														<li><a href="#tab12" data-bs-toggle="tab"><i
																	class="fa fa-cube"></i> Tab Style 02</a></li>
														<li><a href="#tab13" data-bs-toggle="tab"><i
																	class="fa fa-cogs"></i> Tab Style 03</a></li>
														<li><a href="#tab14" data-bs-toggle="tab"><i
																	class="fa fa-tasks"></i> Tab Style 04</a></li>
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body">
												<div class="tab-content">
													<div class="tab-pane active" id="tab11">
														<p>At vero eos et accusamus et iusto odio dignissimos ducimus
															qui blanditiis praesentium voluptatum deleniti atque
															corrupti quos dolores et quas molestias excepturi sint
															occaecati cupiditate non provident, similique sunt in culpa
															qui officia deserunt mollitia animi, id est laborum et
															dolorum fuga.</p>
														<p class="mb-0">Et harum quidem rerum facilis est et expedita
															distinctio. Nam libero tempore, cum soluta nobis est
															eligendi optio cumque nihil impedit quo minus id quod maxime
															placeat facere possimus, omnis voluptas assumenda est, omnis
															dolor repellendus. </p>
													</div>
													<div class="tab-pane" id="tab12">
														<p> Et harum quidem rerum facilis est et expedita distinctio.
															Nam libero tempore, cum soluta nobis est eligendi optio
															cumque nihil impedit quo minus id quod maxime placeat facere
															possimus, omnis voluptas assumenda est, omnis dolor
															repellendus. </p>
														<p class="mb-0">At vero eos et accusamus et iusto odio
															dignissimos ducimus qui blanditiis praesentium voluptatum
															deleniti atque corrupti quos dolores et quas molestias
															excepturi sint occaecati cupiditate non provident, similique
															sunt in culpa qui officia deserunt mollitia animi, id est
															laborum et dolorum fuga.</p>
													</div>
													<div class="tab-pane" id="tab13">
														<p>Temporibus autem quibusdam et aut officiis debitis aut rerum
															necessitatibus saepe eveniet ut et voluptates repudiandae
															sint et molestiae non recusandae</p>
														<p class="mb-0">Et harum quidem rerum facilis est et expedita
															distinctio. Nam libero tempore, cum soluta nobis est
															eligendi optio cumque nihil impedit quo minus id quod maxime
															placeat facere possimus, omnis voluptas assumenda est, omnis
															dolor repellendus. </p>
													</div>
													<div class="tab-pane" id="tab14">
														<p>On the other hand, we denounce with righteous indignation and
															dislike men who are so beguiled and demoralized by the
															charms of pleasure of the moment, so blinded by desire</p>
														<p class="mb-0">Nam libero tempore, cum soluta nobis est
															eligendi optio cumque nihil impedit quo minus id quod maxime
															placeat facere possimus, omnis voluptas assumenda est, omnis
															dolor repellendus. Temporibus autem quibusdam et aut
															officiis debitis aut rerum necessitatibus </p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /div -->

					<div class="col-xl-12">
						<!-- div -->
						<div class="card" id="tabs-style4">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Vertical Tabs
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.
								</p>
								<div class="text-wrap">
									<div class="example">
										<div class="d-md-flex">
											<div class="">
												<div class="panel panel-primary tabs-style-4">
													<div class="tab-menu-heading">
														<div class="tabs-menu ">
															<!-- Tabs -->
															<ul class="nav panel-tabs me-3">
																<li class=""><a href="#tab21" class="active"
																		data-bs-toggle="tab"><i
																			class="fa fa-laptop"></i> Tab Style 01</a>
																</li>
																<li><a href="#tab22" data-bs-toggle="tab"><i
																			class="fa fa-cube"></i> Tab Style 02</a>
																</li>
																<li><a href="#tab23" data-bs-toggle="tab"><i
																			class="fa fa-cogs"></i> Tab Style 03</a>
																</li>
																<li><a href="#tab24" data-bs-toggle="tab"><i
																			class="fa fa-tasks"></i> Tab Style 04</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
											<div class="tabs-style-4 ">
												<div class="panel-body tabs-menu-body">
													<div class="tab-content">
														<div class="tab-pane active" id="tab21">
															<p>At vero eos et accusamus et iusto odio dignissimos
																ducimus qui blanditiis praesentium voluptatum deleniti
																atque corrupti quos dolores et quas molestias excepturi
																sint occaecati cupiditate non provident, similique sunt
																in culpa qui officia deserunt mollitia animi, id est
																laborum et dolorum fuga.</p>
															<p>At vero eos et accusamus et iusto odio dignissimos
																ducimus qui blanditiis praesentium voluptatum deleniti
																atque corrupti quos dolores et quas molestias excepturi
																sint occaecati cupiditate non provident, similique sunt
																in culpa qui officia deserunt mollitia animi, id est
																laborum et dolorum fuga.</p>
															<p class="mb-0">Et harum quidem rerum facilis est et
																expedita distinctio. Nam libero tempore, cum soluta
																nobis est eligendi optio cumque nihil impedit quo minus
																id quod maxime placeat facere possimus, omnis voluptas
																assumenda est, omnis dolor repellendus. </p>
														</div>
														<div class="tab-pane" id="tab22">
															<p> Et harum quidem rerum facilis est et expedita
																distinctio. Nam libero tempore, cum soluta nobis est
																eligendi optio cumque nihil impedit quo minus id quod
																maxime placeat facere possimus, omnis voluptas assumenda
																est, omnis dolor repellendus. </p>
															<p> Et harum quidem rerum facilis est et expedita
																distinctio. Nam libero tempore, cum soluta nobis est
																eligendi optio cumque nihil impedit quo minus id quod
																maxime placeat facere possimus, omnis voluptas assumenda
																est, omnis dolor repellendus. </p>
															<p class="mb-0">At vero eos et accusamus et iusto odio
																dignissimos ducimus qui blanditiis praesentium
																voluptatum deleniti atque corrupti quos dolores et quas
																molestias excepturi sint occaecati cupiditate non
																provident, similique sunt in culpa qui officia deserunt
																mollitia animi, id est laborum et dolorum fuga.</p>
														</div>
														<div class="tab-pane" id="tab23">
															<p>Temporibus autem quibusdam et aut officiis debitis aut
																rerum necessitatibus saepe eveniet ut et voluptates
																repudiandae sint et molestiae non recusandae quod maxime
																placeat facere possimus, omnis voluptas assumenda est,
																omnis dolor repellendus.</p>
															<p>Temporibus autem quibusdam et aut officiis debitis aut
																rerum necessitatibus saepe eveniet ut et voluptates
																repudiandae sint et molestiae non recusandae quod maxime
																placeat facere possimus, omnis voluptas assumenda est,
																omnis dolor repellendus.</p>
															<p class="mb-0">Et harum quidem rerum facilis est et
																expedita distinctio. Nam libero tempore, cum soluta
																nobis est eligendi optio cumque nihil impedit quo minus
																id quod maxime placeat facere possimus, omnis voluptas
																assumenda est, omnis dolor repellendus. </p>
														</div>
														<div class="tab-pane" id="tab24">
															<p>On the other hand, we denounce with righteous indignation
																and dislike men who are so beguiled and demoralized by
																the charms of pleasure of the moment, so blinded by
																desire quod maxime placeat facere possimus, omnis
																voluptas assumenda est, omnis dolor repellendus.</p>
															<p>On the other hand, we denounce with righteous indignation
																and dislike men who are so beguiled and demoralized by
																the charms of pleasure of the moment, so blinded by
																desire quod maxime placeat facere possimus, omnis
																voluptas assumenda est, omnis dolor repellendus.</p>
															<p class="mb-0">Nam libero tempore, cum soluta nobis est
																eligendi optio cumque nihil impedit quo minus id quod
																maxime placeat facere possimus, omnis voluptas assumenda
																est, omnis dolor repellendus. Temporibus autem quibusdam
																et aut officiis debitis aut rerum necessitatibus </p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /div -->
						</div>
					</div>
				</div>
				<div class="col-xl-12">
					<!-- div -->
					<div class="card" id="tabs-style4">
						<div class="card-body">
							<div class="main-content-label mg-b-5">
								Horizontal Tabs-right-side
							</div>
							<p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
							<div class="text-wrap">
								<div class="example">
									<div class="panel panel-primary">
										<div class="tab_wrapper right_tab">
											<ul class="tab_list">
												<li class="active">Tab 1</li>
												<li>Tab 2</li>
												<li>Tab 3</li>
											</ul>
											<div class="content_wrapper">
												<div class="tab_content active">
													<p>Nor again is there anyone who loves or pursues or desires to
														obtain pain of itself, because it is pain, but because
														occasionally circumstances occur in which toil and pain can
														procure him some great pleasure. To take a trivial example,
														which of us ever undertakes laborious physical exercise, except
														to obtain some advantage from it? But who has any right to find
														fault with a man who chooses to enjoy a pleasure that has no
														annoying consequences, or one who avoids a pain that produces no
														resultant pleasure?</p>
												</div>

												<div class="tab_content">
													<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui
														blanditiis praesentium voluptatum deleniti atque corrupti quos
														dolores et quas molestias excepturi sint occaecati cupiditate
														non provident, similique sunt in culpa qui officia deserunt
														mollitia animi, id est laborum et dolorum fuga. Et harum quidem
														rerum facilis est et expedita distinctio. Nam libero tempore,
														cum soluta nobis est eligendi optio cumque nihil impedit quo
														minus id quod maxime placeat facere possimus, omnis voluptas
														assumenda est, omnis dolor repellendus. </p>
												</div>

												<div class="tab_content">
													<p> On the other hand, we denounce with righteous indignation and
														dislike men who are so beguiled and demoralized by the charms of
														pleasure of the moment, so blinded by desire, that they cannot
														foresee the pain and trouble that are bound to ensue; and equal
														blame belongs to those who fail in their duty through weakness
														of will, which is the same as saying through shrinking from toil
														and pain. These cases are perfectly simple and easy to
														distinguish. In a free hour, when our power of choice is
														untrammelled and when nothing prevents .</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /div -->
						</div>
					</div>
				</div>

            @endsection

        @section('scripts')
  
		<!--- Tabs JS-->
		<script src="{{asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js')}}"></script>
		<script src="{{asset('assets/js/tabs.js')}}"></script>
        
        @endsection

