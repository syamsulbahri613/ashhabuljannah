<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/aj.css">
  <script src="<?= base_url(); ?>/assets/js/fontawesome-all.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
  <title><?php echo $judul; ?></title>
</head>

<body>

  <div class="containers">
    <header class="header">
      <div class="sub-text">
        <h3>Ash-Habul Jan'nah</h3>
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
        <h4>Ash-Habul jan'nah</h4>
        <span>( Peduli yatim dan duafa )</span>
      </div>

      <ul class="menu-list">
        <li><a class="nav-item nav-link" href="<?= base_url(); ?>">
            <i class="fas fa fa-home"></i> Home <span class="sr-only">(current)</span></a></li>
        <li><a class="nav-item nav-link" href="<?= base_url(); ?>home/dokumentasi"><i class="fas fa fa-folder"></i> Dokumentasi</a></li>
        <li><a class="nav-item nav-link" href="<?= base_url(); ?>home/about"><i class="fas fa fa-user"></i> About</a></li>
      </ul>
    </nav>