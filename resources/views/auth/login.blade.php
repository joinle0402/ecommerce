<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminLTE 3 | Log in</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="{{ asset('administrator/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('administrator/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('administrator/dist/css/adminlte.min.css') }}">
    </head>
    <body class="hold-transition login-page">

        <div class="login-box" style="width: 400px;">
            <div class="card">
                <div class="card-body login-card-body">
                    <form action="{{ route('auth.onLogin') }}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" @class(['form-control', 'is-invalid' => $errors->has('email')]) id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Mật khẩu:</label>
                            <input type="password" @class(['form-control', 'is-invalid' => $errors->has('password')]) id="password" name="password" value="{{ old('password') }}" autocomplete="on">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Nhớ mật khẩu
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="{{ asset('administrator/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('administrator/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('administrator/dist/js/adminlte.min.js') }}"></script>
        <script>
        </script>
    </body>
</html>
