<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  </head>
  <body>
    <header>
      <div class="container">
        <div class="logo">
          <div class="img" style="opacity: 1;">
            <img src="{{ asset('img/Logo.png') }}"  alt="Logo SMKN 1 KAWALI" />
          </div>
          <div class="img" style="opacity: 0; position: absolute;">
            <img src="{{ asset('img/Logo JAWA BARAT.png') }}" alt="Logo JAWA BARAT" />
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
        <a href="{{ route('index') }}" class="{{ Request::routeIs('index') ? 'active' : '' }}">Home</a>
        <a href="{{ route('grafik') }}" class="{{ Request::routeIs('grafik') ? 'active' : '' }}">Grafik Tamu</a>
        <a href="{{ route('data') }}" class="{{ Request::routeIs('data') ? 'active' : '' }}">Data Tamu</a>
        <a href="{{ route('admin') }}" class="{{ Request::routeIs('admin') ? 'active' : '' }}">Admin</a>
      </div>
    </div>

    @yield('contents')
    <script src="{{ asset('js/script.js') }}"></script>
  </body>
</html>
