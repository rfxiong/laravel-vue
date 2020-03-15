<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Hyper - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        {{-- <link rel="shortcut icon" href="assets/images/favicon.ico"> --}}

        <!-- App css -->
        {{-- <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" /> --}}
        <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card">

                            <!-- Logo -->
                            <div class="card-header pt-4 pb-4 text-center bg-primary">
                                <a href="index.html">
                                    <span><img src="" alt="" height="18"></span>
                                </a>
                            </div>

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 font-weight-bold">登  录  页  面</h4>
                                    <p class="text-muted mb-4">请输入账号和密码登录系统.</p>
                                </div>

                                @include('layouts._validate')
                                @include('layouts._message')

                                <form action="{{route('admin.check')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">账号</label>
                                        <input class="form-control" type="name" id="name" name="name" required="" placeholder="请输入账号" value="rfxiong">
                                    </div>

                                    <div class="form-group">
                                        <a href="pages-recoverpw.html" class="text-muted float-right"><small>忘记密码?</small></a>
                                        <label for="password">密码</label>
                                        <input class="form-control" type="password" name="password" required="" id="password" placeholder="请输入密码" value="123456">
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked name="remember_token">
                                            <label class="custom-control-label" for="checkbox-signin" >记住我</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary" type="submit"> 登  录 </button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">没有账号？ <a href="pages-register.html" class="text-muted ml-1"><b>注  册</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            2018 - 2019 © Hyper - Coderthemes.com
        </footer>

        <!-- App js -->
        <script src="/assets/js/app.min.js"></script>
    </body>
</html>
