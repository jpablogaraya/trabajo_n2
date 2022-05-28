<?php
 
 session_start();
 require_once 'config.ini.php';  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="style/style.css" rel="stylesheet" type="text/css">
    
    <title>MINICMS</title>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="<?php echo $path ?>index.php"><img src="https://github.com/jpablogaraya/trabajo_n2/blob/99e41f39ceda39e547eec448ce41303a91204135/minicms/images/logo_header.jpeg?raw=true"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo $path ?>index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $path ?>contenidos.php">Contenido</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $path ?>quienessomos.php">Quienes Somos</a>
        </li>
          <?PHP
            if (isset($_SESSION['usuario'])) {
          ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $path ?>admin/contenidos.php">Administrar Contenidos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $path ?>admin/logout.php">Cerrar Sesión</a>
        </li>
          <?PHP
            }
          ?>
        </li>

      </ul>
    </div>
  </div>
</nav>

</body>
</html>