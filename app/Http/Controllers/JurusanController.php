<?php

namespace App\Http\Controllers;

class JurusanController extends Controller
{
    private function getPrograms()
    {
        return [
            'tjkt' => [
                'name' => 'Teknik Jaringan Komputer & Telekomunikasi (TJKT)',
                'short_name' => 'TJKT',
            ],
            'akl' => [
                'name' => 'Akuntansi dan Keuangan Lembaga (AKL)',
                'short_name' => 'AKL',
            ],
            'mplb' => [
                'name' => 'Manajemen Perkantoran dan Layanan Bisnis (MPLB)',
                'short_name' => 'MPLB',
            ],
            'logistik' => [
                'name' => 'Logistik',
                'short_name' => 'Logistik',
            ],
        ];
    }

    public function show(string $slug)
    {
        $programs = $this->getPrograms();

        abort_unless(isset($programs[$slug]), 404);

        $details = $this->getProgramDetails();

        return view('jurusan.show', [
            'program' => array_merge($programs[$slug], $details[$slug], ['slug' => $slug]),
            'programs' => $programs,
        ]);
    }

    public function gallery(string $slug)
    {
        $programs = $this->getPrograms();

        abort_unless(isset($programs[$slug]), 404);

        $details = $this->getProgramDetails();

        return view('jurusan.gallery', [
            'program' => array_merge($programs[$slug], $details[$slug], ['slug' => $slug]),
            'programs' => $programs,
        ]);
    }

    private function getProgramDetails(): array
    {
        return [
            'tjkt' => [
                'title' => 'Teknik Jaringan Komputer & Telekomunikasi',
                'short_name' => 'TJKT',
                'accent' => '#2563eb',
                'summary' => 'Belajar merancang, membangun, dan mengelola jaringan komputer serta sistem telekomunikasi yang menghubungkan dunia digital.',
                'overview' => 'Program TJKT membekali peserta didik dengan pemahaman dan keterampilan praktik di bidang komputer, jaringan, dan telekomunikasi. Siswa mempelajari proses kerja secara bertahap: mengenali kebutuhan pengguna, merancang solusi, memasang dan mengonfigurasi perangkat, kemudian menguji serta mendokumentasikan hasilnya. Ketelitian, pemecahan masalah, keamanan, dan kerja sama menjadi bagian penting dari setiap kegiatan.',
                'competencies' => [
                    ['icon' => 'bi-hdd-network-fill', 'title' => 'Administrasi Jaringan', 'description' => 'Konfigurasi perangkat, pengalamatan IP, dan pengelolaan jaringan.'],
                    ['icon' => 'bi-pc-display', 'title' => 'Sistem Operasi', 'description' => 'Instalasi, perawatan, dan troubleshooting komputer maupun server.'],
                    ['icon' => 'bi-shield-lock-fill', 'title' => 'Keamanan Jaringan', 'description' => 'Dasar perlindungan perangkat, akun, dan infrastruktur jaringan.'],
                    ['icon' => 'bi-code-slash', 'title' => 'Pemrograman Dasar', 'description' => 'Logika pemrograman dan otomasi tugas teknis sederhana.'],
                ],
                'gallery' => [
                    ['image' => 'images/jurusan-tjkt-hd.png', 'alt' => 'Siswa mempelajari perangkat dan jaringan komputer', 'caption' => 'Pembelajaran perangkat dan jaringan komputer', 'category' => 'Kegiatan Siswa'],
                    ['image' => 'images/fasilitas-lab-jaringan-2x.png', 'alt' => 'Perangkat jaringan dan server untuk praktik', 'caption' => 'Perangkat praktik jaringan', 'category' => 'Praktik Laboratorium'],
                    ['image' => 'images/fasilitas-lab-komputer-2x.png', 'alt' => 'Laboratorium komputer untuk kegiatan pembelajaran', 'caption' => 'Laboratorium komputer', 'category' => 'Praktik Laboratorium'],
                    ['image' => 'images/fasilitas-kelas-modern-2x.png', 'alt' => 'Ruang belajar untuk kegiatan teori dan diskusi', 'caption' => 'Ruang belajar dan diskusi', 'category' => 'Pembelajaran'],
                ],
                'careers' => ['Teknisi jaringan', 'Teknisi komputer', 'Staf dukungan IT', 'Teknisi telekomunikasi'],
                'advantages' => [
                    'Praktik komputer, jaringan, dan server dalam satu alur kompetensi.',
                    'Membiasakan siswa melakukan diagnosis dan dokumentasi teknis.',
                    'Mengenalkan keamanan serta keselamatan dalam pekerjaan jaringan.',
                    'Proyek praktik melatih pemecahan masalah dan kolaborasi.',
                ],
                'learning_areas' => [
                    ['title' => 'Perangkat komputer', 'description' => 'Mengenal fungsi komponen, merakit komputer sesuai kebutuhan, memasang sistem operasi, melakukan perawatan berkala, dan menelusuri penyebab gangguan perangkat keras maupun perangkat lunak.'],
                    ['title' => 'Jaringan lokal dan nirkabel', 'description' => 'Mempelajari topologi dan media jaringan, pengalamatan IP, pembagian jaringan, konfigurasi perangkat, serta pengujian koneksi untuk memastikan jaringan berfungsi sesuai rancangan.'],
                    ['title' => 'Routing, switching, dan layanan jaringan', 'description' => 'Memahami cara perangkat jaringan meneruskan data, menghubungkan beberapa segmen, dan menyediakan layanan dasar seperti DHCP, DNS, serta berbagi sumber daya jaringan.'],
                    ['title' => 'Server dan administrasi sistem', 'description' => 'Mengenal instalasi dan konfigurasi layanan server, pengelolaan akun dan hak akses, pemantauan layanan, pencadangan, serta dokumentasi perubahan sistem.'],
                    ['title' => 'Telekomunikasi dan fiber optik', 'description' => 'Mengenal dasar media transmisi dan konektivitas telekomunikasi, perangkat pendukung, prosedur instalasi, serta pentingnya keselamatan dan ketelitian saat menangani kabel.'],
                    ['title' => 'Keamanan dan pemecahan masalah', 'description' => 'Menerapkan kebiasaan pengamanan dasar, mengidentifikasi gejala gangguan, menggunakan langkah diagnosis yang terstruktur, dan menyusun laporan penanganan teknis.'],
                ],
                'projects' => [
                    ['title' => 'Merancang jaringan untuk ruang kerja', 'description' => 'Menyusun kebutuhan perangkat dan topologi, membuat skema alamat IP, melakukan konfigurasi, lalu menguji konektivitas antarperangkat dan menyiapkan dokumentasi jaringan.'],
                    ['title' => 'Membangun layanan server lokal', 'description' => 'Menyiapkan server untuk kebutuhan simulasi, mengatur layanan dan hak akses, menguji ketersediaan layanan dari komputer klien, serta membuat catatan konfigurasi dan pemulihan.'],
                    ['title' => 'Diagnosis dan perbaikan koneksi', 'description' => 'Menganalisis kasus koneksi bermasalah dari sisi perangkat hingga jaringan, mencatat hasil pemeriksaan, menerapkan perbaikan, dan memverifikasi koneksi kembali normal.'],
                ],
            ],
            'akl' => [
                'title' => 'Akuntansi dan Keuangan Lembaga',
                'short_name' => 'AKL',
                'accent' => '#059669',
                'summary' => 'Mengembangkan ketelitian dan keterampilan mengelola transaksi, laporan keuangan, serta administrasi perpajakan dengan dukungan aplikasi digital.',
                'overview' => 'Program AKL mempelajari proses pencatatan dan pelaporan keuangan pada perusahaan maupun lembaga. Siswa mengikuti alur pekerjaan dari memeriksa bukti transaksi, mengelompokkan dan mencatat transaksi, hingga menyusun laporan yang mudah ditelusuri. Pembelajaran menekankan ketelitian, integritas, kerahasiaan data, dan kemampuan menggunakan perangkat digital secara bertanggung jawab.',
                'competencies' => [
                    ['icon' => 'bi-journal-text', 'title' => 'Akuntansi', 'description' => 'Pencatatan transaksi, pengelompokan akun, dan laporan keuangan.'],
                    ['icon' => 'bi-bank2', 'title' => 'Administrasi Keuangan', 'description' => 'Pengelolaan kas, dokumen, piutang, dan pencatatan persediaan.'],
                    ['icon' => 'bi-receipt', 'title' => 'Perpajakan Dasar', 'description' => 'Pengenalan dokumen dan proses administrasi perpajakan.'],
                    ['icon' => 'bi-laptop', 'title' => 'Aplikasi Akuntansi', 'description' => 'Pengolahan data keuangan memakai spreadsheet dan aplikasi.'],
                ],
                'gallery' => [
                    ['image' => 'images/jurusan-akl-hd.png', 'alt' => 'Siswa melakukan kegiatan belajar akuntansi menggunakan komputer', 'caption' => 'Pembelajaran akuntansi berbantuan komputer', 'category' => 'Kegiatan Siswa'],
                    ['image' => 'images/fasilitas-praktik-akuntansi-2x.png', 'alt' => 'Ruang praktik akuntansi dan komputer', 'caption' => 'Ruang praktik akuntansi', 'category' => 'Praktik Akuntansi'],
                    ['image' => 'images/fasilitas-kelas-modern-2x.png', 'alt' => 'Ruang kelas untuk diskusi dan pembelajaran', 'caption' => 'Kegiatan belajar dan diskusi', 'category' => 'Pembelajaran'],
                    ['image' => 'images/fasilitas-lab-komputer-2x.png', 'alt' => 'Laboratorium komputer untuk latihan aplikasi keuangan', 'caption' => 'Latihan aplikasi keuangan', 'category' => 'Praktik Akuntansi'],
                ],
                'careers' => ['Staf administrasi keuangan', 'Staf pembukuan', 'Asisten akuntan', 'Staf administrasi pajak'],
                'advantages' => [
                    'Mempelajari siklus akuntansi dari dokumen hingga laporan.',
                    'Latihan pencatatan dilakukan dengan studi kasus usaha.',
                    'Menggabungkan ketelitian administrasi dan penggunaan aplikasi.',
                    'Menanamkan integritas serta tanggung jawab dalam mengolah data.',
                ],
                'learning_areas' => [
                    ['title' => 'Dasar akuntansi dan siklus transaksi', 'description' => 'Memahami persamaan dasar akuntansi, akun dan saldo normal, serta urutan pencatatan transaksi sampai informasi keuangan siap diringkas.'],
                    ['title' => 'Bukti transaksi dan penjurnalan', 'description' => 'Mengenali dokumen transaksi, memeriksa kelengkapan dan nilainya, menentukan akun yang terpengaruh, lalu mencatat transaksi ke jurnal secara konsisten.'],
                    ['title' => 'Buku besar dan neraca saldo', 'description' => 'Memindahkan catatan jurnal ke buku besar, menghitung saldo akun, menyusun neraca saldo, dan menelusuri selisih atau kesalahan pencatatan.'],
                    ['title' => 'Penyesuaian dan laporan keuangan', 'description' => 'Mengenal kebutuhan penyesuaian akhir periode dan menyusun laporan keuangan dasar berdasarkan data yang telah diperiksa dan diringkas.'],
                    ['title' => 'Administrasi kas dan persediaan', 'description' => 'Mempelajari pencatatan kas, piutang, utang, dan persediaan serta pentingnya pencocokan dokumen untuk menjaga ketepatan data.'],
                    ['title' => 'Spreadsheet, aplikasi, dan pajak dasar', 'description' => 'Menggunakan spreadsheet atau aplikasi akuntansi untuk mengolah data, menyiapkan rekap, dan mengenal dokumen serta administrasi perpajakan dasar.'],
                ],
                'projects' => [
                    ['title' => 'Siklus akuntansi perusahaan jasa', 'description' => 'Mengolah kumpulan bukti transaksi simulasi, membuat jurnal, memindahkan ke buku besar, menyusun neraca saldo, dan menghasilkan laporan keuangan dasar.'],
                    ['title' => 'Pembukuan usaha dagang sederhana', 'description' => 'Mencatat transaksi penjualan dan pembelian, memantau persediaan dalam studi kasus, memeriksa saldo, dan menyajikan ringkasan kondisi keuangan usaha.'],
                    ['title' => 'Rekap keuangan berbasis spreadsheet', 'description' => 'Menyusun lembar kerja dengan rumus dan format yang rapi untuk mengelompokkan transaksi, membandingkan data, serta menyiapkan rekap yang mudah diperiksa.'],
                ],
            ],
            'mplb' => [
                'title' => 'Manajemen Perkantoran dan Layanan Bisnis',
                'short_name' => 'MPLB',
                'accent' => '#ea580c',
                'summary' => 'Mempersiapkan tenaga administrasi yang terampil berkomunikasi, mengelola dokumen, dan memberikan layanan bisnis secara profesional.',
                'overview' => 'Program MPLB mengembangkan kompetensi administrasi perkantoran dan layanan bisnis yang dibutuhkan organisasi masa kini. Siswa mempelajari bagaimana pekerjaan kantor direncanakan, informasi dan dokumen dikelola, komunikasi dilakukan, serta layanan diberikan dengan sikap profesional. Keterampilan digital, kerapian, etika, dan ketepatan menjadi dasar dalam menyelesaikan tugas administrasi.',
                'competencies' => [
                    ['icon' => 'bi-folder2-open', 'title' => 'Administrasi Perkantoran', 'description' => 'Pengelolaan agenda, surat, dokumen, dan arsip kantor.'],
                    ['icon' => 'bi-pc-display-horizontal', 'title' => 'Sistem Informasi', 'description' => 'Pemanfaatan aplikasi untuk dokumen dan kolaborasi digital.'],
                    ['icon' => 'bi-chat-dots-fill', 'title' => 'Komunikasi Bisnis', 'description' => 'Komunikasi lisan dan tertulis dalam lingkungan profesional.'],
                    ['icon' => 'bi-person-lines-fill', 'title' => 'Layanan Bisnis', 'description' => 'Penerimaan tamu, layanan informasi, dan pelayanan pelanggan.'],
                ],
                'gallery' => [
                    ['image' => 'images/jurusan-mplb-hd.png', 'alt' => 'Siswa belajar administrasi perkantoran menggunakan komputer', 'caption' => 'Pembelajaran administrasi perkantoran', 'category' => 'Kegiatan Siswa'],
                    ['image' => 'images/fasilitas-kelas-modern-2x.png', 'alt' => 'Ruang kelas untuk simulasi kegiatan kantor', 'caption' => 'Ruang belajar dan simulasi kantor', 'category' => 'Pembelajaran'],
                    ['image' => 'images/fasilitas-praktik-akuntansi-2x.png', 'alt' => 'Ruang praktik dengan perangkat komputer', 'caption' => 'Praktik menggunakan perangkat komputer', 'category' => 'Praktik Perkantoran'],
                    ['image' => 'images/fasilitas-lab-komputer-2x.png', 'alt' => 'Laboratorium komputer untuk praktik aplikasi perkantoran', 'caption' => 'Praktik aplikasi perkantoran', 'category' => 'Praktik Perkantoran'],
                ],
                'careers' => ['Staf administrasi', 'Sekretaris junior', 'Staf layanan pelanggan', 'Resepsionis'],
                'advantages' => [
                    'Menggabungkan keterampilan administrasi dan layanan bisnis.',
                    'Membiasakan pengelolaan arsip fisik maupun digital secara tertib.',
                    'Latihan komunikasi dan pelayanan dalam situasi kerja simulasi.',
                    'Mengembangkan etika, kerapian, dan koordinasi kerja.',
                ],
                'learning_areas' => [
                    ['title' => 'Administrasi dan tata kelola kantor', 'description' => 'Mengenal fungsi administrasi dalam organisasi, menyusun jadwal dan agenda, menyiapkan kebutuhan rapat, serta menindaklanjuti tugas dan informasi secara teratur.'],
                    ['title' => 'Surat-menyurat dan pengelolaan arsip', 'description' => 'Membuat dan memproses surat bisnis, mengelompokkan dokumen, menentukan metode penyimpanan, serta menemukan kembali arsip secara cepat dan tertib.'],
                    ['title' => 'Aplikasi perkantoran dan dokumen digital', 'description' => 'Mengolah dokumen, tabel, presentasi, dan data sederhana dengan aplikasi perkantoran serta menerapkan penamaan file dan kolaborasi digital yang terstruktur.'],
                    ['title' => 'Komunikasi bisnis dan layanan pelanggan', 'description' => 'Melatih komunikasi lisan dan tertulis, menerima dan meneruskan informasi, menangani pertanyaan, serta merespons kebutuhan pelanggan dengan bahasa yang santun.'],
                    ['title' => 'Rapat, agenda, dan kegiatan bisnis', 'description' => 'Menyiapkan undangan dan perlengkapan kegiatan, menyusun agenda, mencatat hasil pembahasan, dan merapikan dokumen tindak lanjut.'],
                    ['title' => 'Etika kerja dan operasional layanan', 'description' => 'Menerapkan etika profesi, menjaga kerahasiaan informasi, mengatur prioritas tugas, bekerja dalam tim, dan mengevaluasi mutu pelayanan.'],
                ],
                'projects' => [
                    ['title' => 'Sistem arsip digital sederhana', 'description' => 'Menyusun struktur klasifikasi dan penamaan dokumen, membuat indeks pencarian, serta menyiapkan prosedur penyimpanan dan peminjaman arsip simulasi.'],
                    ['title' => 'Simulasi layanan meja informasi', 'description' => 'Merancang alur penerimaan tamu atau pertanyaan, melakukan pencatatan kebutuhan, meneruskan informasi ke pihak terkait, dan menyusun evaluasi layanan.'],
                    ['title' => 'Perencanaan rapat dan notula', 'description' => 'Menyiapkan undangan dan agenda, mendokumentasikan hasil rapat simulasi, lalu membuat notula dan daftar tindak lanjut dengan format yang jelas.'],
                ],
            ],
            'logistik' => [
                'title' => 'Logistik',
                'short_name' => 'LOGISTIK',
                'accent' => '#7c3aed',
                'summary' => 'Memahami perjalanan barang dari perencanaan, penyimpanan, hingga pengiriman melalui proses logistik yang tertata dan efisien.',
                'overview' => 'Program Logistik mempelajari pengelolaan arus barang dan informasi dalam rantai pasok, mulai dari barang diterima sampai disiapkan untuk dikirim. Siswa memahami pentingnya kesesuaian jumlah dan kondisi barang, pencatatan persediaan yang akurat, pemilihan proses penyimpanan, serta koordinasi pengiriman. Keselamatan kerja, ketepatan, dan efisiensi menjadi perhatian dalam setiap proses.',
                'competencies' => [
                    ['icon' => 'bi-box-seam-fill', 'title' => 'Pergudangan', 'description' => 'Penerimaan, pemeriksaan, penyimpanan, dan penataan barang.'],
                    ['icon' => 'bi-clipboard-data-fill', 'title' => 'Persediaan', 'description' => 'Pencatatan stok, kontrol barang, dan pencocokan persediaan.'],
                    ['icon' => 'bi-truck', 'title' => 'Transportasi & Distribusi', 'description' => 'Penyiapan pesanan, dokumen, dan alur pengiriman barang.'],
                    ['icon' => 'bi-file-earmark-text-fill', 'title' => 'Administrasi Logistik', 'description' => 'Pengelolaan dokumen dan informasi dalam rantai pasok.'],
                ],
                'gallery' => [
                    ['image' => 'images/jurusan-logistik-hd.png', 'alt' => 'Siswa mempelajari pengelolaan barang di area gudang', 'caption' => 'Pengenalan proses logistik', 'category' => 'Kegiatan Siswa'],
                    ['image' => 'images/fasilitas-ruang-logistik-2x.png', 'alt' => 'Area rak dan penyimpanan barang', 'caption' => 'Area penyimpanan dan pergudangan', 'category' => 'Praktik Logistik'],
                    ['image' => 'images/fasilitas-kelas-modern-2x.png', 'alt' => 'Ruang pembelajaran untuk studi kasus logistik', 'caption' => 'Pembelajaran dan studi kasus', 'category' => 'Pembelajaran'],
                    ['image' => 'images/fasilitas-lab-komputer-2x.png', 'alt' => 'Laboratorium komputer untuk pencatatan persediaan', 'caption' => 'Pencatatan data persediaan', 'category' => 'Praktik Logistik'],
                ],
                'careers' => ['Staf gudang', 'Staf inventori', 'Staf administrasi logistik', 'Petugas pengiriman'],
                'advantages' => [
                    'Mengenal proses barang dari penerimaan hingga pengiriman.',
                    'Latihan pencatatan stok dan pemeriksaan kondisi barang.',
                    'Memahami pentingnya ketepatan, efisiensi, dan keselamatan kerja.',
                    'Menghubungkan kegiatan pergudangan dengan administrasi distribusi.',
                ],
                'learning_areas' => [
                    ['title' => 'Dasar rantai pasok dan pengadaan', 'description' => 'Memahami hubungan antara pemasok, penyimpanan, distribusi, dan pelanggan serta mengenal dokumen dan informasi yang menyertai perpindahan barang.'],
                    ['title' => 'Penerimaan dan pemeriksaan barang', 'description' => 'Mencocokkan barang yang datang dengan dokumen, memeriksa jumlah dan kondisi, mencatat ketidaksesuaian, serta menyiapkan barang untuk proses berikutnya.'],
                    ['title' => 'Pergudangan dan tata letak', 'description' => 'Mengenal pengelompokan barang, penentuan lokasi penyimpanan, alur perpindahan di area gudang, serta prinsip kerapian dan keselamatan kerja.'],
                    ['title' => 'Persediaan dan pencatatan stok', 'description' => 'Mencatat barang masuk dan keluar, memantau saldo stok, melakukan pencocokan data dengan kondisi fisik, dan mengidentifikasi perbedaan persediaan.'],
                    ['title' => 'Penyiapan pesanan dan distribusi', 'description' => 'Memahami proses mengambil barang sesuai pesanan, memeriksa kesesuaian, mengemas, memberi identitas, dan menyiapkan dokumen sebelum pengiriman.'],
                    ['title' => 'Administrasi dan keselamatan logistik', 'description' => 'Mengenal dokumen dasar operasional, membuat catatan pergerakan barang, menggunakan perlengkapan dengan aman, dan menerapkan prosedur kerja yang tertib.'],
                ],
                'projects' => [
                    ['title' => 'Pencatatan stok gudang simulasi', 'description' => 'Membuat kartu stok, mencatat transaksi barang masuk dan keluar, membandingkan catatan dengan stok fisik, serta menyusun laporan selisih.'],
                    ['title' => 'Alur penerimaan hingga penyimpanan', 'description' => 'Menyusun langkah pemeriksaan barang, mencatat kondisi dan jumlah, menentukan lokasi penyimpanan, lalu membuat dokumen penerimaan simulasi.'],
                    ['title' => 'Penyiapan dan pemeriksaan pesanan', 'description' => 'Memproses daftar pesanan simulasi, mengambil barang sesuai jumlah, melakukan pemeriksaan akhir, menentukan kemasan, dan menyiapkan catatan pengiriman.'],
                ],
            ],
        ];
    }
}
