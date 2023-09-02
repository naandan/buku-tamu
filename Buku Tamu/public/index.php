<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BUKU TAMU</title>
    <link rel="stylesheet" href="css/style.css" />

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
  </head>
  <body>
    <?php session_start(); if(isset($_SESSION['cek'])) : ?>
    <div class="alert alert-active">
      <p><?= $_SESSION['cek'] ?></p><span>X</span>
    </div>
    <?php endif; unset($_SESSION['cek'])?>
      <header>
      <div class="container">
        <div class="logo">
          <div class="img" style="opacity: 1;">
            <img src="img/Logo.png"  alt="Logo SMKN 1 KAWALI" />
          </div>
          <div class="img" style="opacity: 0; position: absolute;">
            <img src="img/Logo JAWA BARAT.png" alt="Logo JAWA BARAT" />
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
        <a href="index.php" class="active">Home</a>
        <a href="../app/views/chart.php" class="">Grafik Data</a>
        <a href="../app/views/admin/" class="">Admin</a>
      </div>
    </div>

    <main>
      <div class="container">
        <div class="left">
          <div class="line"></div>
          <a href=""><i class="bi bi-instagram"></i></a>
          <a href=""><i class="bi bi-facebook"></i></a>
          <a href=""><i class="bi bi-youtube"></i></a>
          <div class="line"></div>
        </div>

        <div class="center">
          <div class="content">
            <h1 class="top">SELAMAT DATANG</h1>
            <h1 class="center-text">SELAMAT DATANG</h1>
            <h1 class="bottom">SELAMAT DATANG</h1>
            <p>Silahkan masukan data anda</p>

            <form action="../app/controllers/insert.php" method="POST" enctype="multipart/form-data">
              <div class="input-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" required/>
              </div>

              <div class="input-group">
                <label for="instansi">Asal Instansi</label>
                <input type="text" id="instansi" name="instansi" required/>
              </div>

              <div class="input-group">
                <label for="pesan">Kesan dan Pesan</label>
                <textarea name="pesan" id="pesan"></textarea>
              </div>
              
              <div class="input-group">
                <label for="pesan">Upload Foto</label>
                <div id="drop-zone">
                    <img src="" alt="">
                    <p>Drop file <br> or <br> <span>Click to upload</span></p>
                    <input type="file" name="foto" id="myfile" hidden required>
                </div>
              </div>

              <div class="input-group">
                <button type="submit">Kirim</button>
              </div>
            </form>
          </div>
        </div>
        <div class="right"></div>
      </div>
    </main>
    <script src="js/script.js"></script>
  </body>
</html>
