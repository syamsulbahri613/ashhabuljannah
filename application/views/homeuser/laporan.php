<div class="content">
    <div class="headContent">
        <h4>Laporan Keseluruhan</h4>
    </div>

    <form action="" method="post">
        <div class="shortLaporan">
            <div class="textshort">
                <h4>Shorting Berdasarkan Bulan/Tanggal/Tahun</h4>
            </div>
            <div class="input1">
                <input type="date" class="form-control" name="startdate" required>
            </div>

            <div class="input2">
                <input type="date" class="form-control" name="enddate" required>
            </div>

            <div class="btshort">
                <button type="submit" class="btn btn-primary">Short</button>
            </div>
        </div>
    </form>

    <div class="content2">
        <canvas id="myChart" width="400" height="150"></canvas>
        <?php
        $hasil = null;
        foreach ($grafik as $item) :

            $jum = $item['jumlah'];
            $hasil .= "'$jum'" . ", ";



            $sisa = null;
            $hasilkeluar = null;
            foreach ($keluar as $item) :
                $jum2 = $item['jumlah'];
                $hasilkeluar .= "'$jum2'" . ", ";

                $sisa = $jum - $jum2;
        ?>
            <?php endforeach; ?>
        <?php endforeach; ?>



        <script lang="javascript">
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',

                data: {
                    labels: ['Dana Yang Masuk', 'Dana Pengeluaran', 'Sisa Dana'],
                    datasets: [{
                        label: 'Jumlah',
                        data: [<?= $hasil ?><?= $hasilkeluar ?><?= $sisa ?>],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>

        <div class="headContent">
            <h4>Data donasi yang masuk</h4>
        </div>

        <table class="table mt-5">
            <th class="table-dark">No</th>
            <th class="table-dark">Nama Donatur</th>
            <th class="table-dark">Nama Program</th>
            <th class="table-dark">Jumlah Donasi</th>
            <th class="table-dark">Tanggal Donasi</th>

            <?php
            $num = 1;
            foreach ($totaldonasi as $td) : ?>
                <tr>
                    <td><?= $num++ ?></td>
                    <td><?= $td['nama_lengkap'] ?></td>
                    <td><?= $td['nama_program'] ?></td>
                    <td>Rp. <?= number_format($td['jumlah']) ?></td>
                    <td><?= date('d - M - Y', strtotime($td['tanggal_donasi'])) ?></td>

                </tr>
            <?php endforeach; ?>
        </table>

        <div class="headContent">
            <h4>Data Pengeluaran</h4>
        </div>

        <table class="table mt-5">
            <th class="table-dark">No</th>
            <th class="table-dark">Tanggal Pengeluaran</th>
            <th class="table-dark">Nama Program</th>
            <th class="table-dark">Jumlah Pengeluaran</th>
            <th class="table-dark"></th>


            <?php
            $num = 1;
            foreach ($pengeluaran as $item) : ?>
                <tr>
                    <td><?= $num++ ?></td>
                    <td><?= date('d - M - Y', strtotime($item['tgl_keluar'])) ?></td>
                    <td><?= $item['nama_program'] ?></td>
                    <td>Rp. <?= number_format($item['jumlah']) ?></td>
                    <td><button class="btn btn-primary btn-block btn-sm" type="button" data-toggle="modal" data-target="#formModalP<?= $item['kd_keluar'] ?>">Detail</button></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <?php foreach ($pengeluaran as $item) : ?>
        <div class="modal fade" id="formModalP<?= $item['kd_keluar'] ?>" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
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
                                <input type="text" readonly class="form-control-plaintext" value=": <?= date('d - M - Y', strtotime($item['tgl_keluar'])) ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Di keluarkan oleh</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" value=": <?= $item['nama_admin'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nama Program</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" value=": <?= $item['nama_program'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Jumlah Pengeluaran</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" value=": Rp. <?= number_format($item['jumlah']) ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Rincian</label>
                            <div class="col-sm-8">
                                <p style="white-space: pre-line;"><?= $item['keterangan'] ?></p>
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