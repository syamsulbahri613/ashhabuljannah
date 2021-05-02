<div class="content">
    <div class="headcontent">
        <h4></h4>
    </div>

    <div class="content2">
        <div class="beritauser">
            <?php foreach ($berita as $brt) : ?>
                <div class="beritaimage">
                    <img src="<?= base_url() ?>/images/<?= $brt['image_berita'] ?>">
                </div>

                <div class="beritajudul">
                    <?= $brt['judul'] ?>
                </div>

                <div class="beritaterbit">
                    Di terbitkan : <?= date('d - M - Y', strtotime($brt['tgl_terbit'])) ?> , oleh <?= $brt['nama_admin'] ?>
                </div>

                <div class="beritaisi">
                    <?= $brt['isi'] ?>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>