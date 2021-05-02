<div class="content">
    <div class="headContent">
        <h4>Riwayat Donasi</h4>
    </div>

    <div class="content2">

        <table class="table" style="text-align: center;">
            <th class="table-dark">No</th>
            <th class="table-dark">Tanggal Donasi</th>
            <th class="table-dark">Program</th>
            <th class="table-dark">Jumlah</th>
            <th class="table-dark">Status</th>
            <th class="table-dark"></th>

            <?php
            $num = 1;
            foreach ($donasi as $dns) : ?>
                <tr>
                    <td><?= $num++ ?></td>
                    <td><?= date('d - M - Y', strtotime($dns['tanggal_donasi'])) ?></td>
                    <td><?= $dns['nama_program']; ?></td>
                    <td>Rp.<?= number_format($dns['jumlah']); ?></td>
                    <td>
                        <?php
                        if ($dns['status'] == "Success") {
                            echo '<button class="btn btn-success btn-block btn-sm" disabled>Success</button>';
                        } else if ($dns['status'] == "Gagal") {
                            echo '<button class="btn btn-danger btn-block btn-sm" disabled>
                                    Failed
                                    </button>';
                        } else {
                            echo '<button class="btn btn-secondary btn-block btn-sm" disabled>Sedang diproses..</button>';
                        }

                        ?>



                    </td>

                    <td>
                        <button class="btn btn-light btn-block btn-sm" style="border: 1px solid black;" data-toggle="modal" data-target="#formModalDetail<?= $dns['kd_konfirmasi'] ?>">
                            <strong>Detail</strong></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>

    <?php foreach ($donasi as $dns) : ?>
        <div class="modal fade" id="formModalDetail<?= $dns['kd_konfirmasi'] ?>" tabindex="-1" role="dialog" aria-labelledby="judulModalKonfirmasi" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="judulModalKonfirmasi">Detail Donasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tanggal donasi</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" value=": <?= date('d - M - Y', strtotime($dns['tanggal_donasi'])) ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tanggal Transfer</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" value=": <?= date('d - M - Y', strtotime($dns['tgl_transfer'])) ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nama Program</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" value=": <?= $dns['nama_program'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Jumlah Donasi</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" value=": Rp <?= number_format($dns['jumlah']); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nama Rekening</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" value=": <?= $dns['namarek'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Di Verifikasi Oleh</label>
                                <div class="col-sm-8">
                                    <?php 
                                       if($dns['nama_admin'] == null){
                                           echo ' : Belum Di Verifikasi';
                                       }else{
                                           echo '<input type="text" readonly class="form-control-plaintext" value=" :'.$dns['nama_admin'].'">';
                                       }
                                    ?>
                                </div>
                            </div>
                            

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Status Donasi</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" value=": <?= $dns['status'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Keterangan</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control-plaintext" readonly cols="30" rows="5">: <?= $dns['notif'] ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Bukti transaksi</label>
                                <img id="myImg" onclick="showImgFull(`<?= base_url('images/'.$dns['image']) ?>`)" src="<?= base_url() . "images/$dns[image]" ?>" alt="Bukti Transaksi" style="width:100%;max-width:300px">

                            </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div id="myModal" class="modalCostume">
        <span class="closemodal" id="cls">&times;</span>
        <img class="modal-content-costume" id="img01" src="">
        <div id="caption"></div>
    </div>

</div>
</div>