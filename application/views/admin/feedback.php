<div class="content">
    <div class="content2">

        <div class="feedback">

            <div class="headingfb">
                <h2><Strong>Halaman Feedback</Strong></h2>
                

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

    </div>
</div>