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
        <h4>Program Ash-Habul Jannah</h4>
    </div>

    <div class="content2">

        <?php foreach ($program as $prg) : ?>
            <div class="listhome">
                <div class="listimage">
                    <img class="imghome" src="<?= base_url() ?>/images/<?= $prg['image_program'] ?>">
                </div>

                <div class="listjudul" id="cE">
                    <?= $prg['nama_program'] ?>
                </div>

                <div class="listcontent">
                    <?= $prg['deskripsi'] ?>

                </div>
                <div class="listfoot">
                    <a href="home/detailProgram/<?= $prg['kd_program'] ?>">Read More</a>
                </div>
            </div>
        <?php endforeach; ?>

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
    </div>
</div>