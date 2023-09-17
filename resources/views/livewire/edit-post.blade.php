@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Blog</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Edit Post</span>
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
					<div class="col-lg-12 col-md-12 col-md-12">
						<div class="card blog-edit">
							<div class="card-body">
								<div class="form-group">
									<label class="form-label text-dark">Course Title</label>
									<input type="text" class="form-control" value="Advanced Web Develpment">
								</div>
								<div class="form-group">
									<label class="form-label text-dark">Category</label>
									<select class="form-control select2 form-select">
										<option>Select</option>
										<option value="1" selected>IT</option>
										<option value="2">Language</option>
										<option value="3">Science</option>
										<option value="4">Health</option>
										<option value="5">Humanities</option>
										<option value="6">Business</option>
										<option value="7">Maths</option>
										<option value="8">Marketing</option>
									</select>
								</div>
								<div class="form-group">
									<label class="form-label text-dark">Instructor</label>
									<select class="form-control select2 form-select">
										<option>Select</option>
										<option value="1" selected>Pedro Cox</option>
										<option value="2">Vera Guzman</option>
										<option value="3">Glenda Long</option>
										<option value="4">Joel Anderson</option>
										<option value="5">Blanche Henderson</option>
									</select>
								</div>
								<div class="form-group">
									<label class="form-label text-dark">Type of mode</label>
									<div class="d-md-flex ad-post-details">
										<label class="custom-control form-radio mb-2 me-4">
											<input type="radio" class="custom-control-input" name="radios2" value="option1" checked="">
											<span class="custom-control-label"><a href="javascript:void(0)" class="">Online </a></span>
										</label>
										<label class="custom-control form-radio mb-2">
											<input type="radio" class="custom-control-input" name="radios2" value="option2" >
											<span class="custom-control-label"><a href="javascript:void(0)" class="">Offline</a></span>
										</label>
									</div>
								</div>
								<div class="form-group">
									<div class="ql-wrapper">
										<div id="quillEditor">
											<p><strong>Quill</strong> is a free, open source <a href="https://github.com/quilljs/quill/">WYSIWYG editor</a> built for the modern web. With its <a href="https://quilljs.com/docs/modules/">modular architecture</a> and expressive API, it is completely customizable to fit any need.</p><br>
											<p>The icons use here as a replacement to default svg icons are from <a href="https://icons8.com/line-awesome">Line Awesome Icons</a>.</p>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="form-label text-dark">Course Type</label>
									<div class="d-md-flex ad-post-details">
										<label class="custom-control form-radio mb-2 me-4">
											<input type="radio" class="custom-control-input" name="radios12" value="option1" checked="">
											<span class="custom-control-label"><a href="javascript:void(0)" class="">Free </a></span>
										</label>
										<label class="custom-control form-radio  mb-2">
											<input type="radio" class="custom-control-input" name="radios12" value="option2" >
											<span class="custom-control-label"><a href="javascript:void(0)" class="">Paid</a></span>
										</label>
									</div>
								</div>
								<div class="p-4 border mb-4 form-group">
									<div>
										<input id="demo" type="file" name="files" accept=" image/jpeg, image/png, text/html, application/zip, text/css, text/js" multiple />
									</div>
								</div>
								<div class="form-group">
									<label class="form-label">Upload Video URL</label>
									<input type="text" class="form-control" placeholder="https://videos.com" value="https://www.youtube.com/embed/tMWkeBIohBs">
								</div>
								<div class="control-group form-group  mb-0">
									<label class="form-label text-dark">Course Post Package</label>
									<div class=" border p-3 rounded-7">
										<div class="d-md-flex ad-post-details">
											<label class="custom-control form-radio mb-0 me-5">
												<input type="radio" class="custom-control-input" name="radios1" value="option7">
												<span class="custom-control-label">30 Days Free</span>
											</label>
											<label class="custom-control form-radio  mb-0 me-4">
												<input type="radio" class="custom-control-input" name="radios1" value="option8" checked="">
												<span class="custom-control-label">60 days / <span class="font-weight-bold">$20</span></span>
											</label>
											<label class="custom-control form-radio  mb-0 me-4">
												<input type="radio" class="custom-control-input" name="radios1" value="option9">
												<span class="custom-control-label">6months /<span class="font-weight-bold">$50</span></span>
											</label>
											<label class="custom-control form-radio  mb-0">
												<input type="radio" class="custom-control-input" name="radios1" value="option10">
												<span class="custom-control-label">1 year / <span class="font-weight-bold">$80</span></span>
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer ">
								<a href="javascript:void(0)" class="btn btn-secondary">Save to Draft</a>
								<a href="javascript:void(0)" class="btn btn-primary float-end">Publish Now</a>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->

            @endsection

        @section('scripts')

		<!--Internal quill js -->
		<script src="{{asset('assets/plugins/quill/quill.min.js')}}"></script>

		<!--Internal Fileuploads js-->
		<script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
		<script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>

		<!--Internal Fancy uploader js-->
		<script src="{{asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
		<script src="{{asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
		<script src="{{asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
		<script src="{{asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
		<script src="{{asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>

		<!-- Internal Summernote js-->
		<script src="{{asset('assets/plugins/summernote/summernote-bs4.js')}}"></script>

		<!-- Internal Select2.min js -->
		<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
		<script src="{{asset('assets/js/select2.js')}}"></script>

		<!-- Internal Form-editor js -->
		<script src="{{asset('assets/js/form-editor-2.js')}}"></script>
        
        @endsection

