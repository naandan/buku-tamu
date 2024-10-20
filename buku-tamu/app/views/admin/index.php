<?php
session_start();
require '../../models/koneksi.php';
date_default_timezone_set("Asia/Jakarta");

if(!isset($_SESSION['login'])){
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Admin | Home</title>
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png" />
    <meta name="theme-color" content="#ffffff" />
    <!-- Vendors styles-->
    <link rel="stylesheet" href="/public/vendor/simplebar/css/simplebar.css" />
    <link rel="stylesheet" href="/public/vendor/css/vendors/simplebar.css" />
    <!-- Main styles for this application-->
    <link href="/public/vendor/css/style.css" rel="stylesheet" />
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css" />
    <link href="/public/vendor/css/examples.css" rel="stylesheet" />
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag("js", new Date());
      // Shared ID
      gtag("config", "UA-118965717-3");
      // Bootstrap ID
      gtag("config", "UA-118965717-5");
    </script>
    <link href="/public/vendor/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet" />
  </head>
  <body>
    <div class="data-chart">
      <?php $m = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'] ?>
      <?php for($i = 0; $i < 12; $i++): ?>
      <input type="text" value="<?php
          $month = date('Y-'.$m[$i]);
          $query = mysqli_query($conect, "SELECT COUNT(nama) FROM tb_tamu WHERE timestamp LIKE '$month%'");
          $data = mysqli_fetch_assoc($query);
          echo $data['COUNT(nama)'];
      ?>" hidden>
      <?php endfor; ?>
    </div>  
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
      <div class="sidebar-brand d-none d-md-flex">
        <h5 class="mt-2">BUKU TAMU K-ONE</h5>
      </div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <svg class="nav-icon">
              <use xlink:href="/public/vendor/@coreui/icons/svg/free.svg#cil-home"></use>
            </svg>
            Home</a
          >
          <a class="nav-link" href="data.php">
            <svg class="nav-icon">
              <use xlink:href="/public/vendor/@coreui/icons/svg/free.svg#cil-chart"></use>
            </svg>
            Data Tamu</a
          >
        </li>
      </ul>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      <header class="header header-sticky mb-4">
        <div class="container-fluid">
          <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
              <use xlink:href="/public/vendor/@coreui/icons/svg/free.svg#cil-menu"></use>
            </svg></button>
          <a class="header-brand d-md-none" href="#">
            <h5 class="mt-2">Buku Tamu K-ONE</h5>  
          </a>
          <div class=" d-none d-md-flex">
            <h3>Selamat datang, Admin!</h3>
          </div>
          <ul class="header-nav ms-auto">
            <li class="nav-item dropdown">
              <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-md"><img class="avatar-img" src="/public/img/user.png" alt="user@email.com" /></div>
              </a>
              <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header bg-light py-2">
                  <div class="fw-semibold">Account</div>
                </div>
                <a class="dropdown-item" href="logout.php">
                  <svg class="icon me-2">
                    <use xlink:href="/public/vendor/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                  </svg>
                  Logout</a
                >
              </div>
            </li>
          </ul>
        </div>
      </header>
      <div class="body flex-grow-1 px-3">
        <div class="container-lg">
          <div class="row">
            <div class="col-sm-6 col-lg-3">
              <div class="card mb-4 text-white bg-primary">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                  <div>
                    <div class="fs-4 fw-semibold">
                      <?php
                      $day = date('Y-m-d');
                      $query = mysqli_query($conect, "SELECT COUNT(nama) FROM tb_tamu WHERE timestamp LIKE '$day%'");
                      $data = mysqli_fetch_assoc($query);
                      echo $data['COUNT(nama)'];
                      ?>
                      <span class="fs-6 fw-normal">( Hari ini )</span>
                    </div>
                    <div>Orang</div>
                  </div>
                </div>
                <div class="c-chart-wrapper mt-3 mx-3" style="height: 70px">
                  <canvas class="chart" id="card-chart1" height="70"></canvas>
                </div>
              </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
              <div class="card mb-4 text-white bg-info">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                  <div>
                    <div class="fs-4 fw-semibold">
                      <?php
                      $month = date('Y-m');
                      $query = mysqli_query($conect, "SELECT COUNT(nama) FROM tb_tamu WHERE timestamp LIKE '$month%'");
                      $data = mysqli_fetch_assoc($query);
                      echo $data['COUNT(nama)'];
                      ?>
                      <span class="fs-6 fw-normal">( Bulan ini )</span>
                    </div>
                    <div>Orang</div>
                  </div>
                </div>
                <div class="c-chart-wrapper mt-3 mx-3" style="height: 70px">
                  <canvas class="chart" id="card-chart2" height="70"></canvas>
                </div>
              </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
              <div class="card mb-4 text-white bg-warning">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                  <div>
                    <div class="fs-4 fw-semibold">
                      <?php
                      $year = date('Y');
                      $query = mysqli_query($conect, "SELECT COUNT(nama) FROM tb_tamu WHERE timestamp LIKE '$year%'");
                      $data = mysqli_fetch_assoc($query);
                      echo $data['COUNT(nama)'];
                      ?>
                      <span class="fs-6 fw-normal">( Tahun ini )</span>
                    </div>
                    <div>Orang</div>
                  </div>
                </div>
                <div class="c-chart-wrapper mt-3" style="height: 70px">
                  <canvas class="chart" id="card-chart3" height="70"></canvas>
                </div>
              </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
              <div class="card mb-4 text-white bg-danger">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                  <div>
                    <div class="fs-4 fw-semibold">
                      <?php
                      $query = mysqli_query($conect, "SELECT COUNT(nama) FROM tb_tamu");
                      $data = mysqli_fetch_assoc($query);
                      echo $data['COUNT(nama)'];
                      ?>
                      <span class="fs-6 fw-normal">( Semua )</span>
                    </div>
                    <div>Orang</div>
                  </div>
                  <div class="dropdown">
                    <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                      </svg>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                  </div>
                </div>
                <div class="c-chart-wrapper mt-3 mx-3" style="height: 70px">
                  <canvas class="chart" id="card-chart4" height="70"></canvas>
                </div>
              </div>
            </div>
            <!-- /.col-->
          </div>
          <!-- /.row-->
          <div class="card mb-4">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div>
                  <h4 class="card-title mb-0">Grafik Data</h4>
                  <div class="small text-medium-emphasis"><?= 'Januari - Desember ' . date('Y') ?></div>
                </div>
                <div class="d-none d-md-flex gap-2 align-items-center">
                  <h6 class="">Download Excel 
                    <svg class="icon">
                      <use xlink:href="/public/vendor/@coreui/icons/svg/free.svg#cil-caret-right"></use>
                    </svg>
                  </h6>
                  <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <form action="laporan.php" method="POST">
                      <input type="hidden" name="query" value="<?= "SELECT * FROM tb_tamu WHERE timestamp LIKE '$year%'" ?>" >
                      <button class="btn btn-primary" type="submit">
                        <svg class="icon">
                          <use xlink:href="/public/vendor/@coreui/icons/svg/free.svg#cil-cloud-download"></use>
                        </svg>
                      </button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="c-chart-wrapper" style="height: 300px; margin-top: 40px">
                <canvas class="chart" id="main-chart" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div>© 2023 K-ONE WEB.</div>
      </footer>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="/public/vendor/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="/public/vendor/simplebar/js/simplebar.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="/public/vendor/chart.js/js/chart.min.js"></script>
    <script src="/public/vendor/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="/public/vendor/@coreui/utils/js/coreui-utils.js"></script>
    <script src="/public/vendor/js/main.js"></script>
  </body>
</html>
