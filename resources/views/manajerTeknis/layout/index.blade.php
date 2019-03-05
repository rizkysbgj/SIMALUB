<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->
@include('manajerTeknis.layout.partials._head')

<!-- end::Head -->

<!-- begin::body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <!-- BEGIN: Header -->
        @include('manajerTeknis.layout.partials._header')
        <!-- END: Header -->
        
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
            <!-- begin::Sidebar -->
            @include('manajerTeknis.layout.partials._sidebar')
            <!-- end:: Sidebar -->
            
            <!-- PAGE CONTENT -->
            <div class="m-grid__item m-grid__item--fluid m-wrapper">
                @yield('content')
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        
        <!-- begin::Footer -->
        @include('manajerTeknis.layout.partials._footer')
        <!-- end::Footer -->
    </div>
    <!-- end:: Page -->
    
    <!-- begin::Scroll Top -->
    <div id="m_scroll_top" class="m-scroll-top">
        <i class="la la-arrow-up"></i>
    </div>
    <!-- end::Scroll Top -->		    
        
</body>
<!-- end::Body -->

</html>
