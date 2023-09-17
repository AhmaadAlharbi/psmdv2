<!doctype html>
<html lang="en" dir="ltr">
<!-- This "app.blade.php" master page is used for all the pages content present in "views/livewire" except "custom" and "switcher" pages -->

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Valex - Laravel Bootstrap 5 Admin & Dashboard Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords"
        content="laravel admin template, bootstrap admin template, admin dashboard template, admin dashboard, admin template, admin, bootstrap 5, laravel admin, laravel admin dashboard template, laravel ui template, laravel admin panel, admin panel, laravel admin dashboard, laravel template, admin ui dashboard">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <!-- Title -->

    <title> PSMD | Trouble shootig Dashboard </title>

    @include('layouts.components.styles')
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
    @livewireStyles
</head>

<body class="rtl main-body app sidebar-mini">

    <!-- Loader -->
    <div id="global-loader">
        <img src="{{asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->

    <!-- Page -->
    <div class="page">
        <div>

            @include('layouts.components.app-header1')

            @if(Auth::user()->role->title == 'Admin')
            @include('layouts.components.app-sidebar')
            @else
            @include('layouts.components.app-sidebar-user')

            @endif

        </div>

        <!-- main-content -->
        <div class="main-content app-content">

            <!-- container -->
            <div class="main-container container-fluid">

                @yield('content')

            </div>
            <!-- Container closed -->
        </div>
        <!-- main-content closed -->

        @include('layouts.components.sidebar-right')

        @include('layouts.components.modal')

        @yield('modal')

        @include('layouts.components.footer')

    </div>
    <!-- End Page -->

    @include('layouts.components.scripts')

    @livewireScripts
</body>

</html>