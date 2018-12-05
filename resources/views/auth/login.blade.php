<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>登入</title>
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
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/square/blue.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">


<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('dashboard.index') }}">My<b>Product</b>Admin</a>
    </div>

    <!-- Horizontal Form -->
    <div class="box box-info" style="margin-bottom: 5px">
        <div class="box-header with-border" style="text-align: center">
            <h3 class="box-title">Login</h3>
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
        <form class="form-horizontal" action="{{ route('login') }}" method="post">
            @csrf
            <div class="box-body" style="margin-left: 10px; margin-right: 10px">
                <div class="input-group">
                    <span class="input-group-addon" style="background-color: lightcyan"><span class="glyphicon glyphicon-envelope"></span></span>
                    <input style="background-color: lightcyan" type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus>

                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" style="background-color: lightcyan"> <i class="glyphicon glyphicon-lock"></i>  </span>
                    <input style="background-color: lightcyan" type="password" name="password" class="form-control" placeholder="Password" required>

                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer" style="margin-left: 10px; margin-right: 10px">
                <div class="row">
                    <div class="col-xs-8" style="padding-left: 0px">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} > Don't forget me
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-info pull-right">Sign in</button>
                    </div>
                </div>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>

    <div style="padding-left: 10px;padding-right: 10px">
        <div class="pull-left" style="text-align: center; font-size: 16px">
            <a href="{{ route('password.request') }}" class="text-center" >Forget password?</a>
        </div>
        <div class="pull-right" style="text-align: center; font-size: 16px">
            <a href="{{ route('register') }}" class="text-center" >Register</a>
        </div>
    </div>
    <!--
    <div class="login-box-body">
        <p class="login-box-msg">請登入帳號</p>
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> 錯誤！</h4>
            請修正以下表單錯誤：
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('login') }}" method="post">

            @csrf

            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="請輸入 Email" value="{{ old('email') }}" required autofocus>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="請輸入密碼" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 記住我
                        </label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">登入</button>
                </div>
            </div>
        </form>
    </div>
    -->

</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
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
