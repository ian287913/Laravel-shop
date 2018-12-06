<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel" style="margin-top:10px">
            <div class="pull-left image">
                <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->

                <p style="color:lightslategray"><i class="fa fa-circle text-success" style="color:limegreen"></i>   {{ Auth::user()->email }}</p>
                <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
            </div>
        </div>


        <ul style="padding:10px">
            <li>
                <a class="btn btn-success pull-left" style="color: #ffffff" role="button"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <a class="btn btn-primary " style="color: #ffffff; margin-left: 10px"  role="button" href="http://localhost:4200/">Go shopping</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>

        <!--
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form>
        -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        @if (Auth::user()->level === 0)
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">管理系統</li>
            <!-- Optionally, you can add icons to the links -->
            <!--
            <li class="{{ (request()->is('/'))? 'active' : '' }}">
                <a href="{{ route('dashboard.index') }}">
                    <i class="fa fa-dashboard"></i> <span>主控台</span>
                </a>
            </li>
            -->

            <li class="{{ (request()->is('/'))? 'active' : '' }}">
                <a href="{{ route('api.index') }}">
                    <i class="fa fa-address-book"></i> <span>API</span>
                </a>
            </li>

            <li class="treeview{{ (request()->is('products*'))? ' active' : '' }}">
                <a href="#">
                    <i class="fa fa-shopping-bag"></i>
                    <span>商品管理</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('products.index') }}">商品列表</a></li>
                    <li><a href="{{ route('products.create') }}">新增商品</a></li>
                </ul>
            </li>
        </ul>
        @endif
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

