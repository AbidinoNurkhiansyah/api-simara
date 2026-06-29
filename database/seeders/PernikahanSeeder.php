<?php

namespace Database\Seeders;

use App\Models\Pernikahan;
use Illuminate\Database\Seeder;

class PernikahanSeeder extends Seeder
{
    public function run(): void
    {
        Pernikahan::query()->delete();

        $bulanList = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        $tahunList = [2021, 2022, 2023, 2024, 2025, 2026];

        $ranges = [
            2021 => ['p' => [200, 300], 'i' => [20, 50]],
            2022 => ['p' => [180, 250], 'i' => [80, 150]],
            2023 => ['p' => [80, 120],  'i' => [200, 300]],
            2024 => ['p' => [40, 80],   'i' => [250, 350]],
            2025 => ['p' => [180, 250], 'i' => [100, 150]],
            2026 => ['p' => [100, 150], 'i' => [20, 60]],
        ];

        $records = [];
        foreach ($tahunList as $tahun) {
            foreach ($bulanList as $bulan) {
                $records[] = [
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'pernikahan' => rand($ranges[$tahun]['p'][0], $ranges[$tahun]['p'][1]),
                    'isbat_nikah' => rand($ranges[$tahun]['i'][0], $ranges[$tahun]['i'][1]),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }
        Pernikahan::insert($records);
    }
}
