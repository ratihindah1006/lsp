<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>LSP | Universitas Lampung</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets_landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets_landing/assets/css/templatemo-chain-app-dev.css">
    <link rel="stylesheet" href="/assets_landing/assets/css/animated.css">
    <link rel="stylesheet" href="/assets_landing/assets/css/owl.css">

  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="/" class="logo">
              <img src="/assets/images/unila.png" height="75px" alt="Chain App Dev">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              @if (Auth::guard("admin")->check())
                <li><div class="gradient-button"><a href="/dashboard"><i class="fa fa-sign-in-alt"></i> Dashboard</a></div></li>
              @elseif (Auth::guard("assessi")->check())
                <li><div class="gradient-button"><a href="/beranda"><i class="fa fa-sign-in-alt"></i> Dashboard</a></div></li>
              @elseif (Auth::guard("assessor")->check())
                <li><div class="gradient-button"><a href="/assessor"><i class="fa fa-sign-in-alt"></i> Dashboard</a></div></li>
              @else
                <li><div class="gradient-button"><a href="/login"><i class="fa fa-sign-in-alt"></i> Sign In Now</a></div></li>  
              @endif
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

</div>

  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <h4>Selamat Datang</h4>
                    <h2>Sistem Informasi Lembaga Sertifikasi Profesi</h2>
                    <h3>Universitas Lampung</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="/assets_landing/assets/images/4457.jpg" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="services" class="services section">
    <div class="container"></div>
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
            <h4>Amazing <em>Services &amp; Features</em> for you</h4>
            <img src="/assets_landing/assets/images/heading-line-dec.png" alt="">
            <p>Beberapa fitur yang ada dalam sistem informasi Lembaga Sertifikasi Profesi</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="service-item first-service">
            <div class="icon"></div>
            <h4>Pendaftaran</h4>
            <p>Calon asesi dapat melakukan permohonan sertifikasi dengan mengisi form APL-01 dan APL-02.</p>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="service-item second-service">
            <div class="icon"></div>
            <h4>Asesmen</h4>
            <p>Pelakasanaan asesmen dapat dilakukan oleh asesi yang telah mendapat persetujuan dari asesor.</p>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="service-item third-service">
            <div class="icon"></div>
            <h4>Penilaian</h4>
            <p>Asesor menilai hasil asesmen yang telah dilakukan oleh asesi untuk memutuskan hasil sertifikasi. </p>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="service-item fourth-service">
            <div class="icon"></div>
            <h4>Dokumentasi</h4>
            <p>Semua proses yang terjadi dalam sistem dapat dijadikan sebagai bahan dokumentasi.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer id="newsletter">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="copyright-text">
            <p>Copyright © 2022 Ilmu Komputer Universitas Lampung</p> 
          </div>
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <script src="/assets_landing/vendor/jquery/jquery.min.js"></script>
  <script src="/assets_landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets_landing/assets/js/owl-carousel.js"></script>
  <script src="/assets_landing/assets/js/animation.js"></script>
  <script src="/assets_landing/assets/js/imagesloaded.js"></script>
  <script src="/assets_landing/assets/js/popup.js"></script>
  <script src="/assets_landing/assets/js/custom.js"></script>
</body>
</html>