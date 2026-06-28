<?php

namespace Database\Seeders;

use App\Models\Pernikahan;
use Illuminate\Database\Seeder;

class PernikahanSeeder extends Seeder
{
    public function run(): void
    {
        $bulanList = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        $tahunList = [2021, 2022, 2023, 2024, 2025];

        foreach ($tahunList as $tahun) {
            foreach ($bulanList as $bulan) {
                Pernikahan::create([
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'pernikahan' => rand(150, 300),
                    'isbat_nikah' => rand(10, 50),
                ]);
            }
        }
    }
}
