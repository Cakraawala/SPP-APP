<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<!-- <p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p> -->



## Pengenalan Konsep Aplikasi

SPP-APP adalah Project aplikasi Pembayaran SPP berbasis web yang menggunakan Framework Laravel.
Project ini berisi CRUD Siswa, SPP, Kelas, Petugas. Dan penginputan data Pembayaran secara offline.


## Authentikasi 
Aplikasi ini menyediakan 3 role berikut :
### Admin
Admin memiliki tugas yang sangat kompleks, seperti membuat, mengedit dan menghapus data Siswa,Petugas,SPP,Kelas, bahkan Transaksi sekaligus.
- Username : admin
- Password : admin (same as username)

### Petugas
Petugas berkedudukan dibawah admin, Petugas memiliki tugas untuk membuat data pembayaran yang telah dilakukan oleh siswa.
- Username : petugas
- Password : petugas (same as username)

### Siswa
Siswa berperan sebagai konsumen, siswa dapat melihat history pembayaran dan profile nya sendiri.
- Username : siswa10150 / siswa10151  (...etc)
- Password : siswa10150 / siswa10151  (same as username)

## Setting UP
Menyiapkan dan mensetting project SPP-APP. require (Composer v2.2.4 ,Git, MYSQL PHP > v5 (v8.1.1) )
- Buka CMD atau Aplikasi Command lainnya
- Masuk ke Directory apa saja untuk menyiapkan folder project. Contoh (cd C:\xampp\htdocs)
- Download / Clone Project ini dengan cara git clone https://github.com/Cakraawala/SPP-APP.git atau dengan mendownload langsung file zip dan pindahkan ke directory yang telah disiapkan.
- Setelah project berhasil di unduh ketikan Composer install dan tunggu hingga selesai diunduh.
- Buat database MYSQL dan Buka project SPP-APP, Cari file dengan nama .envexample kemudian edit nama file tersebut menjadi .env dan buka file tersebut.
- Setelah file dibuka, Ubah Database_name dan lainnya sesuai dengan database yang baru dibuat
- Buka CMD kembali Ketik php artisan key:generate dan php artisan migrate --seed / php artisan migrate:fresh --seed. Setelah data berhasil di dapatkan lalu jalankan Project dengan PHP ARTISAN SERVE.
- Project Berhasil DiClone.

## Asset Foto
