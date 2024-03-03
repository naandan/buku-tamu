@extends('layouts.main')
@section('contents')
<main>
  <div class="container">
    <div class="center">
      <div class="content">
        @if (session()->has('success'))
          <h1 class="top">HALO! {{ session('success') }}</h1>
          <h1 class="center-text">HALO! {{ session('success') }}</h1>
          <h1 class="bottom">HALO! {{ session('success') }}</h1>
        @endif
        <p>
          Terimakasih anda telah mengisi <br />
          daftar tamu
        </p>
        <div class="data">
          <div class="tamu">
            <h2>{{ $semua }}</h2>
            <h4>Tamu</h4>
          </div>
          <div class="other">
            <h2>{{ $smk }}</h2>
            <h4>SMK</h4>
          </div>
          <div class="other">
            <h2>{{ $sma }}</h2>
            <h4>SMA</h4>
          </div>
          <div class="other">
            <h2>{{ $lain }}</h2>
            <h4>Lainnya</h4>
          </div>
        </div>
        <a href="{{ route('index') }}">Kembali</a>
      </div>
    </div>
  </div>
</main>
@endsection