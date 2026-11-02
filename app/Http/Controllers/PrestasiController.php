<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    /**
     * Display a listing of achievements (Wall of Fame).
     */
    public function index(Request $request)
    {
        try {
            $dbPrestasis = \App\Models\Prestasi::all();
            if ($dbPrestasis->count() > 0) {
                $achievements = $dbPrestasis->map(function ($p) {
                    return [
                        'id' => $p->id,
                        'title' => $p->title,
                        'event' => $p->event,
                        'level' => $p->level,
                        'level_slug' => $p->level_slug,
                        'level_badge' => $p->level_badge ?: 'primary',
                        'year' => $p->year,
                        'category' => $p->category,
                        'category_slug' => $p->category_slug,
                        'medal' => $p->medal,
                        'medal_icon' => $p->medal_icon ?: 'bi-trophy-fill',
                        'medal_color' => $p->medal_color ?: '#f59e0b',
                        'image' => $p->image ?: 'images/prestasi/lks-cyber-security.jpg',
                        'students' => $p->students,
                        'instructor' => $p->instructor ?: 'Guru Pembimbing',
                        'date' => $p->date ?: '2025',
                        'location' => $p->location ?: 'Indonesia',
                        'organizer' => $p->organizer ?: 'Puspresnas Kemendikbudristek',
                        'description' => $p->description,
                        'highlights' => $p->highlights_list ?: ['Meraih nilai tertinggi', 'Penghargaan khusus dewan juri'],
                    ];
                })->toArray();
            } else {
                $achievements = [
            [
                'id' => 1,
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
                'description' => 'Meraih nilai tertinggi 98.4/100 dalam simulasi mitigasi insiden siber, penetrasi server cloud multi-region, dan arsitektur zero-trust network defense berskala korporat.',
                'highlights' => [
                    'Nilai sempurna 100/100 pada modul Live Incident Response',
                    'Dianugerahi Medallion for Excellence dari juri asosiasi industri',
                    'Mendapatkan beasiswa penuh program sarjana ke perguruan tinggi mitra',
                ],
            ],
            [
                'id' => 2,
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
                'instructor' => 'Bayu Nugroho, S.T. (Mentor Lab Hardware & IoT)',
                'date' => '12 - 15 September 2025',
                'location' => 'Pusat Sains & Teknologi UI, Depok',
                'organizer' => 'Kementerian Perindustrian & Asosiasi Robotika Vokasi',
                'description' => 'Mengembangkan prototipe sistem Smart Flood Barrier berbasis micro-sensor LoRaWAN dan telemetri bertenaga surya untuk mitigasi banjir perkotaan otomatis.',
                'highlights' => [
                    'Response time sistem sensor teruji < 1.2 detik secara realtime',
                    'Efisiensi daya mencapai 85% menggunakan arsitektur deep sleep',
                    'Diapresiasi oleh Badan Penanggulangan Bencana Daerah (BPBD)',
                ],
            ],
            [
                'id' => 3,
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
                'instructor' => 'Sri Rahayu, S.E., M.Ak. (Kaprog Akuntansi & Keuangan Lembaga)',
                'date' => '5 - 8 Agustus 2025',
                'location' => 'Auditorium Magister Akuntansi FEB UGM, Yogyakarta',
                'organizer' => 'Ikatan Akuntan Indonesia (IAI) & Forum Pendidikan Vokasi',
                'description' => 'Keunggulan mutlak dalam pemecahan kasus audit laporan keuangan korporat multinasional dan rekonsiliasi e-Faktur terkomputerisasi dengan akurasi 99.8%.',
                'highlights' => [
                    'Penyelesaian studi kasus pembukuan tercepat dengan presisi tinggi',
                    'Mengalahkan 64 kontingen perwakilan sekolah kejuruan se-Indonesia',
                    'Mendapatkan sertifikasi profesi teknisi akuntansi madya BNSP',
                ],
            ],
            [
                'id' => 4,
                'title' => 'Juara 1 Lomba Administrasi Perkantoran & Otomasi Digital',
                'event' => 'LKS SMK Tingkat Provinsi Jawa Barat 2025',
                'level' => 'Tingkat Provinsi',
                'level_slug' => 'provinsi',
                'level_badge' => 'primary',
                'year' => '2025',
                'category' => 'Manajemen & Perkantoran',
                'category_slug' => 'manajemen',
                'medal' => 'Juara 1 Provinsi',
                'medal_icon' => 'bi-trophy-fill',
                'medal_color' => '#3b82f6',
                'image' => 'images/prestasi/office-automation.jpg',
                'students' => 'Cut Meutia Putri (XI MPLB 1)',
                'instructor' => 'Endang Sulistiyowati, S.Pd., M.M.',
                'date' => '18 - 21 Juli 2025',
                'location' => 'Gedung Kesenian & Edukasi Pelajar, Bandung',
                'organizer' => 'Dinas Pendidikan Provinsi Jawa Barat',
                'description' => 'Merancang alur automasi dokumen perkantoran cerdas berbasis cloud database, kecepatan mengetik akurat 92 WPM, serta presentasi bilingual eksekutif yang memukau.',
                'highlights' => [
                    'Nilai tertinggi dalam simulasi Customer Relationship Management (CRM)',
                    'Kecepatan mengetik blind-typing 92 WPM dengan akurasi 99.1%',
                    'Mewakili kontingen Jawa Barat menuju ajang LKS Tingkat Nasional',
                ],
            ],
            [
                'id' => 5,
                'title' => 'Juara 1 Supply Chain Optimization & Smart Logistics Challenge',
                'event' => 'Indonesia Logistics Youth Innovation Forum 2025',
                'level' => 'Tingkat Nasional',
                'level_slug' => 'nasional',
                'level_badge' => 'danger',
                'year' => '2025',
                'category' => 'Logistik & Supply Chain',
                'category_slug' => 'logistik',
                'medal' => 'Juara 1 Nasional',
                'medal_icon' => 'bi-trophy-fill',
                'medal_color' => '#f59e0b',
                'image' => 'images/prestasi/supply-chain-logistics.jpg',
                'students' => 'Rian Hidayat & Tim Logistik Gema (XII Logistik)',
                'instructor' => 'Rudy Hartono, S.T., M.Log. (Praktisi Supply Chain Vokasi)',
                'date' => '3 - 6 Juni 2025',
                'location' => 'Grand Ballroom Hotel Borobudur, Jakarta',
                'organizer' => 'Asosiasi Logistik Indonesia (ALI) & Kemenhub RI',
                'description' => 'Merancang arsitektur manajemen pergudangan otomatis dengan barcode scanning, rute pengiriman multi-drop hemat bahan bakar 28%, dan penataan tata letak rack 3D.',
                'highlights' => [
                    'Karya inovasi efisiensi rute diapresiasi oleh perusahaan ekspedisi mitra',
                    'Penyusunan Standard Operating Procedure (SOP) pergudangan berstandar ISO',
                    'Tawaran program Management Trainee prioritas pasca kelulusan',
                ],
            ],
            [
                'id' => 6,
                'title' => 'Juara Umum 1 Liga Futsal Vokasi Pelajar Antar-SMK',
                'event' => 'Kejuaraan Futsal Pelajar Cyber Cup Region Metropolitan 2025',
                'level' => 'Tingkat Kota',
                'level_slug' => 'kota',
                'level_badge' => 'success',
                'year' => '2025',
                'category' => 'Olahraga & Seni',
                'category_slug' => 'olahraga-seni',
                'medal' => 'Juara 1 & Piala Bergilir',
                'medal_icon' => 'bi-trophy-fill',
                'medal_color' => '#10b981',
                'image' => 'images/prestasi/futsal-champion.jpg',
                'students' => 'Tim Futsal Utama SMK Gema Cyber School (12 Pemain)',
                'instructor' => 'Coach Rizky Pratama (Lisensi AFC Futsal Level 1)',
                'date' => '10 - 18 Mei 2025',
                'location' => 'GOR Patriot Candrabhaga, Bekasi',
                'organizer' => 'Federasi Futsal Indonesia & Asosiasi Vokasi',
                'description' => 'Tak terkalahkan sepanjang turnamen dengan rekor 26 gol memasukkan dan hanya kebobolan 3 gol, menaklukkan juara bertahan di babak final dengan skor telak 4-1.',
                'highlights' => [
                    'Piala Bergilir Bergengsi Walikota Cup 2025',
                    'Gelar Top Scorer diraih striker siswa kami (9 gol)',
                    'Predikat Tim Paling Disiplin & Fairplay sepanjang gelaran',
                ],
            ],
            [
                'id' => 7,
                'title' => 'Juara Umum 1 LKBB Paskibra Tingkat Nasional Piala Menpora',
                'event' => 'Lomba Ketangkasan Baris-Berbaris (LKBB) Pandu Bangsa 2025',
                'level' => 'Tingkat Nasional',
                'level_slug' => 'nasional',
                'level_badge' => 'danger',
                'year' => '2025',
                'category' => 'Olahraga & Seni',
                'category_slug' => 'olahraga-seni',
                'medal' => 'Juara Umum 1 Nasional',
                'medal_icon' => 'bi-trophy-fill',
                'medal_color' => '#f59e0b',
                'image' => 'images/prestasi/lkbb-paskibra.jpg',
                'students' => 'Peleton Gema Dwi Warna (16 Anggota Paskibra)',
                'instructor' => 'Letda (Purn) Hendra Gunawan & Pembina Kesiswaan',
                'date' => '25 - 27 April 2025',
                'location' => 'Pusat Pelatihan Olahraga Pemuda Cibubur, Jakarta',
                'organizer' => 'Kementerian Pemuda dan Olahraga (Kemenpora) RI',
                'description' => 'Koreografi formasi baris berbaris presisi militer dipadukan dengan konfigurasi variasi formasi bertema teknologi digital dan nasionalisme kebangsaan.',
                'highlights' => [
                    'Kategori Best Danton (Komandan Peleton) Terbaik se-Indonesia',
                    'Kategori Best PBB Murni & Formasi Kreasi Terinovatif',
                    'Mengungguli 54 peleton terbaik dari 18 provinsi',
                ],
            ],
            [
                'id' => 8,
                'title' => 'Best Speaker & 1st Place National English Parliamentary Debate',
                'event' => 'National English Debate for Vocational High Schools (NED-VHS) 2025',
                'level' => 'Tingkat Nasional',
                'level_slug' => 'nasional',
                'level_badge' => 'danger',
                'year' => '2025',
                'category' => 'Olahraga & Seni',
                'category_slug' => 'olahraga-seni',
                'medal' => 'Juara 1 & Best Speaker',
                'medal_icon' => 'bi-trophy-fill',
                'medal_color' => '#f59e0b',
                'image' => 'images/prestasi/english-debate.jpg',
                'students' => 'Jessica Lauren (XII TJKT 2) & Adrian Pratama (XI AKL 2)',
                'instructor' => 'Sarah Kimberly, S.Pd., M.Ed. (Coach English Club & IELTS Expert)',
                'date' => '14 - 17 Maret 2025',
                'location' => 'Balai Pertemuan Ilmiah ITB, Bandung',
                'organizer' => 'Pusat Kebijakan & Prestasi Vokasi Internasional',
                'description' => 'Mendominasi babak grand final sistem British Parliamentary dengan mosi regulasi kecerdasan buatan (Artificial Intelligence) pada sektor ketenagakerjaan vokasi.',
                'highlights' => [
                    'Jessica Lauren dinobatkan sebagai Overall Best Speaker dengan skor 88.5',
                    'Victory unanimous 5-0 vote dari panel dewan juri internasional',
                    'Rekomendasi pertukaran pelajar internasional Young Leaders Program',
                ],
            ],
            [
                'id' => 9,
                'title' => 'Juara 1 Festival Film Sinematografi & Video Kreatif Pelajar',
                'event' => 'Festival Sinematografi & Media Kreatif Vokasi Indonesia 2024',
                'level' => 'Tingkat Nasional',
                'level_slug' => 'nasional',
                'level_badge' => 'danger',
                'year' => '2024',
                'category' => 'Teknologi & IT',
                'category_slug' => 'teknologi',
                'medal' => 'Juara 1 Film Terbaik',
                'medal_icon' => 'bi-trophy-fill',
                'medal_color' => '#f59e0b',
                'image' => 'images/prestasi/video-kreatif.jpg',
                'students' => 'Tim Multimedia & Broadcasting Cyber Media Studio',
                'instructor' => 'Maya Safitri, S.Ds. (Praktisi Desain Grafis & Motion Graphics)',
                'date' => '10 - 13 Desember 2024',
                'location' => 'Bioskop Mini XXI Taman Ismail Marzuki, Jakarta',
                'organizer' => 'Kementerian Pariwisata dan Ekonomi Kreatif (Kemenparekraf)',
                'description' => 'Karya dokumenter fiksi "Jejak Bit & Karakter" yang mengangkat potret perjuangan siswa vokasi dalam menciptakan teknologi inklusif bagi tunanetra.',
                'highlights' => [
                    'Sinematografi dan Color Grading dinilai selevel karya profesional',
                    'Kategori Sutradara Terbaik & Sound Design Terbaik',
                    'Ditayangkan di kanal resmi festival film pelajar internasional',
                ],
            ],
            [
                'id' => 10,
                'title' => 'Juara 1 Bulutangkis Tunggal Putra O2SN SMK Tingkat Provinsi',
                'event' => 'Olimpiade Olahraga Siswa Nasional (O2SN) SMK Jawa Barat 2024',
                'level' => 'Tingkat Provinsi',
                'level_slug' => 'provinsi',
                'level_badge' => 'primary',
                'year' => '2024',
                'category' => 'Olahraga & Seni',
                'category_slug' => 'olahraga-seni',
                'medal' => 'Juara 1 Emas',
                'medal_icon' => 'bi-trophy-fill',
                'medal_color' => '#3b82f6',
                'image' => 'images/prestasi/badminton-champion.jpg',
                'students' => 'Kevin Alamsyah (XI AKL 2)',
                'instructor' => 'Rahmat Hidayatullah, S.Pd. (Guru Olahraga & Pelatih PBSI)',
                'date' => '22 - 25 Agustus 2024',
                'location' => 'GOR Pajajaran, Kota Bogor',
                'organizer' => 'Dinas Pendidikan Jawa Barat & BAPOMI',
                'description' => 'Menunjukkan dominasi permainan serang cepat dan smes akurat tanpa kehilangan satu set pun dari babak penyisihan hingga podium puncak.',
                'highlights' => [
                    'Menang straight set 21-14, 21-16 di partai final',
                    'Terpilih masuk pelatda pemuda bulutangkis Jawa Barat',
                    'Mewakili provinsi Jawa Barat di ajang O2SN Nasional',
                ],
            ],
            [
                'id' => 11,
                'title' => 'Juara 1 National Web Application & UI/UX Hackathon Indonesia',
                'event' => 'Indonesia Youth Digital Hackathon & App Innovation 2024',
                'level' => 'Tingkat Nasional',
                'level_slug' => 'nasional',
                'level_badge' => 'danger',
                'year' => '2024',
                'category' => 'Teknologi & IT',
                'category_slug' => 'teknologi',
                'medal' => 'Juara 1 Utama',
                'medal_icon' => 'bi-trophy-fill',
                'medal_color' => '#f59e0b',
                'image' => 'images/prestasi/web-app-hackathon.jpg',
                'students' => 'Irfan Maulana, Fikri Setiawan, & Dinda Kirana (XII TJKT)',
                'instructor' => 'Dimas Prasetyo, M.Kom (Software & Web Dev Mentor)',
                'date' => '15 - 17 November 2024',
                'location' => 'Innovillage Digital Hub, BSD City, Tangerang',
                'organizer' => 'Asosiasi Industri Perangkat Lunak Indonesia (ASPILUKI)',
                'description' => 'Membangun aplikasi web progressive "VokaLearn" dalam waktu 36 jam nonstop untuk sistem pembelajaran daring interaktif siswa SMK berbasis micro-credentials.',
                'highlights' => [
                    'Integrasi AI Quiz Generator & WebRTC video mentoring realtime',
                    'Mendapatkan pendanaan inkubasi awal dari venture capital mitra',
                    'Skor UX Usability Testing 94/100 (Kategori Excellent)',
                ],
            ],
            [
                'id' => 12,
                'title' => 'Juara 1 Lomba Ketangkasan & Kepemimpinan Pramuka Penegak',
                'event' => 'Raimuna Cabang & Lomba Ketangkasan Penegak Berprestasi 2024',
                'level' => 'Tingkat Kota',
                'level_slug' => 'kota',
                'level_badge' => 'success',
                'year' => '2024',
                'category' => 'Olahraga & Seni',
                'category_slug' => 'olahraga-seni',
                'medal' => 'Juara Umum 1',
                'medal_icon' => 'bi-trophy-fill',
                'medal_color' => '#10b981',
                'image' => 'images/prestasi/pramuka-penegak.jpg',
                'students' => 'Sangga Kerja Gudep 04.101 SMK Gema Cyber School',
                'instructor' => 'Kak Wahyu Wibisono, M.Pd. (Pembina Pramuka Mahir Lanjutan)',
                'date' => '1 - 3 November 2024',
                'location' => 'Bumi Perkemahan Karang Kitri, Bojongmangu',
                'organizer' => 'Kwartir Cabang Gerakan Pramuka Kota/Kabupaten',
                'description' => 'Prestasi terbaik dalam navigasi darat kompas malam, pioneering jembatan gantung tali-temali standar penyelamatan, dan simulasi penanganan bencana.',
                'highlights' => [
                    'Juara 1 Kategori Pioneering Konstruksi Tali & Tongkat',
                    'Juara 1 Kategori Navigasi Darat & Survival Alam Bebas',
                    'Dianugerahi Tunggul Bergilir Sangga Teladan Kehormatan',
                ],
            ],
        ];
        }
    } catch (\Throwable $e) {
        // fallback
    }

        // Attach 3 tailored documentation photos for each achievement
        $docPool = [
            1 => [
                ['image' => 'images/prestasi/lks-cyber-security.jpg', 'title' => 'Simulasi Live Attack & Defense', 'badge' => 'Babak Final LKS'],
                ['image' => 'images/prestasi/doc-podium.jpg', 'title' => 'Penganugerahan Medali Emas', 'badge' => 'Podium Utama'],
                ['image' => 'images/prestasi/doc-award.jpg', 'title' => 'Piagam Medallion for Excellence', 'badge' => 'Sertifikat Resmi'],
            ],
            2 => [
                ['image' => 'images/prestasi/iot-robotics-champion.jpg', 'title' => 'Pengujian Prototipe LoRaWAN', 'badge' => 'Uji Telemetri'],
                ['image' => 'images/prestasi/doc-podium.jpg', 'title' => 'Penyerahan Medali Perak', 'badge' => 'Panggung Juara'],
                ['image' => 'images/prestasi/doc-award.jpg', 'title' => 'Sertifikat Inovasi Vokasi Nasional', 'badge' => 'Penghargaan'],
            ],
            3 => [
                ['image' => 'images/prestasi/accounting-competition.jpg', 'title' => 'Audit Kasus Keuangan Korporat', 'badge' => 'Sesi Analisis'],
                ['image' => 'images/prestasi/doc-podium.jpg', 'title' => 'Pengalungan Medali Juara 1', 'badge' => 'Podium Puncak'],
                ['image' => 'images/prestasi/doc-award.jpg', 'title' => 'Sertifikasi Teknisi Akuntansi BNSP', 'badge' => 'Sertifikat Profesi'],
            ],
            4 => [
                ['image' => 'images/prestasi/office-automation.jpg', 'title' => 'Uji Kecepatan Ketik 92 WPM', 'badge' => 'Otomasi Digital'],
                ['image' => 'images/prestasi/doc-podium.jpg', 'title' => 'Piala Bergilir Provinsi Jabar', 'badge' => 'Podium Juara'],
                ['image' => 'images/prestasi/doc-award.jpg', 'title' => 'Piagam Penghargaan Disdik Jabar', 'badge' => 'Piagam Resmi'],
            ],
            5 => [
                ['image' => 'images/prestasi/supply-chain-logistics.jpg', 'title' => 'Simulasi Rute Distribusi Efisien', 'badge' => 'Presentasi Karya'],
                ['image' => 'images/prestasi/doc-podium.jpg', 'title' => 'Penyerahan Trofi ALI 2025', 'badge' => 'Podium Nasional'],
                ['image' => 'images/prestasi/doc-award.jpg', 'title' => 'Sertifikat Kompetensi Supply Chain', 'badge' => 'Sertifikasi'],
            ],
            6 => [
                ['image' => 'images/prestasi/futsal-champion.jpg', 'title' => 'Pertandingan Babak Final 4-1', 'badge' => 'Match Highlight'],
                ['image' => 'images/prestasi/doc-podium.jpg', 'title' => 'Angkat Piala Bergilir Walikota', 'badge' => 'Selebrasi Tim'],
                ['image' => 'images/prestasi/doc-award.jpg', 'title' => 'Piagam Penghargaan Tim Fairplay', 'badge' => 'Penghargaan'],
            ],
            7 => [
                ['image' => 'images/prestasi/lkbb-paskibra.jpg', 'title' => 'Formasi Kreasi PBB Presisi', 'badge' => 'Koreografi Lapangan'],
                ['image' => 'images/prestasi/doc-podium.jpg', 'title' => 'Piala Bergilir Menpora RI', 'badge' => 'Juara Umum'],
                ['image' => 'images/prestasi/doc-award.jpg', 'title' => 'Piagam Komandan Peleton Terbaik', 'badge' => 'Best Danton'],
            ],
            8 => [
                ['image' => 'images/prestasi/english-debate.jpg', 'title' => 'Debat Parlemen Babak Grand Final', 'badge' => 'Championship Round'],
                ['image' => 'images/prestasi/doc-podium.jpg', 'title' => 'Penganugerahan Best Speaker', 'badge' => 'Podium Juara'],
                ['image' => 'images/prestasi/doc-award.jpg', 'title' => 'Certificate of Outstanding Debater', 'badge' => 'Sertifikat'],
            ],
            9 => [
                ['image' => 'images/prestasi/video-kreatif.jpg', 'title' => 'Behind The Scene Shooting Film', 'badge' => 'Proses Produksi'],
                ['image' => 'images/prestasi/doc-podium.jpg', 'title' => 'Piala Film Pendek Vokasi Terbaik', 'badge' => 'Panggung Festival'],
                ['image' => 'images/prestasi/doc-award.jpg', 'title' => 'Sertifikat Nominasi Sutradara Terbaik', 'badge' => 'Piagam Resmi'],
            ],
            10 => [
                ['image' => 'images/prestasi/badminton-champion.jpg', 'title' => 'Smes Kemenangan Partai Final', 'badge' => 'Match Point'],
                ['image' => 'images/prestasi/doc-podium.jpg', 'title' => 'Pengalungan Medali Emas O2SN', 'badge' => 'Podium Emas'],
                ['image' => 'images/prestasi/doc-award.jpg', 'title' => 'Piagam Atlet Terbaik Pelajar Jabar', 'badge' => 'Sertifikat'],
            ],
            11 => [
                ['image' => 'images/prestasi/web-app-hackathon.jpg', 'title' => 'Coding 36 Jam Nonstop Hackathon', 'badge' => 'Hackathon Sprint'],
                ['image' => 'images/prestasi/doc-podium.jpg', 'title' => 'Penyerahan Plakat Juara 1', 'badge' => 'Panggung Inovasi'],
                ['image' => 'images/prestasi/doc-award.jpg', 'title' => 'Sertifikat Pendanaan Inkubasi', 'badge' => 'Grant Award'],
            ],
            12 => [
                ['image' => 'images/prestasi/pramuka-penegak.jpg', 'title' => 'Pioneering Konstruksi Tali & Tongkat', 'badge' => 'Uji Ketangkasan'],
                ['image' => 'images/prestasi/doc-podium.jpg', 'title' => 'Penerimaan Tunggul Kehormatan', 'badge' => 'Sangga Teladan'],
                ['image' => 'images/prestasi/doc-award.jpg', 'title' => 'Piagam Tanda Ikut Serta Raimuna', 'badge' => 'Piagam Resmi'],
            ],
        ];

        foreach ($achievements as &$ach) {
            $ach['gallery'] = $docPool[$ach['id']] ?? [
                ['image' => $ach['image'], 'title' => 'Dokumentasi Aksi Lomba', 'badge' => 'Aksi Final'],
                ['image' => 'images/prestasi/doc-podium.jpg', 'title' => 'Penganugerahan Juara & Trofi', 'badge' => 'Podium Juara'],
                ['image' => 'images/prestasi/doc-award.jpg', 'title' => 'Piagam Penghargaan Resmi', 'badge' => 'Sertifikat'],
            ];
        }
        unset($ach);

        // Categories metadata with accurate counts
        $categories = [
            [
                'id' => 'all',
                'label' => 'Semua Prestasi',
                'count' => count($achievements),
                'icon' => 'bi-grid-fill',
            ],
            [
                'id' => 'teknologi',
                'label' => 'Teknologi & IT',
                'count' => count(array_filter($achievements, fn($a) => $a['category_slug'] === 'teknologi')),
                'icon' => 'bi-cpu-fill',
            ],
            [
                'id' => 'akuntansi',
                'label' => 'Bisnis & Akuntansi',
                'count' => count(array_filter($achievements, fn($a) => $a['category_slug'] === 'akuntansi')),
                'icon' => 'bi-calculator-fill',
            ],
            [
                'id' => 'manajemen',
                'label' => 'Manajemen Perkantoran',
                'count' => count(array_filter($achievements, fn($a) => $a['category_slug'] === 'manajemen')),
                'icon' => 'bi-briefcase-fill',
            ],
            [
                'id' => 'logistik',
                'label' => 'Logistik & Supply Chain',
                'count' => count(array_filter($achievements, fn($a) => $a['category_slug'] === 'logistik')),
                'icon' => 'bi-boxes',
            ],
            [
                'id' => 'olahraga-seni',
                'label' => 'Olahraga, Bela Negara & Seni',
                'count' => count(array_filter($achievements, fn($a) => $a['category_slug'] === 'olahraga-seni')),
                'icon' => 'bi-trophy-fill',
            ],
        ];

        // Level stats for badges/filter
        $levels = [
            'nasional' => [
                'label' => 'Tingkat Nasional',
                'badge' => 'danger',
                'count' => count(array_filter($achievements, fn($a) => $a['level_slug'] === 'nasional')),
            ],
            'provinsi' => [
                'label' => 'Tingkat Provinsi',
                'badge' => 'primary',
                'count' => count(array_filter($achievements, fn($a) => $a['level_slug'] === 'provinsi')),
            ],
            'kota' => [
                'label' => 'Tingkat Kota/Wilayah',
                'badge' => 'success',
                'count' => count(array_filter($achievements, fn($a) => $a['level_slug'] === 'kota')),
            ],
        ];

        // Overall statistics
        $stats = [
            'total_awards' => '128+',
            'national_titles' => '24',
            'provincial_titles' => '52',
            'scholarships_awarded' => '100%',
        ];

        // Programs list for navbar compatibility in jurusan.layout
        $programs = [
            'tjkt' => [
                'name' => 'Teknik Jaringan Komputer & Telekomunikasi',
                'short' => 'TJKT',
            ],
            'akl' => [
                'name' => 'Akuntansi & Keuangan Lembaga',
                'short' => 'AKL',
            ],
            'mplb' => [
                'name' => 'Manajemen Perkantoran & Layanan Bisnis',
                'short' => 'MPLB',
            ],
            'logistik' => [
                'name' => 'Teknik Manajemen Logistik',
                'short' => 'Logistik',
            ],
        ];

        return view('prestasi.index', compact(
            'achievements',
            'categories',
            'levels',
            'stats',
            'programs'
        ));
    }
}
