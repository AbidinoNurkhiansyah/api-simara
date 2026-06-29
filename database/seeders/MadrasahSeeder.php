<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Madrasah;

class MadrasahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $levels = ['MI', 'MTs', 'MA'];
        $statuses = ['Negeri', 'Swasta'];

        $madrasahs = [];

        for ($i = 1; $i <= 25; $i++) {
            $level = $faker->randomElement($levels);
            $status = $faker->randomElement($statuses);
            
            // Format name nicely, e.g., "MIN 1 Karawang", "MTsS Al Huda Karawang"
            if ($status === 'Negeri') {
                $prefix = $level . 'N ' . $faker->numberBetween(1, 10);
            } else {
                $prefix = $level . 'S ' . $faker->company;
                // Remove some unwanted company suffixes for more realistic school names
                $prefix = str_replace([' PT', ' CV', ' Tbk', ' (Persero)'], '', $prefix);
            }
            $name = $prefix . ' Karawang';

            $madrasahs[] = [
                'name' => $name,
                'level' => $level,
                'address' => $faker->address,
                'status' => $status,
                'details' => json_encode([
                    $faker->paragraph(2),
                    $faker->paragraph(3)
                ]),
                'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126907.08647008688!2d107.21852277028148!3d-6.28424227918512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69775e79e70e01%3A0x301576d14feb9c0!2sKarawang%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1716301234567!5m2!1sen!2sid',
                'image' => null, // Left null to let frontend use fallback or upload actual images later
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('madrasahs')->insert($madrasahs);
    }
}
