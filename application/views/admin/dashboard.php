<div class="content">

    <div class="headContent">
        <h4>Dashboard</h4>
    </div>

    <div class="content2">
        <div class="adminmenu">
            <div class="adminmenuitem">
                <a class="nav-item nav-link" href="<?= base_url(); ?>adminuser/daftarpengguna">
                    <i class="fas fa fa-users fa-8x"></i>
                    <h1 class="badge badge-warning">
                        <?= $jumlah ?>
                    </h1>
                </a>
                <h4>Daftar Pengguna</h4>
            </div>

            <div class="adminmenuitem">
                <a class="nav-item nav-link" href="<?= base_url(); ?>adminuser/berita"><i class="fas fa fa-newspaper fa-8x"></i></a>
                <h4>Berita</h4>
            </div>

            <div class="adminmenuitem">
                <a class="nav-item nav-link" href="<?= base_url(); ?>adminuser/noreplyFeedback"><i class="fas fa fa-comment fa-8x"></i>
                    <h1 class="badge badge-warning"><?= $Tfeedback ?></h1>
                </a>
                <h4>Reply Feedback</h4>
            </div>

            <div class="adminmenuitem">
                <a class="nav-item nav-link" href="<?= base_url(); ?>adminuser/kelolaprogram"><i class="fas fa fa-clipboard fa-8x"></i></a>
                <h4>Program</h4>
            </div>

            <div class="adminmenuitem">
                <a class="nav-item nav-link" href="<?= base_url(); ?>adminuser/transaksiTertunda"><i class="fas fa fa-check fa-8x"></i>
                    <h1 class="badge badge-warning"><?= $donasiconfirm ?></h1>
                </a>
                <h4>Verifikasi Donasi</h4>
            </div>

            <div class="adminmenuitem">
                <a class="nav-item nav-link" href="<?= base_url(); ?>adminuser/pengeluaran"><i class="fas fa fa-chart-line fa-8x"></i></a>
                <h4>Pengeluaran</h4>
            </div>
        </div>
    </div>
</div>