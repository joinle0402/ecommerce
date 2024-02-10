<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminLTE 3 | Dashboard</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="{{ asset('administrator/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('administrator/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @yield('style')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">

        <div class="wrapper">
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="{{ asset('administrator/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
            </div>

            @include('administrator.partials.navbar')

            @include('administrator.partials.sidebar')

            <div class="content-wrapper">
                <section class="content">
                    @yield('content')
                </section>
            </div>

            @include('administrator.partials.footer')
        </div>

        <script src="{{ asset('administrator/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('administrator/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('administrator/dist/js/adminlte.js') }}"></script>
        @yield('script')
    </body>
</html>
