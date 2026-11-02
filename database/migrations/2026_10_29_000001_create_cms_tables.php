<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add role & phone to users table if not exists
        if (!Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('role')->default('admin')->after('password');
                $table->string('phone')->nullable()->after('role');
                $table->string('avatar')->nullable()->after('phone');
            });
        }

        // Berita & Artikel
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->default('Akademik');
            $table->string('category_slug')->default('akademik');
            $table->string('author')->default('Humas & Kominfo');
            $table->string('author_role')->nullable()->default('Tim Media SMK Gema Cyber School');
            $table->string('read_time')->default('3 Menit Baca');
            $table->unsignedInteger('views')->default(0);
            $table->string('image')->nullable();
            $table->string('image_caption')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->text('excerpt');
            $table->longText('body');
            $table->text('tags')->nullable(); // JSON or comma-separated
            $table->date('published_at')->nullable();
            $table->timestamps();
        });

        // Jurusan / Program Keahlian
        Schema::create('jurusans', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('short_name');
            $table->string('code')->nullable();
            $table->string('head_of_program')->nullable();
            $table->text('description')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->text('career_prospects')->nullable(); // JSON or text
            $table->text('competencies')->nullable(); // JSON or text
            $table->text('facilities')->nullable(); // JSON or text
            $table->string('image')->nullable();
            $table->string('icon')->nullable();
            $table->string('accent_color')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Ekstrakurikuler
        Schema::create('ekstrakurikulers', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('category')->default('Teknologi & IT');
            $table->string('category_slug')->default('teknologi');
            $table->string('tagline')->nullable();
            $table->text('description')->nullable();
            $table->text('activities')->nullable(); // JSON or text
            $table->text('curriculum')->nullable(); // JSON or text
            $table->string('schedule')->nullable();
            $table->string('days')->nullable();
            $table->string('time')->nullable();
            $table->string('location')->nullable();
            $table->string('instructor')->nullable();
            $table->string('instructor_role')->nullable();
            $table->string('members_count')->nullable()->default('30 Siswa');
            $table->string('badge')->nullable();
            $table->string('icon')->nullable()->default('bi-star-fill');
            $table->string('color')->nullable()->default('#2563eb');
            $table->string('background')->nullable()->default('#eff6ff');
            $table->text('achievements')->nullable();
            $table->text('requirements')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        // Prestasi Siswa
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('event');
            $table->string('level')->default('Tingkat Nasional');
            $table->string('level_slug')->default('nasional');
            $table->string('level_badge')->nullable()->default('danger');
            $table->string('year')->default('2025');
            $table->string('category')->default('Teknologi & IT');
            $table->string('category_slug')->default('teknologi');
            $table->string('medal')->default('Medali Emas / Juara 1');
            $table->string('medal_icon')->nullable()->default('bi-trophy-fill');
            $table->string('medal_color')->nullable()->default('#f59e0b');
            $table->string('image')->nullable();
            $table->string('students');
            $table->string('instructor')->nullable();
            $table->string('date')->nullable();
            $table->string('location')->nullable();
            $table->string('organizer')->nullable();
            $table->text('description')->nullable();
            $table->text('highlights')->nullable(); // JSON or text
            $table->timestamps();
        });

        // Galeri Dokumentasi
        Schema::create('galeris', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category_slug')->default('event');
            $table->string('category_label')->default('Agenda Sekolah');
            $table->string('category_badge')->nullable();
            $table->string('date')->nullable();
            $table->string('location')->nullable();
            $table->string('photographer')->nullable();
            $table->string('image');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // PPDB Registrations
        Schema::create('ppdb_pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pendaftaran')->unique();
            $table->string('nama_lengkap');
            $table->string('nisn')->nullable();
            $table->string('nik')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->default('Laki-laki');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('no_hp');
            $table->string('email')->nullable();
            $table->text('alamat')->nullable();
            $table->string('asal_sekolah');
            $table->string('pilihan_jurusan_1');
            $table->string('pilihan_jurusan_2')->nullable();
            $table->string('nama_orang_tua')->nullable();
            $table->string('no_hp_orang_tua')->nullable();
            $table->string('jalur_pendaftaran')->default('Reguler');
            $table->string('status')->default('Menunggu Verifikasi'); // Menunggu Verifikasi, Diverifikasi, Diterima, Ditolak
            $table->text('catatan_admin')->nullable();
            $table->timestamps();
        });

        // Pesan Masuk / Kontak
        Schema::create('pesan_kontaks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('no_hp')->nullable();
            $table->string('subjek');
            $table->text('pesan');
            $table->boolean('status_dibaca')->default(false);
            $table->text('catatan_balasan')->nullable();
            $table->timestamps();
        });

        // Agenda Sekolah
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('day');
            $table->string('month');
            $table->string('year');
            $table->date('event_date')->nullable();
            $table->string('location')->nullable();
            $table->string('badge')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
        Schema::dropIfExists('pesan_kontaks');
        Schema::dropIfExists('ppdb_pendaftarans');
        Schema::dropIfExists('galeris');
        Schema::dropIfExists('prestasis');
        Schema::dropIfExists('ekstrakurikulers');
        Schema::dropIfExists('jurusans');
        Schema::dropIfExists('beritas');

        if (Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn(['role', 'phone', 'avatar']);
            });
        }
    }
};
