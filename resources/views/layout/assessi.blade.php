<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title }} </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.ico">
    <link href="/assets/vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="/assets/vendor/summernote/summernote.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Header start
        ***********************************-->
        <div class="headerr">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="navbar-nav header-left">
                            <h5>
                                <a href="/beranda" class="text-white " aria-expanded="false"><i class="icon icon-home text-white font-weight-bold">&nbsp; Beranda</i></a></h5>
                        </div>
                        <ul class="navbar-nav header-right">
                        <h5>
                            <li class="nav-item dropdown header-profile">
                                
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account text-white "></i>
                                </a>
                                <span class="icon-avatar text-white font-weight-bold">{{ Auth::user()->name }}
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ url('logout') }}" class="dropdown-item">
                                            <i class="ti-power-off"></i>
                                            <span class="ml-2">Logout </span>
                                        </a>
                                        <a href="{{ url('edit_password') }}" class="dropdown-item">
                                            <i class="ti-key"></i>
                                            <span class="ml-2">Ubah Password </span>
                                        </a>
                                    </div>
                            </li>
                        </h5>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body content-bodyy">
            @include('sweetalert::alert')
            @yield('container')
        </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->


    <!--**********************************
            Footer start
        ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p><a href="#" target="_blank"></a> 2022</p>
        </div>
    </div>
    <!--**********************************
            Footer end
        ***********************************-->

    <!--**********************************
           Support ticket button start
        ***********************************-->

    <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="/assets/vendor/global/global.min.js"></script>
    <script src="/assets/js/quixnav-init.js"></script>
    <script src="/assets/js/custom.min.js"></script>

    <script src="/assets/vendor/moment/moment.min.js"></script>
    <script src="/assets/vendor/pg-calendar/js/pignose.calendar.min.js"></script>

    <!-- Datatable -->
    <script src="/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/assets/js/plugins-init/datatables.init.js"></script>

    <!-- Summernote -->
    <script src="/assets/vendor/summernote/js/summernote.min.js"></script>
    <script src="/assets/js/plugins-init/summernote-init.js"></script>

    <script src="/assets/js/bootstrap-tooltip.js"></script>
    @yield('script')
</body>

</html>