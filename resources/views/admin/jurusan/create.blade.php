@extends('admin.layout')

@section('title', 'Tambah Program Keahlian Baru')
@section('page_title', 'Tambah Program Keahlian')

@section('content')
<!-- Page Header & Action Bar -->
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div class="d-flex align-items-center gap-3">
        <a href="{{ route('admin.jurusan.index') }}" class="btn btn-outline-secondary btn-sm rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 40px; height: 40px;" title="Kembali ke Daftar Jurusan">
            <i class="bi bi-arrow-left fs-5"></i>
        </a>
        <div>
            <h4 class="fw-bold text-dark mb-0.5">Tambah Program Keahlian Baru</h4>
            <p class="text-muted small mb-0">Input data konsentrasi keahlian vokasi, kurikulum industri, dan profil kompetensi.</p>
        </div>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="{{ route('admin.jurusan.index') }}" class="btn btn-light border btn-sm px-3 py-2 rounded-3 text-secondary">
            Batal
        </a>
        <button type="submit" form="formJurusan" class="btn-admin-primary">
            <i class="bi bi-check-circle-fill"></i>
            <span>Simpan Program</span>
        </button>
    </div>
</div>

<form id="formJurusan" action="{{ route('admin.jurusan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-4">
        <!-- Main Form Column (Left) -->
        <div class="col-12 col-lg-8">
            <!-- Card 1: Identitas Pokok Program -->
            <div class="card-form">
                <div class="card-header">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-card-heading text-primary fs-5"></i>
                        <h6 class="fw-bold text-dark mb-0">Identitas Program Keahlian</h6>
                    </div>
                    <span class="badge bg-light text-muted border small">Wajib Diisi</span>
                </div>
                <div class="card-body">
                    <div class="row g-3 mb-3">
                        <div class="col-md-8">
                            <label for="name" class="form-label-modern">
                                <span>Nama Lengkap Program Keahlian <span class="text-danger">*</span></span>
                            </label>
                            <input type="text" name="name" id="name" class="form-control-modern" placeholder="Contoh: Teknik Jaringan Komputer & Telekomunikasi" value="{{ old('name') }}" required oninput="updateLivePreview()">
                            @error('name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="short_name" class="form-label-modern">
                                <span>Singkatan / Kode Singkat <span class="text-danger">*</span></span>
                            </label>
                            <input type="text" name="short_name" id="short_name" class="form-control-modern" placeholder="Contoh: TJKT" value="{{ old('short_name') }}" required oninput="updateLivePreview()">
                            @error('short_name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="code" class="form-label-modern">
                                <span>Kode Kurikulum / SKKNI</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-upc-scan"></i></span>
                                <input type="text" name="code" id="code" class="form-control-modern border-start-0" placeholder="Contoh: TJKT-01" value="{{ old('code') }}" oninput="updateLivePreview()">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="head_of_program" class="form-label-modern">
                                <span>Kepala Konsentrasi Keahlian</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-person-badge"></i></span>
                                <input type="text" name="head_of_program" id="head_of_program" class="form-control-modern border-start-0" placeholder="Contoh: Ir. Nama Guru, M.Kom" value="{{ old('head_of_program') }}" oninput="updateLivePreview()">
                            </div>
                        </div>
                    </div>

                    <div class="mb-0">
                        <label for="description" class="form-label-modern">
                            <span>Deskripsi Profil Program <span class="text-danger">*</span></span>
                        </label>
                        <textarea name="description" id="description" rows="4" class="form-control-modern" placeholder="Jelaskan ringkasan kejuruan, fokus kurikulum vokasi, dan keunggulan praktikum industri..." required oninput="updateLivePreview()">{{ old('description') }}</textarea>
                        <div class="form-helper-text">Ringkasan singkat yang akan tampil pada kartu katalog jurusan di halaman depan.</div>
                        @error('description')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Card 2: Visi & Misi Kejuruan -->
            <div class="card-form">
                <div class="card-header">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-compass text-primary fs-5"></i>
                        <h6 class="fw-bold text-dark mb-0">Visi & Misi Program Keahlian</h6>
                    </div>
                    <span class="badge bg-light text-muted border small">Opsional</span>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="vision" class="form-label-modern">
                                <span>Visi Kejuruan</span>
                            </label>
                            <textarea name="vision" id="vision" rows="3" class="form-control-modern" placeholder="Tuliskan target visi jangka panjang program keahlian...">{{ old('vision') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="mission" class="form-label-modern">
                                <span>Misi Kejuruan</span>
                            </label>
                            <textarea name="mission" id="mission" rows="3" class="form-control-modern" placeholder="Tuliskan butir-butir misi pelaksanaan kurikulum...">{{ old('mission') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3: Kompetensi Inti & Karir -->
            <div class="card-form">
                <div class="card-header">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-award text-primary fs-5"></i>
                        <h6 class="fw-bold text-dark mb-0">Kompetensi Vokasi & Prospek Karir</h6>
                    </div>
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle small">1 Baris per Item</span>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="competencies" class="form-label-modern">
                            <span>Daftar Kompetensi Inti Keahlian</span>
                            <span class="badge bg-light text-muted border font-monospace">1 baris = 1 keahlian</span>
                        </label>
                        <textarea name="competencies" id="competencies" rows="4" class="form-control-modern font-monospace" placeholder="Administrasi Jaringan & Server&#10;Keamanan Siber & Ethical Hacking&#10;Konfigurasi Cloud & Data Center&#10;Otomasi Jaringan & DevOps">{{ old('competencies') }}</textarea>
                        <div class="form-helper-text">Keahlian spesifik yang dipelajari siswa selama 3 tahun di sekolah.</div>
                    </div>

                    <div class="mb-0">
                        <label for="career_prospects" class="form-label-modern">
                            <span>Peluang Karir & Profesi Lulusan</span>
                            <span class="badge bg-light text-muted border font-monospace">1 baris = 1 profesi</span>
                        </label>
                        <textarea name="career_prospects" id="career_prospects" rows="3" class="form-control-modern font-monospace" placeholder="Network Engineer&#10;Cloud Administrator&#10;Cybersecurity Specialist&#10;Technical Support IT">{{ old('career_prospects') }}</textarea>
                        <div class="form-helper-text">Posisi pekerjaan di industri yang siap diisi oleh para lulusan.</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Configuration Column (Right) -->
        <div class="col-12 col-lg-4">
            <!-- Live Preview Mini Card -->
            <div class="card-form mb-4">
                <div class="card-header bg-light bg-opacity-50 py-2.5">
                    <small class="fw-bold text-dark text-uppercase" style="letter-spacing: 0.5px; font-size: 0.72rem;">
                        <i class="bi bi-eye text-primary me-1"></i>Live Preview Tampilan
                    </small>
                </div>
                <div class="card-body p-3">
                    <div class="border rounded-3 p-3 bg-white shadow-sm" style="border-left: 4px solid #2563eb !important;" id="previewCardBorder">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <div class="rounded-3 text-white d-flex align-items-center justify-content-center shadow-sm" style="width: 36px; height: 36px; background-color: #2563eb; font-size: 1.1rem;" id="previewIconBox">
                                <i class="bi bi-mortarboard" id="previewIconGlyph"></i>
                            </div>
                            <div class="overflow-hidden">
                                <span class="badge bg-light text-dark border font-monospace" style="font-size: 0.68rem;" id="previewCode">TJKT-01</span>
                                <div class="fw-bold text-dark text-truncate small" id="previewTitle">Nama Program Keahlian</div>
                            </div>
                        </div>
                        <small class="text-secondary d-block text-truncate mb-2" style="font-size: 0.75rem;" id="previewDesc">
                            Deskripsi ringkas profil kejuruan akan tampil di sini...
                        </small>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                            <small class="text-muted" style="font-size: 0.7rem;" id="previewHead">Ir. Nama Guru</small>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill" style="font-size: 0.68rem;" id="previewStatus">Aktif</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card: Desain & Visual Identitas -->
            <div class="card-form mb-4">
                <div class="card-header">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-palette text-primary fs-5"></i>
                        <h6 class="fw-bold text-dark mb-0">Identitas Visual & Media</h6>
                    </div>
                </div>
                <div class="card-body">
                    <input type="hidden" name="accent_color" id="accent_color" value="{{ old('accent_color', '#2563eb') }}">

                    <!-- Bootstrap Icon Picker -->
                    <div class="mb-3">
                        <label for="icon" class="form-label-modern">
                            <span>Icon Bootstrap</span>
                        </label>
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-light border-end-0 text-muted" id="iconHelper"><i class="bi bi-hdd-network"></i></span>
                            <input type="text" name="icon" id="icon" class="form-control-modern border-start-0" placeholder="bi-hdd-network" value="{{ old('icon', 'bi-hdd-network') }}" oninput="updateLiveIcon(this.value)">
                        </div>
                        <div class="d-flex align-items-center gap-1 flex-wrap">
                            <span class="icon-chip-btn" onclick="selectIcon('bi-hdd-network')"><i class="bi bi-hdd-network"></i> Network</span>
                            <span class="icon-chip-btn" onclick="selectIcon('bi-cpu')"><i class="bi bi-cpu"></i> Hardware</span>
                            <span class="icon-chip-btn" onclick="selectIcon('bi-calculator')"><i class="bi bi-calculator"></i> Akuntansi</span>
                            <span class="icon-chip-btn" onclick="selectIcon('bi-briefcase')"><i class="bi bi-briefcase"></i> Kantor</span>
                            <span class="icon-chip-btn" onclick="selectIcon('bi-boxes')"><i class="bi bi-boxes"></i> Logistik</span>
                            <span class="icon-chip-btn" onclick="selectIcon('bi-shield-check')"><i class="bi bi-shield-check"></i> Cyber</span>
                        </div>
                    </div>

                    <!-- Banner Foto Upload -->
                    <div class="mb-3">
                        <label for="image_file" class="form-label-modern">
                            <span>Unggah Foto Banner Jurusan</span>
                        </label>
                        <div class="upload-dropzone-box" onclick="document.getElementById('image_file').click()">
                            <i class="bi bi-cloud-arrow-up-fill fs-2 text-primary d-block mb-1"></i>
                            <div class="small fw-semibold text-dark">Klik untuk Pilih Gambar Banner</div>
                            <small class="text-muted d-block" style="font-size: 0.72rem;">JPG, PNG, atau WebP (Maks. 3MB)</small>
                            <input type="file" name="image_file" id="image_file" class="d-none" accept="image/*" onchange="previewUpload(event)">
                        </div>
                        <div id="imageNamePreview" class="small text-primary fw-semibold mt-1 d-none text-truncate"></div>
                    </div>

                    <!-- Path Relatif Alternatif -->
                    <div class="mb-3">
                        <label for="image_url" class="form-label-modern">
                            <span>Atau Gunakan Path Gambar Default</span>
                        </label>
                        <input type="text" name="image_url" id="image_url" class="form-control-modern" placeholder="images/jurusan-tjkt-hd.png" value="{{ old('image_url') }}">
                    </div>

                    <!-- Status Switch -->
                    <div class="pt-2 border-top">
                        <div class="form-check form-switch d-flex align-items-center justify-content-between p-0 m-0">
                            <label class="form-check-label fw-bold text-dark small" for="is_active">
                                Status Aktif (Tampil di Web)
                            </label>
                            <input class="form-check-input ms-auto" type="checkbox" name="is_active" id="is_active" value="1" checked style="width: 2.4em; height: 1.25em; cursor: pointer;" onchange="updateLiveStatus(this.checked)">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button Card -->
            <div class="card-form p-3">
                <button type="submit" class="btn-admin-primary w-100 py-2.5 d-flex align-items-center justify-content-center gap-2 mb-2 fs-6">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Simpan Program Keahlian</span>
                </button>
                <a href="{{ route('admin.jurusan.index') }}" class="btn btn-light border w-100 py-2 small fw-semibold text-secondary">
                    Batal & Kembali
                </a>
            </div>
        </div>
    </div>
</form>

<script>
    function updateLivePreview() {
        const name = document.getElementById('name').value || 'Nama Program Keahlian';
        const shortName = document.getElementById('short_name').value;
        const code = document.getElementById('code').value || shortName || 'KODE-01';
        const head = document.getElementById('head_of_program').value || 'Belum ditentukan';
        const desc = document.getElementById('description').value || 'Deskripsi ringkas profil kejuruan akan tampil di sini...';

        document.getElementById('previewTitle').innerText = name;
        document.getElementById('previewCode').innerText = code;
        document.getElementById('previewHead').innerText = head;
        document.getElementById('previewDesc').innerText = desc;
    }

    function selectColor(colorHex) {
        document.getElementById('accent_color').value = colorHex;
        document.getElementById('accent_color_hex').value = colorHex;
        syncColor(colorHex);
    }

    function syncColor(hex) {
        document.getElementById('accent_color_hex').value = hex;
        document.getElementById('previewIconBox').style.backgroundColor = hex;
        document.getElementById('previewCardBorder').style.borderLeftColor = hex;
    }

    function syncColorHex(hex) {
        if (/^#[0-9A-F]{6}$/i.test(hex)) {
            document.getElementById('accent_color').value = hex;
            syncColor(hex);
        }
    }

    function selectIcon(iconName) {
        document.getElementById('icon').value = iconName;
        updateLiveIcon(iconName);
    }

    function updateLiveIcon(iconName) {
        const cleanIcon = iconName.trim();
        document.getElementById('previewIconGlyph').className = 'bi ' + (cleanIcon || 'bi-mortarboard');
        document.getElementById('iconHelper').innerHTML = '<i class="bi ' + (cleanIcon || 'bi-mortarboard') + '"></i>';
    }

    function updateLiveStatus(isChecked) {
        const statusBadge = document.getElementById('previewStatus');
        if (isChecked) {
            statusBadge.className = 'badge bg-success-subtle text-success border border-success-subtle rounded-pill';
            statusBadge.innerText = 'Aktif';
        } else {
            statusBadge.className = 'badge bg-secondary-subtle text-secondary border rounded-pill';
            statusBadge.innerText = 'Non-Aktif';
        }
    }

    function previewUpload(event) {
        const file = event.target.files[0];
        if (file) {
            const previewEl = document.getElementById('imageNamePreview');
            previewEl.innerText = 'File dipilih: ' + file.name;
            previewEl.classList.remove('d-none');
        }
    }
</script>
@endsection
