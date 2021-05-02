<div class="content">
    <div class="headContent">
        <h4>Konfirmasi Donasi</h4>
    </div>

    <div class="content2">

        <table class="table">
            <th class="table-dark">No</th>
            <th class="table-dark">Tanggal Donasi</th>
            <th class="table-dark">Program</th>
            <th class="table-dark">Jumlah</th>
            <th class="table-dark" style="text-align: center;">Action</th>

            <?php
            $num = 1;
            foreach ($donasi as $dns) : ?>
                <tr>
                    <td><?= $num++ ?></td>
                    <td><?= date('d - M - Y', strtotime($dns['tanggal_donasi'])) ?></td>
                    <td><?= $dns['nama_program']; ?></td>
                    <td>Rp.<?= number_format($dns['jumlah']); ?></td>
                    <td>
                        <button type="button" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#formModalKonfirmasi<?= $dns['kd_donasi'] ?>">
                            Konfirmasi
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <?php foreach ($donasi as $dns) : ?>
            <div class="modal fade" id="formModalKonfirmasi<?= $dns['kd_donasi'] ?>" tabindex="-1" role="dialog" aria-labelledby="judulModalKonfirmasi" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="judulModalKonfirmasi">Konfirmasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url(); ?>Homeuser/konfirmasidonasi/<?= $dns['kd_donasi'] ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama_program">Tanggal Transfer</label>
                                    <input type="date" class="form-control" id="tgl_tf" name="tanggal_transfer" required>
                                </div>

                                <div class="form-group">
                                    <label>Masukan Nama Rekening</label>
                                    <input type="text" class="form-control" id="namarek" name="namarek" required>
                                </div>

                                <div class="form-group">
                                    <label>Masukan Bukti Transaksi</label>
                                    <input type="file" class="form-control" name="gambar" required>
                                </div>

                                <input type="hidden" name="dns" value="<?= $dns['kd_donasi'] ?>">
                                <input type="hidden" name="status" value="Proses">


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>