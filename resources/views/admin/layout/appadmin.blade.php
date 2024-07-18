@include('admin.layout.top')

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

@include('admin.layout.menu')

<!-- Begin Page Content -->
<div class="container-fluid">

@yield('content')

</div>
    </div>
        </div>

@include('admin.layout.buttom')