<?php

namespace App\Models\KPI;

use CodeIgniter\Model;

class BisnisInternal extends Model
{
    protected $table = 'bisnis_internal';
    protected $primaryKey =  'tahun';
    protected $allowedFields =  [
        'bulan',
        'tata_kelola_rumah_sakit',
        'kualifikasi_dan_pendidikan_staf',
        'manajemen_fasilitas_dan_keselamatan',
        'peningkatan_mutu_dan_keselamatan_pasien',
        'manajemen_rekam_medik_dan_informasi_kesehatan',
        'pencegahan_dan_pengendalian_infeksi',
        'pendidikan_dalam_pelayanan_kesehatan',
        'persen_tkrs',
        'persen_kps',
        'persen_mfk',
        'persen_pmks',
        'persen_mrmik',
        'persen_ppi',
        'persen_ppk',
        'persen_bi',
        'akhir_bulan'
    ];
    protected $useAutoIncrement = false;
    public function getByCompositeKey($tahun, $bulan)
    {
        return $this->where(['tahun' => $tahun, 'bulan' => $bulan])->first();
    }
    public function deleteByCompositeKey($tahun, $bulan)
    {
        return $this->where(['tahun' => $tahun, 'bulan' => $bulan])->delete();
    }
    public function updateByCompositeKey($data, $tahun, $bulan)
    {
        return $this->where(['tahun' => $tahun, 'bulan' => $bulan])->set($data)->update();
    }
}
