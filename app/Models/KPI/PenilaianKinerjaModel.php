<?php

namespace App\Models\KPI;

use CodeIgniter\Model;

class PenilaianKinerjaModel extends Model
{
    protected $table = 'penilaian_kinerja';
    protected $primaryKey =  'tahun';
    protected $allowedFields =  ['bulan', 'updated_at', 'user_entry'];
    protected $useAutoIncrement = false;
    public function getPeriode()
    {
        $builder = $this->db->table('penilaian_kinerja');
        $builder->distinct();
        $builder->select('tahun');
        $builder->orderBy('tahun', 'DESC');
        $query = $builder->get();

        $periode = [];

        if ($query->getResultArray() != 0) {
            foreach ($query->getResultArray() as $array) {
                foreach ($array as $value) {
                    $periode[] = $value;
                }
            }
        }

        return $periode;
    }
    public function search($keyword)
    {
        return $this->table('penilaian_kinerja')->where("tahun", $keyword)->orderBy('bulan', 'desc')->paginate(10, 'penilaian_kinerja');
    }
    public function getEntryById($tahun, $bulan)
    {
        $builder = $this->db->table('penilaian_kinerja');
        $builder->select('*');
        $builder->join('finansial', 'penilaian_kinerja.tahun = finansial.tahun AND penilaian_kinerja.bulan = finansial.bulan');
        $builder->join('bisnis_internal', 'penilaian_kinerja.tahun = bisnis_internal.tahun AND penilaian_kinerja.bulan = bisnis_internal.bulan');
        $builder->join('pelanggan', 'penilaian_kinerja.tahun = pelanggan.tahun AND penilaian_kinerja.bulan = pelanggan.bulan');
        $builder->join('pembelajaran_dan_pertumbuhan', 'penilaian_kinerja.tahun = pembelajaran_dan_pertumbuhan.tahun AND penilaian_kinerja.bulan = pembelajaran_dan_pertumbuhan.bulan');
        $builder->where('penilaian_kinerja.tahun', $tahun);
        $builder->where('penilaian_kinerja.bulan', $bulan);
        $query = $builder->get();
        return  $query->getResultArray();
    }
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
