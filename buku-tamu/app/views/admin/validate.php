<?php
session_start();
require '../../models/koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$query = mysqli_query($conect, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
$cek = mysqli_num_rows($query);
$data = mysqli_fetch_assoc($query);
if($cek){
    echo $data['nama'];
    $_SESSION['login'] = $data['nama'];
    header('Location: index.php');
}
$_SESSION['color'] = 'danger';
$_SESSION['validate'] = 'Login gagal!';
header('Location: login.php');

?>