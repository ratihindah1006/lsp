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
                                <a href="/dashboard" class='menu-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="menu-item  has-sub">
                                <a href="#" class='menu-link'>
                                    <i class="bi bi-file-earmark-medical-fill"></i>
                                    <span>Forms</span>
                                </a>
                                <div class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        <ul class="submenu-group">

                                            <li class="submenu-item  has-sub">
                                                <a href="#" class='submenu-link'>Form Elements</a>


                                                <!-- 3 Level Submenu -->
                                                <ul class="subsubmenu">

                                                    <li class="subsubmenu-item ">
                                                        <a href="form-element-input.html"
                                                            class="subsubmenu-link">Input</a>
                                                    </li>

                                                    <li class="subsubmenu-item ">
                                                        <a href="form-element-input-group.html"
                                                            class="subsubmenu-link">Input Group</a>
                                                    </li>

                                                    <li class="subsubmenu-item ">
                                                        <a href="form-element-select.html"
                                                            class="subsubmenu-link">Select</a>
                                                    </li>

                                                    <li class="subsubmenu-item ">
                                                        <a href="form-element-radio.html"
                                                            class="subsubmenu-link">Radio</a>
                                                    </li>

                                                    <li class="subsubmenu-item ">
                                                        <a href="form-element-checkbox.html"
                                                            class="subsubmenu-link">Checkbox</a>
                                                    </li>

                                                    <li class="subsubmenu-item ">
                                                        <a href="form-element-textarea.html"
                                                            class="subsubmenu-link">Textarea</a>
                                                    </li>

                                                </ul>

                                            </li>
                                            <li class="submenu-item  ">
                                                <a href="form-layout.html" class='submenu-link'>Form Layout</a>
                                            </li>
                                            <li class="submenu-item  has-sub">
                                                <a href="#" class='submenu-link'>Form Editor</a>


                                                <!-- 3 Level Submenu -->
                                                <ul class="subsubmenu">

                                                    <li class="subsubmenu-item ">
                                                        <a href="form-editor-quill.html"
                                                            class="subsubmenu-link">Quill</a>
                                                    </li>

                                                    <li class="subsubmenu-item ">
                                                        <a href="form-editor-ckeditor.html"
                                                            class="subsubmenu-link">CKEditor</a>
                                                    </li>

                                                    <li class="subsubmenu-item ">
                                                        <a href="form-editor-summernote.html"
                                                            class="subsubmenu-link">Summernote</a>
                                                    </li>

                                                    <li class="subsubmenu-item ">
                                                        <a href="form-editor-tinymce.html"
                                                            class="subsubmenu-link">TinyMCE</a>
                                                    </li>

                                                </ul>

                                            </li>


                                    </div>
                                </div>
                            </li>



                            <li class="menu-item  has-sub">
                                <a href="#" class='menu-link'>
                                    <i class="bi bi-plus-square-fill"></i>
                                    <span>Add</span>
                                </a>
                                <div class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        <ul class="submenu-group">
                                            <li class="submenu-item  ">
                                                <a href="/category" class='submenu-link'>Category</a>
                                            </li>
                                            <li class="submenu-item  ">
                                                <a href="/user" class='submenu-link'>Pengguna</a>
                                            </li>
                                            <li class="submenu-item  ">
                                                <a href="table-datatable-jquery.html" class='submenu-link'>Datatable
                                                    (jQuery)</a>
                                            </li>
                                    </div>
                                </div>
                            </li>


                            <li class="menu-item  has-sub">
                                <a href="#" class='menu-link'>
                                    <i class="bi bi-file-earmark-fill"></i>
                                    <span>Pages</span>
                                </a>
                                <div class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">


                                        <ul class="submenu-group">

                                            <li class="submenu-item  has-sub">
                                                <a href="#" class='submenu-link'>Authentication</a>


                                                <!-- 3 Level Submenu -->
                                                <ul class="subsubmenu">

                                                    <li class="subsubmenu-item ">
                                                        <a href="auth-login.html" class="subsubmenu-link">Login</a>
                                                    </li>

                                                    <li class="subsubmenu-item ">
                                                        <a href="auth-register.html"
                                                            class="subsubmenu-link">Register</a>
                                                    </li>

                                                    <li class="subsubmenu-item ">
                                                        <a href="auth-forgot-password.html"
                                                            class="subsubmenu-link">Forgot Password</a>
                                                    </li>

                                                </ul>

                                            </li>



                                            <li class="submenu-item  has-sub">
                                                <a href="#" class='submenu-link'>Errors</a>


                                                <!-- 3 Level Submenu -->
                                                <ul class="subsubmenu">

                                                    <li class="subsubmenu-item ">
                                                        <a href="error-403.html" class="subsubmenu-link">403</a>
                                                    </li>

                                                    <li class="subsubmenu-item ">
                                                        <a href="error-404.html" class="subsubmenu-link">404</a>
                                                    </li>

                                                    <li class="subsubmenu-item ">
                                                        <a href="error-500.html" class="subsubmenu-link">500</a>
                                                    </li>

                                                </ul>

                                            </li>



                                            <li class="submenu-item  ">
                                                <a href="ui-file-uploader.html" class='submenu-link'>File Uploader</a>


                                            </li>



                                            <li class="submenu-item  has-sub">
                                                <a href="#" class='submenu-link'>Maps</a>


                                                <!-- 3 Level Submenu -->
                                                <ul class="subsubmenu">

                                                    <li class="subsubmenu-item ">
                                                        <a href="ui-map-google-map.html" class="subsubmenu-link">Google
                                                            Map</a>
                                                    </li>

                                                    <li class="subsubmenu-item ">
                                                        <a href="ui-map-jsvectormap.html" class="subsubmenu-link">JS
                                                            Vector Map</a>
                                                    </li>

                                                </ul>

                                            </li>
                                            <li class="submenu-item  ">
                                                <a href="application-email.html" class='submenu-link'>Email
                                                    Application</a>
                                            </li>
                                            <li class="submenu-item  ">
                                                <a href="application-chat.html" class='submenu-link'>Chat
                                                    Application</a>
                                            </li>
                                            <li class="submenu-item  ">
                                                <a href="application-gallery.html" class='submenu-link'>Photo
                                                    Gallery</a>
                                            </li>
                                            <li class="submenu-item  ">
                                                <a href="application-checkout.html" class='submenu-link'>Checkout
                                                    Page</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="menu-item  has-sub">
                                <a href="#" class='menu-link'>
                                    <i class="bi bi-life-preserver"></i>
                                    <span>Support</span>
                                </a>
                                <div class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">


                                        <ul class="submenu-group">

                                            <li class="submenu-item  ">
                                                <a href="https://zuramai.github.io/mazer/docs"
                                                    class='submenu-link'>Documentation</a>


                                            </li>



                                            <li class="submenu-item  ">
                                                <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md"
                                                    class='submenu-link'>Contribute</a>


                                            </li>



                                            <li class="submenu-item  ">
                                                <a href="https://github.com/zuramai/mazer#donate"
                                                    class='submenu-link'>Donate</a>


                                            </li>
                                            <li >
                               
                                    
                                    <span></span>
                                </div>
                            </li>

                            <a class="btn btn-success pull-right" href="{{url('logout')}}">Logout</a>
                                    </div>
                                    
                                </div>
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
