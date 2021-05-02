<div class="content">
    <div class="headContent">
        <h4>Daftar Pengguna</h4>
    </div>

    <div class="content2">
        <table class="table">
            <th class="table-dark">No</th>
            <th class="table-dark">Nama Lengkap</th>
            <th class="table-dark">Username</th>
            <th class="table-dark">Email</th>
            <th class="table-dark">No telpon</th>
            <th class="table-dark">Alamat</th>

            <?php 
            $num = 1;
            foreach ($user as $usr) : ?>
                <tr>
                    <td><?= $num++ ?></td>
                    <td><?= $usr['nama_lengkap'] ?></td>
                    <td><?= $usr['username'] ?></td>
                    <td><?= $usr['email'] ?></td>
                    <td><?= $usr['notelpon'] ?></td>
                    <td><?= $usr['alamat'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>