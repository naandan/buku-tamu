<?php

session_start();

include '../models/koneksi.php';

$nama = $_POST['nama'];
$instansi = $_POST['instansi'];
$pesan = $_POST['pesan'];
$gambar = upload();
    if(!$gambar){
        header('Location: ../../public/index.php');
        return false;
    }
$query = mysqli_query($conect, "INSERT INTO tb_tamu (nama, instansi, pesan, foto) VALUES('$nama', '$instansi', '$pesan', '$gambar')");

$_SESSION['nama'] = $nama;
$_SESSION['instansi'] = $instansi;
$_SESSION['pesan'] = $pesan;

function upload(){

    $file = $_FILES["foto"]["name"];
    $size = $_FILES["foto"]["size"];
    $error = $_FILES["foto"]["error"];
    $tempat = $_FILES["foto"]["tmp_name"];

    if($error === 4){
        $_SESSION['cek'] = 'Mohon masukan gambar';
        return false;
    }

    $ekstensiGambar = ["jpg", "jpeg", "png"];
    $ekstensi = explode(".", $file);
    $ekstensi = strtolower(end($ekstensi));

    if (!in_array($ekstensi, $ekstensiGambar)){
        $_SESSION['cek'] = 'Yang kamu upload bukan gambar';
        return false;
    }


    if($size > 1000000){
        $_SESSION['cek'] = 'Gambar maksimal 1 MB';
        return false;
    }

    $fileBaru = uniqid();
    $fileBaru .= ".";
    $fileBaru .= "$ekstensi";

    move_uploaded_file($tempat, "../store/" . $fileBaru);

    return $fileBaru;

 }

header('location: ../views/output.php');