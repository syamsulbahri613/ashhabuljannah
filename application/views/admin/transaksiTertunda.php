<div class="content">
    <div class="headContent">
        <h4>Verifikasi Donasi</h4>
    </div>

    <div class="content2">
        <table class="table">
            <th class="table-dark">No</th>
            <th class="table-dark">Nama Donatur</th>
            <th class="table-dark">Tanggal Donasi</th>
            <th class="table-dark">Nama Program</th>
            <th class="table-dark">Tanggal Transfer</th>
            <th class="table-dark">Validasi</th>

            <?php 
            $num = 1;
            foreach ($tertunda as $ter) : ?>
                <tr>
                    <td><?= $num++ ?></td>
                    <td><?= $ter['nama_lengkap']; ?></td>
                    <td><?= date('d - M - Y', strtotime($ter['tanggal_donasi'])) ?></td>
                    <td><?= $ter['nama_program']; ?></td>
                    <td><?= date('d - M - Y', strtotime($ter['tgl_transfer'])) ?></td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModaldetail<?= $ter['kd_konfirmasi'] ?>">Detail</button></td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>
</div>

<?php foreach ($tertunda as $ter) : ?>
    <div class="modal fade" id="formModaldetail<?= $ter['kd_konfirmasi'] ?>" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judulModal">Detail Donasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Nama Rekening</label>
                            <input type="text" class="form-control" value="<?= $ter['namarek'] ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Transfer</label>
                            <input type="text" class="form-control" value="<?= date('d - M - Y', strtotime($ter['tgl_transfer'])) ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label>Jumlah donasi</label>
                            <input type="text" class="form-control" value="Rp.<?= number_format($ter['jumlah']); ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label>Bukti Transaksi </label>
                        </div>
                        
                        <div class="form-group">
                        <img id="myImg" onclick="showImgFull(`<?= base_url('images/'.$ter['image']) ?>`)" src="<?= base_url() . "images/$ter[image]" ?>" alt="Bukti Transaksi" style="width:200px;max-width:200px">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url() ?>adminuser/prosesvalid/<?= $ter['kd_donasi'] ?>">
                        <button type="button" class="btn btn-primary"><i class="fas fa fa-check"></i> Valid</button></a>

                    <a href="<?= base_url() ?>/adminuser/prosesUnvalid/<?= $ter['kd_donasi'] ?>">
                        <button type="button" class="btn btn-danger"> <i class="fas fa fa-times"></i> Unvalid</button></a>
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