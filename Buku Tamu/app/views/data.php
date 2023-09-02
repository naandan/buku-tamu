<?php 
session_start();
include "../models/koneksi.php";
$data = mysqli_query($conect, 'SELECT * FROM tb_tamu');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BUKU TAMU</title>
    <link rel="stylesheet" href="../../public/css/style.css" />
    <link rel="stylesheet" href="../../public/css/data.css" />

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
            <div class="menu-data">
              <h2>DATA PENGUNJUNG</h2>
              <a href="../controllers/truncate.php" onclick="return confirm('Bersihkan Data?')">Bersihkan Data</a>
            </div>
            <div class="list-data">
              <table cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Instansi</th>
                    <th>Pesan</th>
                    <th>Tanggal</th>
                </tr>
                <?php $i=1; foreach($data as $d):?>
                  <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $d['nama'] ?></td>
                      <td><?= $d['instansi'] ?></td>
                      <td><?= $d['pesan'] ?></td>
                      <td><?= $d['dibuat'] ?></td>
                  </tr>
                <?php endforeach; ?>
              </table>
            </div>
            <a href="../controllers/back.php">Kembali</a>
          </div>
        </div>
      </div>
    </main>
    <script src="../../public/js/script.js"></script>
  </body>
</html>
