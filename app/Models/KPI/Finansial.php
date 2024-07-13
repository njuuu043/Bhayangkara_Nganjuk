<?php

namespace App\Models\KPI;

use CodeIgniter\Model;

class Finansial extends Model
{
    protected $table = 'finansial';
    protected $primaryKey =  'tahun';
    protected $allowedFields =  [
        'bulan',
        'pendapatan_pnbp',
        'beban_operasional',
        'beban_penyusutan',
        'target_pnbp_operasional',
        'pendapatan_blu',
        'target_pendapatan_blu',
        'lama_penyampaian_data_proyeksi',
        'rasio',
        'index_akurasi',
        'index_ketepatan',
        'persen_akurasi_blu',
        'index_blu',
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
