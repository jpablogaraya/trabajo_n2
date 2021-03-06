<?php
 
 require_once 'config.ini.php';  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title></title>
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="style/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

  
<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">

  <!-- Section: Links  -->
  <section class="d-flex justify-content-center justify-content-lg-between p-0 border-bottom">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4"><i class="fas fa-gem me-3"></i>Minicms</h6>
          <p><img src="https://raw.githubusercontent.com/jpablogaraya/trabajo_n2/99e41f39ceda39e547eec448ce41303a91204135/minicms/images/logo_footer.jpeg"></p>
        </div>

        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Navegación</h6>
          <p><a href="<?php echo $path ?>index.php" class="text-reset">Inicio</a></p>
          <p><a href="<?php echo $path ?>contenidos.php" class="text-reset">Contenido</a></p>
          <p><a href="<?php echo $path ?>quienessomos.php" class="text-reset">Quienes Somos</a></p>
        </div>
        
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contacto</h6>
          <p><i class="fas fa-home me-3"></i><a href="http://www.aiep.cl" target="_blank">AIEP</a></p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2022 Copyright
    <!--<a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>-->
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

</body>
</html>