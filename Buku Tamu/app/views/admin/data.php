<?php 
session_start();
if(!isset($_SESSION['login'])){
  header('Location: login.php');
}
require '../../models/koneksi.php';
date_default_timezone_set("Asia/Jakarta");

if(isset($_POST['filterDate'])){
  $from = $_POST['from'];
  $to = $_POST['to'];

  $query = "SELECT * FROM tb_tamu WHERE timestamp BETWEEN '$from%' AND '$to%'";
}else if(isset($_POST['filter'])){
  if($_POST['dmy'] === 'd'){
    $filter = date('Y-m-d');
    $query = "SELECT * FROM tb_tamu WHERE timestamp LIKE '$filter%'";
  }else if($_POST['dmy'] === 'm'){
    $filter = date('Y-m');
    $query = "SELECT * FROM tb_tamu WHERE timestamp LIKE '$filter%'";
  }else if($_POST['dmy'] === 'y'){
    $filter = date('Y');
    $query = "SELECT * FROM tb_tamu WHERE timestamp LIKE '$filter%'";
  }else if($_POST['dmy'] === 'a'){
    $filter = '';
    $query = "SELECT * FROM tb_tamu WHERE timestamp LIKE '$filter%'";
  }else{
    $filter = date('Y-m-d');
    $query = "SELECT * FROM tb_tamu WHERE timestamp LIKE '$filter%'";
  }
}else{
  $filter = date('Y-m-d');
  $query = "SELECT * FROM tb_tamu WHERE timestamp LIKE '$filter%'";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Admin | Data</title>
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png" />
    <meta name="theme-color" content="#ffffff" />

    <link href="../../../public/vendors/sbadmin2/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../public/vendors/simplebar/css/simplebar.css" />
    <link rel="stylesheet" href="../../../public/vendors/css/vendors/simplebar.css" />
    <link href="../../../public/vendors/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css" />
    <link href="../../../public/vendors/css/examples.css" rel="stylesheet" />
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <link href="../../../public/vendors/sbadmin2/sb-admin-2.css" rel="stylesheet">
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
    <link href="../../../public/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet" />
  </head>
  <body>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
      <div class="sidebar-brand d-none d-md-flex">
        <h5 class="mt-2">Buku Tamu K-ONE</h5>
      </div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <svg class="nav-icon">
              <use xlink:href="../../../public/vendors/@coreui/icons/svg/free.svg#cil-home"></use>
            </svg>
            Home</a
          >
          <a class="nav-link" href="data.php">
            <svg class="nav-icon">
              <use xlink:href="../../../public/vendors/@coreui/icons/svg/free.svg#cil-chart"></use>
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
              <use xlink:href="../../../public/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
            </svg></button>
          <a class="header-brand d-md-none">
            <h5 class="mt-2">Buku Tamu K-ONE</h5>
          </a>
          <div class=" d-none d-md-flex">
            <h3>Selamat datang, Admin!</h3>
          </div>
          <ul class="header-nav ms-auto">
            <li class="nav-item dropdown">
              <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-md"><img class="avatar-img" src="../../../public/vendors/assets/img/avatars/8.jpg" alt="user@email.com" /></div>
              </a>
              <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header bg-light py-2">
                  <div class="fw-semibold">Account</div>
                </div>
                <a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="../../../public/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                  </svg>
                  Logout</a
                >
              </div>
            </li>
          </ul>
        </div>
      </header>
      <?php if(isset($_SESSION['alert'])): ?>
        <div class="col-lg-8 m-auto">
          <div class="alert alert-<?= $_SESSION['color'] ?> alert-dismissible fade show" role="alert">
            <div class="fw-semibold"><?= $_SESSION['alert'] ?></div>
            <button class="btn-close" type="button" data-coreui-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>
      <?php endif; unset($_SESSION['alert'], $_SESSION['color']) ?>
      <div class="body flex-grow-1 px-3">
        <div class="container-lg">
          <!-- /.row-->
          <div class="card mb-4">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div>
                  <h4 class="card-title mb-0">Data Tamu</h4>
                  <!-- <div class="small text-medium-emphasis"></div> -->
                </div>
                <div class="d-none d-md-flex filter">
                  <div class="dropdown mr-2">
                    <button class="btn btn-primary dropdown-toggle" id="dropdownMenuButton" type="button" data-coreui-toggle="dropdown" aria-expanded="false">Filter</button>
                    <form action=""  method="POST" class="dropdown-menu p-2">
                      <label for="from" class="col-form-label">From</label>
                      <input type="date" name="from" id="from" class="form-control" value="<?php 
                      if(isset($_POST['from'])){
                        echo $_POST['from'];
                      }
                      ?>";>

                      <label for="to" class="col-form-label">To</label>
                      <input type="date" name="to" id="to" class="form-control" value="<?php 
                      if(isset($_POST['to'])){
                        echo $_POST['to'];
                      }
                      ?>";>

                      <button type="submit" name="filterDate" class="btn btn-primary mt-2 w-100">Filter</button>
                    </form>
                  </div>
                  <form action="" method="POST" class="mr-2">
                    <select name="dmy" id="dmy" class="form-select">
                      <option value="" disabled selected>Pilih</option>
                      <option value="d" <?php 
                      if(isset($_POST['dmy'])){
                        if($_POST['dmy'] == 'd'){
                          echo 'selected';
                        }
                      }
                      ?> >Hari ini</option>
                      <option value="m" <?php 
                      if(isset($_POST['dmy'])){
                        if($_POST['dmy'] == 'm'){
                          echo 'selected';
                        }
                      }
                      ?> >Bulan ini</option>
                      <option value="y" <?php 
                      if(isset($_POST['dmy'])){
                        if($_POST['dmy'] == 'y'){
                          echo 'selected';
                        }
                      }
                      ?> >Tahun ini</option>
                      <option value="a" <?php 
                      if(isset($_POST['dmy'])){
                        if($_POST['dmy'] == 'a'){
                          echo 'selected';
                        }
                      }
                      ?> >Semua</option>
                    </select>
                    <button type="submit" name="filter" hidden>Filter</button>
                  </form>
                  <div class="mr-2">
                    <div class="modal fade" id="exampleModalLive" tabindex="-1" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLiveLabel">Import File</h5>
                            <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="import.php" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                              <p>Contoh format data di dalam file csv</p>
                              <img src="../../../public/img/import-example.png" alt="Import-example" width="100%" class="mb-4">
                              <label for="csv" class="form-label">Pilih file dengan format <i>.csv</i></label>
                              <input type="file" name="csv" id="csv" class="form-control">
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Batal</button>
                              <button class="btn btn-primary" type="submit" name="import">Import</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <button class="btn btn-primary" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModalLive">Import
                      <svg class="icon">
                        <use xlink:href="../../../public/vendors/@coreui/icons/svg/free.svg#cil-cloud-upload"></use>
                      </svg>
                    </button>
                  </div>
                  <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <form action="laporan.php" method="POST">
                      <input type="hidden" name="query" value="<?= $query ?>" >
                      <button class="btn btn-primary" type="submit">Export
                        <svg class="icon">
                          <use xlink:href="../../../public/vendors/@coreui/icons/svg/free.svg#cil-cloud-download"></use>
                        </svg>
                      </button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card mt-4">
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-bordered mt-2" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Timestamp</th>
                                      <th>Nama</th>
                                      <th>Asal Instansi</th>
                                      <th>Pesan</th>
                                      <th>Foto</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $data = mysqli_query($conect, $query);
                                  $i = 1; 
                                ?>
                                <?php foreach($data as $d): ?>
                                  <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $d['timestamp'] ?></td>
                                    <td><?= $d['nama'] ?></td>
                                    <td><?= $d['instansi'] ?></td>
                                    <td><?= $d['pesan'] ?></td>
                                    <td><a href="../../store/<?= $d['foto'] ?>" target="_blank"><?= $d['foto'] ?></a></td>
                                  </tr>
                                <?php endforeach; ?>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <td>No</td>
                                      <td>Timestamp</td>
                                      <td>Nama</td>
                                      <td>Asal Instansi</td>
                                      <td>Pesan</td>
                                      <td>Foto</td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div>© 2023 K-ONE WEB.</div>
      </footer>
    </div>
    <script>
      const dmy = document.querySelector('#dmy');
      dmy.addEventListener('change', ()=>{
        console.log(dmy.nextElementSibling);
        dmy.nextElementSibling.click();
      });
    </script>
    <script src="../../../public/vendors/sbadmin2/jquery.min.js"></script>
    <script src="../../../public/vendors/sbadmin2/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../../public/vendors/sbadmin2/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../../public/vendors/sbadmin2/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../../public/vendors/sbadmin2/jquery.dataTables.min.js"></script>
    <script src="../../../public/vendors/sbadmin2/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../../public/vendors/sbadmin2/datatables-demo.js"></script>
    <!-- CoreUI and necessary plugins-->
    <script src="../../../public/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="../../../public/vendors/simplebar/js/simplebar.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="../../../public/vendors/chart.js/js/chart.min.js"></script>
    <script src="../../../public/vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="../../../public/vendors/@coreui/utils/js/coreui-utils.js"></script>
    <script src="../../../public/vendors/js/main.js"></script>
    <script></script>
  </body>
</html>
