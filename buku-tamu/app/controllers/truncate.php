<?php

include '../models/koneksi.php';

mysqli_query($conect, "DROP TABLE tb_tamu");
mysqli_query($conect, "CREATE TABLE tb_tamu(
                        id INT(11) PRIMARY KEY AUTO_INCREMENT,
                        nama VARCHAR(30),
                        instansi VARCHAR(50),
                        pesan TEXT,
                        dibuat TIMESTAMP
                        )");
                        
header('location: ../views/data.php');
