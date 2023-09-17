@extends('layouts.app')

        @section('styles')

        @endsection

            @section('content')

                <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Icons</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Bootstrap icons</span>
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
					<div class="col-lg-12 col-md-12">
						<div class="card custom-card">
							<div class="card-body">
								<div class="col-lg-12 col-sm-12 mb-2">
									<h6 class="main-content-label  mb-2 ">Bootstrap icons</h6>
									<p class="mb-2">Powered by Font Awesome set. For more info <a href="https://icons.getbootstrap.com/" target="_blank" class="text-primary">click here</a>.</p>
									<p><code>&lt;i class="bi bi-ICON_NAME"&gt;&lt;/i&gt;</code></p>
								</div>
								<div class="main-icon-group main-icon-list font-awesome">
									<ul class="icons-list">
										<li class="icons-list-item"><i class="bi bi-alarm"></i></li>
										<li class="icons-list-item"><i class="bi bi-alt"></i></li>
										<li class="icons-list-item"><i class="bi bi-app"></i></li>
										<li class="icons-list-item"><i class="bi bi-app-indicator"></i></li>
										<li class="icons-list-item"><i class="bi bi-archive"></i></li>
										<li class="icons-list-item"><i class="bi bi-arrow-90deg-down"></i></li>
										<li class="icons-list-item"><i class="bi bi-arrow-90deg-left"></i></li>
										<li class="icons-list-item"><i class="bi bi-arrow-90deg-right"></i></li>
										<li class="icons-list-item"><i class="bi bi-arrow-90deg-up"></i></li>
										<li class="icons-list-item"><i class="bi bi-arrow-bar-down"></i></li>
										<li class="icons-list-item"><i class="bi bi-arrow-bar-left"></i></li>
										<li class="icons-list-item"><i class="bi bi-arrow-bar-right"></i></li>
										<li class="icons-list-item"><i class="bi bi-arrow-bar-up"></i></li>
										<li class="icons-list-item"><i class="bi bi-arrow-clockwise"></i></li>
										<li class="icons-list-item"><i class="bi bi-arrow-counterclockwise"></i></li>
										<li class="icons-list-item"><i class="bi bi-bank"></i></li>
										<li class="icons-list-item"><i class="bi bi-bar-chart"></i></li>
										<li class="icons-list-item"><i class="bi bi-basket"></i></li>
										<li class="icons-list-item"><i class="bi bi-battery"></i></li>
										<li class="icons-list-item"><i class="bi bi-battery-full"></i></li>
										<li class="icons-list-item"><i class="bi bi-blockquote-right"></i></li>
										<li class="icons-list-item"><i class="bi bi-bell"></i></li>
										<li class="icons-list-item"><i class="bi bi-bicycle"></i></li>
										<li class="icons-list-item"><i class="bi bi-book"></i></li>
										<li class="icons-list-item"><i class="bi bi-briefcase"></i></li>
										<li class="icons-list-item"><i class="bi bi-brightness-high"></i></li>
										<li class="icons-list-item"><i class="bi bi-broadcast"></i></li>
										<li class="icons-list-item"><i class="bi bi-brush"></i></li>
										<li class="icons-list-item"><i class="bi bi-bucket"></i></li>
										<li class="icons-list-item"><i class="bi bi-bullseye"></i></li>
										<li class="icons-list-item"><i class="bi bi-calculator"></i></li>
										<li class="icons-list-item"><i class="bi bi-calendar"></i></li>
										<li class="icons-list-item"><i class="bi bi-calendar2-week"></i></li>
										<li class="icons-list-item"><i class="bi bi-camera"></i></li>
										<li class="icons-list-item"><i class="bi bi-camera-video"></i></li>
										<li class="icons-list-item"><i class="bi bi-card-image"></i></li>
										<li class="icons-list-item"><i class="bi bi-card-list"></i></li>
										<li class="icons-list-item"><i class="bi bi-cart"></i></li>
										<li class="icons-list-item"><i class="bi bi-cart4"></i></li>
										<li class="icons-list-item"><i class="bi bi-cash"></i></li>
										<li class="icons-list-item"><i class="bi bi-chat-dots"></i></li>
										<li class="icons-list-item"><i class="bi bi-chat-left-dots"></i></li>
										<li class="icons-list-item"><i class="bi bi-chat-square-dots"></i></li>
										<li class="icons-list-item"><i class="bi bi-chat-square"></i></li>
										<li class="icons-list-item"><i class="bi bi-circle"></i></li>
										<li class="icons-list-item"><i class="bi bi-clipboard"></i></li>
										<li class="icons-list-item"><i class="bi bi-clipboard-data"></i></li>
										<li class="icons-list-item"><i class="bi bi-clock"></i></li>
										<li class="icons-list-item"><i class="bi bi-cloud-arrow-down"></i></li>
										<li class="icons-list-item"><i class="bi bi-cloud-drizzle"></i></li>
										<li class="icons-list-item"><i class="bi bi-cloud-sun"></i></li>
										<li class="icons-list-item"><i class="bi bi-columns"></i></li>
										<li class="icons-list-item"><i class="bi bi-columns-gap"></i></li>
										<li class="icons-list-item"><i class="bi bi-collection-play"></i></li>
										<li class="icons-list-item"><i class="bi bi-credit-card"></i></li>
										<li class="icons-list-item"><i class="bi bi-cup"></i></li>
										<li class="icons-list-item"><i class="bi bi-cursor"></i></li>
										<li class="icons-list-item"><i class="bi bi-eraser"></i></li>
										<li class="icons-list-item"><i class="bi bi-exclamation-diamond"></i></li>
										<li class="icons-list-item"><i class="bi bi-exclamation-circle"></i></li>
										<li class="icons-list-item"><i class="bi bi-exclamation-triangle"></i></li>
										<li class="icons-list-item"><i class="bi bi-eye"></i></li>
										<li class="icons-list-item"><i class="bi bi-exclamation-octagon"></i></li>
										<li class="icons-list-item"><i class="bi bi-eyedropper"></i></li>
										<li class="icons-list-item"><i class="bi bi-file-earmark-plus"></i></li>
										<li class="icons-list-item"><i class="bi bi-file-earmark-zip"></i></li>
										<li class="icons-list-item"><i class="bi bi-files"></i></li>
										<li class="icons-list-item"><i class="bi bi-folder-minus"></i></li>
										<li class="icons-list-item"><i class="bi bi-folder-plus"></i></li>
										<li class="icons-list-item"><i class="bi bi-fullscreen"></i></li>
										<li class="icons-list-item"><i class="bi bi-grid"></i></li>
										<li class="icons-list-item"><i class="bi bi-hand-thumbs-down"></i></li>
										<li class="icons-list-item"><i class="bi bi-hand-thumbs-up"></i></li>
										<li class="icons-list-item"><i class="bi bi-hdd"></i></li>
										<li class="icons-list-item"><i class="bi bi-hdd-stack"></i></li>
										<li class="icons-list-item"><i class="bi bi-headphones"></i></li>
										<li class="icons-list-item"><i class="bi bi-heart"></i></li>
										<li class="icons-list-item"><i class="bi bi-heptagon"></i></li>
										<li class="icons-list-item"><i class="bi bi-hexagon"></i></li>
										<li class="icons-list-item"><i class="bi bi-hourglass"></i></li>
										<li class="icons-list-item"><i class="bi bi-house"></i></li>
										<li class="icons-list-item"><i class="bi bi-info-circle"></i></li>
										<li class="icons-list-item"><i class="bi bi-lightbulb"></i></li>
										<li class="icons-list-item"><i class="bi bi-link"></i></li>
										<li class="icons-list-item"><i class="bi bi-palette"></i></li>
										<li class="icons-list-item"><i class="bi bi-person-plus"></i></li>
										<li class="icons-list-item"><i class="bi bi-pin-map"></i></li>
										<li class="icons-list-item"><i class="bi bi-globe"></i></li>
										<li class="icons-list-item"><i class="bi bi-pause-circle"></i></li>
										<li class="icons-list-item"><i class="bi bi-search"></i></li>
										<li class="icons-list-item"><i class="bi bi-telephone"></i></li>
										<li class="icons-list-item"><i class="bi bi-unlock"></i></li>
										<li class="icons-list-item"><i class="bi bi-wifi"></i></li>
										<li class="icons-list-item"><i class="bi bi-wifi-off"></i></li>
								</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- / row -->

            @endsection

        @section('scripts')


        
        @endsection

