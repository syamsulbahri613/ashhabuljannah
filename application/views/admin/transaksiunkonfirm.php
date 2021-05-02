<div class="content">
    <div class="headContent">
        <h4>Transaksi Belum Dikonfirmasi</h4>
    </div>

    <div class="content2">
        <table class="table">
            <th class="table-dark">No</th>
            <th class="table-dark">Nama Lengkap</th>
            <th class="table-dark">Tanggal Donasi</th>
            <th class="table-dark">Nama Program</th>
            <th class="table-dark">Jumlah Donasi</th>

            <?php 
            $num= 1;
            foreach($tertunda as $ter) : ?>
                <tr>
                    <td><?= $num++ ?></td>
                    <td><?= $ter['nama_lengkap']; ?></td>
                    <td><?= date('d - M - Y', strtotime($ter['tanggal_donasi'])) ?></td>
                    <td><?= $ter['nama_program']; ?></td>
                    <td>Rp.<?= number_format($ter['jumlah']); ?></td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>
</div>