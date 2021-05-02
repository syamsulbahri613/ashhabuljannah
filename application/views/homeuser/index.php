<div class="content">

    <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hallo</strong> Kamu Punya (..) Transaksi Yang belum Dikonfirmasi !
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> -->

    <div class="content1">
        <div class="headprof">
            <div class="headicon">
                <i class="fas fa fa-user-circle fa-5x"></i>

            </div>

            <ul class="headlist">
                <li><strong><?= $this->session->userdata("nama"); ?></strong></li>
                <li><strong><?= $this->session->userdata("email"); ?></strong></li>
                <li><a href="" style="text-decoration: none;" data-toggle="modal" data-target="#formModalEdit">Profil <i class="fas fa-edit"></i></a></li>
            </ul>

            <div class="headtext">
                <h3>Selamat datang <strong><?= $this->session->userdata("namalengkap"); ?></strong> ayo mulai donasi !</h3>
            </div>
        </div>
    </div>

    <div class="headContent">
        <h4>Berita Terkini</h4>
    </div>

    <div class="content2">
        <?php foreach ($berita as $brt) : ?>
            <div class="listhome">
                <div class="listimage"><img class="imghome" src="<?= base_url() ?>/images/<?= $brt['image_berita'] ?>"></div>
                <div class="listjudul"><?= $brt['judul'] ?></div>
                <div class="listcontent">
                    <?= $brt['isi'] ?>
                </div>
                <div class="listterbit">
                    <small>Terbit : <?= date('d - M - Y', strtotime($brt['tgl_terbit'])) ?></small>
                </div>

                <div class="listfoot">
                    <a href="<?= base_url() ?>/homeuser/detailBerita/<?= $brt['kd_berita'] ?>">Read More</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="modal fade" id="formModalEdit" tabindex="-1" role="dialog" aria-labelledby="judulModalEdit" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judulModalfeedbsck">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('homeuser/profileupdate') ?>" method="post">
                        <?php foreach ($user as $usr) : ?>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input class="form-control" type="text" name="nama" value="<?= $usr['nama_lengkap'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" name="email" value="<?= $usr['email'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Nomer telpon</label>
                                <input class="form-control" type="text" name="notlp" value="<?= $usr['notelpon'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <input class="form-control" type="text" name="alamat" value="<?= $usr['alamat'] ?>">
                            </div>
                        <?php endforeach; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>