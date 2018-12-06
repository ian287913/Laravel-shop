<!-- Main Header -->

<header class="main-header">

    <!-- Logo -->
    <a href="{{ route('dashboard.index') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>W</b>TF</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">My<b>Product</b>Admin</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <!-- I DONT WANT IT
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        -->

    </nav>
    <script type="text/javascript">
        $level = '<?php echo Auth::user()->level ?>'
        //$user = Auth::user();
        if($level !== '0') {
            alert('此為管理員頁面，您即將被重新導向至購物區。');
            document.location.href="http://localhost:4200";
        }
    </script>
</header>
