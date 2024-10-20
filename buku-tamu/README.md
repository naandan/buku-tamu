# Buku Tamu

Buku Tamu adalah sistem manajemen untuk mencatat kehadiran tamu secara digital. Proyek ini bertujuan untuk memudahkan pencatatan data tamu dan menyediakan laporan kehadiran yang efisien. Dibuat menggunakan PHP Native 8.2.

## Fitur

- Mencatat kehadiran tamu melalui antarmuka dashboard.
- Mengelola data tamu secara efisien.
- Menyediakan laporan kehadiran harian, mingguan, dan bulanan.

## Instalasi

### Prasyarat

Pastikan prasyarat berikut telah terinstal:

- PHP 8.2
- PHP extensions:
    - `fpm`
    - `cli`
    - `mysql`
    - `xml`
    - `curl`
    - `mbstring`
    - `zip`
    - `gd`
    - `intl`
- MySQL
- Web Server Nginx atau XAMPP

### Langkah-Langkah

1. **Setup di Linux**

   - **Kloning repositori:**

      ```bash
      git clone https://github.com/naandan/buku-tamu.git
      cd buku-tamu
      ```

   - **Salin Folder Buku Tamu:**

      ```bash
      sudo cp -r buku-tamu /var/www/html/
      ```

   - **Ubah Permission Folder:**

      ```bash
      sudo chown -R www-data:www-data /var/www/html/buku-tamu
      sudo chmod -R 755 /var/www/html/buku-tamu
      ```

   - **Ubah Konfigurasi Database:**

      ```bash
      sudo nano /var/www/html/buku-tamu/app/models/koneksi.php
      ```

      Buka file `koneksi.php` dan sesuaikan nilai-nilai berikut:

      ```php
      <?php 
         $server = "localhost";
         $username = "root";
         $password = "";
         $database = "bukutamu";
      ?>
      ```

   - **Buat Konfigurasi Virtual Host:**

      ```bash
      sudo nano /etc/nginx/sites-available/bukutamu
      ```
   
      Isi file konfigurasi virtual host sebagai berikut:

      ```nginx
      server {
         listen 8080;
         server_name localhost;
         root /var/www/html/buku-tamu;
         index index.php index.html index.htm;

         location / {
            try_files $uri $uri/ =404;
         }

         # Konfigurasi untuk PHP
         location ~ \.php$ {
            include snippets/fastcgi-php.conf;
            fastcgi_pass unix:/run/php/php8.2-fpm.sock;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
            include fastcgi_params;
         }

         location ~ /\.ht {
            deny all;
         }
      }
      ```

   - **Restart Web Server:**

      ```bash
      sudo systemctl restart nginx
      ```
   - **Buka Browser dan Akses:**

      Setelah aplikasi berjalan, Anda dapat mengaksesnya melalui browser dengan alamat `http://localhost:8080`.

2. **Setup di Windows dengan XAMPP**

   - **Salin Folder Buku Tamu:**

      Salin folder `buku-tamu` ke dalam folder `htdocs` di XAMPP.

      Biasanya lokasi folder `htdocs` berada di `C:\xampp\htdocs`.

   - **Ubah Konfigurasi Database:**

      Buka file `koneksi.php` dan sesuaikan nilai-nilai berikut:

      ```php
      <?php 
         $server = "localhost";
         $username = "root";
         $password = "";
         $database = "bukutamu";
      ?>
      ```

   - **Buka Browser dan Akses:**

      Setelah aplikasi berjalan, Anda dapat mengaksesnya melalui browser dengan alamat `http://localhost`.

## Kontak

Untuk pertanyaan lebih lanjut, silakan hubungi:

- Email: nandanramdani608@gmail.com
- GitHub: [naandan](https://github.com/naandan)