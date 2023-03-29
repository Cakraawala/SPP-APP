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
![1dashboard](https://user-images.githubusercontent.com/97875134/228568133-f2ea91b3-bdc6-41dc-9447-6bdc982cf3da.PNG)
![2datasiswa](https://user-images.githubusercontent.com/97875134/228568157-970bb24c-0bf3-4fb7-884e-099a90d11d6f.PNG)
![6datakelas](https://user-images.githubusercontent.com/97875134/228568179-8854a44c-24f1-4880-8e4b-761b592b85b3.PNG)
![10dataspp](https://user-images.githubusercontent.com/97875134/228568202-4ee88e4a-6767-4edf-a195-194d2f6769fb.PNG)
![16historypembayaran](https://user-images.githubusercontent.com/97875134/228568208-2cb06a8b-609c-48f4-b49d-c67cfa9e0de5.PNG)
![18detailpembayaran](https://user-images.githubusercontent.com/97875134/228568229-d624465c-8cfe-4100-bf5b-5bc453bee2e9.PNG)
![19invoicepembayaran](https://user-images.githubusercontent.com/97875134/228568249-c0cdc166-5e27-48f7-a33a-9b551501dc07.PNG)
![20laporanpembayaran](https://user-images.githubusercontent.com/97875134/228568258-1a75fbdb-9be7-453b-830a-57b1feb0f3e8.PNG)
![21dashboardsiswa](https://user-images.githubusercontent.com/97875134/228568271-309f7fd3-f43c-4180-8311-2073503f8b8f.PNG)
![22historypembayaranuser](https://user-images.githubusercontent.com/97875134/228568293-b0e2504e-d1e5-457c-b22d-575a3f61eabe.PNG)
