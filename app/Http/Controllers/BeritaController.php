<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class BeritaController extends Controller
{
    /**
     * Data artikel berita SMK Gema Cyber School.
     */
    private function getArticlesData()
    {
        try {
            $dbArticles = \App\Models\Berita::all();
            if ($dbArticles->count() > 0) {
                return $dbArticles->map(function ($b) {
                    return [
                        'id' => $b->id,
                        'slug' => $b->slug,
                        'title' => $b->title,
                        'category' => $b->category,
                        'category_slug' => $b->category_slug ?: \Illuminate\Support\Str::slug($b->category),
                        'category_badge_class' => 'badge-cat-' . ($b->category_slug ?: 'akademik'),
                        'date' => $b->published_at ? \Carbon\Carbon::parse($b->published_at)->translatedFormat('d F Y') : '18 Oktober 2026',
                        'datetime' => $b->published_at ? \Carbon\Carbon::parse($b->published_at)->format('Y-m-d') : '2026-10-18',
                        'author' => $b->author,
                        'author_role' => $b->author_role,
                        'read_time' => $b->read_time,
                        'views' => $b->views,
                        'image' => $b->image,
                        'image_caption' => $b->image_caption,
                        'is_featured' => (bool)$b->is_featured,
                        'excerpt' => $b->excerpt,
                        'body' => $b->body,
                        'tags' => $b->tags_list,
                    ];
                })->toArray();
            }
        } catch (\Throwable $e) {
            // fallback
        }

        return [
            [
                'id' => 1,
                'slug' => 'siswa-smk-gema-cyber-raih-emas-lks-cyber-security',
                'title' => 'Siswa SMK Gema Cyber Raih Medali Emas LKS Tingkat Provinsi Bidang Cyber Security',
                'category' => 'Prestasi',
                'category_slug' => 'prestasi',
                'category_badge_class' => 'badge-cat-prestasi',
                'date' => '18 Oktober 2026',
                'datetime' => '2026-10-18',
                'author' => 'Humas & Kominfo',
                'author_role' => 'Tim Media SMK Gema Cyber School',
                'read_time' => '4 Menit Baca',
                'views' => 1845,
                'image' => 'images/berita-lks-cyber.png',
                'image_caption' => 'Penyerahan medali emas LKS SMK Tingkat Provinsi Bidang Cyber Security Tahun 2026.',
                'is_featured' => true,
                'excerpt' => 'Prestasi membanggakan kembali diukir kontingen siswa jurusan TJKT SMK Gema Cyber School setelah melalui 3 babak penugasan network defense dan ethical hacking.',
                'body' => '
                    <p class="lead-text">
                        Prestasi membanggakan kembali dipersembahkan oleh peserta didik SMK Gema Cyber School dalam ajang bergengsi Lomba Kompetensi Siswa (LKS) SMK Tingkat Provinsi tahun 2026. Dalam kompetisi yang berlangsung selama tiga hari berturut-turut tersebut, perwakilan SMK Gema Cyber School sukses menyabet <strong>Medali Emas (Juara 1)</strong> pada bidang lomba <em>Cyber Security</em>.
                    </p>

                    <h4>Tantangan Teknis dan Pengujian Standar Industri</h4>
                    <p>
                        Ajang LKS Cyber Security tahun ini menghadirkan skenario simulasi ancaman digital berskala enterprise. Peserta diuji kemampuannya dalam tiga modul utama: <em>Incident Response & Forensics</em>, <em>Network Penetration Testing</em>, serta <em>Defensive Hardening</em> terhadap serangan siber real-time.
                    </p>
                    <p>
                        Dengan bimbingan intensif dari guru produktif Teknik Jaringan Komputer & Telekomunikasi (TJKT) serta praktisi industri dari mitra cyber security, kontingen SMK Gema Cyber School mampu menyelesaikan seluruh skenario serangan dengan skor nyaris sempurna 96.8 dari total 100 poin.
                    </p>

                    <blockquote class="article-quote-box">
                        <i class="bi bi-quote quote-icon"></i>
                        <p class="quote-text">
                            "Kemenangan ini adalah buah dari kerja keras, dedikasi siswa, dan ekosistem laboratorium Smart Cyber Lab yang kami bangun menyerupai Security Operations Center (SOC) standar dunia kerja nyata."
                        </p>
                        <footer class="quote-author">— Kepala Konsentrasi Keahlian TJKT SMK Gema Cyber School</footer>
                    </blockquote>

                    <h4>Langkah Menuju Tingkat Nasional</h4>
                    <p>
                        Atas raihan Juara 1 tingkat provinsi ini, SMK Gema Cyber School resmi ditetapkan sebagai duta provinsi untuk melaju ke LKS SMK Tingkat Nasional yang akan diselenggarakan akhir tahun ini. Pihak sekolah telah menyiapkan program karantina dan pemusatan latihan teknis (training camp) bersama pakar keamanan siber nasional guna mematangkan kesiapan mental dan ketangkasan analisis digital peserta.
                    </p>

                    <h4>Dukungan Penuh Ekosistem Pembelajaran</h4>
                    <p>
                        Kepala Sekolah SMK Gema Cyber School menyampaikan apresiasi setinggi-tingginya kepada seluruh tim pendamping, pembina, serta pihak yayasan atas sinergi luar biasa. Pihak sekolah senantiasa berkomitmen memfasilitasi setiap bakat siswa melalui kurikulum vokasi modern, sertifikasi lisensi BNSP, dan akses perangkat berstandar industri.
                    </p>
                ',
                'tags' => ['LKS 2026', 'Cyber Security', 'TJKT', 'Prestasi Siswa', 'Vokasi Juara'],
            ],
            [
                'id' => 2,
                'slug' => 'kunjungan-industri-mou-kelas-khusus-pt-telkom',
                'title' => 'Kunjungan Industri & Penandatanganan MoU Kelas Khusus Bersama PT Telkom Indonesia',
                'category' => 'Kerjasama',
                'category_slug' => 'kerjasama',
                'category_badge_class' => 'badge-cat-kerjasama',
                'date' => '12 Oktober 2026',
                'datetime' => '2026-10-12',
                'author' => 'Bursa Kerja Khusus (BKK)',
                'author_role' => 'Koordinator Hubungan Industri',
                'read_time' => '5 Menit Baca',
                'views' => 1420,
                'image' => 'images/berita-mou-industri.png',
                'image_caption' => 'Penandatanganan Memorandum of Understanding (MoU) Kelas Khusus Industri bersama jajaran direksi PT Telkom.',
                'is_featured' => false,
                'excerpt' => 'Penyelarasan kurikulum berbasis industri telekomunikasi modern dan komitmen kuota magang prioritas serta rekrutmen kerja langsung bagi lulusan.',
                'body' => '
                    <p class="lead-text">
                        Sebagai wujud nyata implementasi konsep <em>Link and Match 8+i</em> vokasi, SMK Gema Cyber School meresmikan kerja sama strategis dengan PT Telkom Indonesia melalui penandatanganan Nota Kesepahaman (MoU) pembentukan Kelas Industri Telekomunikasi & Jaringan Fiber Optic.
                    </p>

                    <h4>Ruang Lingkup Kerjasama Strategis</h4>
                    <p>
                        Kemitraan ini mencakup beberapa poin strategis yang langsung berdampak pada peningkatan mutu lulusan, antara lain:
                    </p>
                    <ul>
                        <li><strong>Penyelarasan Kurikulum:</strong> Materi kejuruan disesuaikan dengan standarisasi kompetensi teknis yang dibutuhkan divisi infrastruktur jaringan PT Telkom.</li>
                        <li><strong>Guru Tamu & Praktisi Mengajar:</strong> Tim engineer dan project manager Telkom akan hadir secara berkala memberikan kuliah umum dan workshop praktikal di sekolah.</li>
                        <li><strong>Program Praktik Kerja Lapangan (PKL) Prioritas:</strong> Alokasi kuota khusus magang bersertifikat industri selama 6 bulan bagi siswa berprestasi.</li>
                        <li><strong>Penyaluran Kerja Langsung:</strong> Peluang rekrutmen prioritas bagi alumni yang lulus uji sertifikasi kompetensi industri.</li>
                    </ul>

                    <blockquote class="article-quote-box">
                        <i class="bi bi-quote quote-icon"></i>
                        <p class="quote-text">
                            "Dunia industri digital bergerak sangat cepat. Kerjasama ini menjamin bahwa apa yang dipelajari siswa di ruang kelas dan laboratorium sekolah adalah teknologi yang hari ini benar-benar dipakai oleh industri."
                        </p>
                        <footer class="quote-author">— Vice President Human Capital PT Telkom Indonesia</footer>
                    </blockquote>

                    <h4>Hibah Perangkat Praktikum Modern</h4>
                    <p>
                        Selain penandatanganan kesepahaman, PT Telkom juga menyerahkan bantuan hibah peralatan laboratorium jaringan berupa Optical Time-Domain Reflectometer (OTDR), Fusion Splicer generasi terbaru, serta akses server cloud sandbox untuk kebutuhan riset terapan siswa.
                    </p>
                ',
                'tags' => ['MoU', 'Telkom Indonesia', 'Teaching Factory', 'Magang', 'Link & Match'],
            ],
            [
                'id' => 3,
                'slug' => 'pelaksanaan-uji-sertifikasi-kompetensi-bnsp-2026',
                'title' => 'Pelaksanaan Uji Sertifikasi Kompetensi (USK) BNSP Tahun Ajaran 2026 Berjalan Sukses',
                'category' => 'Akademik',
                'category_slug' => 'akademik',
                'category_badge_class' => 'badge-cat-akademik',
                'date' => '05 Oktober 2026',
                'datetime' => '2026-10-05',
                'author' => 'LSP-P1 SMK Gema Cyber',
                'author_role' => 'Lembaga Sertifikasi Profesi',
                'read_time' => '3 Menit Baca',
                'views' => 980,
                'image' => 'images/berita-ukk-bnsp.png',
                'image_caption' => 'Pelaksanaan uji praktik kejuruan di bawah pengawasan langsung asesor berlisensi BNSP.',
                'is_featured' => false,
                'excerpt' => 'Seluruh peserta didik tingkat akhir menyelesaikan serangkaian uji teknis kompetensi profesi di hadapan tim asesor independen berlisensi resmi.',
                'body' => '
                    <p class="lead-text">
                        Lembaga Sertifikasi Profesi Pihak Pertama (LSP-P1) SMK Gema Cyber School sukses menyelenggarakan agenda tahunan Uji Sertifikasi Kompetensi (USK) yang diikuti oleh 240 peserta didik tingkat akhir dari empat program keahlian unggulan.
                    </p>

                    <h4>Skema Sertifikasi Nasional Terakreditasi</h4>
                    <p>
                        Uji kompetensi ini mengacu pada Standar Kompetensi Kerja Nasional Indonesia (SKKNI) yang diverifikasi langsung oleh Badan Nasional Sertifikasi Profesi (BNSP). Setiap siswa diuji pada skema profesi relevan:
                    </p>
                    <ol>
                        <li><strong>TJKT:</strong> Skema Junior Network Administrator & Computer Network Defense.</li>
                        <li><strong>AKL:</strong> Skema Teknisi Akuntansi Yunior & Pengoperasian Aplikasi Akuntansi Komputer (MYOB/Accurate).</li>
                        <li><strong>MPLB:</strong> Skema Pengelolaan Administrasi Perkantoran & Otomatisasi Dokumen Digital.</li>
                        <li><strong>Logistik:</strong> Skema Pengelolaan Pergudangan (Warehouse Operation) & Distribusi Rantai Pasok.</li>
                    </ol>

                    <p>
                        Sebanyak 12 asesor independen hadir menguji secara ketat aspek pengetahuan (knowledge), keterampilan kerja (skill), serta etos kerja keselamatan (attitude). Tingkat kelulusan kompeten mencapai 98.4%, menandai kualitas pembinaan vokasi yang semakin solid.
                    </p>
                ',
                'tags' => ['Sertifikasi BNSP', 'USK 2026', 'SKKNI', 'Kelulusan', 'Vokasi Unggul'],
            ],
            [
                'id' => 4,
                'slug' => 'workshop-artificial-intelligence-big-data-industri-5',
                'title' => 'Workshop Artificial Intelligence & Big Data: Mempersiapkan Siswa Memasuki Industri Digital 5.0',
                'category' => 'Teknologi',
                'category_slug' => 'teknologi',
                'category_badge_class' => 'badge-cat-teknologi',
                'date' => '28 September 2026',
                'datetime' => '2026-09-28',
                'author' => 'Cyber Lab Coordinator',
                'author_role' => 'Pusat Riset Teknologi Sekolah',
                'read_time' => '4 Menit Baca',
                'views' => 1125,
                'image' => 'images/fasilitas-lab-komputer-2x.png',
                'image_caption' => 'Peserta workshop mempraktikkan coding model machine learning pada laboratorium komputer terpadu.',
                'is_featured' => false,
                'excerpt' => 'Menghadirkan praktisi data scientist ternama, siswa dibekali keterampilan Machine Learning dasar dan analitik data untuk memperkuat kompetensi portofolio kejuruan.',
                'body' => '
                    <p class="lead-text">
                        Dalam rangka memperluas wawasan teknologi masa depan, SMK Gema Cyber School mengadakan workshop intensif bertajuk <em>"Mastering Applied AI and Big Data Analytics for Young Technologists"</em> yang diselenggarakan di Smart Computer Laboratory.
                    </p>

                    <h4>Hands-on Langsung dengan Framework Modern</h4>
                    <p>
                        Workshop ini diikuti oleh lebih dari 100 siswa perwakilan konsentrasi keahlian. Peserta tidak hanya diajarkan teori dasar mengenai algoritma kecerdasan buatan, tetapi juga langsung mempraktikkan proses <em>data preprocessing</em>, visualisasi data bisnis, serta pembangunan model klasifikasi sederhana menggunakan bahasa pemrograman Python.
                    </p>
                    <p>
                        "Kami ingin siswa SMK tidak sekadar menjadi konsumen teknologi, tetapi mampu memahami cara kerja AI dan memanfaatkannya untuk menyelesaikan masalah nyata dalam bidang jaringan, pembukuan keuangan, maupun otomasi kantor," jelas pemateri tamu, Lead Data Engineer salah satu tech unicorn Jakarta.
                    </p>
                ',
                'tags' => ['Artificial Intelligence', 'Data Science', 'Python', 'Workshop', 'Cyber Lab'],
            ],
            [
                'id' => 5,
                'slug' => 'pekan-olahraga-seni-porseni-antar-kelas-meriah',
                'title' => 'Pekan Olahraga & Seni (PORSENI) Antar Kelas Berlangsung Meriah dan Penuh Sportivitas',
                'category' => 'Kegiatan',
                'category_slug' => 'kegiatan',
                'category_badge_class' => 'badge-cat-kegiatan',
                'date' => '20 September 2026',
                'datetime' => '2026-09-20',
                'author' => 'OSIS Gema Cyber',
                'author_role' => 'Pengurus OSIS SMK Gema Cyber',
                'read_time' => '3 Menit Baca',
                'views' => 840,
                'image' => 'images/galeri-kegiatan-1.png',
                'image_caption' => 'Kemeriahan kompetisi antar kelas di lapangan olahraga kampus SMK Gema Cyber School.',
                'is_featured' => false,
                'excerpt' => 'Ratusan siswa antusias berkompetisi dalam cabang futsal, basket 3x3, e-sports MLBB, serta pentas musik akustik kreatif dalam rangka menyambut jeda tengah semester.',
                'body' => '
                    <p class="lead-text">
                        Setelah menuntaskan rangkaian evaluasi pembelajaran triwulan pertama, suasana kampus SMK Gema Cyber School semarak oleh sorak-sorai penyelenggaraan Pekan Olahraga dan Seni (PORSENI) Antar Kelas tahun 2026.
                    </p>

                    <h4>Kombinasi Olahraga Fisik dan E-Sports Kompetitif</h4>
                    <p>
                        PORSENI tahun ini menghadirkan perpaduan unik antara kompetisi kebugaran fisik dan adu ketangkasan digital:
                    </p>
                    <ul>
                        <li>Futsal Champion Cup antar tingkat kelas</li>
                        <li>Bola Basket 3x3 Putra & Putri</li>
                        <li>Turnamen Mobile Legends Bang Bang (MLBB) e-Sports Kejuruan</li>
                        <li>Lomba Cipta & Baca Puisi Digital</li>
                        <li>Panggung Musik Akustik dan Pameran Seni Rupa Poster Vokasi</li>
                    </ul>
                    <p>
                        Kegiatan ini bertujuan memupuk rasa persaudaraan, kepemimpinan, dan kerja sama tim antar siswa lintas jurusan di samping mengejar prestasi akademik kejuruan.
                    </p>
                ',
                'tags' => ['Porseni', 'OSIS', 'Ekstrakurikuler', 'Sportivitas', 'Kegiatan Siswa'],
            ],
            [
                'id' => 6,
                'slug' => 'pengumuman-jadwal-asesmen-sumatif-tengah-semester-ganjil-2026',
                'title' => 'Pengumuman Jadwal Asesmen Sumatif Tengah Semester Ganjil T.A 2026/2027',
                'category' => 'Pengumuman',
                'category_slug' => 'pengumuman',
                'category_badge_class' => 'badge-cat-pengumuman',
                'date' => '15 September 2026',
                'datetime' => '2026-09-15',
                'author' => 'Bagian Kurikulum',
                'author_role' => 'Wakil Kepala Sekolah Bidang Kurikulum',
                'read_time' => '2 Menit Baca',
                'views' => 2100,
                'image' => 'images/fasilitas-kelas-modern-2x.png',
                'image_caption' => 'Ruang kelas multimedia yang digunakan untuk pelaksanaan evaluasi belajar terpusat.',
                'is_featured' => false,
                'excerpt' => 'Diberitahukan kepada seluruh siswa dan orang tua/wali murid mengenai agenda pelaksanaan asesmen berbasis CBT serta petunjuk teknis pelaksanaan ujian.',
                'body' => '
                    <p class="lead-text">
                        Berdasarkan Kalender Pendidikan SMK Gema Cyber School Tahun Ajaran 2026/2027, diberitahukan kepada seluruh siswa kelas X, XI, dan XII serta bapak/ibu orang tua/wali murid mengenai pelaksanaan Asesmen Sumatif Tengah Semester (ASTS) Ganjil.
                    </p>

                    <h4>Ketentuan Pelaksanaan Ujian</h4>
                    <p>
                        Asesmen akan dilaksanakan mulai tanggal 28 September s.d. 06 Oktober 2026 secara digital terpusat melalui aplikasi CBT Smart Campus. Adapun hal-hal yang wajib diperhatikan oleh peserta didik:
                    </p>
                    <ol>
                        <li>Peserta wajib hadir di ruang ujian 15 menit sebelum sesi dimulai dengan seragam rapi dan atribut lengkap.</li>
                        <li>Membawa kartu tanda peserta ujian resmi yang telah divalidasi oleh wali kelas masing-masing.</li>
                        <li>Ujian menggunakan perangkat laptop sekolah atau tablet terverifikasi yang terkoneksi jaringan intranet ujian sekolah.</li>
                        <li>Bagi siswa yang berhalangan hadir karena sakit, wajib melampirkan surat keterangan dokter untuk mengikuti ujian susulan.</li>
                    </ol>
                    <p>
                        Jadwal mata pelajaran terperinci dan tata tertib lengkap dapat diunduh melalui portal akademik e-learning masing-masing siswa.
                    </p>
                ',
                'tags' => ['Asesmen', 'Ujian CBT', 'Kurikulum Merdeka', 'Pengumuman', 'Jadwal'],
            ],
            [
                'id' => 7,
                'slug' => 'kunjungan-studi-banding-smk-rujukan-nasional-smart-school',
                'title' => 'Kunjungan Studi Banding SMK Rujukan Nasional Mengenai Implementasi Smart School',
                'category' => 'Kerjasama',
                'category_slug' => 'kerjasama',
                'category_badge_class' => 'badge-cat-kerjasama',
                'date' => '08 September 2026',
                'datetime' => '2026-09-08',
                'author' => 'Humas Sekolah',
                'author_role' => 'Hubungan Masyarakat & Antar Lembaga',
                'read_time' => '4 Menit Baca',
                'views' => 760,
                'image' => 'images/fasilitas-lab-jaringan-2x.png',
                'image_caption' => 'Delegasi studi banding meninjau sarana laboratorium jaringan mikrotik dan data center sekolah.',
                'is_featured' => false,
                'excerpt' => 'SMK Gema Cyber School menerima delegasi 15 kepala sekolah dan tim kurikulum untuk mengkaji sistem manajemen pembelajaran digital (LMS) dan smart lab.',
                'body' => '
                    <p class="lead-text">
                        Reputasi SMK Gema Cyber School sebagai salah satu Sekolah Pusat Keunggulan (SMK PK) kembali dibuktikan dengan hadirnya delegasi studi banding dari forum Musyawarah Kerja Kepala Sekolah (MKKS) luar kota.
                    </p>

                    <h4>Diskusi Implementasi Digital Governance</h4>
                    <p>
                        Fokus utama kunjungan adalah benchmarking pengelolaan <em>Smart School Ecosystem</em> yang diterapkan oleh SMK Gema Cyber School, meliputi sistem presensi terpadu berbasis RFID/biometrik, Learning Management System (LMS) terintegrasi, perpustakaan digital e-library, serta standarisasi laboratorium kejuruan berbasis teaching factory.
                    </p>
                    <p>
                        Kunjungan diakhiri dengan peninjauan langsung ke laboratorium TJKT, laboratorium mini banking AKL, ruang simulasi perkantoran MPLB, dan mini warehouse konsentrasi Logistik.
                    </p>
                ',
                'tags' => ['Studi Banding', 'Smart School', 'Pusat Keunggulan', 'SMK PK'],
            ],
            [
                'id' => 8,
                'slug' => 'pelepasan-kontingen-siswa-magang-industri-cikarang',
                'title' => 'Pelepasan Kontingen Siswa Magang Industri Bersertifikat ke Kawasan Industri Cikarang',
                'category' => 'Kegiatan',
                'category_slug' => 'kegiatan',
                'category_badge_class' => 'badge-cat-kegiatan',
                'date' => '01 September 2026',
                'datetime' => '2026-09-01',
                'author' => 'Bursa Kerja Khusus (BKK)',
                'author_role' => 'Unit Penempatan Kerja & Praktik',
                'read_time' => '4 Menit Baca',
                'views' => 890,
                'image' => 'images/card-photo-logistik.png',
                'image_caption' => 'Pelepasan resmi siswa magang industri bersama pimpinan sekolah dan perwakilan orang tua murid.',
                'is_featured' => false,
                'excerpt' => 'Sebanyak 60 siswa jurusan Manajemen Logistik dan AKL diberangkatkan untuk menjalani program Praktik Kerja Lapangan (PKL) terpadu selama 6 bulan.',
                'body' => '
                    <p class="lead-text">
                        Pimpinan SMK Gema Cyber School secara resmi melepas kontingen peserta didik kelas XI untuk melaksanakan program Praktik Kerja Lapangan (PKL) Industri Terstruktur periode semester ganjil tahun 2026.
                    </p>

                    <h4>Pengalaman Kerja Riil di Perusahaan Multinasional</h4>
                    <p>
                        Para siswa ditempatkan di sejumlah perusahaan logistik terkemuka, pusat distribusi retail modern, serta divisi finance industri manufaktur di kawasan Cikarang dan Karawang. Sebelum diterjunkan ke lokasi kerja, seluruh siswa telah menjalani pembekalan <em>character building</em>, etika kerja profesional (5R/5S), serta uji keselamatan dan kesehatan kerja (K3).
                    </p>
                    <p>
                        Kepala Sekolah berpesan agar para siswa selalu menjaga nama baik almamater, menunjukkan kedisiplinan tinggi, serta memanfaatkan kesempatan emas ini untuk menyerap ilmu dan keterampilan kerja nyata sebanyak-banyaknya.
                    </p>
                ',
                'tags' => ['PKL', 'Magang Industri', 'Logistik', 'AKL', 'DUDI'],
            ],
        ];
    }

    /**
     * Agenda sekolah mendatang untuk sidebar.
     */
    private function getUpcomingEvents()
    {
        return [
            [
                'day' => '28',
                'month' => 'Okt',
                'year' => '2026',
                'title' => 'Peringatan Hari Sumpah Pemuda & Gelar Karya Vokasi Siswa',
                'location' => 'Auditorium Utama Kampus Gema',
                'badge' => 'Kegiatan Sekolah',
            ],
            [
                'day' => '10',
                'month' => 'Nov',
                'year' => '2026',
                'title' => 'Job Fair & Rekrutmen Kerja Terbuka Bersama 20+ Mitra Industri',
                'location' => 'Hall Indoor & Sport Center',
                'badge' => 'Bursa Kerja BKK',
            ],
            [
                'day' => '24',
                'month' => 'Nov',
                'year' => '2026',
                'title' => 'Trial Exam Sertifikasi Internasional MikroTik (MTCNA)',
                'location' => 'Lab Jaringan & Komputer',
                'badge' => 'Sertifikasi',
            ],
            [
                'day' => '05',
                'month' => 'Des',
                'year' => '2026',
                'title' => 'Pelaksanaan Asesmen Akhir Semester (AAS) Ganjil CBT',
                'location' => 'Ruang Ujian Digital',
                'badge' => 'Akademik',
            ],
        ];
    }

    /**
     * Kategori berita beserta jumlah artikel.
     */
    private function getCategoriesWithCounts($articles)
    {
        $categories = [
            ['name' => 'Semua Kategori', 'slug' => 'semua', 'count' => count($articles)],
            ['name' => 'Prestasi Siswa', 'slug' => 'prestasi', 'count' => 0],
            ['name' => 'Kerjasama Industri', 'slug' => 'kerjasama', 'count' => 0],
            ['name' => 'Akademik', 'slug' => 'akademik', 'count' => 0],
            ['name' => 'Teknologi & Lab', 'slug' => 'teknologi', 'count' => 0],
            ['name' => 'Kegiatan Siswa', 'slug' => 'kegiatan', 'count' => 0],
            ['name' => 'Pengumuman Resmi', 'slug' => 'pengumuman', 'count' => 0],
        ];

        foreach ($articles as $article) {
            foreach ($categories as &$cat) {
                if ($cat['slug'] === $article['category_slug']) {
                    $cat['count']++;
                }
            }
        }

        return $categories;
    }

    /**
     * Tag populer dari semua artikel.
     */
    private function getPopularTags($articles)
    {
        $allTags = [];
        foreach ($articles as $article) {
            foreach ($article['tags'] as $tag) {
                $allTags[$tag] = ($allTags[$tag] ?? 0) + 1;
            }
        }
        arsort($allTags);
        return array_slice(array_keys($allTags), 0, 10);
    }

    /**
     * Halaman index berita dengan filter pencarian dan kategori.
     */
    public function index(Request $request)
    {
        $allArticles = collect($this->getArticlesData());
        $searchQuery = trim($request->query('q', ''));
        $categoryFilter = $request->query('kategori', '');
        $tagFilter = $request->query('tag', '');

        $filtered = $allArticles;

        // Filter berdasarkan kata kunci pencarian
        if (!empty($searchQuery)) {
            $filtered = $filtered->filter(function ($item) use ($searchQuery) {
                return stripos($item['title'], $searchQuery) !== false ||
                       stripos($item['excerpt'], $searchQuery) !== false ||
                       stripos(strip_tags($item['body']), $searchQuery) !== false;
            });
        }

        // Filter berdasarkan kategori
        if (!empty($categoryFilter) && $categoryFilter !== 'semua') {
            $filtered = $filtered->filter(function ($item) use ($categoryFilter) {
                return $item['category_slug'] === strtolower($categoryFilter);
            });
        }

        // Filter berdasarkan tag
        if (!empty($tagFilter)) {
            $filtered = $filtered->filter(function ($item) use ($tagFilter) {
                foreach ($item['tags'] as $t) {
                    if (strcasecmp($t, $tagFilter) === 0) {
                        return true;
                    }
                }
                return false;
            });
        }

        // Artikel headline / featured (ambil artikel pertama jika tidak ada filter, atau yang berflag featured)
        $featuredArticle = null;
        if (empty($searchQuery) && empty($categoryFilter) && empty($tagFilter)) {
            $featuredArticle = $allArticles->firstWhere('is_featured', true) ?: $allArticles->first();
            // Keluarkan featured article dari list utama agar tidak double di halaman 1
            $filteredGrid = $filtered->filter(function ($item) use ($featuredArticle) {
                return $item['id'] !== $featuredArticle['id'];
            });
        } else {
            $filteredGrid = $filtered;
        }

        // Pagination menggunakan LengthAwarePaginator (menampilkan seluruh artikel sekaligus)
        $perPage = 12;
        $currentPage = Paginator::resolveCurrentPage('page') ?: 1;
        $currentPageItems = $filteredGrid->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $paginatedArticles = new LengthAwarePaginator(
            $currentPageItems,
            $filteredGrid->count(),
            $perPage,
            $currentPage,
            ['path' => Paginator::resolveCurrentPath(), 'query' => $request->query()]
        );

        // Sidebar data
        $categories = $this->getCategoriesWithCounts($allArticles->toArray());
        $popularArticles = $allArticles->sortByDesc('views')->take(4);
        $upcomingEvents = $this->getUpcomingEvents();
        $popularTags = $this->getPopularTags($allArticles->toArray());

        return view('berita.index', [
            'articles' => $paginatedArticles,
            'featuredArticle' => $featuredArticle,
            'categories' => $categories,
            'popularArticles' => $popularArticles,
            'upcomingEvents' => $upcomingEvents,
            'popularTags' => $popularTags,
            'currentCategory' => $categoryFilter,
            'currentTag' => $tagFilter,
            'searchQuery' => $searchQuery,
            'totalResults' => $filtered->count(),
        ]);
    }

    /**
     * Shortcut rute kategori: /berita/kategori/{category}
     */
    public function category(Request $request, $category)
    {
        $request->merge(['kategori' => $category]);
        return $this->index($request);
    }

    /**
     * Halaman detail satu artikel berita: /berita/{slug}
     */
    public function show($slug)
    {
        $allArticles = collect($this->getArticlesData());
        $article = $allArticles->firstWhere('slug', $slug);

        if (!$article) {
            abort(404, 'Berita atau artikel yang Anda cari tidak ditemukan.');
        }

        // Artikel Terkait (kategori sama atau artikel lain selain yang sedang dibuka)
        $relatedArticles = $allArticles
            ->filter(function ($item) use ($article) {
                return $item['id'] !== $article['id'] && ($item['category_slug'] === $article['category_slug'] || true);
            })
            ->take(3);

        // Berita sebelumnya dan berikutnya
        $currentIndex = $allArticles->search(function ($item) use ($article) {
            return $item['id'] === $article['id'];
        });

        $prevArticle = $currentIndex > 0 ? $allArticles->get($currentIndex - 1) : null;
        $nextArticle = $currentIndex < ($allArticles->count() - 1) ? $allArticles->get($currentIndex + 1) : null;

        // Sidebar data
        $categories = $this->getCategoriesWithCounts($allArticles->toArray());
        $popularArticles = $allArticles->sortByDesc('views')->take(4);
        $upcomingEvents = $this->getUpcomingEvents();
        $popularTags = $this->getPopularTags($allArticles->toArray());

        return view('berita.show', [
            'article' => $article,
            'relatedArticles' => $relatedArticles,
            'prevArticle' => $prevArticle,
            'nextArticle' => $nextArticle,
            'categories' => $categories,
            'popularArticles' => $popularArticles,
            'upcomingEvents' => $upcomingEvents,
            'popularTags' => $popularTags,
        ]);
    }
}
