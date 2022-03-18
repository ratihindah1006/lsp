
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title }} </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon.png">
    <link href="/assets/vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link href="/assets/vendor/chartist/css/chartist.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="/assets/vendor/select2/css/select2.min.css" rel="stylesheet">
    <link href="/assets/vendor/summernote/summernote.css" rel="stylesheet">

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
            <a href=# class="brand-logo">
                <img class="logo-abbr" src="assets/images/unila.png" alt="">
                <span>LSP Universitas lampung</span>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
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
                                        <span class="user-avatar"> {{ Auth::user()->name }}
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
                    <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                    </li> -->
                    
                    <li class="{{ request()->is('dashboard/*') ? "mm-active" : "" }}"><a href="/dashboard" aria-expanded="false"><i class="icon icon-home"></i><span
                        class="nav-text">Dashboard</span></a></li>
                    <li class="{{ request()->is('event/*') ? "mm-active" : "" }}"><a href="/event" aria-expanded="false"><i class="icon icon-time"></i><span
                        class="nav-text">Event</span></a></li>
                    <li class="nav-label">Data Pengguna</li>
                    <li class="{{ request()->is('dataAssessi/*') ? "mm-active" : "" }}"><a href="/dataAssessi" aria-expanded="false"><i class="icon icon-single-04"></i><span
                        class="nav-text">Asesi</span></a></li>
                    <li class="{{ request()->is('dataAssessor/*') ? "mm-active" : "" }}"><a href="/dataAssessor" aria-expanded="false"><i class="icon icon-single-04"></i><span
                        class="nav-text">Asesor</span></a></li>

                    <li class="nav-label">Data Skema</li>
                    <li class="{{ request()->is('category/*') ? "mm-active" : "" }}"><a href="/category" aria-expanded="false"><i class="icon icon-single-copy-06"></i><span
                                class="nav-text">Kategori</span></a></li>
                    <li class="{{ request()->is('KelasSkema/*') ? "mm-active" : "" }}"><a href="/KelasSkema" aria-expanded="false"><i class="icon icon-single-copy-06"></i><span
                                class="nav-text">Kelas Skema</span></a></li>
                    <li class="nav-label">Soal</li>
                    <li class="{{ request()->is('soal/*') ? "mm-active" : "" }}"><a href="/soal" aria-expanded="false"><i class="icon icon-edit-72"></i><span
                        class="nav-text">Soal Esai</span></a></li>    
                        </ul>
                    </li>
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

    <script src="/assets/vendor/chartist/js/chartist.min.js"></script>

    <script src="/assets/vendor/moment/moment.min.js"></script>
    <script src="/assets/vendor/pg-calendar/js/pignose.calendar.min.js"></script>


    <script src="/assets/js/dashboard/dashboard-2.js"></script>

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
    
    <script>
        $('#skema').change(function() {
            var idSkema = $(this).val();
            if (idSkema) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('getUnit') }}?schema_id=" + idSkema,
                    success: function(res) {
                        if (res) {
                            $('#unit').find('option').not(':first').remove();
                            $('#element').find('option').not(':first').remove();
                            $.each(res, function(key, value) {
                                $("#unit").append('<option value="' + key + '">' + value + '</option>');
                            });
                        } else {
                            $('#unit').find('option').not(':first').remove();
                        }
                    }
                });
            } else {
                $('#unit').find('option').not(':first').remove();
                $('#element').find('option').not(':first').remove();
            }
        });

        $('#unit').on('change', function() {
            var idUnit = $(this).val();
            if (idUnit) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('getElement') }}?unit_id=" + idUnit,
                    success: function(res) {
                        if (res) {
                            $('#element').find('option').not(':first').remove();
                            $.each(res, function(key, value) {
                                $("#element").append('<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        } else {
                            $('#element').find('option').not(':first').remove();
                        }
                    }
                });
            } else {
                $('#element').find('option').not(':first').remove();
            }
        });
    </script>

</body>

</html>