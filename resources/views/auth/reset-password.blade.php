@extends('layouts.custom-app')

@section('styles')

@endsection

@section('body')

<body class="ltr main-body error-page1 error-3">

    @endsection

    @section('content')

    <div class="main-container container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{asset('assets/img/resetPassword.svg')}}"
                            class="my-auto ht-xl-80p wd-md-100p wd-xl-50p ht-xl-60p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white py-4">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="mb-5 d-flex">
                                    <a href="{{url('index')}}"><img src="{{asset('assets/img/brand/favicon.png')}}"
                                            class="sign-favicon-a ht-40" alt="logo">
                                        <img src="{{asset('assets/img/brand/favicon-white.png')}}"
                                            class="sign-favicon-b ht-40" alt="logo">
                                    </a>
                                    <h3 class="main-logo1 ms-1 me-0 my-auto tx-28">
                                        Transsmison Electrical Networks
                                    </h3>
                                </div>
                                <div class="main-card-signin d-md-flex">
                                    <div class="wd-100p">
                                        <div class="main-signin-header">
                                            <div class="">
                                                <h2>Welcome back!</h2>
                                                <h4 class="text-start">Reset Your Password</h4>
                                                <form method="POST" action="{{ route('password.store') }}">
                                                    @csrf

                                                    <!-- Password Reset Token -->
                                                    <input type="hidden" name="token"
                                                        value="{{ $request->route('token') }}">

                                                    <!-- Email Address -->
                                                    <div>
                                                        <x-input-label for="email" :value="__('Email')" />
                                                        <x-text-input id="email" class="form-control" type="email"
                                                            name="email" :value="old('email', $request->email)" required
                                                            autofocus autocomplete="username" />
                                                        <x-input-error :messages="$errors->get('email')"
                                                            class="mt-2 text-danger" />
                                                    </div>

                                                    <!-- Password -->
                                                    <div class="mt-4">
                                                        <x-input-label for="password" :value="__('Password')" />
                                                        <x-text-input id="password" class="form-control" type="password"
                                                            name="password" required autocomplete="new-password" />
                                                        <x-input-error :messages="$errors->get('password')"
                                                            class="text-danger" />
                                                    </div>

                                                    <!-- Confirm Password -->
                                                    <div class="mt-4">
                                                        <x-input-label for="password_confirmation"
                                                            :value="__('Confirm Password')" />

                                                        <x-text-input id="password_confirmation" class="form-control"
                                                            type="password" name="password_confirmation" required
                                                            autocomplete="new-password" />

                                                        <x-input-error :messages="$errors->get('password_confirmation')"
                                                            class="text-danger" />
                                                    </div>

                                                    <div class="flex items-center justify-end mt-4">
                                                        <x-primary-button>
                                                            {{ __('Reset Password') }}
                                                        </x-primary-button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                        <div class="main-signup-footer mg-t-20">
                                            <p>Already have an account? <a href="{{url('signin')}}">Sign In</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>

    @endsection

    @section('scripts')



    @endsection