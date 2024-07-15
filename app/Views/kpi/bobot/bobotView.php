<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-sm">
    <!-- Content -->

    <div class="w-full px-4 lg:mt-8 sm:px-6 md:px-8 lg:pl-72 z-[0]">
        <h1 class="!text-4xl mb-8 font-semibold text-slate-800">Data Bobot Penilaian Kinerja</h1>
        <div class="flex mt-3 h-10 justify-end">
            <button type="button" class="py-2 px-3 mr-8 items-center text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#modal">
                Tambah
            </button>
        </div>
        <div class=" my-6 flex flex-col">
            <h1 class="text-xl mb-3 font-semibold text-slate-800">Entry Log</h1>
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                        <table class="min-w-full divide-y table-auto overflow-hidden divide-gray-200 dark:divide-gray-700">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-center text-xs font-medium  text-gray-500 uppercase">Periode</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium  text-gray-500 uppercase">User Entry</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium  text-gray-500 uppercase">Created At</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium  text-gray-500 uppercase">Updated At</th>
                                    <th colspan="3" class="px-6 py-3 text-center text-xs w-1/5 font-medium  text-gray-500 uppercase">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($entry as $data) :
                                ?>
                                    <tr>
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm  text-gray-800 "><?= $data['tahun'] ?></td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm  text-gray-800 "><?= $data['user_entry'] ?></td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm  text-gray-800 "><?= date('d-M-Y', strtotime($data['created_at'])) ?></td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm  text-gray-800 "><?= empty($data['updated_at']) ? "-" : date('d-M-Y', strtotime($data['updated_at'])) ?></td>
                                        <td class="py-4 whitespace-nowrap text-center text-sm font-medium">
                                            <a class="cursor-pointer" href="/bobot-penilaian-kinerja/detail/<?= $data['tahun'] ?>">
                                                <span class="px-6 py-1.5">
                                                    <span class="py-1 px-2 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-green-600 shadow-sm align-middle hover:bg-gray-50 hover:text-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-green-600 transition-all text-sm dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                                            <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                                        </svg>
                                                        Detail
                                                    </span>
                                                </span>
                                            </a>
                                            <a class="cursor-pointer" onclick="editModal('<?= $data['tahun'] ?>')">
                                                <span class="px-6 py-1.5">
                                                    <span class="py-1 px-2 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-yellow-400 shadow-sm align-middle hover:bg-gray-50 hover:text-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-green-600 transition-all text-sm dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                                        <svg class="feather feather-edit" fill="none" height="16" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                        </svg>
                                                        Edit
                                                    </span>
                                                </span>
                                            </a>
                                            <a class="cursor-pointer" onclick="confirmModal('<?= $data['tahun'] ?>')">
                                                <span class="px-6 py-1.5">
                                                    <span class="py-1 px-2 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-red-600 shadow-sm align-middle hover:bg-gray-50 hover:text-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-red-600 transition-all text-sm dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="16" height="16" viewBox="0 0 128 128">
                                                            <path d="M 49 1 C 47.34 1 46 2.34 46 4 C 46 5.66 47.34 7 49 7 L 79 7 C 80.66 7 82 5.66 82 4 C 82 2.34 80.66 1 79 1 L 49 1 z M 24 15 C 16.83 15 11 20.83 11 28 C 11 35.17 16.83 41 24 41 L 101 41 L 101 104 C 101 113.37 93.37 121 84 121 L 44 121 C 34.63 121 27 113.37 27 104 L 27 52 C 27 50.34 25.66 49 24 49 C 22.34 49 21 50.34 21 52 L 21 104 C 21 116.68 31.32 127 44 127 L 84 127 C 96.68 127 107 116.68 107 104 L 107 40.640625 C 112.72 39.280625 117 34.14 117 28 C 117 20.83 111.17 15 104 15 L 24 15 z M 24 21 L 104 21 C 107.86 21 111 24.14 111 28 C 111 31.86 107.86 35 104 35 L 24 35 C 20.14 35 17 31.86 17 28 C 17 24.14 20.14 21 24 21 z M 50 55 C 48.34 55 47 56.34 47 58 L 47 104 C 47 105.66 48.34 107 50 107 C 51.66 107 53 105.66 53 104 L 53 58 C 53 56.34 51.66 55 50 55 z M 78 55 C 76.34 55 75 56.34 75 58 L 75 104 C 75 105.66 76.34 107 78 107 C 79.66 107 81 105.66 81 104 L 81 58 C 81 56.34 79.66 55 78 55 z" />
                                                        </svg>
                                                        Hapus
                                                    </span>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?= $pager->links('data', 'new_template') ?>
        <!-- modal -->
        <div id="modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--overlay-backdrop:static]" data-hs-overlay-keyboard="true">
            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all md:max-w-2xl md:w-full m-3 md:mx-auto">
                <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                    <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                        <h3 id="modalLabel" class="font-bold text-gray-800 dark:text-white">
                            Tambah Data Bobot
                        </h3>
                        <button type="button" class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#modal" onclick="reset()">
                            <span class="sr-only">Close</span>
                            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18" />
                                <path d="m6 6 12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="p-4 overflow-y-auto">
                        <div class="max-w-2xl px-4 sm:px-2 lg:px-2 mx-auto">
                            <form id="form-AddModal" method="POST" action="/bobot-penilaian-kinerja/add">
                                <?= csrf_field() ?>
                                <div class="flex flex-col flex-wrap w-full gap-3">
                                    <div class="w-1/2 pt-3">
                                        <label class="inline-block text-sm font-medium dark:text-white">
                                            Periode
                                        </label>
                                        <div class="mt-2 space-y-3">
                                            <select class="py-2 px-3 pe-9 block w-full lg:w-3/4 border border-gray-200 shadow-sm text-sm rounded-lg focus:border-gray-500 focus:ring-gray-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" name="tahun" required>
                                                <?php
                                                for ($i = date('Y'); $i >= 1950; $i--) {
                                                    echo "<option value='$i'>$i</option>";
                                                }
                                                ?>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="flex flex-row flex-wrap gap-3">
                                        <div class="w-full">
                                            <div class="border-b border-gray-200 dark:border-neutral-700">
                                                <nav class="flex space-x-1" aria-label="Tabs" role="tablist">
                                                    <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-green-600 hs-tab-active:text-green-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-green-600 focus:outline-none focus:text-green-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-green-500 active" id="tabs-with-icons-item-1" data-hs-tab="#tabs-with-icons-1" aria-controls="tabs-with-icons-1" role="tab">
                                                        Perspektif
                                                    </button>
                                                </nav>
                                            </div>

                                            <div class="mt-3">
                                                <div id="tabs-with-icons-1" role="tabpanel" aria-labelledby="tabs-with-icons-item-1">
                                                    <div class="flex flex-row flex-wrap gap-3">
                                                        <div class="w-1/3">
                                                            <div class="max-w-sm space-y-3">
                                                                <div>
                                                                    <label for="hs-input-with-leading-and-trailing-icon" class="block text-sm font-medium mb-2 dark:text-white">Keuangan</label>
                                                                    <div class="relative">
                                                                        <input type="number" id="keuangan" name="keuangan" min="0" max="100" required class="py-3 px-4 pe-16 border block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="0.00" value="<?= old('keuangan') ?>">
                                                                        <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-4">
                                                                            <span class="text-gray-500 dark:text-neutral-500">%</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="w-1/3">
                                                            <div class="max-w-sm space-y-3">
                                                                <div>
                                                                    <label for="hs-input-with-leading-and-trailing-icon" class="block text-sm font-medium mb-2 dark:text-white">Pelanggan</label>
                                                                    <div class="relative">
                                                                        <input type="number" id="pelanggan" min="0" max="100" name="pelanggan" required class="py-3 px-4 pe-16 border block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="0.00" value="<?= old('pelanggan') ?>">
                                                                        <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-4">
                                                                            <span class="text-gray-500 dark:text-neutral-500">%</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="w-1/3">
                                                            <div class="max-w-sm space-y-3">
                                                                <div>
                                                                    <label for="hs-input-with-leading-and-trailing-icon" class="block text-sm font-medium mb-2 dark:text-white">Proses Bisnis Internal</label>
                                                                    <div class="relative">
                                                                        <input type="number" id="bisnis_internal" min="0" max="100" name="bisnis_internal" required class="py-3 px-4 pe-16 border block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="0.00" value="<?= old('bisnis_internal') ?>">
                                                                        <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-4">
                                                                            <span class="text-gray-500 dark:text-neutral-500">%</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="w-1/3">
                                                            <div class="max-w-sm space-y-3">
                                                                <div>
                                                                    <label for="hs-input-with-leading-and-trailing-icon" class="block text-sm font-medium mb-2 dark:text-white">Pembelajaran & Pertumbuhan</label>
                                                                    <div class="relative">
                                                                        <input type="number" id="pembelajaran_pertumbuhan" min="0" max="100" name="pembelajaran_pertumbuhan" required class="py-3 px-4 pe-16 border block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="0.00" value="<?= old('pembelajaran_pertumbuhan') ?>">
                                                                        <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-4">
                                                                            <span class="text-gray-500 dark:text-neutral-500">%</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="flex justify-between items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                        <p id="error-message" class="text-red-500 text-xs"></p>
                        <div class="flex justify-end gap-3">
                            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#modal" onclick="reset()">
                                Close
                            </button>
                            <button type="submit" id="button-form-AddModal" form="form-AddModal" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Confirm Modal -->
        <div id="confirm-modal" class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                    <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                        <h3 class="font-bold text-gray-800 dark:text-white">
                            Hapus Data
                        </h3>
                        <button type="button" class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#confirm-modal">
                            <span class="sr-only">Close</span>
                            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18" />
                                <path d="m6 6 12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="p-4 overflow-y-auto">
                        <p class="mt-1 text-gray-800 dark:text-gray-400">
                            Apakah anda yakin akan menghapus data ini ?
                        </p>
                    </div>
                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#confirm-modal">
                            Cancel
                        </button>
                        <a id="delete-button" href="" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 cursor-pointer">
                            Ok
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Updatemodal -->
        <div id="modal-update" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--overlay-backdrop:static]" data-hs-overlay-keyboard="true">
            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all md:max-w-2xl md:w-full m-3 md:mx-auto">
                <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                    <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                        <h3 id="modalLabel" class="font-bold text-gray-800 dark:text-white">
                            Edit Data Bobot
                        </h3>
                        <button type="button" class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#modal-update" onclick="reset()">
                            <span class="sr-only">Close</span>
                            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18" />
                                <path d="m6 6 12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="p-4 overflow-y-auto">
                        <div class="max-w-2xl px-4 sm:px-6 lg:px-8 mx-auto">
                            <form id="form-UpdateModal" method="POST">
                                <?= csrf_field() ?>
                                <div class="flex flex-col flex-wrap w-full gap-3">
                                    <div class="w-1/2 pt-3">
                                        <label class="inline-block text-sm font-medium dark:text-white">
                                            Periode
                                        </label>
                                        <div class="mt-2 space-y-3">
                                            <input id="periode-update" disabled class="py-2 px-3 pe-9 block w-full lg:w-3/4 border border-gray-200 shadow-sm text-sm rounded-lg focus:border-gray-500 focus:ring-gray-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" name="tahun">

                                            </input>


                                        </div>
                                    </div>
                                    <input type="hidden" id="id-update">
                                    <div class="flex flex-row flex-wrap gap-3">
                                        <div class="w-full">
                                            <div class="border-b border-gray-200 dark:border-neutral-700">
                                                <nav class="flex space-x-1" aria-label="Tabs" role="tablist">
                                                    <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-green-600 hs-tab-active:text-green-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-green-600 focus:outline-none focus:text-green-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-green-500 active" id="tabs-with-icons-item-update-1" data-hs-tab="#tabs-with-icons-update-1" aria-controls="tabs-with-icons-update-1" role="tab">
                                                        Perspektif
                                                    </button>
                                                </nav>
                                            </div>

                                            <div class="mt-3">
                                                <div id="tabs-with-icons-update-1" role="tabpanel" aria-labelledby="tabs-with-icons-item-update-1">
                                                    <div class="flex flex-row flex-wrap gap-3">
                                                        <div class="w-1/3">
                                                            <div class="max-w-sm space-y-3">
                                                                <div>
                                                                    <label for="hs-input-with-leading-and-trailing-icon" class="block text-sm font-medium mb-2 dark:text-white">Keuangan</label>
                                                                    <div class="relative">
                                                                        <input type="number" id="keuangan-update" name="keuangan" min="0" max="100" required class="py-3 px-4 pe-16 border block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="0.00">
                                                                        <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-4">
                                                                            <span class="text-gray-500 dark:text-neutral-500">%</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="w-1/3">
                                                            <div class="max-w-sm space-y-3">
                                                                <div>
                                                                    <label for="hs-input-with-leading-and-trailing-icon" class="block text-sm font-medium mb-2 dark:text-white">Pelanggan</label>
                                                                    <div class="relative">
                                                                        <input type="number" id="pelanggan-update" min="0" max="100" name="pelanggan" required class="py-3 px-4 pe-16 border block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="0.00">
                                                                        <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-4">
                                                                            <span class="text-gray-500 dark:text-neutral-500">%</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="w-1/3">
                                                            <div class="max-w-sm space-y-3">
                                                                <div>
                                                                    <label for="hs-input-with-leading-and-trailing-icon" class="block text-sm font-medium mb-2 dark:text-white">Proses Bisnis Internal</label>
                                                                    <div class="relative">
                                                                        <input type="number" id="bisnis_internal-update" min="0" max="100" name="bisnis_internal" required class="py-3 px-4 pe-16 border block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="0.00">
                                                                        <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-4">
                                                                            <span class="text-gray-500 dark:text-neutral-500">%</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="w-1/3">
                                                            <div class="max-w-sm space-y-3">
                                                                <div>
                                                                    <label for="hs-input-with-leading-and-trailing-icon" class="block text-sm font-medium mb-2 dark:text-white">Pembelajaran & Pertumbuhan</label>
                                                                    <div class="relative">
                                                                        <input type="number" id="pembelajaran_pertumbuhan-update" min="0" max="100" name="pembelajaran_pertumbuhan" required class="py-3 px-4 pe-16 border block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="0.00">
                                                                        <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-4">
                                                                            <span class="text-gray-500 dark:text-neutral-500">%</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-row flex-wrap gap-3">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#modal-update" onclick="reset()">
                            Close
                        </button>
                        <button type="submit" form="form-UpdateModal" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function editModal(id) {
                document.getElementById('form-UpdateModal').setAttribute('action', '/bobot-penilaian-kinerja/update/' + id);
                $.ajax({
                    url: '<?= base_url('/bobot-penilaian-kinerja/get/') ?>' + id,
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        var date = new Date(data.tahun);
                        var year = date.getFullYear();

                        $('#keuangan-update').val(data.keuangan * 100);
                        $('#periode-update').val(year);
                        $('#bisnis_internal-update').val(data.bisnis_internal * 100);
                        $('#pelanggan-update').val(data.pelanggan * 100);
                        $('#pembelajaran_pertumbuhan-update').val(data.pembelajaran_pertumbuhan * 100);
                    }
                });
                HSOverlay.open('#modal-update');
            }

            function reset() {
                document.getElementById('form-AddModal').reset();
                document.getElementById('error-message').textContent = "";
            }

            function confirmModal(id) {
                document.getElementById('delete-button').setAttribute('href', '/bobot-penilaian-kinerja/delete/' + id)
                HSOverlay.open('#confirm-modal');
            }
        </script>
        <script>
            document.getElementById('button-form-AddModal').addEventListener('click', function(event) {

                // Get the input values
                const keuangan = parseFloat(document.getElementById('keuangan').value);
                const pelanggan = parseFloat(document.getElementById('pelanggan').value);
                const bisnis_internal = parseFloat(document.getElementById('bisnis_internal').value);
                const pembelajaran_pertumbuhan = parseFloat(document.getElementById('pembelajaran_pertumbuhan').value);
                // Calculate the sum
                const totalPerspektif = keuangan + pelanggan + bisnis_internal + pembelajaran_pertumbuhan;
                // Validate the sum
                if (totalPerspektif !== 100) {
                    event.preventDefault();
                    document.getElementById('error-message').textContent = 'Total Nilai Seluruh Perspektif Harus Berjumlah 100%';
                } else {
                    event.target.submit();
                }
            });
        </script>
        <?= $this->endSection('content'); ?>