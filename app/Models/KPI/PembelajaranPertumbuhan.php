<?php

namespace App\Models\KPI;

use CodeIgniter\Model;

class PembelajaranPertumbuhan extends Model
{
    protected $table = 'pembelajaran_dan_pertumbuhan';
    protected $primaryKey =  'tahun';
    protected $allowedFields =  [
       'bulan',
        'sasaran_keselamatan_pasien',
        'program_nasional',
        'persen_skp',
        'persen_pn',
        'persen_pembelajaran',
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
