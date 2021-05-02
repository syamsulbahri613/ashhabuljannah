<div class="content">
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil</strong><?= $this->session->flashdata('flash'); ?>.
            <button type="button" class="close" data-dismiss="alert" arial-lable="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('flash2')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('flash2'); ?> <strong>Salah</strong>!
            <button type="button" class="close" data-dismiss="alert" arial-lable="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="login">
        <div class="loginitem">
            <form action="<?= base_url('home/validasilogin'); ?>" method="POST">
                <div class="form-group">
                    <center>Login</center>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                </div>

                <div class="form-group">
                    <center>klik <a href="" data-toggle="modal" data-target="#formModaldaftar">Daftar</a> jika belum punya akun!</center>
                </div>
            </form>
        </div>
    </div>

    <div class="headContent">
        <h4>Dokumentasi</h4>
    </div>

    <div class="content2">
        <?php foreach ($pengeluaran as $peng) : ?>
            <div class="dokumentasi">
                    <h4><?= $peng['nama_program'] ?> : <?= $peng['judul_keluar'] ?></h4>
                    <span>Periode : <?= date('d - M - Y', strtotime($peng['tgl_keluar'])) ?></span>

                    <img class="c" id="myImg2" onclick="showImgFull2(`<?= base_url('images/'.$peng['foto1']) ?>`, `<?=  $peng['ket1'] ?>`)" 
                    src="<?= base_url() . "images/$peng[foto1]" ?>">

                    <img class="c" id="myImg2" onclick="showImgFull2(`<?= base_url('images/'.$peng['foto2']) ?>`, `<?=  $peng['ket2'] ?>`)" 
                    src="<?= base_url() . "images/$peng[foto2]" ?>">

                    <img class="c" id="myImg2" onclick="showImgFull2(`<?= base_url('images/'.$peng['foto3']) ?>`, `<?=  $peng['ket3'] ?>`)" 
                    src="<?= base_url() . "images/$peng[foto3]" ?>">

                    <img class="c" id="myImg2" onclick="showImgFull2(`<?= base_url('images/'.$peng['foto4']) ?>`, `<?=  $peng['ket4'] ?>`)" 
                    src="<?= base_url() . "images/$peng[foto4]" ?>">

            </div>
        <?php endforeach; ?>
    </div>

    <div class="modal fade" id="formModaldaftar" tabindex="-1" role="dialog" aria-labelledby="judulModaldaftar" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judulModaldaftar">Form Daftar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('home/daftar') ?>" method="POST">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap">
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <div class="form-group">
                            <label>No Telpon</label>
                            <input type="text" class="form-control" name="notelpon">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" rows="3" name="alamat" placeholder="masukan alamat lengkap.."></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal2" class="modalCostume2">
        <span class="closemodal2" id="cls">&times;</span>
        <img class="modal-content-costume2" id="img02" src="">
        <div id="caption2"></div>
</div>

</div>