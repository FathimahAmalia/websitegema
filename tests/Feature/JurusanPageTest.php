<?php

namespace Tests\Feature;

use Tests\TestCase;

class JurusanPageTest extends TestCase
{
    public function test_each_program_has_a_detail_page(): void
    {
        $programs = [
            'tjkt' => 'Teknik Jaringan Komputer &amp; Telekomunikasi',
            'akl' => 'Akuntansi dan Keuangan Lembaga',
            'mplb' => 'Manajemen Perkantoran dan Layanan Bisnis',
            'logistik' => 'Logistik',
        ];

        foreach ($programs as $slug => $title) {
            $response = $this->get('/jurusan/' . $slug);

            $response->assertOk()
                ->assertSee($title, false)
                ->assertSee('Kegiatan')
                ->assertSee('Pencarian Berita & Website', false)
                ->assertSee('PPDB Online')
                ->assertSee('TENTANG JURUSAN')
                ->assertSee('Galeri Kegiatan')
                ->assertSee('Peluang Kerja')
                ->assertSee('Keunggulan Jurusan')
                ->assertSee('Ruang lingkup pembelajaran')
                ->assertSee('Contoh proyek praktik')
                ->assertSee('Lihat semua kegiatan')
                ->assertSee('PROYEK 03')
                ->assertDontSee('Pengalaman Belajar')
                ->assertDontSee('Peluang Karier')
                ->assertDontSee('aria-label="breadcrumb"')
                ->assertDontSee('program-gallery-thumbnail')
                ->assertSee('program-gallery-teasers')
                ->assertSee('Pratinjau foto kegiatan lainnya');
        }
    }

    public function test_each_program_has_a_separate_gallery_page(): void
    {
        foreach (['tjkt', 'akl', 'mplb', 'logistik'] as $slug) {
            $response = $this->get('/jurusan/' . $slug . '/galeri');

            $response->assertOk()
                ->assertSee('Galeri Kegiatan')
                ->assertSee(strtoupper($slug))
                ->assertSee('Dokumentasi Kegiatan')
                ->assertSee('program-gallery-hero-image')
                ->assertSee('program-gallery-filter')
                ->assertSee('Semua')
                ->assertSee('Kembali ke detail jurusan')
                ->assertDontSee('breadcrumb');

            $this->assertSame(4, substr_count($response->getContent(), 'class="program-gallery-card"'));
        }
    }

    public function test_unknown_program_returns_not_found(): void
    {
        $this->get('/jurusan/program-tidak-tersedia')->assertNotFound();
    }

    public function test_unknown_program_gallery_returns_not_found(): void
    {
        $this->get('/jurusan/program-tidak-tersedia/galeri')->assertNotFound();
    }
}
