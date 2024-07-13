<?php

namespace App\Controllers\KPI;

use App\Controllers\BaseController;
use App\Models\KPI\BobotBSCModel as KPIBobotBSCModel;

class BobotBSCController extends BaseController
{
    protected $BobotBSC;
    public function __construct()
    {
        $this->BobotBSC = new KPIBobotBSCModel();
    }

    public function index()
    {
        $getData = $this->BobotBSC->orderBy('tahun', 'DESC')->paginate(12, 'data');
        $data = [
            'title' => 'Data Bobot Penilaian Kinerja',
            'entry' => $getData,
            'periode' => $this->BobotBSC->getPeriode(),
            'pager' => $this->BobotBSC->pager
        ];
        return view('kpi/bobot/bobotView', $data);
    }

    public function getData($tahun)
    {
        $getUser = $this->BobotBSC->where('tahun', $tahun)->first();
        return json_encode($getUser);
    }

    public function add()
    {
        $input = $this->request->getVar();
        $checkPeriode = $this->BobotBSC->where('tahun', $input['tahun'])->first();
        $checkBobot = intval($input['keuangan']) + intval($input['pelanggan']) + intval($input['bisnis_internal']) + intval($input['pembelajaran_pertumbuhan']);
        if ($checkBobot !== 100) {
            return redirect()->back()->withInput()->with('error', 'Data Gagal ditambahkan, Total Nilai Seluruh Perspektif Harus Berjumlah 100');
        }
        if ($checkPeriode == null) {
            try {
                $this->BobotBSC->set('entry_id', 'gen_random_uuid()', FALSE);
                $this->BobotBSC->save(
                    [
                        'tahun' => $input['tahun'],
                        'keuangan' =>  floatval($input['keuangan']) / 100,
                        'pelanggan' => floatval($input['pelanggan']) / 100,
                        'bisnis_internal' => floatval($input['bisnis_internal']) / 100,
                        'pembelajaran_pertumbuhan' => floatval($input['pembelajaran_pertumbuhan']) / 100,
                        'user_entry' => (string)session('userInfo')['nama'],
                    ]
                );
                session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
                return redirect()->to('/bobot-penilaian-kinerja');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', "Data Gagal Ditambahkan, pastikan format sesuai - " . $th);
            }
        } else {
            session()->setFlashdata('error', 'Data Pada Periode yang sama Telah Tersedia');
            return redirect()->back()->withInput()->with('error', "Data Pada Periode yang sama Telah Tersedia");
        }
    }
    public function delete($tahun)
    {
        $this->BobotBSC->delete($tahun);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/bobot-penilaian-kinerja');
    }
    public function detail($tahun)
    {
        $datakpi = $this->BobotBSC->getEntryByTahun($tahun);
        $datakpi = call_user_func_array('array_merge',  $datakpi);
        $data = [
            'title' => 'Detail Data Penilaian Kinerja',
            'data' => $datakpi,
        ];

        return view('kpi/bobot/bobotDetail', $data);
    }
    public function update($tahun)
    {
        $input = $this->request->getVar();
        $checkBobot = intval($input['keuangan']) + intval($input['pelanggan']) + intval($input['bisnis_internal']) + intval($input['pembelajaran_pertumbuhan']);
        if ($checkBobot !== 100) {
            return redirect()->back()->with('error', 'Gagal Update, Total Nilai Seluruh Perspektif Harus Berjumlah 100');
        }
        try {
            $this->BobotBSC->save(
                [
                    'tahun' => $tahun,
                    'keuangan' =>  intval($input['keuangan']) / 100,
                    'pelanggan' => intval($input['pelanggan']) / 100,
                    'bisnis_internal' => intval($input['bisnis_internal']) / 100,
                    'pembelajaran_pertumbuhan' => intval($input['pembelajaran_pertumbuhan']) / 100,
                    'updated_at' => date('Y-m-d H:i:sP'),
                    'user_entry' => (string)session('userInfo')['nama']
                ]
            );
            session()->setFlashdata('pesan', 'Data Berhasil Diperbaharui');
            return redirect()->to('/bobot-penilaian-kinerja');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', "Data Gagal diperbaharui, pastikan format sesuai - "  . $th->getMessage());
        }
    }
}
