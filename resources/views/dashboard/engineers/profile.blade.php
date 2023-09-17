@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                Profile</span>
        </div>
    </div>
    <div class="d-flex my-xl-auto right-content">
        <div class="pe-1 mb-xl-0">
            <button type="button" class="btn btn-info btn-icon me-2 btn-b"><i
                    class="mdi mdi-filter-variant"></i></button>
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
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                    id="dropdownMenuDate" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
    <div class="col-xl-4">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="ps-0">
                    <div class="main-profile-overview">
                        <div class="main-img-user profile-user">
                            {{-- <img alt="" src="{{asset('assets/img/faces/6.jpg')}}"><a
                                class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a> --}}
                        </div>
                        <div class="d-flex justify-content-center mg-b-20">
                            <div>
                                <h2 class="">{{$engineer->name}}</h2>
                                <p class="main-profile-name-text">قسم {{$engineer->department->name}} </p>
                            </div>
                        </div>

                        <img src="{{asset('assets/img/dashboard/engineers/statistics.svg')}}" alt="">
                    </div><!-- main-profile-overview -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="row row-sm">
            <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
                <div class="card ">
                    <div class="card-body">
                        <div class="counter-status d-flex md-mb-0">
                            <div class="counter-icon bg-primary-transparent">
                                <i class="icon-layers text-primary"></i>
                            </div>
                            <div class="ms-auto">
                                <a href="{{route('dashboard.engineerTask',['id'=>$engineer->id,'status'=>'all'])}}">
                                    <h5 class="tx-13">عدد المهمات</h5>
                                    <h2 class="mb-0 tx-22 mb-1 mt-1">{{$tasks}}</h2>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
                <div class="card ">
                    <div class="card-body">
                        <div class="counter-status d-flex md-mb-0">
                            <div class="counter-icon bg-danger-transparent">
                                <i class="icon-paypal text-danger"></i>
                            </div>
                            <div class="ms-auto">
                                <a href="{{route('dashboard.engineerTask',['id'=>$engineer->id,'status'=>'pending'])}}">

                                    <div class="ms-auto">
                                        <h5 class="tx-13">المهمات الغيرالمنجزة</h5>
                                        <h2 class="mb-0 tx-22 mb-1 mt-1">{{$pendingTasks}}</h2>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
                <div class="card ">
                    <div class="card-body">
                        <div class="counter-status d-flex md-mb-0">
                            <div class="counter-icon bg-success-transparent">
                                <i class="icon-rocket text-success"></i>
                            </div>
                            <div class="ms-auto">
                                <a
                                    href="{{route('dashboard.engineerTask',['id'=>$engineer->id,'status'=>'completed'])}}">
                                    <div class="ms-auto">
                                        <h5 class="tx-13">المهمات المنجزة</h5>
                                        <h2 class="mb-0 tx-22 mb-1 mt-1">{{$completedTasks}}</h2>
                                    </div>
                                </a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="tabs-menu ">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs profile navtab-custom panel-tabs">
                        <li class="">
                            <a href="#home" data-bs-toggle="tab" class="active" aria-expanded="true"> <span
                                    class="visible-xs"><i class="las la-user-circle tx-16 me-1"></i></span> <span
                                    class="hidden-xs">احصائيات الشهر</span> </a>
                        </li>
                        <li class="">
                            <a href="#gallery" data-bs-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i
                                        class="las la-images tx-15 me-1"></i></span>
                                <span class="hidden-xs">احصائيات السنة</span> </a>
                        </li>
                        {{-- <li class="">
                            <a href="#friends" data-bs-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i
                                        class="las la-life-ring tx-16 me-1"></i></span>
                                <span class="hidden-xs">FRIENDS</span> </a>
                        </li>
                        <li class="">
                            <a href="#settings" data-bs-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i
                                        class="las la-cog tx-16 me-1"></i></span>
                                <span class="hidden-xs">SETTINGS</span> </a>
                        </li> --}}
                    </ul>
                </div>
                <div class="tab-content border border-top-0 p-4 br-dark">
                    <div class="tab-pane active" id="home">
                        <div style="width:650px;height:400px">
                            <canvas id="taskChart"></canvas>
                        </div>
                    </div>
                    <div class="tab-pane" id="gallery">

                        <div>
                            <canvas id="taskMonthlyChart"></canvas>
                        </div>
                    </div>
                    <div class="tab-pane" id="friends">
                        <div class="row row-sm">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                <div class="card custom-card border">
                                    <div class="card-body  user-lock text-center">
                                        <div class="dropdown text-end">
                                            <a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="true"> <i
                                                    class="fe fe-more-vertical"></i> </a>
                                            <div class="dropdown-menu dropdown-menu-end shadow"> <a
                                                    class="dropdown-item" href="javascript:void(0);"><i
                                                        class="fe fe-message-square me-2"></i>
                                                    Message</a> <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item"
                                                    href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="fe fe-trash-2 me-2"></i> Delete</a>
                                            </div>
                                        </div>
                                        <a href="{{url('profile')}}">
                                            <img alt="avatar" class="rounded-circle"
                                                src="{{asset('assets/img/faces/1.jpg')}}">
                                            <h5 class="fs-16 mb-0 mt-3 text-dark fw-semibold">James Thomas</h5>
                                            <span class="text-muted">Web designer</span>
                                            <div class="mt-3 d-flex mx-auto text-center justify-content-center">
                                                <span class="btn btn-icon me-3 btn-facebook">
                                                    <span class="btn-inner--icon"> <i
                                                            class="bx bxl-facebook tx-18 tx-prime"></i>
                                                    </span>
                                                </span>
                                                <span class="btn btn-icon me-3">
                                                    <span class="btn-inner--icon"> <i
                                                            class="bx bxl-twitter tx-18 tx-prime"></i>
                                                    </span>
                                                </span>
                                                <span class="btn btn-icon me-3">
                                                    <span class="btn-inner--icon"> <i
                                                            class="bx bxl-linkedin tx-18 tx-prime"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                <div class="card custom-card border">
                                    <div class="card-body  user-lock text-center">
                                        <div class="dropdown text-end">
                                            <a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="true"> <i
                                                    class="fe fe-more-vertical"></i> </a>
                                            <div class="dropdown-menu dropdown-menu-end shadow"> <a
                                                    class="dropdown-item" href="javascript:void(0);"><i
                                                        class="fe fe-message-square me-2"></i>
                                                    Message</a> <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item"
                                                    href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="fe fe-trash-2 me-2"></i> Delete</a>
                                            </div>
                                        </div>
                                        <a href="{{url('profile')}}">
                                            <img alt="avatar" class="rounded-circle"
                                                src="{{asset('assets/img/faces/3.jpg')}}">
                                            <h5 class="fs-16 mb-0 mt-3 text-dark fw-semibold">Reynante
                                                Labares</h5>
                                            <span class="text-muted">Web designer</span>
                                            <div class="mt-3 d-flex mx-auto text-center justify-content-center">
                                                <span class="btn btn-icon me-3 btn-facebook">
                                                    <span class="btn-inner--icon"> <i
                                                            class="bx bxl-facebook tx-18 tx-prime"></i>
                                                    </span>
                                                </span>
                                                <span class="btn btn-icon me-3">
                                                    <span class="btn-inner--icon"> <i
                                                            class="bx bxl-twitter tx-18 tx-prime"></i>
                                                    </span>
                                                </span>
                                                <span class="btn btn-icon me-3">
                                                    <span class="btn-inner--icon"> <i
                                                            class="bx bxl-linkedin tx-18 tx-prime"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                <div class="card custom-card border">
                                    <div class="card-body  user-lock text-center">
                                        <div class="dropdown text-end">
                                            <a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="true"> <i
                                                    class="fe fe-more-vertical"></i> </a>
                                            <div class="dropdown-menu dropdown-menu-end shadow"> <a
                                                    class="dropdown-item" href="javascript:void(0);"><i
                                                        class="fe fe-message-square me-2"></i>
                                                    Message</a> <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item"
                                                    href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="fe fe-trash-2 me-2"></i> Delete</a>
                                            </div>
                                        </div>
                                        <a href="{{url('profile')}}">
                                            <img alt="avatar" class="rounded-circle"
                                                src="{{asset('assets/img/faces/4.jpg')}}">
                                            <h5 class="fs-16 mb-0 mt-3 text-dark fw-semibold">Owen
                                                Bongcaras</h5>
                                            <span class="text-muted">Web designer</span>
                                            <div class="mt-3 d-flex mx-auto text-center justify-content-center">
                                                <span class="btn btn-icon me-3 btn-facebook">
                                                    <span class="btn-inner--icon"> <i
                                                            class="bx bxl-facebook tx-18 tx-prime"></i>
                                                    </span>
                                                </span>
                                                <span class="btn btn-icon me-3">
                                                    <span class="btn-inner--icon"> <i
                                                            class="bx bxl-twitter tx-18 tx-prime"></i>
                                                    </span>
                                                </span>
                                                <span class="btn btn-icon me-3">
                                                    <span class="btn-inner--icon"> <i
                                                            class="bx bxl-linkedin tx-18 tx-prime"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                <div class="card custom-card border">
                                    <div class="card-body  user-lock text-center">
                                        <div class="dropdown text-end">
                                            <a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="true"> <i
                                                    class="fe fe-more-vertical"></i> </a>
                                            <div class="dropdown-menu dropdown-menu-end shadow"> <a
                                                    class="dropdown-item" href="javascript:void(0);"><i
                                                        class="fe fe-message-square me-2"></i>
                                                    Message</a> <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item"
                                                    href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="fe fe-trash-2 me-2"></i> Delete</a>
                                            </div>
                                        </div>
                                        <a href="{{url('profile')}}">
                                            <img alt="avatar" class="rounded-circle"
                                                src="{{asset('assets/img/faces/8.jpg')}}">
                                            <h5 class="fs-16 mb-0 mt-3 text-dark fw-semibold">Stephen
                                                Metcalfe</h5>
                                            <span class="text-muted">Administrator</span>
                                            <div class="mt-3 d-flex mx-auto text-center justify-content-center">
                                                <span class="btn btn-icon me-3 btn-facebook">
                                                    <span class="btn-inner--icon"> <i
                                                            class="bx bxl-facebook tx-18 tx-prime"></i>
                                                    </span>
                                                </span>
                                                <span class="btn btn-icon me-3">
                                                    <span class="btn-inner--icon"> <i
                                                            class="bx bxl-twitter tx-18 tx-prime"></i>
                                                    </span>
                                                </span>
                                                <span class="btn btn-icon me-3">
                                                    <span class="btn-inner--icon"> <i
                                                            class="bx bxl-linkedin tx-18 tx-prime"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                <div class="card custom-card border">
                                    <div class="card-body  user-lock text-center">
                                        <div class="dropdown text-end">
                                            <a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="true"> <i
                                                    class="fe fe-more-vertical"></i> </a>
                                            <div class="dropdown-menu dropdown-menu-end shadow"> <a
                                                    class="dropdown-item" href="javascript:void(0);"><i
                                                        class="fe fe-message-square me-2"></i>
                                                    Message</a> <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item"
                                                    href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="fe fe-trash-2 me-2"></i> Delete</a>
                                            </div>
                                        </div>
                                        <a href="{{url('profile')}}">
                                            <img alt="avatar" class="rounded-circle"
                                                src="{{asset('assets/img/faces/2.jpg')}}">
                                            <h5 class="fs-16 mb-0 mt-3 text-dark fw-semibold">Socrates
                                                Itumay</h5>
                                            <span class="text-muted">Project Manager</span>
                                            <div class="mt-3 d-flex mx-auto text-center justify-content-center">
                                                <span class="btn btn-icon me-3 btn-facebook">
                                                    <span class="btn-inner--icon"> <i
                                                            class="bx bxl-facebook tx-18 tx-prime"></i>
                                                    </span>
                                                </span>
                                                <span class="btn btn-icon me-3">
                                                    <span class="btn-inner--icon"> <i
                                                            class="bx bxl-twitter tx-18 tx-prime"></i>
                                                    </span>
                                                </span>
                                                <span class="btn btn-icon me-3">
                                                    <span class="btn-inner--icon"> <i
                                                            class="bx bxl-linkedin tx-18 tx-prime"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                <div class="card custom-card border">
                                    <div class="card-body  user-lock text-center">
                                        <div class="dropdown text-end">
                                            <a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="true"> <i
                                                    class="fe fe-more-vertical"></i> </a>
                                            <div class="dropdown-menu dropdown-menu-end shadow"> <a
                                                    class="dropdown-item" href="javascript:void(0);"><i
                                                        class="fe fe-message-square me-2"></i>
                                                    Message</a> <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item"
                                                    href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="fe fe-trash-2 me-2"></i> Delete</a>
                                            </div>
                                        </div>
                                        <a href="{{url('profile')}}">
                                            <img alt="avatar" class="rounded-circle"
                                                src="{{asset('assets/img/faces/3.jpg')}}">
                                            <h5 class="fs-16 mb-0 mt-3 text-dark fw-semibold">Reynante
                                                Labares</h5>
                                            <span class="text-muted">Web Designer</span>
                                            <div class="mt-3 d-flex mx-auto text-center justify-content-center">
                                                <span class="btn btn-icon me-3 btn-facebook">
                                                    <span class="btn-inner--icon"> <i
                                                            class="bx bxl-facebook tx-18 tx-prime"></i>
                                                    </span>
                                                </span>
                                                <span class="btn btn-icon me-3">
                                                    <span class="btn-inner--icon"> <i
                                                            class="bx bxl-twitter tx-18 tx-prime"></i>
                                                    </span>
                                                </span>
                                                <span class="btn btn-icon me-3">
                                                    <span class="btn-inner--icon"> <i
                                                            class="bx bxl-linkedin tx-18 tx-prime"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                <div class="card custom-card border">
                                    <div class="card-body  user-lock text-center">
                                        <div class="dropdown text-end">
                                            <a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="true"> <i
                                                    class="fe fe-more-vertical"></i> </a>
                                            <div class="dropdown-menu dropdown-menu-end shadow"> <a
                                                    class="dropdown-item" href="javascript:void(0);"><i
                                                        class="fe fe-message-square me-2"></i>
                                                    Message</a> <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item"
                                                    href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="fe fe-trash-2 me-2"></i> Delete</a>
                                            </div>
                                        </div>
                                        <a href="{{url('profile')}}">
                                            <img alt="avatar" class="rounded-circle"
                                                src="{{asset('assets/img/faces/4.jpg')}}">
                                            <h5 class="fs-16 mb-0 mt-3 text-dark fw-semibold">Owen
                                                Bongcaras</h5>
                                            <span class="text-muted">App Developer</span>
                                            <div class="mt-3 d-flex mx-auto text-center justify-content-center">
                                                <span class="btn btn-icon me-3 btn-facebook">
                                                    <span class="btn-inner--icon"> <i
                                                            class="bx bxl-facebook tx-18 tx-prime"></i>
                                                    </span>
                                                </span>
                                                <span class="btn btn-icon me-3">
                                                    <span class="btn-inner--icon"> <i
                                                            class="bx bxl-twitter tx-18 tx-prime"></i>
                                                    </span>
                                                </span>
                                                <span class="btn btn-icon me-3">
                                                    <span class="btn-inner--icon"> <i
                                                            class="bx bxl-linkedin tx-18 tx-prime"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                <div class="card custom-card border">
                                    <div class="card-body  user-lock text-center">
                                        <div class="dropdown text-end">
                                            <a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="true"> <i
                                                    class="fe fe-more-vertical"></i> </a>
                                            <div class="dropdown-menu dropdown-menu-end shadow"> <a
                                                    class="dropdown-item" href="javascript:void(0);"><i
                                                        class="fe fe-message-square me-2"></i>
                                                    Message</a> <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item"
                                                    href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="fe fe-trash-2 me-2"></i> Delete</a>
                                            </div>
                                        </div>
                                        <a href="{{url('profile')}}">
                                            <img alt="avatar" class="rounded-circle"
                                                src="{{asset('assets/img/faces/8.jpg')}}">
                                            <h5 class="fs-16 mb-0 mt-3 text-dark fw-semibold">Stephen
                                                Metcalfe</h5>
                                            <span class="text-muted">Administrator</span>
                                            <div class="mt-3 d-flex mx-auto text-center justify-content-center">
                                                <span class="btn btn-icon me-3 btn-facebook">
                                                    <span class="btn-inner--icon"> <i
                                                            class="bx bxl-facebook tx-18 tx-prime"></i>
                                                    </span>
                                                </span>
                                                <span class="btn btn-icon me-3">
                                                    <span class="btn-inner--icon"> <i
                                                            class="bx bxl-twitter tx-18 tx-prime"></i>
                                                    </span>
                                                </span>
                                                <span class="btn btn-icon me-3">
                                                    <span class="btn-inner--icon"> <i
                                                            class="bx bxl-linkedin tx-18 tx-prime"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="settings">
                        <form role="form">
                            <div class="form-group">
                                <label for="FullName">Full Name</label>
                                <input type="text" value="John Doe" id="FullName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="email" value="first.last@example.com" id="Email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Username">Username</label>
                                <input type="text" value="john" id="Username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" placeholder="6 - 15 Characters" id="Password"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="RePassword">Re-Password</label>
                                <input type="password" placeholder="6 - 15 Characters" id="RePassword"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="AboutMe">About Me</label>
                                <textarea id="AboutMe"
                                    class="form-control">Loren gypsum dolor sit mate, consecrate disciplining lit, tied diam nonunion nib modernism tincidunt it Loretta dolor manga Amalia erst volute. Ur wise denim ad minim venial, quid nostrum exercise ration perambulator suspicious cortisol nil it applique ex ea commodore consequent.</textarea>
                            </div>
                            <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->

@endsection

@section('scripts')

<!-- smart photo master js -->
<script src="{{asset('assets/plugins/SmartPhoto-master/smartphoto.js')}}"></script>
<script src="{{asset('assets/js/gallery-1.js')}}"></script>
<!--Internal  Chart.bundle js -->
<script src="{{asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>

<!-- Internal Chartjs js -->
<script src="{{asset('assets/js/chart.chartjs.js')}}"></script>

<script>
    var ctx = document.getElementById('taskChart').getContext('2d');
    var taskChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Tasks', 'Pending Tasks', 'Completed Tasks'],
            datasets: [{
                label: 'Task Count',
                data: [{{ $tasks }}, {{ $pendingTasks }}, {{ $completedTasks }}],
                backgroundColor: [
                   
                    'rgb(54, 162, 235)',
                    'rgb(255, 99, 132)',
                    'rgb(50, 205, 50)'
                ],
                borderColor: [
                 
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(34, 139, 34, 1)'

                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>

<script>
    var ctx = document.getElementById('taskMonthlyChart').getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [{
            label: 'Total Tasks',
            data: [{{ implode(',', $taskCounts) }}],
            backgroundColor: 'rgba(54, 162, 235)',
            borderColor: 'rgb(54, 162, 235)',
            borderWidth: 1
        },
        {
            label: 'Pending Tasks',
            data: [{{ implode(',', $pendingTaskCounts) }}],
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            borderWidth: 1
        },
        {
            label: 'Completed Tasks',
            data: [{{ implode(',', $completedTaskCounts) }}],
            backgroundColor:  'rgb(50, 205, 50)',
            borderColor: 'rgb(34, 139, 34)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>

@endsection