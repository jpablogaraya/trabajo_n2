<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    if ($_GET["logout"] == 1) {
        session_destroy();
    } else {
        header("Location: login.php");
        exit();
    }
}

require_once 'info_contenido.php';

$contenido = new Contenido();

if (isset($_GET["idcontenido"])) {
  $contenido->setIdContenido($_GET["idcontenido"]);
}
if (!empty($_POST)) {
  $contenido->setIdContenido($_POST["idcontenido"]);
  $contenido->idclasificacion = $_POST["idclasificacion"];
  $contenido->autor_idusuario = $_POST["autor_idusuario"];
  $contenido->imagen = $_POST["imagen"];
  $contenido->titulo = $_POST["titulo"];
  $contenido->subtitulo = $_POST["subtitulo"];
  $contenido->contenido = $_POST["contenido"];
  $contenido->modificar();

    header("Location: contenidos.php");
  }


  if(isset($_POST['agregar'])){
    $idclasificacion  = $_POST['idclasificacion'];
    $idusuario        = $_SESSION['usuario'];
    $imagen           = $_POST['imagen'];
    $titulo           = $_POST['titulo'];
    $subtitulo        = $_POST['subtitulo'];
    $contenido        = $_POST["contenido"];
    agregar();
    }

?>

<!doctype html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="../style/style.css" rel="stylesheet" type="text/css">
    <title>MINICMS</title>
</head>

<body>
  <?php include '../header.php' ?>
  <?php include '../carousel.php' ?>

  <?php 
    if ($_GET["idcontenido"] != 0 ) {

  ?>

  <div class="container p-3 my-3 border" style="width:50%" id="container">
    <form method="post">
    <input type="hidden" name="idcontenido" value="<?php echo $contenido->idcontenido ?>">
      <div class="form">
        <h4>Contenido</h4>
        <br>
        <div class="form-group">
          <label for="exampleFormControlSelect1"><b>Clasificación</b></label>
          <input type="text" class="form-control" id="idclasificacion" name="idclasificacion" value="<?php echo $contenido->idclasificacion ?>">
        </div>
        <br>
          <label for="formGroupExampleInput"><b>Imagen</b></label>
          <input type="url" class="form-control" id="imagen" name="imagen" placeholder="URL de imágen"  value="<?php echo $contenido->imagen ?>">
        <br>
        <div class="form-group">
          <label for="formGroupExampleInput"><b>Título</b></label>
          <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título del Contenido"  value="<?php echo $contenido->titulo ?>">
        </div>
        <br>
        <div class="form-group">
          <label for="exampleFormControlTextarea1"><b>Resumen</b></label>
          <textarea class="form-control" id="subtitulo" name="subtitulo" rows="5" placeholder="Resumen del Contenido"><?php echo $contenido->subtitulo ?></textarea>
        </div>
        <br>
        <div class="form-group">
          <label for="exampleFormControlTextarea1"><b>Contenido</b></label>
          <textarea class="form-control" id="contenido" name="contenido"  rows="5" placeholder="Texto del contenido"><?php echo $contenido->contenido ?></textarea>
        </div>
    </form>
    <br>
    <div>
      <a href="contenidos.php" class="btn btn-sm btn-outline-secondary">Cancelar</a>
      <button type="submit" class="btn btn-sm btn-outline-secondary">Guardar</button>
    </div>

  </div>

<?php
} elseif (($_GET["idcontenido"] == 0 )) {
?>

<div class="container p-3 my-3 border" style="width:50%" id="container">
    <form method="post">
    <input type="hidden" name="idcontenido">
      <div class="form">
        <h4>Contenido</h4>
        <br>
        <div class="form-group">
          <label for="exampleFormControlSelect1"><b>Clasificación</b></label>
          <input type="text" class="form-control" id="idclasificacion" name="idclasificacion">
        </div>
        <br>
          <label for="formGroupExampleInput"><b>Imagen</b></label>
          <input type="url" class="form-control" id="imagen" name="imagen" placeholder="URL de imágen">
        <br>
        <div class="form-group">
          <label for="formGroupExampleInput"><b>Título</b></label>
          <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título del Contenido">
        </div>
        <br>
        <div class="form-group">
          <label for="exampleFormControlTextarea1"><b>Resumen</b></label>
          <textarea class="form-control" id="subtitulo" name="subtitulo" rows="5" placeholder="Resumen del Contenido"></textarea>
        </div>
        <br>
        <div class="form-group">
          <label for="exampleFormControlTextarea1"><b>Contenido</b></label>
          <textarea class="form-control" id="contenido" name="contenido"  rows="5" placeholder="Texto del contenido"></textarea>
        </div>
    </form>
    <br>
    <div>
      <a href="contenidos.php" class="btn btn-sm btn-outline-secondary">Cancelar</a>
      <button name="agregar" type="submit" class="btn btn-sm btn-outline-secondary">Guardar</button>
    </div>

  </div>


<?php 
}
?>

    <?php include '../footer.php' ?>
</body>

</html>