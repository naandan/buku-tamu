@extends('layouts.admin')
@section('contents')
<div class="data-chart">
  @foreach ($data as $d)
  <input type="text" value="{{ $d }}" hidden>
  @endforeach
</div>  
<div class="body flex-grow-1 px-3">
  <div class="container-lg">
    <div class="row">
      <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 text-white bg-primary">
          <div class="card-body pb-0 d-flex justify-content-between align-items-start">
            <div>
              <div class="fs-4 fw-semibold">
                {{ $hari }}
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
                {{ $bulan }}
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
                {{ $tahun }}
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
                {{ $semua }}
                <span class="fs-6 fw-normal">( Semua )</span>
              </div>
              <div>Orang</div>
            </div>
            <div class="dropdown">
              <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg class="icon">
                  <use xlink:href="vendor/@coreui/icons/svg/free.svg#cil-options"></use>
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
            <div class="small text-medium-emphasis">Januari - Desember {{ now()->format('Y') }}</div>
          </div>
          <div class="d-none d-md-flex gap-2 align-items-center">
            <h6 class="">Download Excel 
              <svg class="icon">
                <use xlink:href="vendor/@coreui/icons/svg/free.svg#cil-caret-right"></use>
              </svg>
            </h6>
            <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
              <form action="" method="POST">
                <input type="hidden" name="query" value="" >
                <button class="btn btn-primary" type="submit">
                  <svg class="icon">
                    <use xlink:href="vendor/@coreui/icons/svg/free.svg#cil-cloud-download"></use>
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
@endsection