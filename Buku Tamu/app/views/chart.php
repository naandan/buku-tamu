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
        <a href="chart.php" class="active">Grafik Data</a>
      </div>
    </div>

    <main>
      <div class="container">
        <div class="center">
          <div class="content">
            <div class="jml">
              <h2>JUMLAH PENGUNJUNG</h2>
              <h3><?= $tamu ?></h3>
            </div>
            <div class="chart">
              <canvas class="my-4 w-100" id="myChart"></canvas>
            </div>
            <a href="../controllers/back.php">Kembali</a>
          </div>
        </div>
      </div>
    </main>
    <script src="../../public/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script>
        (() => {
            'use strict'
            feather.replace({
                'aria-hidden': 'true'
            })
            var ctxB = document.getElementById("myChart").getContext('2d');

            let jmlTamu = <?= json_decode(mysqli_num_rows(mysqli_query($conect, "SELECT * FROM tb_tamu"))) ?>;
            let smk = <?= json_decode(mysqli_num_rows(mysqli_query($conect, "SELECT * FROM tb_tamu WHERE instansi LIKE 'SMK%' OR instansi LIKE '%SMK%' OR instansi LIKE '%Sekolah Menengah Kejuruan%'"))) ?>;
            let sma = <?= json_decode(mysqli_num_rows(mysqli_query($conect, "SELECT * FROM tb_tamu WHERE instansi LIKE 'SMA%' OR instansi LIKE '%SMA%' OR instansi LIKE '%Sekolah Menengah Atas%'"))) ?>;
            let lain = jmlTamu - smk - sma;

            var myBarChart = new Chart(ctxB, {
                type: 'bar',
                data: {
                    labels: ["SMK", "SMA", "Instansi Lain"],
                    datasets: [{
                        label: 'Jumlah',
                        data: [smk, sma, lain],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.30)',
                            'rgba(255, 205, 86, 0.30)',
                            'rgba(110, 110, 110, 0.30)',
                        ],
                        borderColor: [
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)',
                            'rgba(110, 110, 110)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    legend: {
                        display: false
                    }
                }
            });
        })()
    </script>
  </body>
</html>
