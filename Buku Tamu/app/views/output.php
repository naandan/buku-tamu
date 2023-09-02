<?php 
session_start();
include "../models/koneksi.php";
$data = mysqli_query($conect, 'SELECT * FROM tb_tamu');
$tamu = mysqli_num_rows($data);
$data = mysqli_query($conect, "SELECT * FROM tb_tamu WHERE instansi LIKE '%SMK%' OR instansi LIKE '%Sekolah Menengah Kejuruan%'");
$smk = mysqli_num_rows($data);
$data = mysqli_query($conect, "SELECT * FROM tb_tamu WHERE instansi LIKE '%SMA%' OR instansi LIKE '%Sekolah Menengah Atas%'");
$sma = mysqli_num_rows($data);
$data = mysqli_query($conect, "SELECT * FROM tb_tamu WHERE instansi NOT LIKE '%SMA%' AND instansi NOT LIKE '%SMK%'");
$other = mysqli_num_rows($data);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BUKU TAMU</title>
    <link rel="stylesheet" href="../../public/css/style.css" />

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
  </head>
  <body>
    <header>
      <div class="container">
        <div class="logo">
          <div class="img" style="opacity: 1;">
            <img src="../../public/img/Logo.png"  alt="Logo SMKN 1 KAWALI" />
          </div>
          <div class="img" style="opacity: 0; position: absolute;">
            <img src="../../public/img/Logo JAWA BARAT.png" alt="Logo JAWA BARAT" />
          </div>
          <div class="text">
            <h3>SMK NEGERI 1 KAWALI</h3>
            <p>KCD Wilayah XIII Kab. Ciamis</p>
          </div>
          <a id="next" class="next" onclick="plusSlides(1)"></a>
          <a class="prev" onclick="plusSlides(-1)"></a>
        </div>
        <div style="text-align: center">
          <span class="dot active" onclick="currentSlide(1)"></span>
          <span class="dot" onclick="currentSlide(2)"></span>
        </div>
        <div class="menu">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </header>

    <div class="side-menu hidden">
      <div class="menu">
        <h3>BUKU TAMU</h3>
        <a href="../../" class="">Home</a>
        <a href="chart.php" class="">Grafik Data</a>
      </div>
    </div>

    <main>
      <div class="container">
        <div class="center">
          <div class="content">
            <h1 class="top">HALO! <?= $_SESSION['nama'] ?></h1>
            <h1 class="center-text">HALO! <?= $_SESSION['nama'] ?></h1>
            <h1 class="bottom">HALO! <?= $_SESSION['nama'] ?></h1>
            <p>
              Terimakasih anda telah mengisi <br />
              daftar tamu
            </p>
            <div class="data">
              <div class="tamu">
                <h2><?= $tamu ?></h2>
                <h4>Tamu</h4>
              </div>
              <div class="other">
                <h2><?= $smk ?></h2>
                <h4>SMK</h4>
              </div>
              <div class="other">
                <h2><?= $sma ?></h2>
                <h4>SMA</h4>
              </div>
              <div class="other">
                <h2><?= $other ?></h2>
                <h4>Lainnya</h4>
              </div>
            </div>
            <a href="../controllers/back.php">Kembali</a>
          </div>
        </div>
      </div>
    </main>
    <script src="../../public/js/script.js"></script>
  </body>
</html>
