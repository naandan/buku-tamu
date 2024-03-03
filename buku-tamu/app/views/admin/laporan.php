
<?php
require '../../models/koneksi.php';
$query = $_POST['query'];
$data = mysqli_query($conect, $query);
$i = 1;
?>
<p align="center" style="font-weight:bold;font-size:16pt">LAPORAN DATA TAMU</p>
<table border="1" align="center">
    <tr>
        <th >No</th>
        <th >Timestamp</th>
        <th >Nama</th>
        <th >Instansi</th>
        <th >Pesan</th>
        <th >Foto</th>
</tr>
<?php foreach ($data as $d) : ?>
<tr>
    <td align="center"><?= $i++ ?></td>
    <td><?= $d['timestamp'] ?></td>
    <td><?= $d['nama'] ?></td>
    <td><?= $d['instansi'] ?></td>
    <td><?= $d['pesan'] ?></td>
    <td><?= $d['foto'] ?></td>
</tr>
<?php endforeach; ?>
</table>
<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan.xls"); 

?>





