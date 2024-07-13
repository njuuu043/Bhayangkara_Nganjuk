<?php

namespace App\Models\KPI;

use CodeIgniter\Model;

class BobotBSCModel extends Model
{
    protected $table = 'bobot';
    protected $primaryKey = 'tahun';
    protected $allowedFields =  ['keuangan','bisnis_internal','pelanggan','pembelajaran_pertumbuhan','user_entry','updated_at'];
    protected $useAutoIncrement = false;

    public function getPeriode()
    {
        $builder = $this->db->table('bobot');
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
    public function getEntryByTahun($tahun)
    {
        $builder = $this->db->table('bobot');
        $builder->where('bobot.tahun', $tahun);
        $query = $builder->get();
        return  $query->getResultArray();
    }
}