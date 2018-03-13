<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register - Yosef Almaida Boy</title>
        <link href="{{ asset('inspinia/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('inspinia/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('inspinia/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('inspinia/css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('inspinia/css/style.css') }}" rel="stylesheet">
    </head>
    <body class="gray-bg">
        <div class="middle-box text-center loginscreen   animated fadeInDown">
            <div>
                {{-- <div>
                    <h1 class="logo-name">FS+</h1>
                </div> --}}
                <h3>Register</h3>
                <p>Create account to see it in action.</p>
                <form class="m-t" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input id="name" type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
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
                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group">
                        <div class="checkbox i-checks"><label> <input type="checkbox" id="checkme"><i></i> Agree the terms and policy </label></div>
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b inputButton" name="sendNewSms" disabled="disabled" id="sendNewSms">Register</button>
                    <p class="text-muted text-center"><small>Already have an account?</small></p>
                    <a class="btn btn-sm btn-white btn-block" href="{{ route('login') }}">Login</a>
                </form>
                <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
            </div>
        </div>
        <!-- Mainly scripts -->
        <script src="{{ asset('inspinia/js/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('inspinia/js/bootstrap.min.js') }}"></script>
        <!-- iCheck -->
        <script src="{{ asset('inspinia/js/plugins/iCheck/icheck.min.js') }}"></script>
        {{-- <script>
        $(document).ready(function(){
        $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
        });
        });
        </script> --}}

        <script>
             var checker = document.getElementById('checkme');
             var sendbtn = document.getElementById('sendNewSms');
             // when unchecked or checked, run the function
             checker.onchange = function(){
            if(this.checked){
                sendbtn.disabled = false;
            } else {
                sendbtn.disabled = true;
            }

            }
        </script>
    </body>
</html>
