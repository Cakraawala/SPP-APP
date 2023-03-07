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
        ]);

        Siswa::create([
            'nisn' => 320666666,
            'id_kelas' => 3,
            'alamat' => 'Grand Kahuripan',
            'nama' => 'Angger Cakra',
            'no_telp' => '08123123213',
            'password' => bcrypt('angger')
        ]);
    }
}
