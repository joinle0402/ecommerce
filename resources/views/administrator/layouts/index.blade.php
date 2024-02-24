<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>AdminLTE 3 | Dashboard</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="{{ asset('administrator/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('administrator/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @yield('style')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">

        <div class="wrapper">
            <div class="loading" id="loading" style="">
                <div class="ring">
                    Loading
                    <span></span>
                </div>
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

        <script type="text/javascript" src="{{ asset('administrator/plugins/jquery/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('administrator/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        @yield('script')
        <script type="text/javascript">
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function(xhr, options) {
                        options.url = "{{ url('/')  }}" + options.url;
                    }
                });
                $('#loading').hide();
            });
        </script>
    </body>
</html>
