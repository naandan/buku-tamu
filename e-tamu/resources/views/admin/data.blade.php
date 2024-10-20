@extends('layouts.admin')
@section('contents')
<div class="body flex-grow-1 px-3">
  <div class="container-lg">
    <!-- /.row-->
    <div class="card mb-4">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div>
            <h4 class="card-title mb-0">Data Tamu</h4>
            <!-- <div class="small text-medium-emphasis"></div> -->
          </div>
          <div class="d-none d-md-flex filter">
            <div class="dropdown mr-2">
              <button class="btn btn-primary dropdown-toggle" id="dropdownMenuButton" type="button" data-coreui-toggle="dropdown" aria-expanded="false">Filter</button>
              <form action=""  method="POST" class="dropdown-menu p-2">
                @csrf
                <label for="from" class="col-form-label">From</label>
                <input type="date" name="from" id="from" class="form-control" value="<?php 
                if(isset($_POST['from'])){
                  echo $_POST['from'];
                }
                ?>"; required>

                <label for="to" class="col-form-label">To</label>
                <input type="date" name="to" id="to" class="form-control" value="<?php 
                if(isset($_POST['to'])){
                  echo $_POST['to'];
                }
                ?>"; required>

                <button type="submit" name="filterDate" class="btn btn-primary mt-2 w-100">Filter</button>
              </form>
            </div>
            <form action="" method="POST" class="mr-2">
              @csrf
              <select name="dmy" id="dmy" class="form-select">
                <option disabled selected>Pilih</option>
                <option value="d" <?php 
                if(isset($_POST['dmy'])){
                  if($_POST['dmy'] == 'd'){
                    echo 'selected';
                  }
                }
                ?> >Hari ini</option>
                <option value="m" <?php 
                if(isset($_POST['dmy'])){
                  if($_POST['dmy'] == 'm'){
                    echo 'selected';
                  }
                }
                ?> >Bulan ini</option>
                <option value="y" <?php 
                if(isset($_POST['dmy'])){
                  if($_POST['dmy'] == 'y'){
                    echo 'selected';
                  }
                }
                ?> >Tahun ini</option>
                <option value="a" <?php 
                if(isset($_POST['dmy'])){
                  if($_POST['dmy'] == 'a'){
                    echo 'selected';
                  }
                }
                ?> >Semua</option>
              </select>
              <button type="submit" name="filter" class="btn btn-primary mt-2 d-none">Filter</button>
            </form>
          </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered mt-2" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Instansi</th>
                                <th>Pesan</th>
                                <th>Foto</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $d)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->instansi }}</td>
                            <td>{{ $d->pesan }}</td>
                            <td><a href="#" data-bs-toggle="modal" data-bs-target="#fotoModal" class="text-primary" onclick="lihatFoto('{{ asset('storage/images/' . $d->foto) }}')"><u>Lihat</u></a></td>
                            <td>{{ $d->created_at->format('d M Y H:i:s') }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Instansi</th>
                                <th>Pesan</th>
                                <th>Foto</th>
                                <th>Tanggal</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function lihatFoto(link){
    document.getElementById('modalImg').src = link;
  }
</script>
<div class="modal fade" id="fotoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Foto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="" id="modalImg" alt="Gambar" width="100%">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
      </div>
    </div>
  </div>
</div>
@endsection