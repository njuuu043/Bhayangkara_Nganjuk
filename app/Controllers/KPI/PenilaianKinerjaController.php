<?php

namespace App\Controllers\KPI;

use App\Controllers\BaseController;
use App\Models\KPI\BisnisInternal;
use App\Models\KPI\Finansial;
use App\Models\KPI\Pelanggan;
use App\Models\KPI\PembelajaranPertumbuhan;
use App\Models\KPI\PenilaianKinerjaModel;
use DateTime;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;


class PenilaianKinerjaController extends BaseController
{
    protected $BisnisInternal;
    protected $Finansial;
    protected $PembelajaranPertumbuhan;
    protected $Pelanggan;
    protected $PenilaianKinerja;
    public function __construct()
    {
        $this->BisnisInternal = new BisnisInternal();
        $this->Finansial = new Finansial();
        $this->PembelajaranPertumbuhan = new PembelajaranPertumbuhan();
        $this->Pelanggan = new Pelanggan();
        $this->PenilaianKinerja = new PenilaianKinerjaModel();
    }
    public function index()
    {
        $search =  $this->request->getVar('periode');
        if (!$search == null) {
            $getData = $this->PenilaianKinerja->search($search);
        } else {
            $getData = $this->PenilaianKinerja->orderBy('tahun', 'ASC')->orderBy('bulan', 'ASC')->paginate(12, 'data');
        }
        $data = [
            'title' => 'Penilaian Kinerja',
            'entry' => $getData,
            'periode' => $this->PenilaianKinerja->getPeriode(),
            'pager' => $this->PenilaianKinerja->pager
        ];
        return view('kpi/PenilaianKinerja/penilaianKinerjaView', $data);
    }
    public function uploadFile()
    {
        $validationRules = [
            'excel_file' => [
                'rules'  => 'uploaded[excel_file]|max_size[excel_file,300]|ext_in[excel_file,xls,xlsx]',
                'errors' => [
                    'uploaded' => 'File Upload Tidak Boleh Kosong',
                    'ext_in'   => 'Hanya format .xls dan .xlsx yang diperbolehkan',
                    'max_size' => 'Size File Maksimal 300 KB.'
                ]
            ]
        ];
        if (!$this->validate($validationRules)) {
            return redirect()->back()->with('error', $this->validator->getErrors()['excel_file']);
        }

        $file = $this->request->getFile('excel_file');
        $extension = $file->getClientExtension();
        if ($extension == 'xlsx' || $extension == 'xls') {
            if ($extension == 'xls') {
                $reader = new Xls();
            } else {
                $reader = new Xlsx();
            }
            $spreadsheet = $reader->load($file);
            $ranges = [
                'E9:E10',
                'E14:E25', 'E28:E42', 'E45:E59', 'E62:E66'
            ];
            $excelValue = [];
            foreach ($ranges as $range) {
                $sheetData = $spreadsheet->getActiveSheet()->rangeToArray($range, null, true, false, true);
                $excelValue = array_merge($excelValue, $sheetData);
            }
            foreach ($excelValue as $array) {
                foreach ($array as $value) {
                    $excelData[] = $value;
                }
            }
            if (!in_array(null, $excelData, true)) {
                $data = $excelData;
                $tahun = $data[0];
                $bulan = $data[1];
                $date = new DateTime("$tahun-$bulan-01");
                $date->modify('last day of this month');
                $endOfMonth = $date->format('Y-m-d');
                $existingRecord = $this->PenilaianKinerja->getWhere(['tahun' => $tahun, 'bulan' => $bulan])->getRow();
                if ($existingRecord == null) {
                    try {
                        $this->PenilaianKinerja->set('tahun', $tahun, true)
                            ->set('bulan', $bulan, true)
                            ->set('user_entry', (string)session('userInfo')['nama'])
                            ->set('created_at', date('Y-m-d H:i:sP'))
                            ->insert();

                        // Insert into Finansial
                        $this->Finansial->set('tahun', $tahun, true)
                            ->set('bulan', $bulan, true)
                            ->set('pendapatan_pnbp', $data[2])
                            ->set('beban_operasional', $data[3])
                            ->set('beban_penyusutan', $data[4])
                            ->set('target_pnbp_operasional', $data[5])
                            ->set('pendapatan_blu', $data[6])
                            ->set('target_pendapatan_blu', $data[7])
                            ->set('lama_penyampaian_data_proyeksi', $data[8])
                            ->set('rasio', $data[9])
                            ->set('index_akurasi', $data[10])
                            ->set('index_ketepatan', $data[11])
                            ->set('persen_akurasi_blu', $data[12])
                            ->set('index_blu', $data[13])
                            ->set('akhir_bulan', $endOfMonth)
                            ->insert();

                        // Insert into Bisnis Internal
                        $this->BisnisInternal->set('tahun', $tahun, true)
                            ->set('bulan', $bulan, true)
                            ->set('tata_kelola_rumah_sakit', $data[14])
                            ->set('kualifikasi_dan_pendidikan_staf', $data[15])
                            ->set('manajemen_fasilitas_dan_keselamatan', $data[16])
                            ->set('peningkatan_mutu_dan_keselamatan_pasien', $data[17])
                            ->set('manajemen_rekam_medik_dan_informasi_kesehatan', $data[18])
                            ->set('pencegahan_dan_pengendalian_infeksi', $data[19])
                            ->set('pendidikan_dalam_pelayanan_kesehatan', $data[20])
                            ->set('persen_tkrs', $data[21])
                            ->set('persen_kps', $data[22])
                            ->set('persen_mfk', $data[23])
                            ->set('persen_pmks', $data[24])
                            ->set('persen_mrmik', $data[25])
                            ->set('persen_ppi', $data[26])
                            ->set('persen_ppk', $data[27])
                            ->set('persen_bi', $data[28])
                            ->set('akhir_bulan', $endOfMonth)
                            ->insert();

                        // Insert into Pelanggan
                        $this->Pelanggan->set('tahun', $tahun, true)
                            ->set('bulan', $bulan, true)
                            ->set('akses_dan_kontinuitas_pelayanan', $data[29])
                            ->set('hak_pasien_dan_keluarga', $data[30])
                            ->set('pengkajian_pasien', $data[31])
                            ->set('pelayanan_dan_asuhan_pasien', $data[32])
                            ->set('pelayanan_anestesi_dan_bedah', $data[33])
                            ->set('pelayanan_kefarmasian_dan_penggunaan_obat', $data[34])
                            ->set('komunikasi_dan_edukasi', $data[35])
                            ->set('persen_akp', $data[36])
                            ->set('persen_hpk', $data[37])
                            ->set('persen_pp', $data[38])
                            ->set('persen_pap', $data[39])
                            ->set('persen_pab', $data[40])
                            ->set('persen_pkpo', $data[41])
                            ->set('persen_ke', $data[42])
                            ->set('persen_pelanggan', $data[43])
                            ->set('akhir_bulan', $endOfMonth)
                            ->insert();
                        $this->PembelajaranPertumbuhan->set('tahun', $tahun, true)
                            ->set('bulan', $bulan, true)
                            ->set('sasaran_keselamatan_pasien', $data[44])
                            ->set('program_nasional', $data[45])
                            ->set('persen_skp', $data[46])
                            ->set('persen_pn', $data[47])
                            ->set('persen_pembelajaran', $data[48])
                            ->set('akhir_bulan', $endOfMonth)
                            ->insert();
                        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
                        return redirect()->to('/penilaian-kinerja');
                    } catch (\Throwable $th) {
                        return redirect()->back()->with('error', "Data Gagal Ditambahkan\n"  . $th->getMessage());
                    }
                } else {
                    session()->setFlashdata('entry_at', $existingRecord->created_at);
                    session()->setFlashdata('entry_user', $existingRecord->user_entry);
                    session()->set([
                        'excelData' => $data,
                    ]);
                    return redirect()->to('/penilaian-kinerja');
                }
            } else {
                return redirect()->back()->with('error', "Field Pada Form Tidak Boleh Kosong");
            }
        } else {
            return redirect()->back()->with('error', "Format File Tidak Sesuai");
        }
        exit;
    }
    public function replaceFile()
    {
        $data = session()->get('excelData');
        $tahun = $data[0];
        $bulan = $data[1];
        $date = new DateTime("$tahun-$bulan-01");
        $date->modify('last day of this month');
        $endOfMonth = $date->format('Y-m-d');
        $this->PenilaianKinerja->where(array('tahun' => $tahun, 'bulan' => $bulan))->update(
            $tahun,
            [
                'user_entry' => (string)session('userInfo')['nama'],
                'updated_at' => date('Y-m-d H:i:sP')
            ]
        );
        $this->Finansial->where(array('tahun' => $tahun, 'bulan' => $bulan))->update(
            $tahun,
            [
                'pendapatan_pnbp' => $data[2],
                'beban_operasional' => $data[3],
                'beban_penyusutan' => $data[4],
                'target_pnbp_operasional' => $data[5],
                'pendapatan_blu' => $data[6],
                'target_pendapatan_blu' => $data[7],
                'lama_penyampaian_data_proyeksi' => $data[8],
                'rasio' => $data[9],
                'index_akurasi' => $data[10],
                'index_ketepatan' => $data[11],
                'persen_akurasi_blu' => $data[12],
                'index_blu' => $data[13],
                'akhir_bulan' => $endOfMonth,
            ]
        );
        $this->BisnisInternal->where(array('tahun' => $tahun, 'bulan' => $bulan))->update(
            $tahun,
            [
                'tata_kelola_rumah_sakit' => $data[14],
                'kualifikasi_dan_pendidikan_staf' => $data[15],
                'manajemen_fasilitas_dan_keselamatan' => $data[16],
                'peningkatan_mutu_dan_keselamatan_pasien' => $data[17],
                'manajemen_rekam_medik_dan_informasi_kesehatan' => $data[18],
                'pencegahan_dan_pengendalian_infeksi' => $data[19],
                'pendidikan_dalam_pelayanan_kesehatan' => $data[20],
                'persen_tkrs' => $data[21],
                'persen_kps' => $data[22],
                'persen_mfk' => $data[23],
                'persen_pmks' => $data[24],
                'persen_mrmik' => $data[25],
                'persen_ppi' => $data[26],
                'persen_ppk' => $data[27],
                'persen_bi' => $data[28],
                'akhir_bulan' => $endOfMonth
            ]
        );

        $this->Pelanggan->where(array('tahun' => $tahun, 'bulan' => $bulan))->update(
            $tahun,
            [
                'akses_dan_kontinuitas_pelayanan' => $data[29],
                'hak_pasien_dan_keluarga' => $data[30],
                'pengkajian_pasien' => $data[31],
                'pelayanan_dan_asuhan_pasien' => $data[32],
                'pelayanan_anestesi_dan_bedah' => $data[33],
                'pelayanan_kefarmasian_dan_penggunaan_obat' => $data[34],
                'komunikasi_dan_edukasi' => $data[35],
                'persen_akp' => $data[36],
                'persen_hpk' => $data[37],
                'persen_pp' => $data[38],
                'persen_pap' => $data[39],
                'persen_pab' => $data[40],
                'persen_pkpo' => $data[41],
                'persen_ke' => $data[42],
                'persen_pelanggan' => $data[43],
                'akhir_bulan' => $endOfMonth
            ],
        );
        $this->PembelajaranPertumbuhan->where(array('tahun' => $tahun, 'bulan' => $bulan))->update(
            $tahun,
            [
                'sasaran_keselamatan_pasien'=> $data[44],
                'program_nasional'=> $data[45],
                'persen_skp'=> $data[46],
                'persen_pn'=> $data[47],
                'persen_pembelajaran'=> $data[48],
                'akhir_bulan'=> $endOfMonth
            ]
        );
        session()->setFlashdata('pesan', 'Data Berhasil Diperbaharui');
        session()->remove('excelData');
        return redirect()->to('/penilaian-kinerja');
        // } catch (\Throwable $th) {
        //     return redirect()->back()->with('error', "Data Gagal Diperbaharui - $th");
        // }
    }
    public function detail($tahun, $bulan)
    {
        $datakpi = $this->PenilaianKinerja->getEntryById($tahun, $bulan);
        $datakpi = call_user_func_array('array_merge',  $datakpi);
        $data = [
            'title' => 'Detail Data Penilaian Kinerja',
            'data' => $datakpi,
        ];

        return view('kpi/PenilaianKinerja/penilaianKinerjaDetail', $data);
    }
    public function delete($tahun, $bulan)
    {
        $this->BisnisInternal->deleteByCompositeKey($tahun, $bulan);
        $this->Finansial->deleteByCompositeKey($tahun, $bulan);
        $this->Pelanggan->deleteByCompositeKey($tahun, $bulan);
        $this->PembelajaranPertumbuhan->deleteByCompositeKey($tahun, $bulan);
        $this->PenilaianKinerja->deleteByCompositeKey($tahun, $bulan);
        return redirect()->back()->with('pesan', 'Data Berhasil Dihapus');
    }
    public function download()
    {

        $filename = 'Formulir_Template.xlsx';
        $filepath = FCPATH . 'download/' . $filename;

        if (!file_exists($filepath)) {
            session()->setFlashdata('error', 'File tidak Ditemukan');
            return redirect()->to('/penilaian-kinerja');
        }
        return $this->response->download($filepath, null);
    }
    public function reset()
    {
        session()->remove('excelData');
        return redirect()->to('/penilaian-kinerja');
    }
}
