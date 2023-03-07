<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create([
            'kelas' => '10',
            'jurusan' => 'RPL'
        ]);

        Kelas::create([
            'kelas' => '11',
            'jurusan' => 'RPL'
        ]);

        Kelas::create([
            'kelas' => '12',
            'jurusan' => 'RPL'
        ]);

        Kelas::create([
            'kelas' => '10',
            'jurusan' => 'MM'
        ]);

        Kelas::create([
            'kelas' => '11',
            'jurusan' => 'MM'
        ]);

        Kelas::create([
            'kelas' => '12',
            'jurusan' => 'MM'
        ]);

        Kelas::create([
            'kelas' => '10',
            'jurusan' => 'TKJ'
        ]);
        Kelas::create([
            'kelas' => '11',
            'jurusan' => 'TKJ'
        ]);
        Kelas::create([
            'kelas' => '12',
            'jurusan' => 'TKJ'
        ]);
    }
}
