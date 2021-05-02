<div class="content">
    <div class="headContent">
        <h4>Donasi</h4>
    </div>

    <div class="content2">
        <div class="card">
            <div class="card-header">
                <strong><center>FORM DONASI</center></strong><br><hr>
                <span>Untuk kenyamanannya disarankan agar melakukan transfer terlebih dahulu, baru mengisi form donasi !</span><br><br>
                <span><strong>Mandiri Syariah</strong></span><br>
                <span>No Rekening : 7137515797</span> <hr>
            </div>
            <div class="card-body">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('homeuser/prosesdonasi'); ?>" method="post">

                    <div class="form-group">
                        <label>Pilih Program</label>
                        <select name="program" class="form-control">
                            <option value="" selected></option>
                            <?php

                            $query = $this->db->get('program');

                            foreach ($query->result() as $row) {
                                echo "<option value='$row->kd_program'>$row->nama_program</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Donasi</label>
                        <input class="form-control" type="date" name="tanggaldonasi">
                    </div>

                    <div class="form-group">
                        <label>Pilih Nominal Donasi</label>

                        <select id="disabledoption" onchange="opsi(this)" class="custom-select" name="nominal">
                            <option value="None">Rp -</option>
                            <option value="10000">Rp 10.000</option>
                            <option value="20000">Rp 20.000</option>
                            <option value="30000">Rp 30.000</option>
                            <option value="50000">Rp 50.000</option>
                            <option value="100000">Rp 100.000</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="number" id="inputku" name="nominal" min="10000" max="10000000" placeholder="Atau masukan jumlah donasi contoh = 100000">
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input class="form-control" type="text" name="keterangan">
                    </div>
                    <input type="hidden" name="note" value="Transaksi Anda Sedang Diproses Trimakasih ! ">

                    <button type="submit" class="btn btn-primary btn-block">Donasi</button>
                    <hr>
                    <div class="card-footer">
                        <strong>Keterangan : </strong> <span style="color: red;">
                        Setelah berhasil donasi harap melakukan konfirmasi dengan mengirimkan bukti transfer.
                                jumlah transfer harus sama dengan jumlah donasi yang dimasukan, jika berbeda maka transaksi akan di gagalkan 
                                oleh admin dan harap melakukan donasi ulang dengan jumlah yang sama yang tertera di bukti transfer, trimakasih !
                        </span>
                       
                    </div>
                </form>
            </div>
        </div>
    </div>




</div>