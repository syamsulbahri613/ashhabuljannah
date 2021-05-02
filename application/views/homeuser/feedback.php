<div class="content">
    <div class="headcontent">
        <h4></h4>
    </div>

    <div class="content2">
        <div class="feedback">
            <div class="headingfb">
                <h2><Strong>Feedback</Strong></h2>
                <div class="headingfb2">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formModalfeedback">Kirim saran atau komentar anda</button>
                </div>

            </div>

            <?php foreach ($feedback as $fb) : ?>


                <div class="headfb">
                    <?= $fb['username'] ?> | Email : <?= $fb['email'] ?>
                </div>

                <div class="isifb">
                    <?= $fb['komentar'] ?>
                    <?php
                    if ($fb['status_komentar'] == "Off") {
                        echo '<button class="btn btn-light btn-sm disabled" type="button">Unanswered</button>';
                    } else {
                        echo ' <div class"" style="color:lightcoral; border-top: 1px solid #ddd;">
                                    <strong>admin : </strong>' . $fb['reply'] . '</div>';
                    }
                    ?>

                </div>
            <?php endforeach; ?>
        </div>




        <div class="modal fade" id="formModalfeedback" tabindex="-1" role="dialog" aria-labelledby="judulModalKonfirmasi" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="judulModalfeedbsck">Feedback</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('homeuser/prosesfeedback') ?>" method="post">
                            <input type="hidden" name="kd_user" value="<?= $this->session->userdata('kd_user'); ?>">
                            <div class="form-group">
                                <textarea class="form-control" name="komentar" id="komentar" rows="3" placeholder="masukan komentar"></textarea>
                            </div>
                            <input type="hidden" name="statusk" value="Off">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>