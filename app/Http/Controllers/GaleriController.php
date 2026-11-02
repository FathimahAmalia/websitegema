<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Menampilkan halaman galeri dokumentasi resmi sekolah.
     */
    public function index(Request $request)
    {
        try {
            $dbGaleris = \App\Models\Galeri::all();
            if ($dbGaleris->count() > 0) {
                $galleryItems = $dbGaleris->map(function ($g) {
                    return [
                        'id' => $g->id,
                        'title' => $g->title,
                        'category_slug' => $g->category_slug,
                        'category_label' => $g->category_label,
                        'category_badge' => $g->category_badge ?: 'bg-primary-subtle text-primary border border-primary-subtle',
                        'date' => $g->date ?: '2026',
                        'location' => $g->location ?: 'Kampus SMK Gema Cyber School',
                        'photographer' => $g->photographer ?: 'Humas & Dokumentasi',
                        'image' => $g->image ?: 'images/galeri/wisuda.jpg',
                        'description' => $g->description ?: '',
                    ];
                })->toArray();
            } else {
                $galleryItems = [
            [
                'id' => 1,
                'title' => 'Wisuda & Pelepasan Siswa Angkatan IX',
                'category_slug' => 'event',
                'category_label' => 'Agenda Sekolah',
                'category_badge' => 'bg-warning-subtle text-warning-emphasis border border-warning-subtle',
                'date' => '20 Juni 2026',
                'location' => 'Grand Ballroom Auditorium',
                'photographer' => 'Tim Humas & Publikasi Sekolah',
                'image' => 'images/galeri/wisuda.jpg',
                'description' => 'Prosesi khidmat wisuda dan pelepasan 320 lulusan SMK Gema Cyber School yang telah siap memasuki dunia kerja industri maupun melanjutkan ke perguruan tinggi unggulan.'
            ],
            [
                'id' => 2,
                'title' => 'Praktikum Uji Penetrasi Jaringan & Cyber Defense',
                'category_slug' => 'pembelajaran',
                'category_label' => 'Pembelajaran Praktik',
                'category_badge' => 'bg-primary-subtle text-primary border border-primary-subtle',
                'date' => '14 Mei 2026',
                'location' => 'Laboratorium Cyber Security TJKT',
                'photographer' => 'Laboran & Guru Pembimbing',
                'image' => 'images/prestasi/lks-cyber-security.jpg',
                'description' => 'Aktivitas belajar praktik siswa jurusan Teknik Jaringan Komputer dalam menguji sistem keamanan server dan pertahanan infrastruktur jaringan berstandar industri.'
            ],
            [
                'id' => 3,
                'title' => 'Penganugerahan Medali Emas Juara 1 LKS Nasional',
                'category_slug' => 'prestasi',
                'category_label' => 'Prestasi Siswa',
                'category_badge' => 'bg-danger-subtle text-danger border border-danger-subtle',
                'date' => '28 Agustus 2025',
                'location' => 'Jakarta Convention Center (JCC)',
                'photographer' => 'Puspresnas Kemendikbudristek RI',
                'image' => 'images/prestasi/doc-podium.jpg',
                'description' => 'Momen kebanggaan penganugerahan medali emas dan trofi kejuaraan LKS Nasional bidang Cloud Computing dan Cyber Defense yang diraih oleh siswa SMK Gema Cyber School.'
            ],
            [
                'id' => 4,
                'title' => 'Perakitan & Uji Coba Robot Otonom Klub Robotika',
                'category_slug' => 'ekskul',
                'category_label' => 'Ekstrakurikuler',
                'category_badge' => 'bg-success-subtle text-success border border-success-subtle',
                'date' => '10 Februari 2026',
                'location' => 'Ruang Workshop Robotika & IoT',
                'photographer' => 'Pembina Ekstrakurikuler Robotika',
                'image' => 'images/ekskul/robotika-iot.jpg',
                'description' => 'Siswa anggota ekstrakurikuler robotika merakit purwarupa autonomous mobile robot dengan modul sensor jarak dan mikrokontroler terprogram.'
            ],
            [
                'id' => 5,
                'title' => 'Gema Cyber Tech Expo & Pameran Karya Inovasi',
                'category_slug' => 'event',
                'category_label' => 'Agenda Sekolah',
                'category_badge' => 'bg-warning-subtle text-warning-emphasis border border-warning-subtle',
                'date' => '22 April 2026',
                'location' => 'Hall Gedung Inovasi Vokasi',
                'photographer' => 'Tim Jurnalistik Siswa',
                'image' => 'images/galeri/expo.jpg',
                'description' => 'Pameran tahunan hasil karya inovatif siswa, produk Teaching Factory, dan aplikasi digital yang dipresentasikan langsung di hadapan mitra dunia usaha dan industri.'
            ],
            [
                'id' => 6,
                'title' => 'Laboratorium Komputer & Jaringan Berstandar Industri',
                'category_slug' => 'fasilitas',
                'category_label' => 'Fasilitas Kampus',
                'category_badge' => 'bg-info-subtle text-info-emphasis border border-info-subtle',
                'date' => '12 Januari 2026',
                'location' => 'Gedung Lab Terpadu Lt. 3',
                'photographer' => 'Pengelola Sarana Prasarana',
                'image' => 'images/fasilitas-lab-komputer-2x.png',
                'description' => 'Ruang laboratorium komputer berpendingin udara dengan unit workstation spesifikasi tinggi dan koneksi jaringan kabel optik untuk ujian sertifikasi keahlian.'
            ],
            [
                'id' => 7,
                'title' => 'Simulasi Akuntansi Keuangan & Mini Bank Sekolah',
                'category_slug' => 'pembelajaran',
                'category_label' => 'Pembelajaran Praktik',
                'category_badge' => 'bg-primary-subtle text-primary border border-primary-subtle',
                'date' => '05 Maret 2026',
                'location' => 'Laboratorium Mini Bank AKL',
                'photographer' => 'Guru Pengampu Akuntansi',
                'image' => 'images/prestasi/accounting-competition.jpg',
                'description' => 'Pembelajaran praktik pembukuan akuntansi terkomputerisasi dan pelayanan perbankan mini sekolah untuk melatih kecakapan layanan keuangan siswa.'
            ],
            [
                'id' => 8,
                'title' => 'Penyerahan Piagam Juara Lomba IoT Tingkat Nasional',
                'category_slug' => 'prestasi',
                'category_label' => 'Prestasi Siswa',
                'category_badge' => 'bg-danger-subtle text-danger border border-danger-subtle',
                'date' => '19 November 2025',
                'location' => 'Universitas Indonesia Depok',
                'photographer' => 'Humas Pendamping Lomba',
                'image' => 'images/prestasi/iot-robotics-champion.jpg',
                'description' => 'Delegasi siswa SMK Gema Cyber School saat menerima piagam kejuaraan inovasi otomasi berbasis IoT dalam kompetisi teknologi tingkat nasional.'
            ],
            [
                'id' => 9,
                'title' => 'Latihan Rutin Baris-Berbaris Paskibra Sekolah',
                'category_slug' => 'ekskul',
                'category_label' => 'Ekstrakurikuler',
                'category_badge' => 'bg-success-subtle text-success border border-success-subtle',
                'date' => '17 Januari 2026',
                'location' => 'Lapangan Utama Sekolah',
                'photographer' => 'Pembina Paskibra',
                'image' => 'images/ekskul/paskibra.jpg',
                'description' => 'Latihan kedisiplinan, kekompakan formasi baris-berbaris, dan pembinaan karakter anggota Paskibra SMK Gema Cyber School.'
            ],
            [
                'id' => 10,
                'title' => 'Upacara Peringatan Hari Pendidikan Nasional',
                'category_slug' => 'event',
                'category_label' => 'Agenda Sekolah',
                'category_badge' => 'bg-warning-subtle text-warning-emphasis border border-warning-subtle',
                'date' => '02 Mei 2026',
                'location' => 'Lapangan Upacara Kampus',
                'photographer' => 'Tim Humas Sekolah',
                'image' => 'images/galeri/upacara.jpg',
                'description' => 'Upacara bendera peringatan Hari Pendidikan Nasional yang diikuti oleh dewan guru, staf, dan seluruh siswa dengan mengenakan pakaian adat nusantara.'
            ],
            [
                'id' => 11,
                'title' => 'Perpustakaan Digital & Ruang Baca Siswa',
                'category_slug' => 'fasilitas',
                'category_label' => 'Fasilitas Kampus',
                'category_badge' => 'bg-info-subtle text-info-emphasis border border-info-subtle',
                'date' => '08 April 2026',
                'location' => 'Gedung Perpustakaan Digital',
                'photographer' => 'Petugas Perpustakaan Sekolah',
                'image' => 'images/fasilitas-perpustakaan-2x.png',
                'description' => 'Fasilitas perpustakaan modern dengan koleksi buku fisik terkurasi, terminal akses e-library, dan area diskusi yang nyaman untuk kegiatan literasi siswa.'
            ],
            [
                'id' => 12,
                'title' => 'Praktik Perakitan & Uji Komponen Hardware Komputer',
                'category_slug' => 'pembelajaran',
                'category_label' => 'Pembelajaran Praktik',
                'category_badge' => 'bg-primary-subtle text-primary border border-primary-subtle',
                'date' => '24 Maret 2026',
                'location' => 'Laboratorium Hardware & Perakitan',
                'photographer' => 'Instruktur Praktik Vokasi',
                'image' => 'images/galeri/praktik-lab.jpg',
                'description' => 'Pembelajaran langsung perakitan PC, diagnosa komponen motherboard, dan perawatan perangkat keras komputer di laboratorium kejuruan.'
            ],
            [
                'id' => 13,
                'title' => 'Penganugerahan Trofi Juara Turnamen Futsal Pelajar',
                'category_slug' => 'prestasi',
                'category_label' => 'Prestasi Siswa',
                'category_badge' => 'bg-danger-subtle text-danger border border-danger-subtle',
                'date' => '14 Desember 2025',
                'location' => 'Gelanggang Remaja Wilayah',
                'photographer' => 'Pelatih Futsal Sekolah',
                'image' => 'images/prestasi/futsal-champion.jpg',
                'description' => 'Tim futsal SMK Gema Cyber School berhasil meraih piala juara 1 setelah bertanding sportif dalam kejuaraan turnamen futsal antar-SMK.'
            ],
            [
                'id' => 14,
                'title' => 'Pertandingan Olahraga Bola Basket Persahabatan',
                'category_slug' => 'ekskul',
                'category_label' => 'Ekstrakurikuler',
                'category_badge' => 'bg-success-subtle text-success border border-success-subtle',
                'date' => '08 Februari 2026',
                'location' => 'Lapangan Olahraga Basket Sekolah',
                'photographer' => 'Pembina Olahraga',
                'image' => 'images/ekskul/basket.jpg',
                'description' => 'Pertandingan persahabatan bola basket tim siswa SMK Gema Cyber School untuk mengasah kemampuan teknik, kerjasama tim, dan kebugaran fisik.'
            ],
            [
                'id' => 15,
                'title' => 'Kuliah Umum Bersama Praktisi Industri Teknologi',
                'category_slug' => 'pembelajaran',
                'category_label' => 'Pembelajaran Praktik',
                'category_badge' => 'bg-primary-subtle text-primary border border-primary-subtle',
                'date' => '15 Mei 2026',
                'location' => 'Aula Pertemuan Sekolah',
                'photographer' => 'Humas Kemitraan Industri',
                'image' => 'images/galeri/seminar.jpg',
                'description' => 'Kegiatan sharing session dan kuliah umum dari praktisi industri teknologi untuk memberikan wawasan standar industri terkini bagi siswa kelas XI dan XII.'
            ],
            [
                'id' => 16,
                'title' => 'Piala Juara 1 Lomba Debat Bahasa Inggris Siswa SMK',
                'category_slug' => 'prestasi',
                'category_label' => 'Prestasi Siswa',
                'category_badge' => 'bg-danger-subtle text-danger border border-danger-subtle',
                'date' => '03 Oktober 2025',
                'location' => 'Balai Pelatihan Vokasi',
                'photographer' => 'Guru Pembimbing Bahasa Inggris',
                'image' => 'images/prestasi/english-debate.jpg',
                'description' => 'Siswa perwakilan English Club SMK Gema Cyber School sukses meraih juara pertama dalam kompetisi debat bahasa Inggris jenjang kejuruan.'
            ],
            [
                'id' => 17,
                'title' => 'Latihan Rutin Bulutangkis di GOR Sekolah',
                'category_slug' => 'ekskul',
                'category_label' => 'Ekstrakurikuler',
                'category_badge' => 'bg-success-subtle text-success border border-success-subtle',
                'date' => '21 Januari 2026',
                'location' => 'Gelanggang Olahraga SMK Gema',
                'photographer' => 'Pengurus Klub Bulutangkis',
                'image' => 'images/ekskul/badminton.jpg',
                'description' => 'Latihan pembinaan teknik dasar footwork dan ketepatan pukulan bagi anggota ekstrakurikuler bulutangkis di bawah bimbingan pelatih sekolah.'
            ],
            [
                'id' => 18,
                'title' => 'Ruang Kelas Teori Modern Berfasilitas Multimedia',
                'category_slug' => 'fasilitas',
                'category_label' => 'Fasilitas Kampus',
                'category_badge' => 'bg-info-subtle text-info-emphasis border border-info-subtle',
                'date' => '05 Januari 2026',
                'location' => 'Gedung Pembelajaran Lantai 2',
                'photographer' => 'Unit Sarana Prasarana',
                'image' => 'images/fasilitas-kelas-modern-2x.png',
                'description' => 'Ruang kelas teori yang bersih, rapi, dan dilengkapi layar proyektor interaktif serta koneksi internet untuk mendukung kenyamanan proses belajar mengajar.'
            ],
        ];
        }
    } catch (\Throwable $e) {
        // fallback
    }

        // Programs list for navbar compatibility in jurusan.layout
        $programs = [
            'tjkt' => ['name' => 'Teknik Jaringan Komputer & Telekomunikasi'],
            'akl' => ['name' => 'Akuntansi & Keuangan Lembaga'],
            'mplb' => ['name' => 'Manajemen Perkantoran & Layanan Bisnis'],
            'logistik' => ['name' => 'Teknik Logistik & Supply Chain'],
        ];

        return view('galeri.index', compact('galleryItems', 'programs'));
    }
}
