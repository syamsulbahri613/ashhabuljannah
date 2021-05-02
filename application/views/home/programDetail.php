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

    <div class="content2">
        <?php foreach ($program as $item) : ?>
            <div class="detailProgram">
                <div class="headProgram">
                    <img class="imgProgram" src="<?= base_url() ?>/images/<?= $item['image_program'] ?>">
                </div>

                <div class="namaProgram">
                    <?= $item['nama_program'] ?>
                </div>

                <div class="deskripsiProgram">
                    <?= $item['deskripsi'] ?>
                </div>

            </div>

        <?php endforeach; ?>
    </div>
</div>