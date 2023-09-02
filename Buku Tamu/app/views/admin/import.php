<?php
session_start();
require '../../models/koneksi.php';
if (isset($_POST['import']))
{
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );
 
    if (!empty($_FILES['csv']['name']) && in_array($_FILES['csv']['type'], $fileMimes)){
        $csvFile = fopen($_FILES['csv']['tmp_name'], 'r');
        fgetcsv($csvFile);
        while (($getData = fgetcsv($csvFile, 10000, ";")) !== FALSE)
        {
            $nama = $getData[0];
            $instansi = $getData[1];
            $pesan = $getData[2];
            $foto = $getData[3];

            mysqli_query($conect, "INSERT INTO tb_tamu (nama, instansi, pesan, foto) VALUES ('$nama', '$instansi', '$pesan', '$foto')");
        }

        fclose($csvFile);
        $_SESSION['color'] = 'success';
        $_SESSION['alert'] = 'Data berhasil ditambahkan!';
        header("Location: data.php");
            
    }else{
        $_SESSION['color'] = 'danger';
        $_SESSION['alert'] = 'Data gagal ditambahkan!';
        header("Location: data.php");
    }
}

?>
</html>