<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - Yosef Almeida Boy</title>
        <link href="{{ asset('inspinia/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('inspinia/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('inspinia/css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('inspinia/css/style.css') }}" rel="stylesheet">
    </head>
    <body class="gray-bg">
        <div class="middle-box text-center loginscreen animated fadeInDown">
            <div>
                {{-- <div>
                    <h1 class="logo-name">FS+</h1>
                </div> --}}
                <h3>Welcome to Yosef Almaida Boy</h3>
                <p>
                </p>
                <p>Login in. To see it in action.</p>
                <form class="m-t" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="role_id" value="2">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b"><i class="fa fa-sign-in"></i> Login</button>
                    <a href="#"><small>Forgot password?</small></a>
                    <p class="text-muted text-center"><small>Do not have an account?</small></p>
                    <a class="btn btn-sm btn-white btn-block" href="{{ route('front/profile') }}"><i class="fa fa-arrow-left"></i> Back</a>
                </form>
                <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
            </div>
        </div>
        <!-- Mainly scripts -->
        <script src="{{ asset('inspinia/js/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('inspinia/js/bootstrap.min.js') }}"></script>
    </body>
</html>
