</div>

<div class="footer">
  <div class="footerhead">
    <div class="f1">
      <a href="http://instagram.com/"><i class="fab fa-instagram fa-3x"></i></a>
      <a href="http://facebook.com/"><i class="fab fa-facebook fa-3x"></i></a>
    </div>

    <div class="f2">
      <a><i class="fas fa-map-marker-alt"></i> Jl. H.Som RT.006/01 No.48 Kel. Pondok Pucung Kec. Pondok Aren Kota Tangerang Selatan</a>
      <a><i class="fas fa-phone"></i> 0899-6808-369 / 0813-1419-8404</a>
    </div>
  </div>

  <div class="footerisi">
    <strong>&copy; Ash-Habul Jannah </strong>
  </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="<?= base_url(); ?>/assets/js/alertconfig.js"></script>
<script src="<?= base_url(); ?>/assets/js/opsioption.js"></script>
<script src="<?= base_url(); ?>/assets/js/swal.min.js"></script>


<script lang="javscript">
  <?php if (!empty($this->session->flashdata('success'))) { ?>
    swal("SUKSES!", "<?= $this->session->flashdata('success'); ?>", 'success');
  <?php } ?>

  <?php if (!empty($this->session->flashdata('error'))) { ?>
    swal("ERROR!", "<?= $this->session->flashdata('error'); ?>", 'error');
  <?php } ?>
</script>

<script>
  const menuToggle = document.querySelector('.menu-toggle');
  const nav = document.querySelector('nav ul');

  menuToggle.addEventListener('click', function() {
    nav.classList.toggle('slide');
  });
</script>

<script>
  var modal = document.getElementById("myModal");

  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var img = document.getElementById("myImg");
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption");

  function showImgFull(loc) {
    modal.style.display = "block";
    modalImg.src = loc;
    captionText.innerHTML = "Bukti Transaksi";
  }

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("closemodal")[0];

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }
</script>

<script>
  var modal2 = document.getElementById("myModal2");

  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var img2 = document.getElementById("myImg2");
  var modalImg2 = document.getElementById("img02");
  var captionText2 = document.getElementById("caption2");

  function showImgFull2(loc, ket) {
    modal2.style.display = "block";
    modalImg2.src = loc;
    captionText2.innerHTML = ket;
  }

  var span = document.getElementsByClassName("closemodal2")[0];
  span.onclick = function() {
    modal2.style.display = "none";
  }
</script>
</body>

</html>