<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.partials.html_head')
    @include('admin.partials.linkrel')
</head>
    @yield('style')
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('admin.partials.sidebar')


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('admin.partials.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @php
                        $currentUrl = request()->path();
                        $pageTitle = ucfirst(str_replace('-', ' ', $currentUrl));
                    @endphp

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{ $pageTitle }}</h1>
                        <div class="mt-3 mt-sm-0">
                        </div>
                    </div>
                    @yield('container')

                    <div class="row">
                        @yield('container-row1')
                    </div>

                    <div class="row">
                        @yield('container-row2')
                    </div>

                    <div class="row">
                        @yield('container-row3')
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('admin.partials.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>
@yield('script')
@include('admin.partials.script')
</html>
