<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-sm">
    <!-- Content -->

    <div class="w-full px-4 sm:px-6 md:px-8 lg:pl-72 z-[0]">
        <h1 class="text-2xl md:text-4xl mb-8 font-semibold text-slate-800">Detail Data Entry Penilaian</h1>
        <div class="flex flex-col">
            <div>
                <div class="-m-1.5 my-5 overflow-x-auto flex flex-col md:flex-row flex-wrap justify-between">
                    <div class="p-1.5 w-full md:w-[33%] inline-block align-middle">
                        <div class="rounded-lg overflow-hidden">
                            <table class="min-w-full ">
                                <tbody class="">
                                    <tr>
                                        <td class="pr-4 py-1 whitespace-nowrap text-xs font-medium lg:text-sm text-gray-500">Nama Entry</td>
                                        <td class="pr-4 py-1 whitespace-nowrap text-xs font-medium lg:text-sm text-gray-500">:</td>
                                        <td class="pr-4 py-1 whitespace-nowrap text-xs text-start lg:text-sm text-gray-500"><?= $data['user_entry']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="pr-4 py-1 whitespace-nowrap text-xs font-medium lg:text-sm text-gray-500">Tanggal Entry</td>
                                        <td class="pr-4 py-1 whitespace-nowrap text-xs font-medium lg:text-sm text-gray-500">:</td>
                                        <td class="pr-4 py-1 whitespace-nowrap text-xs text-start lg:text-sm text-gray-500"><?= date('d-M-Y', strtotime($data['created_at'])) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="pr-4 py-1 whitespace-nowrap text-xs font-medium lg:text-sm text-gray-500">Tanggal Data Diperbaharui</td>
                                        <td class="pr-4 py-1 whitespace-nowrap text-xs font-medium lg:text-sm text-gray-500">:</td>
                                        <td class="pr-4 py-1 whitespace-nowrap text-xs text-start lg:text-sm text-gray-500">
                                            <?= empty($data['updated_at']) ? "-" : date('d-M-Y', strtotime($data['updated_at'])) ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex justify-between">
                    <h3 class="text-xl  md:text-2xl font-semibold text-gray-600">Balanced Scorecard</h3>
                    <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-lg shadow-sm text-xs font-medium bg-teal-100 text-teal-800 dark:bg-teal-800/30 dark:text-teal-500"><svg xmlns="http://www.w3.org/2000/svg" height="16px" viewBox="0 -960 960 960" width="16px" fill="currentColor">
                            <path d="M200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Zm0-480h560v-80H200v80Zm0 0v-80 80Zm280 240q-17 0-28.5-11.5T440-440q0-17 11.5-28.5T480-480q17 0 28.5 11.5T520-440q0 17-11.5 28.5T480-400Zm-160 0q-17 0-28.5-11.5T280-440q0-17 11.5-28.5T320-480q17 0 28.5 11.5T360-440q0 17-11.5 28.5T320-400Zm320 0q-17 0-28.5-11.5T600-440q0-17 11.5-28.5T640-480q17 0 28.5 11.5T680-440q0 17-11.5 28.5T640-400ZM480-240q-17 0-28.5-11.5T440-280q0-17 11.5-28.5T480-320q17 0 28.5 11.5T520-280q0 17-11.5 28.5T480-240Zm-160 0q-17 0-28.5-11.5T280-280q0-17 11.5-28.5T320-320q17 0 28.5 11.5T360-280q0 17-11.5 28.5T320-240Zm320 0q-17 0-28.5-11.5T600-280q0-17 11.5-28.5T640-320q17 0 28.5 11.5T680-280q0 17-11.5 28.5T640-240Z" />
                        </svg>
                        <?= $dateObj = DateTime::createFromFormat('!m', $data['bulan'])->format('M') . " " . $data['tahun'] ?></span>
                </div>
                <div class="-m-1.5 my-5 overflow-x-auto flex flex-col md:flex-row flex-wrap justify-between">
                    <div class="p-1.5 w-full md:w-[50%] inline-block align-middle">
                        <div class="border rounded-lg shadow-sm overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="divide-y divide-gray-200">
                                    <tr>
                                        <th scope="col" colspan="4" class="px-6 py-3 text-center divide-x text-xs lg:text-sm font-medium text-gray-500 uppercase">Finansial</th>
                                    </tr>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-center text-xs lg:text-sm font-medium text-gray-500 uppercase">Kriteria Penilaian</th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs lg:text-sm font-medium text-gray-500 uppercase">Kriteria Capaian</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs lg:text-sm text-gray-800">Pendapatan PNBP</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-center lg:text-sm text-gray-600"><?= 'Rp ' . number_format($data['pendapatan_pnbp'], 0, '', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs lg:text-sm text-gray-800">Beban Pendapatan</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-center lg:text-sm text-gray-800"><?= 'Rp ' . number_format($data['beban_operasional'], 0, '', '.'); ?></td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs lg:text-sm text-gray-800">Beban Penyusutan</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-center lg:text-sm text-gray-800"><?= 'Rp ' . number_format($data['beban_penyusutan'], 0, '', '.'); ?></td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs lg:text-sm text-gray-800">Target Capaian</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-center lg:text-sm text-gray-800"><?= $data['target_pnbp_operasional'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs lg:text-sm text-gray-800">Pendapatan BLU</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-center lg:text-sm text-gray-800"><?= 'Rp ' . number_format($data['pendapatan_blu'], 0, '', '.'); ?></td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs lg:text-sm text-gray-800">Target Capaian</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-center lg:text-sm text-gray-800"><?= 'Rp ' . number_format($data['target_pendapatan_blu'], 0, '', '.'); ?></td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs lg:text-sm text-gray-800">Lama Penyampaian Data Proyeksi (Bulan)</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-center lg:text-sm text-gray-800"><?= $data['lama_penyampaian_data_proyeksi']; ?></td>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="p-1.5 w-full md:w-[50%] inline-block align-middle">
                        <div class="border rounded-lg shadow-sm overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="divide-y divide-gray-200">
                                    <tr>
                                        <th scope="col" colspan="4" class="px-6 py-3 text-center divide-x text-xs lg:text-sm font-medium text-gray-500 uppercase">Bisnis Internal</th>
                                    </tr>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-center text-xs lg:text-sm font-medium text-gray-500 uppercase">Kriteria Penilaian</th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs lg:text-sm font-medium text-gray-500 uppercase">Kriteria Capaian</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs lg:text-sm text-gray-800">Tata Kelola Rumah Sakit</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-center lg:text-sm text-gray-800"><?= $data['tata_kelola_rumah_sakit'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs lg:text-sm text-gray-800">Kualifikasi dan Pendidikan Staf</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-center lg:text-sm text-gray-800"><?= $data['kualifikasi_dan_pendidikan_staf'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs lg:text-sm text-gray-800">Manajemen Fasilitas dan Keselamatan</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-center lg:text-sm text-gray-800"><?= $data['manajemen_fasilitas_dan_keselamatan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs lg:text-sm text-gray-800">Peningkatan Mutu dan Keselamatan Pasien</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-center lg:text-sm text-gray-800"><?= $data['peningkatan_mutu_dan_keselamatan_pasien'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs lg:text-sm text-gray-800">Manajemen Rekam Medik dan Informasi Kesehatan</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-center lg:text-sm text-gray-800"><?= $data['manajemen_rekam_medik_dan_informasi_kesehatan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs lg:text-sm text-gray-800">Pencegahan dan Pengendalian Infeksi</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-center lg:text-sm text-gray-800"><?= $data['pencegahan_dan_pengendalian_infeksi'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs lg:text-sm text-gray-800">Pendidikan dalam Pelayanan Kesehatan</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-center lg:text-sm text-gray-800"><?= $data['pendidikan_dalam_pelayanan_kesehatan'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="p-1.5 w-full md:w-[50%] inline-block align-middle">
                        <div class="border rounded-lg shadow-sm overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="divide-y divide-gray-200">
                                    <tr>
                                        <th scope="col" colspan="4" class="px-6 py-3 text-center divide-x text-xs lg:text-sm font-medium text-gray-500 uppercase">Pelanggan</th>
                                    </tr>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-center text-xs lg:text-sm font-medium text-gray-500 uppercase">Kriteria Penilaian</th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs lg:text-sm font-medium text-gray-500 uppercase">Kriteria Capaian</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs lg:text-sm text-gray-800">Akses dan Kontinuitas Pelayanan</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-center lg:text-sm text-gray-800"><?= $data['akses_dan_kontinuitas_pelayanan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs lg:text-sm text-gray-800">Hak Pasien dan Keluarga</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-center lg:text-sm text-gray-800"><?= $data['hak_pasien_dan_keluarga'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs lg:text-sm text-gray-800">Pengkajian Pasien</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-center lg:text-sm text-gray-800"><?= $data['pengkajian_pasien'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs lg:text-sm text-gray-800">Pelayanan dan Asuhan Pasien</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-center lg:text-sm text-gray-800"><?= $data['pelayanan_dan_asuhan_pasien'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs lg:text-sm text-gray-800">Pelayanan Anestesi dan Bedah</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-center lg:text-sm text-gray-800"><?= $data['pelayanan_anestesi_dan_bedah'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs lg:text-sm text-gray-800">Pelayanan Kefarmasian dan Penggunaan Obat</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-center lg:text-sm text-gray-800"><?= $data['pelayanan_kefarmasian_dan_penggunaan_obat'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs lg:text-sm text-gray-800">Komunikasi dan Edukasi</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-center lg:text-sm text-gray-800"><?= $data['komunikasi_dan_edukasi'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="p-1.5 w-full md:w-[50%] inline-block align-middle">
                        <div class="border rounded-lg shadow-sm overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="divide-y divide-gray-200">
                                    <tr>
                                        <th scope="col" colspan="4" class="px-6 py-3 text-center divide-x text-xs lg:text-sm font-medium text-gray-500 uppercase">Pembelajaran dan Pertumbuhan</th>
                                    </tr>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-center text-xs lg:text-sm font-medium text-gray-500 uppercase">Kriteria Penilaian</th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs lg:text-sm font-medium text-gray-500 uppercase">Kriteria Capaian</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs lg:text-sm text-gray-800">Sasaran Keselamatan Pasien</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-center lg:text-sm text-gray-800"><?= $data['sasaran_keselamatan_pasien'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs lg:text-sm text-gray-800">Program Nasional</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-center lg:text-sm text-gray-800"><?= $data['program_nasional'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?= $this->endSection('content'); ?>