<!--  Body Wrapper -->
<div class="page-wrapper" id="wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    @include('dashboard.sidebar')
    <!--  Main wrapper -->
    <div  class="d-flex flex-column" id="content-wrapper">
        <div class="content">
        @include('dashboard.header')
        <div class="container-fluid">
            @yield('main')
              
        </div>
        </div>
    </div>
</div>