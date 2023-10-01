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
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-white">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{asset('assets/img/media/sb.png')}}"
                            class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-primary-gradient py-4">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex">
                                        <a href="{{url('index')}}"><img
                                                src="{{asset('assets/img/brand/favicon-32x32.png')}}"
                                                class="sign-favicon-a ht-40" alt="logo">
                                            <img src="{{asset('assets/img/brand/favicon-white.png')}}"
                                                class="sign-favicon-b ht-40" alt="logo">
                                        </a>
                                        <h3 class="main-logo1 ms-1 me-0 my-auto tx-28">
                                            Transsmison Electrical Networks
                                        </h3>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h5 class="fw-semibold mb-4 text-white">Please Sign in</h5>
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div>
                                                    <x-input-label class="text-white" for="email"
                                                        :value="__('Email')" />
                                                    <x-text-input id="email" class="form-control" type="email"
                                                        name="email" :value="old('email')" required autofocus
                                                        autocomplete="username" />
                                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                </div>

                                                <!-- Password -->
                                                <div class="mt-4">
                                                    <x-input-label class="text-white" for="password"
                                                        :value="__('Password')" />

                                                    <x-text-input id="password" class="form-control mb-4"
                                                        type="password" name="password" required
                                                        autocomplete="current-password" />

                                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                </div>
                                                <div class="block mt-4">
                                                    <label for="remember_me" class="inline-flex items-center">
                                                        <input id="remember_me" type="checkbox"
                                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                                            name="remember">
                                                        <span class="ml-2 text-sm text-white">{{ __('Remember me')
                                                            }}</span>
                                                    </label>
                                                </div>

                                                <button type="submit" class="btn btn-light">Login</button>

                                            </form>

                                            <div class=" main-signin-footer mt-5 text-white">
                                                <p><a href="{{url('forgot')}}">Forgot password?</a></p>
                                                <p>Don't have an account? <a href="{{url('signup')}}">Create an
                                                        Account</a></p>
                                            </div>
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