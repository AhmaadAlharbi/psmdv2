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
                        <img src="{{asset('assets/img/media/register.jpg')}}"
                            class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-dark-transparent py-4">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex">
                                        <a href="{{url('index')}}"><img src="{{asset('assets/img/brand/favicon.png')}}"
                                                class="sign-favicon-a ht-40" alt="logo">
                                            <img src="{{asset('assets/img/brand/favicon-white.png')}}"
                                                class="sign-favicon-b ht-40" alt="logo">
                                        </a>
                                        <h1 class="main-logo1 ms-1 me-0 my-auto tx-28">PS<span>M</span>D</h1>
                                    </div>
                                    <div class="main-signup-header">
                                        <h2 class="text-primary">Get Started</h2>
                                        <form method="POST" action="{{ route('register' ) }}">
                                            @csrf

                                            <!-- Name -->
                                            <div>
                                                <x-input-label for="name" :value="__('Full name , Match civil ID format: typically four
                                                words,
                                                separated by
                                                spaces.')" />
                                                <x-text-input id="name" class="form-control" type="text" name="name"
                                                    :value="old('name')" required autofocus autocomplete="name" />
                                                <x-input-error :messages="$errors->get('name')"
                                                    class="mt-2 text-danger" />
                                            </div>
                                            <!-- Arabic Name -->

                                            <div>
                                                <x-input-label for="arabic_name"
                                                    :value="__('الرجاء تسجيل اسمك الثلاثي باللغة العربية')" />
                                                <x-text-input id="arabic_name" class="form-control" type="text"
                                                    name="arabic_name" :value="old('arabic_name')" required autofocus />
                                                <x-input-error :messages="$errors->get('arabic_name')"
                                                    class="mt-2 text-danger" />
                                            </div>
                                            <!-- Email Address -->
                                            <div class="mt-4">
                                                <x-input-label for="email" :value="__('Email,only MEW Email')" />
                                                <x-text-input id="email" class="form-control" type="email" name="email"
                                                    :value="old('email')" required autocomplete="username" />
                                                <x-input-error :messages="$errors->get('email')"
                                                    class="mt-2 text-danger" />
                                            </div>
                                            <div class="mt-4">

                                                <label for="department">Please select the department that you belong
                                                    to</label>

                                                <select class="form-select bg-white" name="department">
                                                    <option value="-1">Select a Department</option>
                                                    @foreach($departments as $department)
                                                    <option value="{{ $department->id }}" {{
                                                        old('department')==$department->id ? 'selected' : '' }}>
                                                        {{ $department->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('department')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Password -->
                                            <div class="mt-4">
                                                <x-input-label for="password" :value="__('Password')" />

                                                <x-text-input id="password" class="form-control" type="password"
                                                    name="password" required autocomplete="new-password" />

                                                <x-input-error :messages="$errors->get('password')"
                                                    class="mt-2 text-danger" />
                                            </div>

                                            <!-- Confirm Password -->
                                            <div class="mt-4">
                                                <x-input-label for="password_confirmation"
                                                    :value="__('Confirm Password')" />

                                                <x-text-input id="password_confirmation" class="form-control"
                                                    type="password" name="password_confirmation" required
                                                    autocomplete="new-password" />

                                                <x-input-error :messages="$errors->get('password_confirmation')"
                                                    class="mt-2 text-danger" />
                                            </div>

                                            <div class="flex items-center justify-end mt-4">


                                                <x-primary-button class="ml-4">
                                                    {{ __('Register') }}
                                                </x-primary-button>
                                            </div>
                                        </form>
                                        <div class="main-signup-footer mt-5">
                                            <p>Already have an account? <a href="{{url('/')}}">Sign In</a></p>
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

    <!--- JQuery sparkline js --->
    <script src="{{asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

    @endsection