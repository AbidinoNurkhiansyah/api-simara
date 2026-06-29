<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'title' => 'Bimbingan Perkawinan (Bimwin) Pranikah Angkatan 1',
                'tag' => 'Edukasi',
                'date' => Carbon::now()->subDays(5)->format('Y-m-d'),
                'desc' => "KUA Kecamatan Karawang Barat menyelenggarakan Bimbingan Perkawinan (Bimwin) bagi calon pengantin. Kegiatan ini bertujuan untuk memberikan bekal pengetahuan, keterampilan, dan pemahaman yang komprehensif mengenai kehidupan berumah tangga, sehingga pasangan calon pengantin siap dalam menghadapi dinamika pernikahan.\n\nMateri yang disampaikan mencakup persiapan psikologis, manajemen konflik keluarga, kesehatan reproduksi, serta fiqih munakahat. Diharapkan melalui kegiatan ini, dapat terbentuk keluarga yang sakinah, mawaddah, wa rahmah serta mampu menurunkan angka perceraian dan stunting di wilayah Karawang Barat.",
                'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&q=80&w=800',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Kegiatan Bimbingan Remaja Usia Sekolah (BRUS) di SMKN 1 Karawang',
                'tag' => 'Edukasi',
                'date' => Carbon::now()->subDays(12)->format('Y-m-d'),
                'desc' => "Sebanyak 50 siswa-siswi SMKN 1 Karawang mengikuti kegiatan Bimbingan Remaja Usia Sekolah (BRUS) yang digelar oleh Kantor Urusan Agama Kecamatan Karawang Barat.\n\nDalam sesi materi, Penyuluh Agama Islam menyampaikan bahwa pernikahan dini akan melahirkan berbagai masalah, mulai dari anak stunting, terjadinya percekcokan sampai perceraian. Pendidikan agama sangat penting untuk membantu mereka memahami pentingnya menunda pernikahan hingga waktu yang tepat.",
                'image' => 'https://images.unsplash.com/photo-1529390079861-591de354faf5?auto=format&fit=crop&q=80&w=800',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Sosialisasi Sertifikasi Halal Gratis (SEHATI) bagi UMKM',
                'tag' => 'Layanan',
                'date' => Carbon::now()->subDays(20)->format('Y-m-d'),
                'desc' => "Sebagai bentuk dukungan terhadap pelaku Usaha Mikro, Kecil, dan Menengah (UMKM), KUA Karawang Barat mengadakan sosialisasi program Sertifikasi Halal Gratis (SEHATI). Program ini memfasilitasi para pelaku usaha dalam mendapatkan sertifikat halal secara mudah dan tanpa biaya melalui mekanisme self-declare.\n\nAntusiasme warga sangat tinggi dengan hadirnya lebih dari 100 pelaku UMKM kuliner di wilayah Karawang Barat yang langsung mendapatkan pendampingan proses pendaftaran.",
                'image' => 'https://images.unsplash.com/photo-1556740738-b6a63e27c4df?auto=format&fit=crop&q=80&w=800',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Pembinaan Penyuluh Agama Islam Honorer (PAIH)',
                'tag' => 'Pembinaan',
                'date' => Carbon::now()->subDays(28)->format('Y-m-d'),
                'desc' => "Kepala KUA Karawang Barat memberikan pembinaan kepada seluruh Penyuluh Agama Islam di wilayah kerjanya. Pembinaan ini berfokus pada strategi dakwah digital dan pendekatan persuasif dalam memberikan pemahaman keagamaan di masyarakat.\n\nPenyuluh agama diharapkan menjadi garda terdepan dalam menjaga kerukunan umat beragama serta menjadi sumber informasi yang valid terkait kebijakan Kementerian Agama.",
                'image' => 'https://images.unsplash.com/photo-1577563908411-50cb98976fea?auto=format&fit=crop&q=80&w=800',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Penyaluran Dana Zakat, Infaq, dan Shadaqah (ZIS)',
                'tag' => 'Sosial',
                'date' => Carbon::now()->subMonths(1)->subDays(2)->format('Y-m-d'),
                'desc' => "Bekerja sama dengan Badan Amil Zakat Nasional (BAZNAS) Kabupaten Karawang, Unit Pengumpul Zakat (UPZ) KUA Karawang Barat menyalurkan bantuan kepada mustahik yang membutuhkan. Bantuan diserahkan dalam bentuk sembako dan uang tunai untuk meringankan beban ekonomi warga prasejahtera.\n\nSelain itu, diberikan pula bantuan modal usaha kecil-kecilan kepada jamaah masjid agar dapat mandiri secara ekonomi.",
                'image' => 'https://images.unsplash.com/photo-1593113565632-a500b5220c3f?auto=format&fit=crop&q=80&w=800',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Gerakan Wakaf Uang Calon Pengantin',
                'tag' => 'Wakaf',
                'date' => Carbon::now()->subMonths(1)->subDays(15)->format('Y-m-d'),
                'desc' => "Dalam rangka meningkatkan kesadaran berwakaf, KUA Karawang Barat menginisiasi gerakan wakaf uang bagi pasangan calon pengantin. Gerakan yang bersifat sukarela ini bertujuan untuk menumbuhkan nilai-nilai filantropi Islam sebelum melangkah ke jenjang pernikahan.\n\nDana wakaf yang terkumpul akan dikelola oleh Nazhir resmi dan hasilnya dimanfaatkan untuk beasiswa pendidikan serta pembangunan fasilitas ibadah.",
                'image' => 'https://images.unsplash.com/photo-1579621970588-a35d0e7ab9b6?auto=format&fit=crop&q=80&w=800',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Ikrar Masuk Islam (Mualaf) di KUA Karawang Barat',
                'tag' => 'Layanan',
                'date' => Carbon::now()->subMonths(2)->format('Y-m-d'),
                'desc' => "Alhamdulillah, KUA Karawang Barat telah memfasilitasi prosesi pembacaan dua kalimat syahadat bagi seorang warga yang dengan penuh kesadaran dan tanpa paksaan memilih Islam sebagai jalan hidupnya.\n\nProsesi ikrar ini disaksikan langsung oleh Kepala KUA, Penyuluh Agama, dan beberapa tokoh agama setempat. Setelah ikrar, KUA memberikan bimbingan awal tentang rukun Islam dan rukun Iman serta menyerahkan sertifikat mualaf untuk keperluan administrasi.",
                'image' => 'https://images.unsplash.com/photo-1584824486509-112e4181ff39?auto=format&fit=crop&q=80&w=800',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Rapat Koordinasi Lintas Sektoral Kecamatan',
                'tag' => 'Koordinasi',
                'date' => Carbon::now()->subMonths(2)->subDays(10)->format('Y-m-d'),
                'desc' => "Kepala KUA menghadiri Rapat Koordinasi (Rakor) Lintas Sektoral tingkat Kecamatan Karawang Barat. Pertemuan yang dihadiri oleh Camat, Kapolsek, Danramil, dan para Kepala Desa ini membahas isu-isu strategis, termasuk penanganan stunting, ketertiban masyarakat, dan persiapan perayaan hari besar keagamaan.\n\nKUA Karawang Barat berkomitmen penuh mendukung program pemerintah daerah melalui pendekatan keagamaan di masyarakat.",
                'image' => 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&q=80&w=800',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Pengukuran Arah Kiblat Masjid Baru',
                'tag' => 'Layanan',
                'date' => Carbon::now()->subMonths(3)->format('Y-m-d'),
                'desc' => "Tim Hisab Rukyat KUA Karawang Barat melakukan pengukuran dan kalibrasi arah kiblat untuk sebuah masjid yang baru dibangun di perumahan warga. Pengukuran menggunakan instrumen theodolit dan bantuan bayangan matahari (rashdul qiblah) untuk memastikan akurasi arah yang presisi.\n\nLayanan kalibrasi arah kiblat ini merupakan wujud pelayanan gratis (zero cost) KUA untuk menjamin kesempurnaan ibadah shalat umat Islam.",
                'image' => 'https://images.unsplash.com/photo-1565552643952-b6732c589006?auto=format&fit=crop&q=80&w=800',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Launching Program KUA Pemberdayaan Ekonomi Umat',
                'tag' => 'Pemberdayaan',
                'date' => Carbon::now()->subMonths(4)->format('Y-m-d'),
                'desc' => "Sebagai role model KUA Revitalisasi, KUA Karawang Barat meluncurkan program Pemberdayaan Ekonomi Umat (PEU). Program ini memfasilitasi keluarga prasejahtera binaan KUA dengan bantuan modal usaha, pelatihan kewirausahaan, dan pendampingan bisnis.\n\nDiharapkan melalui program PEU ini, keluarga prasejahtera binaan dapat meningkatkan taraf hidup mereka, mengubah status dari mustahik (penerima zakat) menjadi muzakki (pemberi zakat) di masa depan.",
                'image' => 'https://images.unsplash.com/photo-1553729459-efe14ef6055d?auto=format&fit=crop&q=80&w=800',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('programs')->insert($programs);
    }
}
