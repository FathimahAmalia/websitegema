<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Berita;
use App\Models\Jurusan;
use App\Models\Ekstrakurikuler;
use App\Models\Prestasi;
use App\Models\Galeri;
use App\Models\PpdbPendaftaran;
use App\Models\PesanKontak;
use App\Models\Agenda;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Super Admin User
        User::updateOrCreate(
            ['email' => 'admin@smkgemacyber.sch.id'],
            [
                'name' => 'Administrator Utama',
                'password' => Hash::make('password123'),
                'role' => 'superadmin',
                'phone' => '081234567890',
            ]
        );

        // 2. Berita & Artikel
        if (Berita::count() === 0) {
            $beritaData = [
                [
                    'title' => 'Siswa SMK Gema Cyber Raih Medali Emas LKS Tingkat Provinsi Bidang Cyber Security',
                    'slug' => 'siswa-smk-gema-cyber-raih-emas-lks-cyber-security',
                    'category' => 'Prestasi',
                    'category_slug' => 'prestasi',
                    'author' => 'Humas & Kominfo',
                    'author_role' => 'Tim Media SMK Gema Cyber School',
                    'read_time' => '4 Menit Baca',
                    'views' => 1845,
                    'image' => 'images/berita-lks-cyber.png',
                    'image_caption' => 'Penyerahan medali emas LKS SMK Tingkat Provinsi Bidang Cyber Security Tahun 2026.',
                    'is_featured' => true,
                    'excerpt' => 'Prestasi membanggakan kembali diukir kontingen siswa jurusan TJKT SMK Gema Cyber School setelah melalui 3 babak penugasan network defense dan ethical hacking.',
                    'body' => '<p class="lead-text">Prestasi membanggakan kembali dipersembahkan oleh peserta didik SMK Gema Cyber School dalam ajang bergengsi Lomba Kompetensi Siswa (LKS) SMK Tingkat Provinsi tahun 2026.</p><p>Ajang LKS Cyber Security tahun ini menghadirkan skenario simulasi ancaman digital berskala enterprise.</p>',
                    'tags' => json_encode(['LKS 2026', 'Cyber Security', 'TJKT', 'Prestasi Siswa', 'Vokasi Juara']),
                    'published_at' => '2026-10-18',
                ],
                [
                    'title' => 'Kunjungan Industri & Penandatanganan MoU Kelas Khusus Bersama PT Telkom Indonesia',
                    'slug' => 'kunjungan-industri-mou-kelas-khusus-pt-telkom',
                    'category' => 'Kerjasama',
                    'category_slug' => 'kerjasama',
                    'author' => 'Bursa Kerja Khusus (BKK)',
                    'author_role' => 'Koordinator Hubungan Industri',
                    'read_time' => '5 Menit Baca',
                    'views' => 1420,
                    'image' => 'images/berita-mou-industri.png',
                    'image_caption' => 'Penandatanganan Memorandum of Understanding (MoU) Kelas Khusus Industri.',
                    'is_featured' => false,
                    'excerpt' => 'Penyelarasan kurikulum berbasis industri telekomunikasi modern dan komitmen kuota magang prioritas serta rekrutmen kerja langsung.',
                    'body' => '<p>Sebagai wujud nyata implementasi konsep Link and Match 8+i vokasi, SMK Gema Cyber School meresmikan kerja sama strategis dengan PT Telkom Indonesia.</p>',
                    'tags' => json_encode(['MoU', 'Telkom Indonesia', 'Teaching Factory', 'Magang', 'Link & Match']),
                    'published_at' => '2026-10-12',
                ],
                [
                    'title' => 'Pelaksanaan Uji Sertifikasi Kompetensi (USK) BNSP Tahun Ajaran 2026 Berjalan Sukses',
                    'slug' => 'pelaksanaan-uji-sertifikasi-kompetensi-bnsp-2026',
                    'category' => 'Akademik',
                    'category_slug' => 'akademik',
                    'author' => 'LSP-P1 SMK Gema Cyber',
                    'author_role' => 'Lembaga Sertifikasi Profesi',
                    'read_time' => '3 Menit Baca',
                    'views' => 980,
                    'image' => 'images/berita-ukk-bnsp.png',
                    'image_caption' => 'Pelaksanaan uji praktik kejuruan di bawah pengawasan asesor berlisensi BNSP.',
                    'is_featured' => false,
                    'excerpt' => 'Seluruh peserta didik tingkat akhir menyelesaikan serangkaian uji teknis kompetensi profesi di hadapan tim asesor independen berlisensi resmi.',
                    'body' => '<p>Lembaga Sertifikasi Profesi Pihak Pertama (LSP-P1) SMK Gema Cyber School sukses menyelenggarakan agenda tahunan Uji Sertifikasi Kompetensi (USK).</p>',
                    'tags' => json_encode(['Sertifikasi BNSP', 'USK 2026', 'SKKNI', 'Kelulusan', 'Vokasi Unggul']),
                    'published_at' => '2026-10-05',
                ],
                [
                    'title' => 'Workshop Artificial Intelligence & Big Data: Mempersiapkan Siswa Memasuki Industri Digital 5.0',
                    'slug' => 'workshop-artificial-intelligence-big-data-industri-5',
                    'category' => 'Teknologi',
                    'category_slug' => 'teknologi',
                    'author' => 'Cyber Lab Coordinator',
                    'author_role' => 'Pusat Riset Teknologi Sekolah',
                    'read_time' => '4 Menit Baca',
                    'views' => 1125,
                    'image' => 'images/fasilitas-lab-komputer-2x.png',
                    'image_caption' => 'Peserta workshop mempraktikkan coding machine learning pada lab komputer terpadu.',
                    'is_featured' => false,
                    'excerpt' => 'Menghadirkan praktisi data scientist ternama, siswa dibekali keterampilan Machine Learning dasar dan analitik data.',
                    'body' => '<p>Dalam rangka memperluas wawasan teknologi masa depan, SMK Gema Cyber School mengadakan workshop intensif bertajuk Mastering Applied AI.</p>',
                    'tags' => json_encode(['Artificial Intelligence', 'Data Science', 'Python', 'Workshop']),
                    'published_at' => '2026-09-28',
                ],
            ];

            foreach ($beritaData as $item) {
                Berita::create($item);
            }
        }

        // 3. Jurusan (4 Program Keahlian)
        if (Jurusan::count() === 0) {
            $jurusans = [
                [
                    'slug' => 'tjkt',
                    'name' => 'Teknik Jaringan Komputer & Telekomunikasi',
                    'short_name' => 'TJKT',
                    'code' => 'TJKT-01',
                    'head_of_program' => 'Ir. Reza Firmansyah, S.Kom, CEH',
                    'accent_color' => '#2563eb',
                    'icon' => 'bi-hdd-network',
                    'image' => 'images/jurusan-tjkt-hd.png',
                    'description' => 'Program TJKT membekali peserta didik dengan pemahaman dan keterampilan praktik di bidang komputer, jaringan broadband, cloud computing, cybersecurity, dan telekomunikasi berstandar industri.',
                    'vision' => 'Menjadi pusat pendidikan vokasi teknologi jaringan dan keamanan siber unggulan di tingkat nasional.',
                    'mission' => 'Menyelenggarakan pembelajaran berbasis proyek industri, sertifikasi internasional MikroTik/Cisco, dan teaching factory.',
                    'career_prospects' => json_encode(['Network Administrator', 'Cloud & Systems Engineer', 'Cyber Security Analyst', 'IT Support Specialist', 'Fiber Optic Technician']),
                    'competencies' => json_encode(['Administrasi Jaringan & Routing', 'Keamanan Jaringan & Ethical Hacking', 'Konfigurasi Server Linux & Windows', 'Instalasi & Penyambungan Fiber Optic']),
                    'facilities' => json_encode(['Smart Cyber Security Lab', 'MikroTik Academy Center', 'Server Rack & Data Center Simulation', 'Fiber Optic Splicing Tools']),
                    'is_active' => true,
                ],
                [
                    'slug' => 'akl',
                    'name' => 'Akuntansi dan Keuangan Lembaga',
                    'short_name' => 'AKL',
                    'code' => 'AKL-02',
                    'head_of_program' => 'Sri Rahayu, S.E., M.Ak.',
                    'accent_color' => '#059669',
                    'icon' => 'bi-calculator',
                    'image' => 'images/jurusan-akl-hd.png',
                    'description' => 'Program AKL mempelajari proses pencatatan dan pelaporan keuangan pada perusahaan modern dengan software akuntansi berbasis cloud, spreadsheet tingkat lanjut, dan kepatuhan perpajakan.',
                    'vision' => 'Mencetak tenaga akuntansi madya yang berintegritas tinggi, teliti, dan adaptif terhadap teknologi keuangan digital.',
                    'mission' => 'Mengintegrasikan kurikulum akuntansi dengan aplikasi Accurate, MYOB, dan sistem e-Faktur perpajakan.',
                    'career_prospects' => json_encode(['Staff Administrasi Keuangan', 'Junior Auditor', 'Staff Perpajakan / Tax Officer', 'Staff Penggajian & Payroll', 'Teller & Customer Service Bank']),
                    'competencies' => json_encode(['Siklus Akuntansi Perusahaan Jasa & Dagang', 'Aplikasi Akuntansi Komputer (Accurate/MYOB)', 'Administrasi Perpajakan Digital & e-SPT', 'Pengelolaan Kas Kecil & Rekonsiliasi Bank']),
                    'facilities' => json_encode(['Lab Mini Banking & Kasir', 'Lab Komputer Akuntansi Terpadu', 'Software Akuntansi Berlisensi', 'Simulasi Ruang Audit']),
                    'is_active' => true,
                ],
                [
                    'slug' => 'mplb',
                    'name' => 'Manajemen Perkantoran dan Layanan Bisnis',
                    'short_name' => 'MPLB',
                    'code' => 'MPLB-03',
                    'head_of_program' => 'Dra. Ratna Dewi, M.Pd.',
                    'accent_color' => '#ea580c',
                    'icon' => 'bi-briefcase',
                    'image' => 'images/jurusan-mplb-hd.png',
                    'description' => 'Program MPLB mengembangkan kompetensi administrasi perkantoran modern, digital archiving, komunikasi bisnis profesional, public relations, dan layanan pelanggan prima.',
                    'vision' => 'Menghasilkan tenaga administrasi perkantoran yang profesional, komunikatif, dan terampil dalam automasi kantor cerdas.',
                    'mission' => 'Menerapkan pembelajaran perkantoran digital berbasis paperless office dan layanan prima.',
                    'career_prospects' => json_encode(['Administrative Assistant', 'Sekretaris Junior', 'Customer Service Representative', 'Arsiparis Digital', 'Staf Humas & Protokoler']),
                    'competencies' => json_encode(['Otomatisasi Tata Kelola Perkantoran', 'Kearsipan Digital & Cloud Storage', 'Komunikasi & Korespondensi Bisnis', 'Manajemen Rapat & Protokoler']),
                    'facilities' => json_encode(['Ruang Simulasi Perkantoran Modern', 'Lab Otomasi Kantor & Mesin Bisnis', 'Studio Komunikasi & Meja Resepsionis', 'Perangkat Kearsipan Elektronik']),
                    'is_active' => true,
                ],
                [
                    'slug' => 'logistik',
                    'name' => 'Teknik Manajemen Logistik',
                    'short_name' => 'Logistik',
                    'code' => 'LOG-04',
                    'head_of_program' => 'Haryanto, S.T., M.T.',
                    'accent_color' => '#7c3aed',
                    'icon' => 'bi-boxes',
                    'image' => 'images/card-photo-logistik.png',
                    'description' => 'Mempersiapkan tenaga ahli dalam manajemen pergudangan cerdas, rantai pasok (supply chain), penanganan kargo darat/laut/udara, serta sistem inventori terintegrasi ERP.',
                    'vision' => 'Menjadi pusat rujukan vokasi manajemen rantai pasok dan pergudangan modern.',
                    'mission' => 'Melatih kecakapan tata kelola gudang dengan standar Warehouse Management System (WMS) dan 5S industri.',
                    'career_prospects' => json_encode(['Warehouse Supervisor', 'Supply Chain Coordinator', 'Freight Forwarding Specialist', 'Inventory Controller', 'Logistics Dispatcher']),
                    'competencies' => json_encode(['Operasional Pergudangan & Tata Letak', 'Sistem Manajemen Inventori (WMS)', 'Dokumentasi Ekspor-Impor & Bea Cukai', 'Keselamatan & Kesehatan Kerja (K3) Logistik']),
                    'facilities' => json_encode(['Mini Warehouse & Racking System', 'Barcode & RFID Scanner Logistics', 'Forklift Simulator Station', 'Ruang Kontrol Rantai Pasok']),
                    'is_active' => true,
                ],
            ];

            foreach ($jurusans as $j) {
                Jurusan::create($j);
            }
        }

        // 4. Ekstrakurikuler
        if (Ekstrakurikuler::count() === 0) {
            $ekskuls = [
                [
                    'name' => 'Cyber Security Club',
                    'slug' => 'cyber-security',
                    'category' => 'Teknologi & IT',
                    'category_slug' => 'teknologi',
                    'tagline' => 'Ethical Hacking, Network Defense & CTF',
                    'description' => 'Wadah bagi siswa yang tertarik mendalami keamanan siber, simulasi ethical hacking, analisis kerentanan sistem, dan pertahanan jaringan secara bertanggung jawab.',
                    'schedule' => 'Rabu & Jumat, 15.30 - 17.30 WIB',
                    'days' => 'Rabu, Jumat',
                    'time' => '15.30 - 17.30 WIB',
                    'location' => 'Lab Jaringan & Cyber Security (Lt. 2)',
                    'instructor' => 'Ir. Reza Firmansyah, S.Kom, CEH',
                    'instructor_role' => 'Praktisi Cyber Security',
                    'members_count' => '36 Siswa',
                    'badge' => 'Unggulan IT',
                    'icon' => 'bi-shield-lock-fill',
                    'color' => '#2563eb',
                    'background' => '#eff6ff',
                    'achievements' => 'Juara 1 LKS Cyber Security Tingkat Kota 2025, Top 5 Hackathon Pelajar Nasional',
                    'requirements' => 'Terbuka untuk semua jurusan dengan minat tinggi di bidang TI.',
                    'image' => 'images/ekskul/cyber-security.jpg',
                ],
                [
                    'name' => 'Robotika & Internet of Things (IoT)',
                    'slug' => 'robotika-iot',
                    'category' => 'Teknologi & IT',
                    'category_slug' => 'teknologi',
                    'tagline' => 'Mikrokontroler, Otomasi & Smart Devices',
                    'description' => 'Mengeksplorasi perancangan perangkat keras cerdas, pemrograman mikrokontroler Arduino/ESP32, sensor industri, dan sistem otomasi masa depan.',
                    'schedule' => 'Selasa & Kamis, 15.30 - 17.30 WIB',
                    'days' => 'Selasa, Kamis',
                    'time' => '15.30 - 17.30 WIB',
                    'location' => 'Lab Hardware & IoT Cyber School',
                    'instructor' => 'Hendra Wijaya, S.T',
                    'instructor_role' => 'Hardware Engineer',
                    'members_count' => '28 Siswa',
                    'badge' => 'Inovasi Digital',
                    'icon' => 'bi-robot',
                    'color' => '#059669',
                    'background' => '#ecfdf5',
                    'achievements' => 'Medali Perak Kontes Robotika Nasional Kategori IoT Smart City 2025',
                    'requirements' => 'Memiliki ketertarikan pada komponen elektronika dan pemrograman logika.',
                    'image' => 'images/ekskul/robotika-iot.jpg',
                ],
                [
                    'name' => 'Software & Web Dev Club',
                    'slug' => 'web-app-dev',
                    'category' => 'Teknologi & IT',
                    'category_slug' => 'teknologi',
                    'tagline' => 'Frontend, Backend, & Full-Stack Coding',
                    'description' => 'Belajar membangun aplikasi web modern, RESTful API, database relational, serta kolaborasi kode profesional menggunakan Git & GitHub.',
                    'schedule' => 'Senin & Kamis, 15.30 - 17.00 WIB',
                    'days' => 'Senin, Kamis',
                    'time' => '15.30 - 17.00 WIB',
                    'location' => 'Lab Rekayasa Perangkat Lunak 1',
                    'instructor' => 'Dimas Prasetyo, M.Kom',
                    'instructor_role' => 'Senior Fullstack Web Developer',
                    'members_count' => '42 Siswa',
                    'badge' => 'Fullstack Dev',
                    'icon' => 'bi-code-slash',
                    'color' => '#0284c7',
                    'background' => '#f0f9ff',
                    'achievements' => 'Juara 2 Web Technologies Vocational Cup 2025',
                    'requirements' => 'Tertarik membuat website atau aplikasi digital.',
                    'image' => 'images/ekskul/web-app-dev.jpg',
                ],
                [
                    'name' => 'Futsal & Mini Soccer Club',
                    'slug' => 'futsal',
                    'category' => 'Olahraga & E-Sport',
                    'category_slug' => 'olahraga',
                    'tagline' => 'Taktik Cepat, Stamina Prima & Jiwa Juara',
                    'description' => 'Melatih kemampuan teknik dasar olah bola, pemahaman formasi permainan cepat, peningkatan ketahanan fisik, serta sportivitas kompetisi.',
                    'schedule' => 'Senin & Rabu, 16.00 - 18.00 WIB',
                    'days' => 'Senin, Rabu',
                    'time' => '16.00 - 18.00 WIB',
                    'location' => 'Lapangan Futsal Outdoor Standar Nasional',
                    'instructor' => 'Coach Rizky Pratama, S.Pd',
                    'instructor_role' => 'Pelatih Lisensi Grassroots AFC',
                    'members_count' => '40 Siswa',
                    'badge' => 'Populer',
                    'icon' => 'bi-trophy-fill',
                    'color' => '#16a34a',
                    'background' => '#f0fdf4',
                    'achievements' => 'Juara 1 Turnamen Futsal Pelajar Cyber Cup 2025',
                    'requirements' => 'Membawa perlengkapan sepatu futsal dan pelindung kaki.',
                    'image' => 'images/ekskul/futsal.jpg',
                ],
                [
                    'name' => 'Paskibra (Gema Dwi Warna)',
                    'slug' => 'paskibra',
                    'category' => 'Kepemimpinan & Bela Negara',
                    'category_slug' => 'kepemimpinan',
                    'tagline' => 'Disiplin Tinggi, Kekompakan, & Cinta Tanah Air',
                    'description' => 'Menggembleng karakter kepemimpinan, ketahanan fisik, ketegasan sikap, dan kesempurnaan baris-berbaris untuk upacara kenegaraan.',
                    'schedule' => 'Selasa & Jumat, 15.30 - 17.30 WIB',
                    'days' => 'Selasa, Jumat',
                    'time' => '15.30 - 17.30 WIB',
                    'location' => 'Lapangan Upacara Utama',
                    'instructor' => 'Serka (Purn) Bambang S.',
                    'instructor_role' => 'Pelatih Paskibra Berlisensi PPI Kota',
                    'members_count' => '50 Siswa',
                    'badge' => 'Disiplin Juara',
                    'icon' => 'bi-flag-fill',
                    'color' => '#dc2626',
                    'background' => '#fef2f2',
                    'achievements' => 'Juara Umum 1 Lomba Ketangkasan Baris Berbaris Tingkat Kota 2025',
                    'requirements' => 'Sehat jasmani dan rohani serta siap disiplin waktu.',
                    'image' => 'images/ekskul/paskibra.jpg',
                ],
            ];

            foreach ($ekskuls as $ekskul) {
                Ekstrakurikuler::create($ekskul);
            }
        }

        // 5. Prestasi
        if (Prestasi::count() === 0) {
            $prestasis = [
                [
                    'title' => 'Juara 1 LKS Tingkat Nasional Bidang Cloud Computing & Cyber Defense',
                    'event' => 'Lomba Kompetensi Siswa (LKS) SMK Tingkat Nasional XXXIII 2025',
                    'level' => 'Tingkat Nasional',
                    'level_slug' => 'nasional',
                    'level_badge' => 'danger',
                    'year' => '2025',
                    'category' => 'Teknologi & IT',
                    'category_slug' => 'teknologi',
                    'medal' => 'Medali Emas / Juara 1',
                    'medal_icon' => 'bi-trophy-fill',
                    'medal_color' => '#f59e0b',
                    'image' => 'images/prestasi/lks-cyber-security.jpg',
                    'students' => 'Muhammad Farhan Pratama & Tim Cyber Shield (XII TJKT 1)',
                    'instructor' => 'Dimas Prasetyo, M.Kom & Tim Cisco Academy',
                    'date' => '24 - 29 Oktober 2025',
                    'location' => 'Jakarta Convention Center (JCC) Senayan',
                    'organizer' => 'Pusat Prestasi Nasional (Puspresnas) Kemendikbudristek RI',
                    'description' => 'Meraih nilai tertinggi 98.4/100 dalam simulasi mitigasi insiden siber, penetrasi server cloud multi-region, dan zero-trust defense.',
                    'highlights' => json_encode(['Nilai sempurna 100/100 pada modul Live Incident Response', 'Medallion for Excellence dari asosiasi industri']),
                ],
                [
                    'title' => 'Medali Perak IoT Smart City & Automated Systems',
                    'event' => 'National Vocational Robotics & IoT Championship 2025',
                    'level' => 'Tingkat Nasional',
                    'level_slug' => 'nasional',
                    'level_badge' => 'danger',
                    'year' => '2025',
                    'category' => 'Teknologi & IT',
                    'category_slug' => 'teknologi',
                    'medal' => 'Medali Perak / Juara 2',
                    'medal_icon' => 'bi-award-fill',
                    'medal_color' => '#94a3b8',
                    'image' => 'images/prestasi/iot-robotics-champion.jpg',
                    'students' => 'Ahmad Fauzi & Bagas Wicaksono (XI TJKT 2)',
                    'instructor' => 'Bayu Nugroho, S.T.',
                    'date' => '12 - 15 September 2025',
                    'location' => 'Pusat Sains & Teknologi UI, Depok',
                    'organizer' => 'Kementerian Perindustrian & Asosiasi Robotika Vokasi',
                    'description' => 'Mengembangkan prototipe sistem Smart Flood Barrier berbasis micro-sensor LoRaWAN dan telemetri bertenaga surya.',
                    'highlights' => json_encode(['Response time sistem sensor teruji < 1.2 detik', 'Efisiensi daya mencapai 85%']),
                ],
                [
                    'title' => 'Juara 1 National Accounting & Digital Taxation Competition (NAC)',
                    'event' => 'National Accounting Challenge & Financial Audit Forum 2025',
                    'level' => 'Tingkat Nasional',
                    'level_slug' => 'nasional',
                    'level_badge' => 'danger',
                    'year' => '2025',
                    'category' => 'Bisnis & Akuntansi',
                    'category_slug' => 'akuntansi',
                    'medal' => 'Juara 1 Umum',
                    'medal_icon' => 'bi-trophy-fill',
                    'medal_color' => '#f59e0b',
                    'image' => 'images/prestasi/accounting-competition.jpg',
                    'students' => 'Siti Nur Aisyah & Nabila Ramadhani (XII AKL 1)',
                    'instructor' => 'Sri Rahayu, S.E., M.Ak.',
                    'date' => '5 - 8 Agustus 2025',
                    'location' => 'Auditorium Magister Akuntansi FEB UGM',
                    'organizer' => 'Ikatan Akuntan Indonesia (IAI)',
                    'description' => 'Keunggulan mutlak dalam pemecahan kasus audit laporan keuangan korporat multinasional dan rekonsiliasi e-Faktur terkomputerisasi.',
                    'highlights' => json_encode(['Penyelesaian studi kasus pembukuan tercepat dengan presisi 99.8%', 'Mengalahkan 64 kontingen se-Indonesia']),
                ],
            ];

            foreach ($prestasis as $p) {
                Prestasi::create($p);
            }
        }

        // 6. Galeri Dokumentasi
        if (Galeri::count() === 0) {
            $galeris = [
                [
                    'title' => 'Wisuda & Pelepasan Siswa Angkatan IX',
                    'category_slug' => 'event',
                    'category_label' => 'Agenda Sekolah',
                    'date' => '20 Juni 2026',
                    'location' => 'Grand Ballroom Auditorium',
                    'photographer' => 'Tim Humas & Publikasi Sekolah',
                    'image' => 'images/galeri/wisuda.jpg',
                    'description' => 'Prosesi khidmat wisuda dan pelepasan 320 lulusan SMK Gema Cyber School yang telah siap memasuki dunia kerja.',
                ],
                [
                    'title' => 'Praktikum Uji Penetrasi Jaringan & Cyber Defense',
                    'category_slug' => 'pembelajaran',
                    'category_label' => 'Pembelajaran Praktik',
                    'date' => '14 Mei 2026',
                    'location' => 'Laboratorium Cyber Security TJKT',
                    'photographer' => 'Laboran & Guru Pembimbing',
                    'image' => 'images/prestasi/lks-cyber-security.jpg',
                    'description' => 'Aktivitas belajar praktik siswa jurusan Teknik Jaringan Komputer dalam menguji sistem keamanan server.',
                ],
                [
                    'title' => 'Penganugerahan Medali Emas Juara 1 LKS Nasional',
                    'category_slug' => 'prestasi',
                    'category_label' => 'Prestasi Siswa',
                    'date' => '28 Agustus 2025',
                    'location' => 'Jakarta Convention Center (JCC)',
                    'photographer' => 'Puspresnas Kemendikbudristek RI',
                    'image' => 'images/prestasi/doc-podium.jpg',
                    'description' => 'Momen kebanggaan penganugerahan medali emas dan trofi kejuaraan LKS Nasional.',
                ],
                [
                    'title' => 'Perakitan & Uji Coba Robot Otonom Klub Robotika',
                    'category_slug' => 'ekskul',
                    'category_label' => 'Ekstrakurikuler',
                    'date' => '10 Februari 2026',
                    'location' => 'Ruang Workshop Robotika & IoT',
                    'photographer' => 'Pembina Robotika',
                    'image' => 'images/ekskul/robotika-iot.jpg',
                    'description' => 'Siswa merakit purwarupa robot autonomous dengan modul sensor canggih.',
                ],
            ];

            foreach ($galeris as $g) {
                Galeri::create($g);
            }
        }

        // 7. PPDB Registrations Demo Data
        if (PpdbPendaftaran::count() === 0) {
            $ppdbList = [
                [
                    'nomor_pendaftaran' => 'PPDB-2026-0001',
                    'nama_lengkap' => 'Muhammad Bintang Pratama',
                    'nisn' => '0078129384',
                    'nik' => '3271012903080001',
                    'jenis_kelamin' => 'Laki-laki',
                    'tempat_lahir' => 'Bandung',
                    'tanggal_lahir' => '2010-05-14',
                    'agama' => 'Islam',
                    'no_hp' => '081298765432',
                    'email' => 'bintang.pratama@gmail.com',
                    'alamat' => 'Jl. Sukajadi No. 45, Bandung',
                    'asal_sekolah' => 'SMP Negeri 1 Bandung',
                    'pilihan_jurusan_1' => 'Teknik Jaringan Komputer & Telekomunikasi (TJKT)',
                    'pilihan_jurusan_2' => 'Teknik Manajemen Logistik',
                    'nama_orang_tua' => 'Bambang Supriyanto',
                    'no_hp_orang_tua' => '081324567890',
                    'jalur_pendaftaran' => 'Prestasi Akademik',
                    'status' => 'Diterima',
                    'catatan_admin' => 'Dokumen lengkap, nilai rapor semester 1-5 rata-rata 89.5. Lolos tes wawancara.',
                ],
                [
                    'nomor_pendaftaran' => 'PPDB-2026-0002',
                    'nama_lengkap' => 'Aisyah Putri Rahmadani',
                    'nisn' => '0089234512',
                    'nik' => '3271014508080002',
                    'jenis_kelamin' => 'Perempuan',
                    'tempat_lahir' => 'Bandung',
                    'tanggal_lahir' => '2010-08-20',
                    'agama' => 'Islam',
                    'no_hp' => '085712349876',
                    'email' => 'aisyah.putri@yahoo.com',
                    'alamat' => 'Jl. Cihampelas No. 102, Bandung',
                    'asal_sekolah' => 'SMP Negeri 5 Bandung',
                    'pilihan_jurusan_1' => 'Akuntansi dan Keuangan Lembaga (AKL)',
                    'pilihan_jurusan_2' => 'Manajemen Perkantoran dan Layanan Bisnis (MPLB)',
                    'nama_orang_tua' => 'H. Rahmat Hidayat',
                    'no_hp_orang_tua' => '081223344556',
                    'jalur_pendaftaran' => 'Reguler',
                    'status' => 'Diverifikasi',
                    'catatan_admin' => 'Sudah verifikasi berkas asli di loket PPDB. Menunggu jadwal tes peminatan.',
                ],
                [
                    'nomor_pendaftaran' => 'PPDB-2026-0003',
                    'nama_lengkap' => 'Jonathan Bryan Sinaga',
                    'nisn' => '0076543210',
                    'nik' => '3271021201080003',
                    'jenis_kelamin' => 'Laki-laki',
                    'tempat_lahir' => 'Medan',
                    'tanggal_lahir' => '2010-01-12',
                    'agama' => 'Kristen',
                    'no_hp' => '087812903487',
                    'email' => 'bryan.sinaga@gmail.com',
                    'alamat' => 'Komplek Permata Buana Blok C3 No. 12',
                    'asal_sekolah' => 'SMP Swasta Bintang Kejora',
                    'pilihan_jurusan_1' => 'Teknik Jaringan Komputer & Telekomunikasi (TJKT)',
                    'pilihan_jurusan_2' => 'Akuntansi dan Keuangan Lembaga (AKL)',
                    'nama_orang_tua' => 'Robert Sinaga',
                    'no_hp_orang_tua' => '081398761234',
                    'jalur_pendaftaran' => 'Reguler',
                    'status' => 'Menunggu Verifikasi',
                    'catatan_admin' => 'Menunggu kelengkapan scan kartu keluarga dan surat keterangan lulus.',
                ],
                [
                    'nomor_pendaftaran' => 'PPDB-2026-0004',
                    'nama_lengkap' => 'Siti Maulida Zahra',
                    'nisn' => '0081239845',
                    'nik' => '3271035511080004',
                    'jenis_kelamin' => 'Perempuan',
                    'tempat_lahir' => 'Cimahi',
                    'tanggal_lahir' => '2010-11-25',
                    'agama' => 'Islam',
                    'no_hp' => '089612345678',
                    'email' => 'maulida.zahra@gmail.com',
                    'alamat' => 'Jl. Raya Cibabat No. 88, Cimahi',
                    'asal_sekolah' => 'SMP Negeri 2 Cimahi',
                    'pilihan_jurusan_1' => 'Manajemen Perkantoran dan Layanan Bisnis (MPLB)',
                    'pilihan_jurusan_2' => 'Akuntansi dan Keuangan Lembaga (AKL)',
                    'nama_orang_tua' => 'Deden Kurnia',
                    'no_hp_orang_tua' => '085212347890',
                    'jalur_pendaftaran' => 'Afirmasi KIP',
                    'status' => 'Diterima',
                    'catatan_admin' => 'Lolos verifikasi KIP dan wawancara kesiswaan.',
                ],
                [
                    'nomor_pendaftaran' => 'PPDB-2026-0005',
                    'nama_lengkap' => 'Rangga Aditya Pratama',
                    'nisn' => '0073456789',
                    'nik' => '3271040304080005',
                    'jenis_kelamin' => 'Laki-laki',
                    'tempat_lahir' => 'Bandung',
                    'tanggal_lahir' => '2010-04-03',
                    'agama' => 'Islam',
                    'no_hp' => '082199887766',
                    'email' => 'rangga.aditya@gmail.com',
                    'alamat' => 'Jl. Gatot Subroto No. 210, Bandung',
                    'asal_sekolah' => 'SMP Terbuka 3',
                    'pilihan_jurusan_1' => 'Teknik Manajemen Logistik',
                    'pilihan_jurusan_2' => 'Manajemen Perkantoran dan Layanan Bisnis (MPLB)',
                    'nama_orang_tua' => 'Agus Pratama',
                    'no_hp_orang_tua' => '081244556677',
                    'jalur_pendaftaran' => 'Reguler',
                    'status' => 'Menunggu Verifikasi',
                    'catatan_admin' => 'Pendaftaran online baru masuk via sistem.',
                ],
            ];

            foreach ($ppdbList as $p) {
                PpdbPendaftaran::create($p);
            }
        }

        // 8. Pesan Kontak Demo Data
        if (PesanKontak::count() === 0) {
            $pesans = [
                [
                    'nama' => 'Drs. Hendro Wibowo',
                    'email' => 'hendro.wibowo@kemdikbud.go.id',
                    'no_hp' => '081233445566',
                    'subjek' => 'Permohonan Kunjungan Verifikasi SMK Pusat Keunggulan',
                    'pesan' => 'Selamat siang pimpinan SMK Gema Cyber School. Kami dari tim verifikasi pusat berencana melakukan monitoring evaluasi program SMK PK skema lanjutan pada awal bulan depan. Mohon konfirmasi kesiapan sarana dan tim kurikulum.',
                    'status_dibaca' => true,
                    'catatan_balasan' => 'Telah dikonfirmasi via email resmi humas pada 27 Oktober 2026.',
                ],
                [
                    'nama' => 'Ibu Maya Indrayani (Orang Tua Calon Siswa)',
                    'email' => 'maya.indrayani@gmail.com',
                    'no_hp' => '087822334455',
                    'subjek' => 'Pertanyaan Syarat Jalur Prestasi PPDB T.A 2027/2028',
                    'pesan' => 'Halo admin, anak saya saat ini juara 1 catur tingkat kota dan juara olimpiade sains. Apakah sertifikat tersebut bisa digunakan untuk jalur beasiswa bebas DSP di jurusan TJKT? Mohon informasi jadwal seleksinya.',
                    'status_dibaca' => false,
                    'catatan_balasan' => null,
                ],
                [
                    'nama' => 'HRD PT Solusi Digital Pratama',
                    'email' => 'career@solusidigital.id',
                    'no_hp' => '081198765432',
                    'subjek' => 'Peluang Rekrutmen BKK untuk Lulusan TJKT & AKL',
                    'pesan' => 'Kami dari tim talent acquisition PT Solusi Digital Pratama ingin menawarkan kerjasama penyaluran kerja untuk posisi Junior Network Administrator dan Junior Bookkeeper. Mohon dapat dikirimkan profil lulusan angkatan terbaru.',
                    'status_dibaca' => false,
                    'catatan_balasan' => null,
                ],
            ];

            foreach ($pesans as $pesan) {
                PesanKontak::create($pesan);
            }
        }
    }
}
