<div class="content">
    <div class="headContent">
        <h4>List Berita | <button type="button" class="btn btn-primary btn-sm"
         data-toggle="modal" data-target="#formModalBerita">Tambah Berita</button></h4>
    </div>

    <div class="content2">
        <table class="table">
            <th class="table-dark">No</th>
            <th class="table-dark">Judul Berita</th>
            <th class="table-dark">Tanggal Terbit</th>
            <th class="table-dark">Penerbit</th>
            <th class="table-dark" style="text-align: center;">Action</th>

            <?php 
            $num = 1;
            foreach ($berita as $brt) : ?>
                <tr>
                    <td><?= $num++ ?></td>
                    <td><?= $brt['judul'] ?></td>
                    <td><?= date('d - M - Y', strtotime($brt['tgl_terbit'])) ?></td>
                    <td><?= $brt['nama_admin'] ?></td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm ml-1 float-right" onclick="swalConfirm('berita','<?= $brt['kd_berita'] ?>', 'Berita Tanggal <?= $brt['tgl_terbit'] ?>')">
                        <i class="fas fa-trash-alt"></i></button>
                        <button type="button" class="btn btn-warning btn-sm ml-1 float-right" data-toggle="modal" data-target="#formModalBeritaUpdate<?= $brt['kd_berita'] ?>">
                        <i class="fas fa-edit"></i></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="modal fade" id="formModalBerita" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judulModal">Tambah Berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('adminuser/inputBerita') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Judul Berita</label>
                            <input type="text" class="form-control" name="judul">
                        </div>
                        <div class="form-group">
                            <label>Isi Content</label>
                            <textarea class="form-control" rows="3" name="isi"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Terbit</label>
                            <input type="date" class="form-control" name="tglterbit">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Berita</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php foreach ($berita as $brt) : ?>
        <div class="modal fade" id="formModalBeritaUpdate<?= $brt['kd_berita'] ?>" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="judulModal">Update Berita</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url() ?>/adminuser/updateBerita/<?= $brt['kd_berita'] ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Judul Berita</label>
                                <input type="text" class="form-control" name="judul" value="<?= $brt['judul'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Isi Content</label>
                                <textarea class="form-control" rows="3" name="isi"><?= $brt['isi'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Terbit</label>
                                <input type="date" class="form-control" name="tglterbit" value="<?= $brt['tgl_terbit'] ?>">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>