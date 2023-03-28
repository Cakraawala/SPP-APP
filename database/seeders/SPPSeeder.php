<?php

namespace Database\Seeders;

use App\Models\SPP;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SPPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        SPP::create([
            'tahun_ajaran' => 2021,
            'nominal' => 300000*12
        ]);
        SPP::create([
            'tahun_ajaran' => 2022,
            'nominal' => 300000*12
        ]);
        SPP::create([
            'tahun_ajaran' => 2023,
            'nominal' => 350000*12
        ]);
    }
}
