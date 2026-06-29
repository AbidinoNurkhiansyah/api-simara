<?php

namespace Database\Seeders;

use App\Models\TempatIbadah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TempatIbadahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TempatIbadah::query()->delete();

        $mapEmbed = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15862.939235216016!2d107.27991421389821!3d-6.2985368759253975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6977e688bc76a1%3A0x1c78d20df2a3a3b7!2sAl-Jihad%20Mosque!5e0!3m2!1sen!2sid!4v1782398760577!5m2!1sen!2sid";

        $data = [
            [
                'name' => 'Masjid Al-Jihad Karawang',
                'type' => 'Masjid',
                'address' => 'Jl. Jenderal Ahmad Yani, Karangpawitan, Kec. Karawang Barat, Karawang',
                'details' => [
                    "Bangunan Masjid Al-Jihad Karawang dibangun pertama kali dengan bangunan beton dan berlantai dua pada tahun 1974 lalu. Pada saat itu, masjidnya memiliki kubah kopula tunggal, dengan arsitektur campuran dari seni klasik dan seni modern.",
                    "Masjid ini terletak dekat Stadion Singaperbangsa dan menjadi pusat keramaian warga sekitar."
                ],
                'map_embed' => $mapEmbed,
                'image' => 'https://images.unsplash.com/photo-1542816417-0983c9c9ad53?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'name' => 'Gereja Christ the King',
                'type' => 'Gereja',
                'address' => 'Jl. Resinda Raya No.15, Purwadana, Kec. Karawang Barat, Karawang',
                'details' => [
                    "Gereja Christ the King adalah salah satu gereja Katolik utama di wilayah Karawang Barat. Bangunan ini memiliki desain modern minimalis yang menyatu dengan lingkungan sekitarnya.",
                    "Gereja ini aktif menyelenggarakan berbagai kegiatan keagamaan dan sosial untuk masyarakat setempat."
                ],
                'map_embed' => $mapEmbed,
                'image' => 'https://images.unsplash.com/photo-1548625361-ec8537a1c779?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'name' => 'Vihara Dharma Bakti',
                'type' => 'Vihara',
                'address' => 'Jl. Tuparev No.88, Nagasari, Kec. Karawang Barat, Karawang',
                'details' => [
                    "Vihara Dharma Bakti merupakan pusat ibadah umat Buddha di Karawang Barat. Vihara ini sering mengadakan perayaan hari besar seperti Waisak yang dihadiri ribuan umat.",
                    "Bangunannya kental dengan ornamen oriental dan memiliki patung-patung Buddha yang indah di dalamnya."
                ],
                'map_embed' => $mapEmbed,
                'image' => 'https://images.unsplash.com/photo-1559815033-de7661b36952?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'name' => 'Pura Agung Giri Natha',
                'type' => 'Pura',
                'address' => 'Jl. Bypass Karawang Baru, Tanjungmekar, Kec. Karawang Barat, Karawang',
                'details' => [
                    "Pura Agung Giri Natha merupakan tempat peribadatan umat Hindu yang berlokasi di area tenang, cocok untuk meditasi dan upacara keagamaan.",
                    "Arsitektur Pura ini menggunakan batu padas khas Bali, memberikan nuansa tradisional yang kental di tengah kota Karawang."
                ],
                'map_embed' => $mapEmbed,
                'image' => 'https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'name' => 'Masjid Agung Syekh Quro',
                'type' => 'Masjid',
                'address' => 'Jl. Alun-Alun Selatan, Karawang Kulon, Kec. Karawang Barat, Karawang',
                'details' => [
                    "Masjid Agung Syekh Quro adalah masjid bersejarah dan merupakan masjid terbesar di Kabupaten Karawang.",
                    "Sering dijadikan sebagai pusat perayaan hari besar Islam tingkat kabupaten dan terletak di jantung kota."
                ],
                'map_embed' => $mapEmbed,
                'image' => 'https://images.unsplash.com/photo-1584551246679-0daf3d275d0f?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'name' => 'Klenteng Bio Kwan Tee Koen',
                'type' => 'Klenteng',
                'address' => 'Jl. Niaga, Karawang Wetan, Kec. Karawang Barat, Karawang',
                'details' => [
                    "Klenteng Bio Kwan Tee Koen adalah tempat ibadah bersejarah bagi penganut Tridharma di Karawang.",
                    "Meskipun secara administratif berada di perbatasan, klenteng ini sangat populer bagi masyarakat Karawang Barat. Sering menggelar acara Cap Go Meh yang meriah."
                ],
                'map_embed' => $mapEmbed,
                'image' => 'https://images.unsplash.com/photo-1620310619985-055f72535978?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'name' => 'Masjid Raya Resinda',
                'type' => 'Masjid',
                'address' => 'Kawasan Resinda Raya, Purwadana, Kec. Karawang Barat, Karawang',
                'details' => [
                    "Masjid dengan arsitektur modern ini berlokasi di dalam kompleks perumahan elite Resinda.",
                    "Memiliki fasilitas lengkap termasuk area parkir yang luas, perpustakaan mini, dan aula serbaguna."
                ],
                'map_embed' => $mapEmbed,
                'image' => 'https://images.unsplash.com/photo-1542816417-0983c9c9ad53?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'name' => 'Gereja HKBP Karawang',
                'type' => 'Gereja',
                'address' => 'Jl. Tarumanagara, Karawang Kulon, Kec. Karawang Barat, Karawang',
                'details' => [
                    "Gereja HKBP melayani umat Kristen Protestan dengan menggunakan tata cara peribadatan berbahasa Batak dan Indonesia.",
                    "Menjadi pusat aktivitas sosial, paduan suara, dan kebaktian rutin bagi warga setempat."
                ],
                'map_embed' => $mapEmbed,
                'image' => 'https://images.unsplash.com/photo-1438283173091-5dbf5c5a3206?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'name' => 'Masjid Al-Istiqomah',
                'type' => 'Masjid',
                'address' => 'Jl. Tuparev, Karawang Wetan, Kec. Karawang Barat, Karawang',
                'details' => [
                    "Masjid yang berlokasi strategis di area niaga Karawang Barat.",
                    "Selalu ramai saat waktu sholat Dzuhur dan Ashar karena berdekatan dengan pasar dan pertokoan."
                ],
                'map_embed' => $mapEmbed,
                'image' => 'https://images.unsplash.com/photo-1519817650390-64a93db51149?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'name' => 'Gereja Pasundan Karawang',
                'type' => 'Gereja',
                'address' => 'Jl. Dr. Taruno, Adiarsa Barat, Kec. Karawang Barat, Karawang',
                'details' => [
                    "Gereja bersejarah yang memiliki gaya bangunan khas kolonial berpadu dengan arsitektur lokal.",
                    "Merupakan salah satu gereja tertua yang terus melestarikan warisan rohani di wilayah Karawang."
                ],
                'map_embed' => $mapEmbed,
                'image' => 'https://images.unsplash.com/photo-1548625361-ec8537a1c779?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'name' => 'Masjid Jami Al-Hidayah',
                'type' => 'Masjid',
                'address' => 'Jl. R.A. Kartini No. 42, Karangpawitan, Kec. Karawang Barat, Karawang',
                'details' => [
                    "Masjid yang cukup populer di area permukiman warga karena aktif menyelenggarakan kajian rutin bulanan.",
                    "Memiliki fasilitas pendidikan anak usia dini (PAUD) yang dikelola oleh yayasan setempat."
                ],
                'map_embed' => $mapEmbed,
                'image' => 'https://images.unsplash.com/photo-1564769625905-50e93615e769?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'name' => 'Gereja Bethel Indonesia (GBI) Karawang',
                'type' => 'Gereja',
                'address' => 'Komplek Pertokoan Galuh Mas, Sukaharja, Kec. Karawang Barat, Karawang',
                'details' => [
                    "Gereja berkonsep modern kontemporer yang menyewa ruangan di area komersial Galuh Mas.",
                    "Sangat diminati oleh kaum muda karena gaya ibadahnya yang dinamis dan berfokus pada pujian penyembahan."
                ],
                'map_embed' => $mapEmbed,
                'image' => 'https://images.unsplash.com/photo-1438283173091-5dbf5c5a3206?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'name' => 'Masjid An-Nur',
                'type' => 'Masjid',
                'address' => 'Jl. Kertabumi, Karawang Kulon, Kec. Karawang Barat, Karawang',
                'details' => [
                    "Masjid megah yang berada dekat dengan pusat perkantoran dan perbankan di kota Karawang.",
                    "Banyak digunakan oleh pekerja kantoran untuk ibadah sholat Jumat."
                ],
                'map_embed' => $mapEmbed,
                'image' => 'https://images.unsplash.com/photo-1542816417-0983c9c9ad53?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'name' => 'Vihara Sian Jin Ku Poh',
                'type' => 'Vihara',
                'address' => 'Jl. Mangga No.21, Nagasari, Kec. Karawang Barat, Karawang',
                'details' => [
                    "Vihara kuno yang terletak di kawasan pecinan Karawang dengan nilai sejarah yang panjang.",
                    "Sering dikunjungi oleh warga yang mencari ketenangan dan melakukan ritual doa harian."
                ],
                'map_embed' => $mapEmbed,
                'image' => 'https://images.unsplash.com/photo-1559815033-de7661b36952?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'name' => 'Masjid Al-Barkah',
                'type' => 'Masjid',
                'address' => 'Perumnas Teluk Jambe, Kec. Karawang Barat, Karawang',
                'details' => [
                    "Masjid ini terletak di area perumahan padat penduduk dan menjadi titik kumpul kegiatan warga, seperti penyembelihan hewan qurban.",
                    "Memiliki organisasi pemuda remaja masjid yang sangat aktif di bidang sosial."
                ],
                'map_embed' => $mapEmbed,
                'image' => 'https://images.unsplash.com/photo-1564769625905-50e93615e769?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'name' => 'Gereja Pantekosta di Indonesia (GPdI) Karawang',
                'type' => 'Gereja',
                'address' => 'Jl. Singaperbangsa, Nagasari, Kec. Karawang Barat, Karawang',
                'details' => [
                    "Gereja Pantekosta yang telah lama berdiri dan memiliki jemaat yang setia dari berbagai generasi.",
                    "Bangunan yang luas mampu menampung ratusan jemaat setiap kebaktian Minggu."
                ],
                'map_embed' => $mapEmbed,
                'image' => 'https://images.unsplash.com/photo-1548625361-ec8537a1c779?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'name' => 'Pura Dalem Segara',
                'type' => 'Pura',
                'address' => 'Jl. Lingkar Luar Tanjungpura, Tanjungmekar, Kec. Karawang Barat, Karawang',
                'details' => [
                    "Pura kecil yang sering dikunjungi penganut Hindu untuk beribadah saat perayaan hari suci umat Hindu.",
                    "Dikelilingi taman yang asri dan memberikan suasana hening yang khusyuk."
                ],
                'map_embed' => $mapEmbed,
                'image' => 'https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'name' => 'Masjid Baiturrahman',
                'type' => 'Masjid',
                'address' => 'Jl. Veteran No.10, Karawang Wetan, Kec. Karawang Barat, Karawang',
                'details' => [
                    "Masjid dengan nuansa hijau yang nyaman, berada tidak jauh dari jalan raya utama yang menghubungkan antar kecamatan.",
                    "Fasilitas wudhu dan toilet sangat bersih, sering menjadi tempat persinggahan musafir."
                ],
                'map_embed' => $mapEmbed,
                'image' => 'https://images.unsplash.com/photo-1584551246679-0daf3d275d0f?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'name' => 'Gereja Masehi Advent Hari Ketujuh',
                'type' => 'Gereja',
                'address' => 'Jl. Syech Quro No.112, Karawang Kulon, Kec. Karawang Barat, Karawang',
                'details' => [
                    "Gereja yang melaksanakan kebaktian utama pada hari Sabtu sesuai dengan tradisi Advent.",
                    "Jemaat juga aktif melakukan program gaya hidup sehat dan pendidikan moral bagi masyarakat sekitar."
                ],
                'map_embed' => $mapEmbed,
                'image' => 'https://images.unsplash.com/photo-1438283173091-5dbf5c5a3206?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'name' => 'Masjid Jami Al-Muhajirin',
                'type' => 'Masjid',
                'address' => 'Kawasan Bintang Alam, Telukjambe, Kec. Karawang Barat, Karawang',
                'details' => [
                    "Masjid utama bagi para pendatang dan warga perumahan Bintang Alam yang mengusung konsep toleransi dan kebersamaan.",
                    "Dilengkapi dengan taman bermain anak yang aman dan area bersantai yang rindang."
                ],
                'map_embed' => $mapEmbed,
                'image' => 'https://images.unsplash.com/photo-1519817650390-64a93db51149?q=80&w=1000&auto=format&fit=crop',
            ]
        ];

        foreach ($data as $item) {
            TempatIbadah::create($item);
        }
    }
}
