# E-Tamu

E-Tamu adalah sistem manajemen untuk mencatat kehadiran tamu secara digital. Proyek ini bertujuan untuk memudahkan pencatatan data tamu dan menyediakan laporan kehadiran yang efisien. Dibuat menggunakan Laravel versi 10.

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
- Composer

### Langkah-Langkah

1. **Kloning repositori:**

   ```bash
   git clone https://github.com/naandan/buku-tamu.git
   cd buku-tamu/e-tamu
   ```

2. **Instal dependensi:**

   ```bash
   composer install
   ```

3. **Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi:**

   ```bash
   cp .env.example .env
   ```

   Buka file `.env` dan sesuaikan nilai-nilai berikut:

   ```plaintext
   APP_NAME=E-Tamu
   APP_ENV=local
   APP_KEY=
   APP_DEBUG=true
   APP_URL=http://localhost

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=e_tamu
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Generate kunci aplikasi:**

   ```bash
   php artisan key:generate
   ```

5. **Link storage:**

   ```bash
   php artisan storage:link
   ```

6. **Jalankan migrasi database:**

   ```bash
   php artisan migrate
   ```

7. **Jalankan seeder (opsional):**

   ```bash
   php artisan db:seed
   ```

8. **Jalankan server pengembangan:**

   ```bash
   php artisan serve
   ```

## Penggunaan

Setelah aplikasi berjalan, Anda dapat mengaksesnya melalui browser dengan alamat `http://localhost:8000`.

## Kontak

Untuk pertanyaan lebih lanjut, silakan hubungi:

- Email: nandanramdani608@gmail.com
- GitHub: [naandan](https://github.com/naandan)