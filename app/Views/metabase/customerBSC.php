<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="w-full min-h-[93vh] md:-mt-8 pl-6 md:pl-8 lg:pl-72 z-[1] overflow-clip">
<div class="flex flex-col">
            <h1 class="text-xl md:hidden md:text-xl mb-1 mx-3 md:mx-8 font-semibold text-slate-800">Dashboard</h1>
            <h2 class="text-3xl md:text-4xl mb-2 mx-3 md:mx-8 font-semibold md:text-black text-green-600">Pelanggan</h2>
        </div>
    <div class="flex my-4 mx-3 md:mx-8 h-10 justify-between">
        <div class="flex h-full items-center gap-6 w-6/12">
            <div class="hs-dropdown relative inline-flex">
                <button id="hs-dropdown-default" type="button" class="hs-dropdown-toggle py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">
                    <?= (isset($_GET['periode'])) ? $_GET['periode'] : 'Periode' ?>
                    <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6" />
                    </svg>
                </button>
                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full" aria-labelledby="hs-dropdown-default">
                    <?php foreach ($periode as $value) :
                    ?>
                        <?php if (isset($_GET['periode']) && $_GET['periode'] == $value) : ?>
                            <a class="flex items-center font-semibold gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="<?= current_url() . "?periode=" ?><?= ($value) ?>">
                                <?= ($value) ?>
                            </a>
                        <?php else : ?>
                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="<?= current_url() . "?periode=" ?><?= ($value) ?>">
                                <?= ($value) ?>
                            </a>
                        <?php endif ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <iframe id="contentFrame" class="w-full h-[1900px]" src="" allowtransparency></iframe>
</div>
<script>
    setTimeout(function() {
        var f = document.querySelectorAll('iframe')[0];
        f.src = '<?= $url; ?>';
    }, 50);
</script>


<?= $this->endSection(); ?>