<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/aj.css">
  <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
  <script src="<?= base_url(); ?>/assets/js/fontawesome-all.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/Chart.js"></script>

  <title><?php echo $judul; ?></title>
</head>

<body>

  <div class="containers">
    <header class="header">
      <div class="sub-text">
        <h4>Ash-Habul jannah</h4>
        <span>( Peduli Yatim Dan Duafa )</span>
      </div>

      <div class="sub-logo">
      </div>
    </header>

    <nav class="menu">
      <div class="menu-toggle">
        <input type="checkbox">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <div class="menu-text">
        <h4>Ash-Habul jannah</h4>
        <span>( Peduli Yatim Dan Duafa )</span>
      </div>

      <ul class="menu-list">
        <li><a class="nav-item nav-link" href="<?= base_url(); ?>Adminuser">
            <i class="fas fa fa-home"></i> Dashboard <span class="sr-only">(current)</span></a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa fa-history"></i> History</a>

          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= base_url(); ?>Adminuser/TransaksiUnkonfirm">Transaksi Belum Di Konfirmasi</a>
            <a class="dropdown-item" href="<?= base_url(); ?>Adminuser/transaksisuccess">Transaksi Success</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa fa-chart-area"></i> Laporan</a>

          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= base_url(); ?>Adminuser/Laporan">Total Dana Keseluruhan</a>
            <?php foreach ($program as $prg) : ?>
              <a class="dropdown-item" href="<?= base_url(); ?>Adminuser/laporanById/<?= $prg['kd_program']; ?>">Total Dana
                <?= $prg['nama_program']; ?></a>
            <?php endforeach; ?>
        </li>
        <li><a class="nav-item nav-link" href="<?= base_url(); ?>adminuser/feedback"><i class="fas fa fa-comment"></i> Feedback</a></li>
        <li><a class="nav-item nav-link" href="<?= base_url('logout'); ?>">
            <i class="fas fa fa-sign-out-alt"></i>Logout</a></li>
      </ul>
    </nav>