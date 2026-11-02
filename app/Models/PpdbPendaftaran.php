<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpdbPendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_pendaftaran',
        'nama_lengkap',
        'nisn',
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'no_hp',
        'email',
        'alamat',
        'asal_sekolah',
        'pilihan_jurusan_1',
        'pilihan_jurusan_2',
        'nama_orang_tua',
        'no_hp_orang_tua',
        'jalur_pendaftaran',
        'status',
        'catatan_admin',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->nomor_pendaftaran)) {
                $year = date('Y');
                $count = static::whereYear('created_at', $year)->count() + 1;
                $model->nomor_pendaftaran = 'PPDB-' . $year . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);
            }
        });
    }

    public function getStatusBadgeAttribute(): string
    {
        return match ($this->status) {
            'Diterima' => 'badge bg-success',
            'Ditolak' => 'badge bg-danger',
            'Diverifikasi' => 'badge bg-info text-dark',
            default => 'badge bg-warning text-dark',
        };
    }
}
