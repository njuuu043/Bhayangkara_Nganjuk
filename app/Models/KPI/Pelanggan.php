<?php

namespace App\Models\KPI;

use CodeIgniter\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey =  'tahun';
    protected $allowedFields =  [
        'bulan',
        'akses_dan_kontinuitas_pelayanan',
        'hak_pasien_dan_keluarga',
        'pengkajian_pasien',
        'pelayanan_dan_asuhan_pasien',
        'pelayanan_anestesi_dan_bedah',
        'pelayanan_kefarmasian_dan_penggunaan_obat',
        'komunikasi_dan_edukasi',
        'persen_akp',
        'persen_hpk',
        'persen_pp',
        'persen_pap',
        'persen_pab',
        'persen_pkpo',
        'persen_ke',
        'persen_pelanggan',
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
