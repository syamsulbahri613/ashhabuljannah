<div class="content">
    <div class="headContent">
        <h4>List Program Ash-Habul Jannah |
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formModal">
                Tambah Program</button>
        </h4>
    </div>
    <div class="content2">
            <?php foreach ($program as $prg) : ?>

                <table style="border-bottom: 1px solid #ddd;">
                    <th width="300px">
                        <img src="<?= base_url() ?>/images/<?= $prg['image_program'] ?>" alt="" width="200px" height="200px">
                    </th>

                    <th>
                      <?= $prg['nama_program'] ?>
                    </th>

                    <th>
                        <button type="button" class="btn btn-danger btn-sm ml-1 float-right" onclick="swalConfirm('program','<?= $prg['kd_program'] ?>','<?= $prg['nama_program'] ?>')">
                            <i class="fas fa-trash-alt"></i></button>
                        <button type="button" class="btn btn-warning btn-sm ml-1 float-right" data-toggle="modal" data-target="#formModalUpdate<?= $prg['kd_program'] ?>">
                            <i class="fas fa-edit"></i></button>
                    </th>
                </table>
            <?php endforeach; ?>
    </div>


    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judulModal">Tambah Data Program</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('adminuser/tambahProgram') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_program">Nama Program</label>
                            <input type="text" class="form-control" id="nama_program" name="nama_program">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" rows="3" id="deskripsi" name="deskripsi" placeholder="masukan deskripsi.."></textarea>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input class="form-control" type="file" name="image">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php foreach ($program as $prg) : ?>
        <div class="modal fade" id="formModalUpdate<?= $prg['kd_program'] ?>" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="judulModal">Update Data Program</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url() ?>adminuser/updateProgram/<?= $prg['kd_program'] ?>" method="post">
                            <div class="form-group">
                                <label for="nama_program">Nama Program</label>
                                <input type="text" class="form-control" id="nama_program" name="nama_program" value="<?= $prg['nama_program'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" rows="3" id="deskripsi" name="deskripsi"><?= $prg['deskripsi'] ?></textarea>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" onclick="testing()">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>