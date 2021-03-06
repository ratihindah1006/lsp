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
    <link href="/assets/vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="/assets/vendor/select2/css/select2.min.css" rel="stylesheet">
    <link href="/assets/vendor/summernote/summernote.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    @stack('styles')
   
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
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="/dashboard" class="brand-logo">
                <img class="logo-abbr" src="/assets/images/unila.png" alt="">
                <div class="brand-title">LSP Universitas Lampung</div>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span
                        class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">

                        </div>

                        <ul class="navbar-nav header-right">

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <span class="user-avatar"> {{ Auth::user()->name }}</span>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ url('logout') }}" class="dropdown-item">
                                            <i class="ti-power-off"></i>
                                            <span class="ml-2">Logout </span>
                                        </a>
                                        <a href="{{ url('edit_password_admin') }}" class="dropdown-item">
                                            <i class="ti-key"></i>
                                            <span class="ml-2">Ubah Password </span>
                                        </a>
                                    </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>

                    <li class="{{ request()->is('dashboard/*') ? 'mm-active' : '' }}"><a href="/dashboard"
                            aria-expanded="false"><i class="icon icon-home"></i><span
                                class="nav-text">Dashboard</span></a></li>
                    <li class="{{ request()->is('event/*') ? 'mm-active' : '' }}"><a href="/event"
                            aria-expanded="false"><i class="icon icon-time"></i><span
                                class="nav-text">Event</span></a></li>
                    <li class="{{ request()->is('KelasSkema/*') ? 'mm-active' : '' }}"><a href="/KelasSkema"
                            aria-expanded="false"><i class="ti ti-layout-grid2"></i><span
                                class="nav-text">Kelas Skema</span></a></li>
                    <li class="nav-label">Data Pengguna</li>
                    <li class="{{ request()->is('dataAssessi/*') ? 'mm-active' : '' }}"><a href="/dataAssessi"
                            aria-expanded="false"><i class="icon icon-single-04"></i><span
                                class="nav-text">Asesi</span></a></li>
                    <li class="{{ request()->is('dataAssessor/*') ? 'mm-active' : '' }}"><a href="/dataAssessor"
                            aria-expanded="false"><i class="icon icon-single-04"></i><span
                                class="nav-text">Asesor</span></a></li>
                    <li class="nav-label">Data Skema</li>
                    <li class="{{ request()->is('category/*') ? 'mm-active' : '' }}"><a href="/category"
                            aria-expanded="false"><i class="icon icon-single-copy-06"></i><span
                                class="nav-text">Kategori/Bidang/Sektor</span></a></li>
                    <li class="{{ request()->is('skema/*') ? 'mm-active' : '' }}"><a href="/skema"
                            aria-expanded="false"><i class="icon icon-single-copy-06"></i><span
                                class="nav-text">Skema</span></a></li>
                    <li class="nav-label">Soal</li>
                    <li class="{{ request()->is('soal/*') ? 'mm-active' : '' }}"><a href="/soal"
                            aria-expanded="false"><i class="icon icon-book-open-2"></i><span class="nav-text">Soal
                                Esai</span></a></li>
                    <li class="{{ request()->is('soallisan/*') ? 'mm-active' : '' }}"><a href="/soallisan"
                            aria-expanded="false"><i class="icon icon-form"></i><span class="nav-text">Soal Lisan</span></a></li>
                    <li class="{{ request()->is('soalpraktik/*') ? 'mm-active' : '' }}"><a href="/soalpraktik"
                            aria-expanded="false"><i class="icon icon-edit-72"></i><span class="nav-text">Soal Praktik</span></a></li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
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

    <!-- Date Picker -->
    <script src="/assets/vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- clockpicker -->
    <script src="/assets/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <!-- Daterangepicker -->
    <script src="/assets/js/plugins-init/bs-daterange-picker-init.js"></script>

    <!-- select -->
    <script src="/assets/vendor/select2/js/select2.full.min.js"></script>
    <script src="/assets/js/plugins-init/select2-init.js"></script>
    <!-- Summernote -->
    <script src="/assets/vendor/summernote/js/summernote.min.js"></script>
    <script src="/assets/js/plugins-init/summernote-init.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/assets/js/dependantdd.js"></script>

    {{-- javascript alert hapus data --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $('.delete-confirm').click(function(event) {

            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Apakah kamu yakin ?`,
                    text: `kamu akan menghapus data ${name}`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
    @stack('scripts')

    @yield("myscript")
</body>

</html>
