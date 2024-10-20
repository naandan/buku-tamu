@extends('layouts.main')
@section('contents')
<main>
  <div class="container" style="display: none">
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

        <form action="{{ route('index') }}" method="POST" enctype="multipart/form-data">
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
            <label for="takeFoto">Upload Foto</label>
            {{-- <div id="drop-zone">
                <img src="" alt="">
                <p>Drop file <br> or <br> <span>Click to upload</span></p>
                <input type="file" name="foto" id="myfile" hidden required>
            </div> --}}
            <div id="takeFoto">
              <video id="video" width="350" height="200" autoplay></video>
              <canvas id="canvas" width="350" height="200"></canvas>
              <button id="start-camera">Start Camera</button>
              <button id="click-photo"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M12 9c-1.626 0-3 1.374-3 3s1.374 3 3 3 3-1.374 3-3-1.374-3-3-3z"></path><path d="M20 5h-2.586l-2.707-2.707A.996.996 0 0 0 14 2h-4a.996.996 0 0 0-.707.293L6.586 5H4c-1.103 0-2 .897-2 2v11c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V7c0-1.103-.897-2-2-2zm-8 12c-2.71 0-5-2.29-5-5s2.29-5 5-5 5 2.29 5 5-2.29 5-5 5z"></path></svg></button>
              <button id="repeat-camera"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="m13 7.101.01.001a4.978 4.978 0 0 1 2.526 1.362 5.005 5.005 0 0 1 1.363 2.528 5.061 5.061 0 0 1-.001 2.016 4.976 4.976 0 0 1-1.363 2.527l1.414 1.414a7.014 7.014 0 0 0 1.908-3.54 6.98 6.98 0 0 0 0-2.819 6.957 6.957 0 0 0-1.907-3.539 6.97 6.97 0 0 0-2.223-1.5 6.921 6.921 0 0 0-1.315-.408c-.137-.028-.275-.043-.412-.063V2L9 6l4 4V7.101zm-7.45 7.623c.174.412.392.812.646 1.19.249.37.537.718.854 1.034a7.036 7.036 0 0 0 2.224 1.501c.425.18.868.317 1.315.408.167.034.338.056.508.078v2.944l4-4-4-4v3.03c-.035-.006-.072-.003-.107-.011a4.978 4.978 0 0 1-2.526-1.362 4.994 4.994 0 0 1 .001-7.071L7.051 7.05a7.01 7.01 0 0 0-1.5 2.224A6.974 6.974 0 0 0 5 12a6.997 6.997 0 0 0 .55 2.724z"></path></svg></svg></button>

              <input type="text" name="foto" id="foto" hidden>
            </div>
          </div>

          <div class="input-group">
            <button type="submit">Kirim</button>
          </div>
          @csrf
        </form>
      </div>
    </div>
    <div class="right"></div>
  </div>
  <div class="not-allow" style="display: none">
    <section class="page_404">
      <div class="container">
        <div class="row">	
          <div class="col-sm-12 ">
            <div class="col-sm-10 col-sm-offset-1  text-center">
              <div class="four_zero_four_bg">
                <h1 class="text-center ">Maaf</h1>
              </div>
              <div class="contant_box_404">
                <h3 class="h2">Kamu berada di luar zona lokasi acara</h3>
                <p>Mohon untuk melakukan pengisian Buku Tamu di lokasi</p>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
  </div>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>;
<script src="js/lokasi.js"></script>
<script>
  let start_button = document.querySelector("#start-camera");
  let repeat_button = document.querySelector("#repeat-camera");
  let video = document.querySelector("#video");
  let shot_button = document.querySelector("#click-photo");
  let canvas = document.querySelector("#canvas");
  let foto = document.querySelector("#foto");

  start_button.addEventListener('click', async function(e) {
      e.preventDefault();
      try {
          let stream = await navigator.mediaDevices.getUserMedia({ video: { width: 350, height: 200 }, audio: false });
          video.srcObject = stream;
          // Flip the video horizontally
          video.style.transform = 'scaleX(-1)';
      } catch (error) {
          console.error("Error accessing the camera:", error);
      }
  });

  shot_button.addEventListener('click', function(e) {
      e.preventDefault();
      let context = canvas.getContext('2d');
      
      // Flip the canvas horizontally before drawing
      context.scale(-1, 1);
      context.translate(-canvas.width, 0);
      
      // Draw the video frame
      context.drawImage(video, 0, 0, canvas.width, canvas.height);
      
      // Reset the canvas transform
      context.setTransform(1, 0, 0, 1, 0, 0);

      // Get the data URL of the image
      let image_data_url = canvas.toDataURL('image/jpeg');
      foto.value = image_data_url;
  });
</script>
<script>
  $(document).ready(function () {
    $('#click-photo').hide()
    $('#canvas').hide()
    $('#video').hide()
    $('#repeat-camera').hide()
    
  });
  $('#start-camera').click(function(){
    $('#click-photo').show()
    $('#start-camera').hide()
    $('#video').show()
    $('#canvas').hide()
    $('#repeat-camera').hide()
  })
  $('#click-photo').click(function(){
    $('#repeat-camera').show()
    $('#start-camera').hide()
    $('#click-photo').hide()
    $('#video').hide()
    $('#canvas').show()
  })
  $('#repeat-camera').click(function(e){
    e.preventDefault();
    $('#click-photo').show()
    $('#start-camera').hide()
    $('#video').show()
    $('#canvas').hide()
    $('#repeat-camera').hide()
  })
</script>
@endsection