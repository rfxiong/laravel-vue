<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Hyper - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.ico">

        <!-- third party css -->
        <link href="/assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- App css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.bootcss.com/vue/2.6.11/vue.js"></script>

    </head>

    <body>

        <!-- Topbar Start -->
        @include('layouts._menu')
        <!-- end Topbar -->


        <div class="container-fluid">

            <!-- Begin page -->
            <div class="wrapper">

                <!-- ============================================================== -->
                <!-- Start Page Content here -->
                <!-- ============================================================== -->

                <!-- Start Content-->

                <!-- ========== Left Sidebar Start ========== -->
                @include('layouts._leftsidebar')

                <div class="content-page ml-0 mr-0">


                        <!-- start page title -->

                        <!-- end page title -->
                            <div class="card widget-flat col-xl-12 ml-0">
                                @include('layouts._validate')
                                @include('layouts._message')
                                @yield('content')

                        </div>
                    </div> <!-- content -->
                    @include('layouts._footer')

            </div> <!-- end wrapper-->

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        @yield('script')
        <!-- END Container -->

        <!-- App js -->
        <script src="/assets/js/app.min.js"></script>

        <!-- third party js -->
        <script src="https://cdn.bootcss.com/Chart.js/2.8.0-rc.1/Chart.bundle.min.js"></script>
        <script src="/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="/assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="/assets/js/pages/demo.dashboard.js"></script>
        <!-- end demo js-->

    </body>

</html>