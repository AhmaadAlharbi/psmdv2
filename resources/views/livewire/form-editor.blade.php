@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Forms</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Form-Editor</span>
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

				<!-- Row -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header border-bottom-0">
								<h3 class="card-title">Summernote Editor</h3>
							</div>
							<div class="card-body">
								<div id="summernote"><p>Hello Summernote</p></div>
							</div>
						</div>
					</div>
				</div>
				<!--End Row-->

				<!-- Row -->
				<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header border-bottom-0">
							<h3 class="card-title">Wysiwyag Form Editor</h3>
						</div>
						<div class="card-body">
							<textarea class="content5" name="example"></textarea>
						</div>
					</div>
				</div>
				</div>
				<!--End Row-->

				<!-- Row -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header border-bottom-0">
								<div class="card-title">
									Quill Editor
								</div>
							</div>
							<div class="card-body">
								<div class="ql-wrapper ql-wrapper-demo">
									<div id="quillEditor">
										<p><strong>Quill</strong> is a free, open source <a href="https://github.com/quilljs/quill/">Quill Editor</a> built for the modern web. With its <a href="https://quilljs.com/docs/modules/">modular architecture</a>                                                and expressive API, it is completely customizable to fit any need.</p><br>
										<p>The icons use here as a replacement to default svg icons are from <a href="https://icons8.com/line-awesome">Line Awesome Icons</a>.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->

				<!-- Row -->
				<div class="row ">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header border-bottom-0">
								<div class="card-title">
									Form Editor in Modal
								</div>
							</div>
							<div class="card-body">
								<div class="text-center p-4 border">
									<a class="btn btn-primary" data-bs-target="#modalQuill" data-bs-toggle="modal" href="">View Live Demo</a>
								</div>
								<!-- pd-y-30 -->
								<div class="modal">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-header pd-20">
												<h6 class="modal-title">Create New Document</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
											</div>
											<div class="modal-body p-0">
												<div class="ql-wrapper ql-wrapper-modal ht-250">
													<div class="flex-1" id="quillEditorModal">
														<p><strong>Quill</strong> is a free, open source <a href="https://github.com/quilljs/quill/">WYSIWYG editor</a> built for the modern web. With its <a href="https://quilljs.com/docs/modules/">modular architecture</a>                                                                and expressive API, it is completely customizable to fit any need.</p><br>
														<p>The icons use here as a replacement to default svg icons are from <a href="https://icons8.com/line-awesome">Line Awesome Icons</a>.</p>
													</div>
												</div>
											</div>
											<div class="modal-footer pd-20">
												<button class="btn btn-primary">Save changes</button> <button class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->

				<!-- Row -->
				<div class="row ">
					<div class="col-md-12">
						<div class="card ">
							<div class="card-header border-bottom-0">
								<div class="card-title">
									From Inline-Edit Editor
								</div>
							</div>
							<div class="card-body">
								<div class="wd-xl-100p ht-350">
									<div class="ql-scrolling-demo p-4 border" id="scrolling-container">
										<div id="quillInline">
											<h2>Try to select me and edit</h2>
											<p><br></p>
											<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution
												of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text,
												and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->

				<!--Modal-->
				<div class="modal" id="modalQuill">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header pd-20">
								<h6 class="modal-title">Create New Document</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
							</div>
							<div class="modal-body pd-0">
								<div class="ql-wrapper ql-wrapper-modal ht-250">
									<div class="flex-1" id="quillEditorModal2">
										<p><strong>Quill</strong> is a free, open source <a href="https://github.com/quilljs/quill/">WYSIWYG editor</a> built for the modern web. With its <a href="https://quilljs.com/docs/modules/">modular architecture</a> and expressive API, it is completely customizable to fit any need.</p><br>
										<p>The icons use here as a replacement to default svg icons are from <a href="https://icons8.com/line-awesome">Line Awesome Icons</a>.</p>
									</div>
								</div>
							</div>
							<div class="modal-footer pd-20">
								<button class="btn btn-main-primary" type="button">Save changes</button> <button class="btn btn-light" type="button">Cancel</button>
							</div>
						</div>
					</div>
				</div>
				<!--/Modal-->

				<!-- Message Modal -->
				<div class="modal fade" id="chatmodel" tabindex="-1" role="dialog"  aria-hidden="true">
					<div class="modal-dialog modal-dialog-right chatbox" role="document">
						<div class="modal-content chat border-0">
							<div class="card overflow-hidden mb-0 border-0">
								<!-- action-header -->
								<div class="action-header clearfix">
									<div class="float-start hidden-xs d-flex ms-2">
										<div class="img_cont me-3">
											<img src="../assets/img/faces/6.jpg" class="rounded-circle user_img" alt="img">
										</div>
										<div class="align-items-center mt-2">
											<h4 class="text-white mb-0 fw-semibold">Daneil Scott</h4>
											<span class="dot-label bg-success"></span><span class="me-3 text-white">online</span>
										</div>
									</div>
									<ul class="ah-actions actions align-items-center">
										<li class="call-icon">
											<a href="" class="d-done d-md-block phone-button" data-bs-toggle="modal" data-bs-target="#audiomodal">
												<i class="si si-phone"></i>
											</a>
										</li>
										<li class="video-icon">
											<a href="" class="d-done d-md-block phone-button" data-bs-toggle="modal" data-bs-target="#videomodal">
												<i class="si si-camrecorder"></i>
											</a>
										</li>
										<li class="dropdown">
											<a href="" data-bs-toggle="dropdown" aria-expanded="true">
												<i class="si si-options-vertical"></i>
											</a>
											<ul class="dropdown-menu dropdown-menu-end">
												<li><i class="fa fa-user-circle"></i> View profile</li>
												<li><i class="fa fa-users"></i>Add friends</li>
												<li><i class="fa fa-plus"></i> Add to group</li>
												<li><i class="fa fa-ban"></i> Block</li>
											</ul>
										</li>
										<li>
											<a href=""  class="" data-bs-dismiss="modal" aria-label="Close">
												<span aria-hidden="true"><i class="si si-close text-white"></i></span>
											</a>
										</li>
									</ul>
								</div>
								<!-- action-header end -->

								<!-- msg_card_body -->
								<div class="card-body msg_card_body">
									<div class="chat-box-single-line">
										<abbr class="timestamp">February 1st, 2019</abbr>
									</div>
									<div class="d-flex justify-content-start">
										<div class="img_cont_msg">
											<img src="../assets/img/faces/6.jpg" class="rounded-circle user_img_msg" alt="img">
										</div>
										<div class="msg_cotainer">
											Hi, how are you Jenna Side?
											<span class="msg_time">8:40 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end ">
										<div class="msg_cotainer_send">
											Hi Connor Paige i am good tnx how about you?
											<span class="msg_time_send">8:55 AM, Today</span>
										</div>
										<div class="img_cont_msg">
											<img src="../assets/img/faces/9.jpg" class="rounded-circle user_img_msg" alt="img">
										</div>
									</div>
									<div class="d-flex justify-content-start ">
										<div class="img_cont_msg">
											<img src="../assets/img/faces/6.jpg" class="rounded-circle user_img_msg" alt="img">
										</div>
										<div class="msg_cotainer">
											I am good too, thank you for your chat template
											<span class="msg_time">9:00 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end ">
										<div class="msg_cotainer_send">
											You welcome Connor Paige
											<span class="msg_time_send">9:05 AM, Today</span>
										</div>
										<div class="img_cont_msg">
											<img src="../assets/img/faces/9.jpg" class="rounded-circle user_img_msg" alt="img">
										</div>
									</div>
									<div class="d-flex justify-content-start ">
										<div class="img_cont_msg">
											<img src="../assets/img/faces/6.jpg" class="rounded-circle user_img_msg" alt="img">
										</div>
										<div class="msg_cotainer">
											Yo, Can you update Views?
											<span class="msg_time">9:07 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											But I must explain to you how all this mistaken  born and I will give
											<span class="msg_time_send">9:10 AM, Today</span>
										</div>
										<div class="img_cont_msg">
											<img src="../assets/img/faces/9.jpg" class="rounded-circle user_img_msg" alt="img">
										</div>
									</div>
									<div class="d-flex justify-content-start ">
										<div class="img_cont_msg">
											<img src="../assets/img/faces/6.jpg" class="rounded-circle user_img_msg" alt="img">
										</div>
										<div class="msg_cotainer">
											Yo, Can you update Views?
											<span class="msg_time">9:07 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											But I must explain to you how all this mistaken  born and I will give
											<span class="msg_time_send">9:10 AM, Today</span>
										</div>
										<div class="img_cont_msg">
											<img src="../assets/img/faces/9.jpg" class="rounded-circle user_img_msg" alt="img">
										</div>
									</div>
									<div class="d-flex justify-content-start ">
										<div class="img_cont_msg">
											<img src="../assets/img/faces/6.jpg" class="rounded-circle user_img_msg" alt="img">
										</div>
										<div class="msg_cotainer">
											Yo, Can you update Views?
											<span class="msg_time">9:07 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											But I must explain to you how all this mistaken  born and I will give
											<span class="msg_time_send">9:10 AM, Today</span>
										</div>
										<div class="img_cont_msg">
											<img src="../assets/img/faces/9.jpg" class="rounded-circle user_img_msg" alt="img">
										</div>
									</div>
									<div class="d-flex justify-content-start">
										<div class="img_cont_msg">
											<img src="../assets/img/faces/6.jpg" class="rounded-circle user_img_msg" alt="img">
										</div>
										<div class="msg_cotainer">
											Okay Bye, text you later..
											<span class="msg_time">9:12 AM, Today</span>
										</div>
									</div>
								</div>
								<!-- msg_card_body end -->
								<!-- card-footer -->
								<div class="card-footer">
									<div class="msb-reply d-flex">
										<div class="input-group">
											<input type="text" class="form-control " placeholder="Typing....">
										<div class="input-group-text bg-transparent border-0 p-0">
												<button type="button" class="btn btn-primary ">
													<i class="far fa-paper-plane" aria-hidden="true"></i>
												</button>
											</div>
										</div>
									</div>
								</div><!-- card-footer end -->
							</div>
						</div>
					</div>
				</div>

				<!--Video Modal -->
				<div id="videomodal" class="modal fade">
					<div class="modal-dialog" role="document">
						<div class="modal-content bg-dark border-0 text-white">
							<div class="modal-body mx-auto text-center p-7">
								<h5>Valex Video call</h5>
								<img src="../assets/img/faces/6.jpg" class="rounded-circle user-img-circle h-8 w-8 mt-4 mb-3" alt="img">
								<h4 class="mb-1 fw-semibold">Daneil Scott</h4>
								<h6>Calling...</h6>
								<div class="mt-5">
									<div class="row">
										<div class="col-4">
											<a class="icon icon-shape rounded-circle mb-0 me-3" href="javascript:void(0);">
												<i class="fas fa-video-slash"></i>
											</a>
										</div>
										<div class="col-4">
											<a class="icon icon-shape rounded-circle text-white mb-0 me-3" href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close">
												<i class="fas fa-phone bg-danger text-white"></i>
											</a>
										</div>
										<div class="col-4">
											<a class="icon icon-shape rounded-circle mb-0 me-3" href="javascript:void(0);">
												<i class="fas fa-microphone-slash"></i>
											</a>
										</div>
									</div>
								</div>
							</div><!-- modal-body -->
						</div>
					</div><!-- modal-dialog -->
				</div>
				<!-- modal -->

				<!-- Audio Modal -->
				<div id="audiomodal" class="modal fade">
					<div class="modal-dialog" role="document">
						<div class="modal-content border-0">
							<div class="modal-body mx-auto text-center p-7">
								<h5>Valex Voice call</h5>
								<img src="../assets/img/faces/6.jpg" class="rounded-circle user-img-circle h-8 w-8 mt-4 mb-3" alt="img">
								<h4 class="mb-1  fw-semibold">Daneil Scott</h4>
								<h6>Calling...</h6>
								<div class="mt-5">
									<div class="row">
										<div class="col-4">
											<a class="icon icon-shape rounded-circle mb-0 me-3" href="javascript:void(0);">
												<i class="fas fa-volume-up bg-light text-dark"></i>
											</a>
										</div>
										<div class="col-4">
											<a class="icon icon-shape rounded-circle text-white mb-0 me-3" href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close">
												<i class="fas fa-phone text-white bg-success"></i>
											</a>
										</div>
										<div class="col-4">
											<a class="icon icon-shape  rounded-circle mb-0 me-3" href="javascript:void(0);">
												<i class="fas fa-microphone-slash bg-light text-dark"></i>
											</a>
										</div>
									</div>
								</div>
							</div><!-- modal-body -->
						</div>
					</div><!-- modal-dialog -->
				</div>
				<!-- modal -->
				@endsection

        @section('scripts')

		<!-- INTERNAL WYSIWYG Editor JS -->
		<script src="{{asset('assets/plugins/wysiwyag/jquery.richtext.js')}}"></script>
		<script src="{{asset('assets/plugins/wysiwyag/wysiwyag.js')}}"></script>

		<!-- INTERNAL Summernote Editor js -->
		<script src="{{asset('assets/plugins/summernote-editor/summernote1.js')}}"></script>
		<script src="{{asset('assets/js/summernote.js')}}"></script>

		<!--Internal quill js -->
		<script src="{{asset('assets/plugins/quill/quill.min.js')}}"></script>

		<!--Internal  Perfect-scrollbar js -->
		<script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>


		<!--Internal  Select2 js -->
		<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

		<!-- Internal Form-editor js -->
		<script src="{{asset('assets/js/form-editor.js')}}"></script>
        
        @endsection

