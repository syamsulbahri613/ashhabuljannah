<div class="content">
<?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('flashadmin')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('flashadmin'); ?><strong>Salah</strong> !
                <button type="button" class="close" data-dismiss="alert" arial-lable="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
    <div class="login">
       <div class="loginitem">
        <form action="<?= base_url('Loginadmin/login'); ?>" method="POST">
        <center><legend>Login Admin</legend></center><br>
            <div class="form-group">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" placeholder="Username">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="password">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
       </div>
    </div>
</div>
</div>
</div>