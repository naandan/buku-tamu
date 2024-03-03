@extends('layouts.main')
@section('contents')
    <main>
      <div class="container">
        <div class="center">
          <div class="content">
            <div class="jml">
              <h2>JUMLAH PENGUNJUNG</h2>
              <h3>{{ $semua }}</h3>
            </div>
            <div class="chart">
              <canvas class="my-4 w-100" id="myChart"></canvas>
            </div>
            <a href="{{ route('index') }}">Kembali</a>
          </div>
        </div>
      </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      const ctx = document.getElementById('myChart');
    
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['SMA', 'SMK', 'Lainnya'],
          datasets: [{
            label: 'Jumlah Tamu',
            data: [{{ $sma }}, {{ $smk }}, {{ $lain }}],
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
            y: {
              beginAtZero: false
            }
          },
        }
      });
    </script>
@endsection
