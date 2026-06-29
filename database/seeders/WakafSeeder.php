<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class WakafSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        $data = [];
        
        $masjidNames = ['Al-Ikhlas', 'An-Nur', 'Al-Hidayah', 'Baiturrahman', 'At-Taqwa', 'Al-Jihad', 'Al-Muhajirin', 'Baitul Makmur'];
        $yayasanNames = ['Bina Amal', 'Insan Kamil', 'Yatim Piatu Al-Fitrah', 'Pondok Pesantren Al-Baqarah', 'Pendidikan Islam Terpadu'];
        
        for ($i = 0; $i < 20; $i++) {
            $isTanah = $faker->boolean(70); // 70% Tanah, 30% Bangunan
            
            if ($isTanah) {
                $jenisProperti = 'Tanah';
                $name = "Tanah Wakaf Masjid " . $faker->randomElement($masjidNames);
                // Luas bervariasi dari m² sampai Ha
                $luasOptions = [$faker->numberBetween(100, 900) . ' m²', $faker->randomFloat(1, 0.5, 2) . ' Ha'];
                $luas = $faker->randomElement($luasOptions);
            } else {
                $jenisProperti = 'Bangunan';
                $name = "Bangunan Wakaf " . $faker->randomElement($yayasanNames);
                $luas = $faker->numberBetween(80, 500) . ' m²';
            }
            
            $nadzir = $faker->titleMale() . ' ' . $faker->firstNameMale() . ' ' . $faker->lastName();
            $address = $faker->streetAddress() . ', ' . $faker->city();
            
            $data[] = [
                'name' => $name,
                'jenis_properti' => $jenisProperti,
                'luas' => $luas,
                'nadzir' => $nadzir,
                'address' => $address,
                'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126907.05191241196!2d107.2141561724296!3d-6.2847250567083095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69775e79e70e01%3A0x301576d14feb9e0!2sKarawang%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid',
                'image' => null, // Biarkan null, agar pakai placeholder dari frontend
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('wakafs')->insert($data);
    }
}
