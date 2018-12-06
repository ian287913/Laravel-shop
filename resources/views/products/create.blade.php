@extends('layouts.master')

@section('title', '新增商品')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                商品管理
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('products.index') }}"><i class="fa fa-shopping-bag"></i> 商品管理</a></li>
                <li class="active">新增商品</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->
            <div class="row">
                <!-- .col -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">新增商品</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="box-body">

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

                                <div class="form-group">
                                    <label for="title">名稱</label>
                                    <input type="text" class="form-control" id="title" name="name" placeholder="請輸入名稱" value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <label for="category">分類</label>
                                    <select id="category" name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"{{ (old('category_id') == $category->id)? ' selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="os">作業系統</label>
                                    <select id="os" name="os_id" class="form-control">
                                        @foreach($OS as $os)
                                            <option value="{{ $os->id }}"{{ (old('category_id') == $os->id)? ' selected' : '' }}>{{ $os->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="price">價格</label>
                                    <input type="text" class="form-control" id="price" name="price" placeholder="請輸入價格" value="{{old('price')}}">
                                </div>
                                <div class="form-group">
                                    <label for="size">螢幕</label>
                                    <input type=text" class="form-control" id="size" name="size" placeholder="請輸入大小" value="{{old('size')}}">
                                </div>
                                <div class="form-group">
                                    <label for="cpu">CPU</label>
                                    <input type=text" class="form-control" id="cpu" name="cpu" placeholder="請輸入CPU" value="{{old('cpu')}}">
                                </div>
                                <div class="form-group">
                                    <label for="gpu">GPU</label>
                                    <input type=text" class="form-control" id="gpu" name="gpu" placeholder="請輸入GPU" value="{{old('gpu')}}">
                                </div>
                                <div class="form-group">
                                    <label for="ram">RAM</label>
                                    <input type=text" class="form-control" id="ram" name="ram" placeholder="請輸入RAM" value="{{old('ram')}}">
                                </div>
                                <div class="form-group">
                                    <label for="storage">容量</label>
                                    <input type=text" class="form-control" id="storage" name="storage" placeholder="請輸入容量" value="{{old('storage')}}">
                                </div>
                                <div class="form-group">
                                    <label for="description">描述</label>
                                    <textarea class="form-control" id="description" rows="5" name="description" placeholder="請輸入描述">{{old('description')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="cover">產品圖</label>
                                    <input type="file" id="cover" name="img">
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer text-right">
                                <a class="btn btn-link" href="{{ route('products.index') }}">取消</a>
                                <button type="submit" class="btn btn-primary">新增</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
