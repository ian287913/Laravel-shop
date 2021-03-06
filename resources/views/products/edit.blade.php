@extends('layouts.master')

@section('title', '編輯商品')

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
                <li class="active">編輯商品</li>
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
                            <h3 class="box-title">編輯商品</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">

                            @csrf
                            @method('PATCH')

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
                                    <input type="text" class="form-control" id="title" name="name" placeholder="請輸入名稱" value="{{old('name', $product->name)}}">
                                </div>
                                <div class="form-group">
                                    <label for="category">分類</label>
                                    <select id="category" name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"{{ (old('category_id', $product->category_id) == $category->id)? ' selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="os">作業系統</label>
                                    <select id="os" name="os_id" class="form-control">
                                        @foreach($OS as $os)
                                            <option value="{{ $os->id }}"{{ (old('os_id', $product->os_id) == $os->id)? ' selected' : '' }}>{{ $os->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="price">價格</label>
                                    <input type="text" class="form-control" id="price" name="price" placeholder="請輸入價格" value="{{old('price', $product->price)}}">
                                </div>
                                <div class="form-group">
                                    <label for="size">螢幕</label>
                                    <select id="size" name="size" class="form-control">
                                        @foreach($SizeType as $sizetype)
                                            <option value="{{ $sizetype->name }}"{{ (old('size', $product->size) == $sizetype->name)? ' selected' : '' }}>{{ $sizetype->name }} 吋</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cpu">CPU</label>
                                    <input type=text" class="form-control" id="cpu" name="cpu" placeholder="請輸入CPU" value="{{old('cpu', $product->cpu)}}">
                                </div>
                                <div class="form-group">
                                    <label for="gpu">GPU</label>
                                    <input type=text" class="form-control" id="gpu" name="gpu" placeholder="請輸入GPU" value="{{old('gpu', $product->gpu)}}">
                                </div>
                                <div class="form-group">
                                    <label for="ram">RAM</label>
                                    <input type=text" class="form-control" id="ram" name="ram" placeholder="請輸入RAM" value="{{old('ram', $product->ram)}}">
                                </div>
                                <div class="form-group">
                                    <label for="storage">容量</label>
                                    <input type=text" class="form-control" id="storage" name="storage" placeholder="請輸入容量" value="{{old('storage', $product->storage)}}">
                                </div>
                                <div class="form-group">
                                    <label for="description">描述</label>
                                    <textarea class="form-control" id="description" name="description" rows="5" placeholder="請輸入描述">{{old('description', $product->description)}}</textarea>
                                </div>
                                <!--checkbox for tags-->
                                <div class="form-group">
                                    <label for="tag">#tag</label>
                                    <div>
                                        @foreach($Tags as $tag)
                                            <input type="checkbox" id="tags[]" name="tags[]" value="{{ $tag->name }}" {{ ((strpos($product->tags, $tag->name) !== false) or (is_array(old('tags')) and in_array($tag->name, old('tags')))) ? ' checked' : '' }}>
                                            <label for="tag">{{ $tag->name }}</label>
                                        @endforeach
                                    </div>
                                 </div>
                                <div class="form-group">
                                    <label for="cover">產品圖</label>
                                    <input type="file" id="cover" name="img">
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer text-right">
                                <a class="btn btn-link" href="{{ route('products.index') }}">取消</a>
                                <button type="submit" class="btn btn-primary">更新</button>
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
