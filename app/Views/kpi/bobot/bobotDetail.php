<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-sm">
    <!-- Content -->

    <div class="w-full px-4 sm:px-6 md:px-8 lg:pl-72 z-[0]">
        <h1 class="text-2xl md:text-4xl mb-8 font-semibold text-slate-800">Detail Data Entry Bobot</h1>
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
                <div class="flex justify-end">
                    <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-lg shadow-sm text-xs font-medium bg-teal-100 text-teal-800 dark:bg-teal-800/30 dark:text-teal-500"><svg xmlns="http://www.w3.org/2000/svg" height="16px" viewBox="0 -960 960 960" width="16px" fill="currentColor">
                            <path d="M200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Zm0-480h560v-80H200v80Zm0 0v-80 80Zm280 240q-17 0-28.5-11.5T440-440q0-17 11.5-28.5T480-480q17 0 28.5 11.5T520-440q0 17-11.5 28.5T480-400Zm-160 0q-17 0-28.5-11.5T280-440q0-17 11.5-28.5T320-480q17 0 28.5 11.5T360-440q0 17-11.5 28.5T320-400Zm320 0q-17 0-28.5-11.5T600-440q0-17 11.5-28.5T640-480q17 0 28.5 11.5T680-440q0 17-11.5 28.5T640-400ZM480-240q-17 0-28.5-11.5T440-280q0-17 11.5-28.5T480-320q17 0 28.5 11.5T520-280q0 17-11.5 28.5T480-240Zm-160 0q-17 0-28.5-11.5T280-280q0-17 11.5-28.5T320-320q17 0 28.5 11.5T360-280q0 17-11.5 28.5T320-240Zm320 0q-17 0-28.5-11.5T600-280q0-17 11.5-28.5T640-320q17 0 28.5 11.5T680-280q0 17-11.5 28.5T640-240Z" />
                        </svg>
                        <?= date('Y', strtotime($data['tahun'])) ?></span>
                </div>
                <div class="border rounded-lg shadow-sm overflow-hidden my-5">
                    <table class="min-w-full divide-y rounded-lg shadow-sm table-auto overflow-hidden divide-gray-200 dark:divide-gray-700">
                        <thead class="divide-y divide-gray-200">
                            <tr>
                                <th colspan="4" class="px-6 py-3 text-center text-xs font-medium  text-gray-500 uppercase divide-x">Bobot Perspektif</th>
                            </tr>
                            <tr>
                                <th class="px-6 py-3 text-center text-xs font-medium  text-gray-500 uppercase">Keuangan</th>
                                <th class="px-6 py-3 text-center text-xs font-medium  text-gray-500 uppercase">Pelanggan</th>
                                <th class="px-6 py-3 text-center text-xs font-medium  text-gray-500 uppercase">Proses <br> Bisnis Internal</th>
                                <th class="px-6 py-3 text-center text-xs font-medium  text-gray-500 uppercase">Pembelajaran <br> Pertumbuhan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 text-center whitespace-nowrap text-sm  text-gray-800 "><?= $data['keuangan'] * 100 . '%' ?></td>
                                <td class="px-6 py-4 text-center whitespace-nowrap text-sm  text-gray-800 "><?= $data['pelanggan'] * 100 . '%' ?></td>
                                <td class="px-6 py-4 text-center whitespace-nowrap text-sm  text-gray-800 "><?= $data['bisnis_internal'] * 100 . '%' ?></td>
                                <td class="px-6 py-4 text-center whitespace-nowrap text-sm  text-gray-800 "><?= $data['pembelajaran_pertumbuhan'] * 100 . '%' ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>



        </div>
    </div>
    <?= $this->endSection('content'); ?>