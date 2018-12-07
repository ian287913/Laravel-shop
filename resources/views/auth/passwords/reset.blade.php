<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>重設密碼</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/iCheck/square/blue.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('dashboard.index') }}">My<b>Product</b>Admin</a>
    </div>
    <!-- /.login-logo -->


    <div class="box box-success" style="margin-bottom: 5px">
        <div class="box-header with-border" style="text-align: center">
            <h3 class="box-title">Reset Password</h3>
        </div>
        <!-- /.box-header -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-times-circle-o"></i> Input error:
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
    <!-- form start -->
        <form class="form-horizontal" action="{{ route('password.update') }}" method="post">

            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="box-body" style="margin-left: 10px; margin-right: 10px">
                <div class="input-group">
                    <span class="input-group-addon" style="background-color: lightcyan"><span class="glyphicon glyphicon-envelope"></span></span>
                    <input style="background-color: lightcyan" type="email" name="email" class="form-control" placeholder="Email" value="{{ $email ?? old('email') }}" required>

                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" style="background-color: lightcyan"><span class="glyphicon glyphicon-lock"></span></span>
                    <input style="background-color: lightcyan" type="password" name="password" class="form-control" placeholder="Password" required>

                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" style="background-color: lightcyan"><span class="glyphicon glyphicon-check"></span></span>
                    <input style="background-color: lightcyan" type="password" name="password_confirmation" class="form-control" placeholder="Confirm" required>

                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer" style="margin-left: 10px; margin-right: 10px">
                <div class="row">
                    <div class="col-xs-8" style="padding-left: 0px">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} style="width: 100%; height: 100%" required> I'm dumb.
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-success pull-right">Reset</button>
                    </div>
                </div>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>

    <div style="text-align: center; font-size: 16px">
        <a href="{{ route('login') }}" class="text-center" >Regret？</a>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
