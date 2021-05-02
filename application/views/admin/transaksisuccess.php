<div class="content">
    <div class="headContent">
        <h4>Transaksi Berhasil</h4>
    </div>

    <div class="content2">
        <table class="table">
            <th class="table-dark">No</th>
            <th class="table-dark">Nama Donatur</th>
            <th class="table-dark">Nama Program</th>
            <th class="table-dark">Jumlah Donasi</th>
            <th class="table-dark">Tanggal Transaksi</th>
            <th class="table-dark">Nama rekening</th>
            <th class="table-dark">Tanggal Transfer</th>

            <?php
            $num = 1;
            foreach ($tertunda as $ter) : ?>
                <tr>
                    <td><?= $num++ ?></td>
                    <td><?= $ter['nama_lengkap']; ?></td>
                    <td><?= $ter['nama_program']; ?></td>
                    <td>Rp.<?= number_format($ter['jumlah']); ?></td>
                    <td><?= date('d - M - Y', strtotime($ter['tanggal_donasi'])) ?></td>
                    <td><?= $ter['namarek']; ?></td>
                    <td><?= date('d - M - Y', strtotime($ter['tgl_transfer'])) ?></td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>
</div>