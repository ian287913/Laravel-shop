<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reset password</title>
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
    <!-- /.login-logo -->


    <div class="box box-danger" style="margin-bottom: 5px; ">
        <div class="box-header with-border" style="text-align: center">
            <h3 class="box-title">Email verification</h3>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                input error：
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check-circle"></i> Success</h4>
                {{ session('status') }}
                (actually just logging)
            </div>
        @endif

    <!-- form start -->
        <form class="form-horizontal" action="{{ route('password.email') }}" method="post">
            @csrf
            <div class="box-body" style="margin-left: 10px; margin-right: 10px">
                <div class="input-group">
                    <span class="input-group-addon" style="background-color: lightcyan"><span class="glyphicon glyphicon-envelope"></span></span>
                    <input style="background-color: lightcyan" type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer" style="margin-left: 10px; margin-right: 10px">
                <div class="row">
                    <div class="col-xs-8" style="padding-left: 20px; color: gray">
                        Send password reset link <br>to your email
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-danger pull-right">Send</button>
                    </div>
                </div>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>

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
