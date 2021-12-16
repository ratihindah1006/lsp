<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="/assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/assets/css/form.css">
</head>
<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-4">

                <nav class="main-navbar">
                    <div class="container">
                        <ul>
                            <li class="menu-item  ">
                                <a href="/beranda" class='menu-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="menu-item  has-sub">
                                <a href="#" class='menu-link'>
                                    <i class="bi bi-file-earmark-medical-fill"></i>
                                    <span>APL</span>
                                </a>
                                <div class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        <ul class="submenu-group">

                                            <li class="submenu-item  has-sub">
                                                <a href="/apl01" class='submenu-link'>APL 01</a>

                                            </li>
                                            <li class="submenu-item  has-sub">
                                                <a href="/apl02" class='submenu-link'>APL 02</a>

                                            </li>
                                        </ul>
                                    </li>
                                    <li >
                                        <div class="right-div ">
                                            <a class="btn btn-success pull-right" href="{{url('logout')}}">Logout</a>
                                            <span></span>
                                        </div>
                                    </li>
                            </li>
                        </ul>
                    </div>
                </nav>

            </header>

            <div class="content-wrapper container">

                @yield('container')
            </div>

            <footer>
                
            </footer>
        </div>
    </div>
<script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>

<script src="/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="/assets/js/pages/dashboard.js"></script>

    
<script src="/assets/vendors/simple-datatables/simple-datatables.js"></script>
<script>
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>

<script src="/assets/js/pages/horizontal-layout.js"></script>
</body>

</html>
