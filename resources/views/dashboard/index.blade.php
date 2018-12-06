@extends('layouts.master')

@section('title', '主控台')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            主控台
            <small>後台管理首頁</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 主控台</a></li>
            <li class="active">後台管理首頁</li>
        </ol>
    </section>

    @if (Auth::user()->level !== 0)
        <div style="margin-left: 20%; margin-top: 15%; font-size: 45px">
            此為管理員頁面，請轉移至<a href="http://localhost:4200/">購物頁面</a>。
        </div>
    @endif

    <!-- Main content -->
    <section class="content container-fluid">

        <!--------------------------
          | Your Page Content Here |
          -------------------------->
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
