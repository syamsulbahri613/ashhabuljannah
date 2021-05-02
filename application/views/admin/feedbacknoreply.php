<div class="content">
    <div class="headContent">
        <h4>Reply Feedback</h4>
    </div>

    <div class="content2">


        <?php foreach ($feedback as $fb) : ?>
            <div class="headfb">
                    <?= $fb['username'] ?> | Email : <?= $fb['email'] ?>
                </div>

                <div class="isifb">
                    <?= $fb['komentar'] ?>
                    <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#formModalFB<?= $fb['kd_fb'] ?>" type="button">Reply Feedback</button>

                </div>
        <?php endforeach; ?>
    </div>




    <?php foreach ($feedback as $fb) : ?>
        <div class="modal fade" id="formModalFB<?= $fb['kd_fb']; ?>" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="judulModal">Reply Feedback By <?= $fb['username']; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url(); ?>/adminuser/replyFB/<?= $fb['kd_fb'] ?>" method="post">
                            <div class="form-group">
                                <label>Masukan Balasan Komentar</label>
                                <textarea class="form-control" rows="3" name="komentar"></textarea>
                            </div>
                            <input type="hidden" name="fb" value="<?= $fb['kd_fb']; ?>">
                            <input type="hidden" name="adm" value="<?= $this->session->userdata("kd_admin"); ?>">
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