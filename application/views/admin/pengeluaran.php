<div class="content">
    <div class="headContent">
        <h4>Kelola Pengeluaran | <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formModalInput">
                Input Pengeluaran</button></h4>
    </div>
    <div class="content2">
        <table class="table">
            <th class="table-dark">No</th>
            <th class="table-dark">Nama Program</th>
            <th class="table-dark">Tanggal Pengeluaran</th>
            <th class="table-dark">Jumlah</th>
            <th class="table-dark" style="text-align: center;">Action</th>
            <th class="table-dark" style="width: 100px;"></th>

            <?php
            $num = 1;
            foreach ($pengeluaran as $peng) : ?>
                <tr>
                    <td><?= $num++ ?></td>
                    <td><?= $peng['nama_program'] ?></td>
                    <td><?= date('d - M - Y', strtotime($peng['tgl_keluar'])) ?></td>
                    <td>Rp. <?= number_format($peng['jumlah']) ?></td>
                    <td><button type="button" class="btn btn-light btn-sm btn-block" style="border: 1px solid black;" data-toggle="modal" data-target="#formModalP<?= $peng['kd_keluar'] ?>">Detail</button></td>
                    <td>
                        <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#formModalUpdatekluar<?= $peng['kd_keluar'] ?>"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="swalConfirm('pengeluaran','<?= $peng['kd_keluar'] ?>','Pengeluaran <?= $peng['nama_program'] ?> tanggal <?= $peng['tgl_keluar'] ?>')"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>


<div class="modal fade" id="formModalInput" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <legend class="modal-title" id="judulModal">Input Pengeluaran</legend>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="<?= base_url('adminuser/inputPengeluaran') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Pilih Program</label>
                            <div class="col-sm-8">
                                <select name="program" class="form-control">
                                    <?php

                                    $query = $this->db->get('program');

                                    foreach ($query->result() as $row) {
                                        echo "<option value='$row->kd_program'>$row->nama_program</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Jumlah Pengeluaran</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" name="jml" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tanggal Pengeluaran</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="date" name="tglkeluar" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Judul Pengeluaran</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" name="jp" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Rincian</label>

                            <div class="col-sm-8">
                                <textarea class="form-control" rows="3" name="ket"></textarea>
                            </div>
                        </div>

                        <input type="hidden" name="adm" value="<?= $this->session->userdata("kd_admin"); ?>">

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Foto 1</label>

                            <div class="col-sm-8">
                                <input class="form-control" type="file" name="file1">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Keterangan Foto 1</label>

                            <div class="col-sm-8">
                                <input class="form-control" type="text" name="ket1">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Foto 2</label>

                            <div class="col-sm-8">
                                <input class="form-control" type="file" name="file2">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Keterangan Foto 2</label>

                            <div class="col-sm-8">
                                <input class="form-control" type="text" name="ket2">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Foto 3</label>

                            <div class="col-sm-8">
                                <input class="form-control" type="file" name="file3">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Keterangan Foto 3</label>

                            <div class="col-sm-8">
                                <input class="form-control" type="text" name="ket3">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Foto 4</label>

                            <div class="col-sm-8">
                                <input class="form-control" type="file" name="file4">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Keterangan Foto 4</label>

                            <div class="col-sm-8">
                                <input class="form-control" type="text" name="ket4">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary float-right ml-1" type="submit">Input</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<?php foreach ($pengeluaran as $peng) : ?>
    <div class="modal fade" id="formModalUpdatekluar<?= $peng['kd_keluar'] ?>" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <legend class="modal-title" id="judulModal"><b>Update Pengeluaran</b></legend>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">

                        <div class="card-body">
                            <form action="<?= base_url() ?>adminuser/updatePengeluaran/<?= $peng['kd_keluar'] ?>" method="post">
                                <div class="form-group">
                                    <label>Pilih Program</label>
                                    <select name="program" class="form-control">
                                        <?php

                                        $query = $this->db->get('program');

                                        foreach ($query->result() as $row) {
                                            echo "<option value='$row->kd_program'>$row->nama_program</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Jumlah Pengeluaran</label>
                                    <input class="form-control" type="text" name="jml" value="<?= $peng['jumlah'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Pengeluaran</label>
                                    <input class="form-control" type="date" name="tglkeluar" value="<?= $peng['tgl_keluar'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Judul Pengeluaran</label>
                                    <input class="form-control" type="text" name="jp" value="<?= $peng['judul_keluar'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Rincian</label>
                                    <textarea class="form-control" rows="3" name="ket"><?= $peng['keterangan'] ?></textarea>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary float-right ml-1" type="submit">Simpan</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($pengeluaran as $peng) : ?>
    <div class="modal fade" id="formModalP<?= $peng['kd_keluar'] ?>" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <legend class="modal-title" id="judulModal">Detail Pengeluaran</legend>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tanggal Pengeluaran</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" value=": <?= date('d - M - Y', strtotime($peng['tgl_keluar'])) ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Di keluarkan oleh</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" value=": <?= $peng['nama_admin'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Judul Pengeluaran</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" value=": <?= $peng['judul_keluar'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nama Program</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" value=": <?= $peng['nama_program'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Jumlah Pengeluaran</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" value=": Rp. <?= number_format($peng['jumlah']) ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Rincian</label>
                        <div class="col-sm-8">
                            <p style="white-space: pre-line;">: <?= $peng['keterangan'] ?></p>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>