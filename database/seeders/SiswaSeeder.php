<?php

namespace Database\Seeders;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'nama' => 'Admin',
            'password' => bcrypt('admin'),
            'is_admin' => 1,
        ]);

        User::create([
            'username' => 'siswa10150',
            'nama' => 'Siswa10150',
            'password' => bcrypt('siswa10150'),
            'is_admin' => 0,
        ]);

         User::create([
            'username' => 'siswa10151',
            'nama' => 'Siswa10151',
            'password' => bcrypt('siswa10151'),
            'is_admin' => 0,
        ]);

        User::create([
            'username' => 'siswa10152',
            'nama' => 'Siswa10152',
            'password' => bcrypt('siswa10152'),
            'is_admin' => 0,
        ]);

        User::create([
            'username' => 'siswa10153',
            'nama' => 'Siswa10153',
            'password' => bcrypt('siswa10153'),
            'is_admin' => 0,
        ]);

        User::create([
            'username' => 'siswa10154',
            'nama' => 'Siswa10154',
            'password' => bcrypt('siswa10154'),
            'is_admin' => 0,
        ]);

        User::create([
            'username' => 'siswa10155',
            'nama' => 'Siswa10155',
            'password' => bcrypt('siswa10155'),
            'is_admin' => 0,
        ]);

        Siswa::create([
            'nama' => 'Angger Cakra',
            'nisn' => 320666666,
            'id_kelas' => 3,
            'alamat' => 'Grand Kahuripan',
            'no_telp' => '08123123213',
            'id_user' => '2',
            'tahun_ajaran' => '2022'
        ]);

        Siswa::create([
            'nama' => 'Firenze Higa',
            'nisn' => 320777777,
            'id_kelas' => 2,
            'alamat' => 'Venezia Residence',
            'no_telp' => '08123123213',
            'id_user' => '3',
            'tahun_ajaran' => '2022'
        ]);

        Siswa::create([
            'nama' => 'Doni Irawan',
            'nisn' => 320555555,
            'id_kelas' => 7,
            'alamat' => 'Grand Kahuripan',
            'no_telp' => '08123123213',
            'id_user' => '4',
            'tahun_ajaran' => '2022'
        ]);

        Siswa::create([
            'nama' => 'Fardan Septian',
            'nisn' => 320333333,
            'id_kelas' => 6,
            'alamat' => 'Grand Kahuripan',
            'no_telp' => '08123123213',
            'id_user' => '5',
            'tahun_ajaran' => '2022'
        ]);

        Siswa::create([
            'nama' => 'Raju Yadera',
            'nisn' => 320222222,
            'id_kelas' => 4,
            'alamat' => 'Cimanggung',
            'no_telp' => '08123123213',
            'id_user' => '6',
            'tahun_ajaran' => '2022'
        ]);

        Siswa::create([
            'nama' => 'Rifki Ihza',
            'nisn' => 320111111,
            'id_kelas' => 5,
            'alamat' => 'Permata',
            'no_telp' => '08123123213',
            'id_user' => '7',
            'tahun_ajaran' => '2022'
        ]);
    }
}
