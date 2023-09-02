@extends('layouts.main')
@section('contents')
<main>
  <div class="container">
    <div class="center">
      <div class="content">
        <div class="menu-data">
          <h2>DATA PENGUNJUNG HARI INI</h2>
        </div>
        <div class="list-data">
          <table cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Instansi</th>
                <th>Pesan</th>
                <th>Waktu</th>
            </tr>
            @foreach ($tamus as $tamu)  
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tamu->nama }}</td>
                <td>{{ $tamu->instansi }}</td>
                <td>{{ $tamu->pesan }}</td>
                <td>{{ $tamu->created_at->format('H:i:s') }}</td>
            </tr>
            @endforeach
          </table>
        </div>
        <a href="{{ route('index') }}">Kembali</a>
      </div>
    </div>
  </div>
</main>
@endsection